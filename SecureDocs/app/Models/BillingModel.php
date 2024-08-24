<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'billing';
    //protected $nullable = 'b_clientbalance';
}
