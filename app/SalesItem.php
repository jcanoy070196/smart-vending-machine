<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Student;
class SalesItem extends Model
{
    protected $fillable = [
        'student_id', 'product_id','quantity','price',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id','student_id');
    }
}
