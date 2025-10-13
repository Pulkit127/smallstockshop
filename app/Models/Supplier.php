<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    Use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'contact',
        'address',
    ];

    // Optional: relationship with purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
