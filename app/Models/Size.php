<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'product_id',
        'size_type',
        'quantity',
    ];

    public function product(){
    	return $this->belongsToMany(Product::class);
    }
}
