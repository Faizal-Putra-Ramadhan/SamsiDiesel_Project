<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'shopee_url',
    ];

    public function getImageUrlAttribute(): string
    {
        if (! $this->image_path) {
            return asset('template/img/carousel-bg-1.jpg');
        }

        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }

        if (Str::startsWith($this->image_path, 'products/')) {
            return Storage::url($this->image_path);
        }

        return asset('assets/img/' . $this->image_path);
    }
}
