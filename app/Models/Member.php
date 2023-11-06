<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'phone_number',
        'total_point',
        'registration_date',
    ];
}
