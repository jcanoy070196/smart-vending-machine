<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'idNumber', 'rfid','firstName','middleName','lastName','balance','description'
    ];
}
