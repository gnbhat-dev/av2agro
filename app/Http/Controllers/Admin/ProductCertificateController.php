<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CertificateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductCertificateController extends Controller
{

    //Generate Certificate

    public function generate(Request $request, Product $product)
    {
        $validated = $request->validate([

            'certificate_title' =>
                'required|string|max:255',

            'certificate_image' =>
                'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

    
        //Delete Old Certificate Image
    
        if ($product->certificate_file) {

            Storage::disk('public')
                ->delete($product->certificate_file);
        }

    
    
        //Store Uploaded Certificate Image
    

        $certificateImage = $request
            ->file('certificate_image')
            ->store('certificates', 'public');

        // Generate QR Code

        $verificationUrl = route(
            'products.verify',
            $product->slug
        );

        $qrName =
            'certificates/qrs/qr_' .
            time() .
            '.png';

        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
            ->size(300)
            ->generate($verificationUrl);

        Storage::disk('public')->put(
            $qrName,
            $qrCode
        );

        // Update Product


        $product->update([

            'certificate_title' =>
                $validated['certificate_title'],

            'certificate_file' =>
                $certificateImage,

            'certificate_qr' =>
                $qrName,

            'certificate_generated_at' =>
                now(),

            'certificate_status' =>
                true,
        ]);

        return back()->with(
            'success',
            'Certificate generated successfully.'
        );
    }
    public function certificate(Product $product)
    {
        return view(
            'admin.products.certificate',
                compact('product')
        );
    }
    
    // Preview Certificate PDF (Admin)

    public function preview(Product $product)
    {
        if (
            !$product->certificate_file ||
            !Storage::disk('public')->exists($product->certificate_file)
        ) {
            abort(404);
        }

        return response()->file(
            storage_path('app/public/' . $product->certificate_file)
        );
    }

    // Delete Certificate
    
    public function delete(Product $product)
    {
        if ($product->certificate_file) {
            Storage::disk('public')->delete($product->certificate_file);
        }

        if ($product->certificate_qr) {
            Storage::disk('public')->delete($product->certificate_qr);
        }

        $product->update([
            'certificate_file' => null,
            'certificate_qr' => null,
            'certificate_generated_at' => null,
            'certificate_status' => false,
        ]);

        return back()->with('success', 'Certificate deleted successfully.');
    }

    // Public Verification Page
    
    public function verify($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('certificate_status', true)
            ->firstOrFail();

        return view('products.verify', compact('product'));
    }
}