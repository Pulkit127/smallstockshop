<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleItem extends Model
{
     use HasFactory;

    protected $fillable = ['sale_id', 'product_id', 'quantity', 'price', 'total'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
