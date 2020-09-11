<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Notification extends Model
{
    protected $fillable = [
        'name', 'product_id'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
