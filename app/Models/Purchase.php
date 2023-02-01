<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'cust_name',
        'date',
        'session',
        'payment',
        'admin',
        'description',
    ];

    public function purchasedItems()
    {
        return $this->hasMany(PurchasedItem::class);
    }
}
