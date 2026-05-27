<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    
    
    //Fillable Fields
    
    protected $fillable = [

        //Product Fields

        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'is_active',
        'sort_order',

        //Certificate Fields
        
        'batch_number',
        'certificate_title',
        'quality_test_report',
        'purity_percentage',
        'moisture_level',
        'test_date',
        'approved_by',
        'additional_remarks',
        'certificate_file',
        'certificate_qr',
        'certificate_generated_at',
        'certificate_status',
    ];

    //Attribute Casting
    
    protected $casts = [

        'is_active' => 'boolean',

        'certificate_status' => 'boolean',

        'test_date' => 'date',

        'certificate_generated_at' => 'datetime',

        'purity_percentage' => 'decimal:2',

        'moisture_level' => 'decimal:2',
    ];


    //Auto Generate Slug
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {

            if (empty($product->slug)) {

                $product->slug = Str::slug(
                    $product->name
                );
            }
        });
    }

    
    //Active Products Scope

    public function scopeActive($query)
    {
        return $query
            ->where('is_active', true)
            ->orderBy('sort_order');
    }

    
    //Product Image URL

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/placeholder.png');
    }

    //Certificate PDF URL
    
    public function getCertificateUrlAttribute(): ?string
    {
        if (!$this->certificate_file) {
            return null;
        }

        return asset(
            'storage/' . $this->certificate_file
        );
    }

    
    //Certificate QR URL
    
    public function getCertificateQrUrlAttribute(): ?string
    {
        if (!$this->certificate_qr) {
            return null;
        }

        return asset(
            'storage/' . $this->certificate_qr
        );
    }

    //Certificate Exists

    public function hasCertificate(): bool
    {
        return
            $this->certificate_status &&
            $this->certificate_file &&
            Storage::disk('public')->exists(
                $this->certificate_file
            );
    }
    public function certifications()
    {
        return $this->hasMany(
            ProductCertification::class
        );
    }
    
}