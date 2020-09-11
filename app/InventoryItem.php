<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class InventoryItem extends Model
{

    protected $fillable = [
        'user_id', 'product_id', 'quantity','price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
