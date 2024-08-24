<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoxtest extends Model
{
    protected $table = 'checkoxtest';
    protected $fillable=[
        'casename',
        'casetype',
    ];

}
