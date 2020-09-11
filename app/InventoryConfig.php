<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class InventoryConfig extends Model
{
    protected $fillable = [
        'product_id', 'quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
