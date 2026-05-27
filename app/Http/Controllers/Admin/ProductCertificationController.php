<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductCertificationController extends Controller
{
    
    //Certification Page
    public function index(Product $product)
    {
        $certifications = $product->certifications;

        return view(
            'admin.products.certifications',
            compact('product', 'certifications')
        );
    }

    
    //Store Certificate
    public function store(Request $request, Product $product) 
    {
        $validated = $request->validate([

            'title' =>
                'required|string|max:255',

            'certificate_image' =>
                'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

    
        //Upload Certificate Image
    
        $imagePath = $request
            ->file('certificate_image')
            ->store('certificates', 'public');
    
        //Create Certification Record
    
        $certification = ProductCertification::create([

            'product_id' =>
                $product->id,

            'title' =>
                $validated['title'],

            'certificate_image' =>
                $imagePath,

            'certificate_qr' =>
                '',
        ]);

        //Generate PUBLIC Verification URL
    
        $url = url(
            '/certifications/' . $certification->id
        );
    
        //Generate QR Filename
    
        $qrName =
            'certificates/qrs/qr_' .
        $certification->id .
            '.png';
    
        //Generate QR Code

        $qrCode = QrCode::format('png')
            ->size(300)
            ->margin(1)
            ->generate($url);
    
        //Store QR Image
    
        Storage::disk('public')->put(
            $qrName,
            $qrCode
        );
    
        //Save QR Path

        $certification->update([

            'certificate_qr' =>
                $qrName,
        ]);

        //Success Response
    
        return back()->with(
            'success',
            'Certificate added successfully.'
        );
    }
    public function show(ProductCertification $certification)
    {
        $certification->load('product');
        return view('certificates.show', compact('certification'));
    }
}