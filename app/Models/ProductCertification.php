<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProductCertification extends Model
{
    protected $fillable = [

        'product_id',
        'title',
        'certificate_image',
        'certificate_qr',
    ];

    //Product Relationship

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Certificate Image URL

    public function getCertificateImageUrlAttribute()
    {
        return asset(
            'storage/' . $this->certificate_image
        );
    }

    //QR URL
    
    public function getCertificateQrUrlAttribute()
    {
        return asset(
            'storage/' . $this->certificate_qr
        );
    }
}