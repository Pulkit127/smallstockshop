<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'market_price',
        'sale_price',
        'image',
        'description',
        'current_stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
