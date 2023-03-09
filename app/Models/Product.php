<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'color',
        'price',
    ];

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
