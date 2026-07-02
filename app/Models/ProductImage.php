<?php

namespace App\Models;
App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use UUID;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image',
        'is_thumbnail',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
}
