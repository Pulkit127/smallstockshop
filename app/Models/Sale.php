<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'date', 'total_amount'];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
