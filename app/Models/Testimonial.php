<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'location', 'message', 'photo', 'is_active', 'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? asset('storage/'.$this->photo)
            : asset('images/testi.png');
    }
}
