<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'client_id';
    protected $table = 'clients';
    protected $fillable=[
        'client_id',
        'client_submitby',
        'client_fname',
        'client_mname',
        'client_sname',
        'client_contactnum',
        'client_emailadd',
        'client_bill_status',
        'client_bill',
        'client_type',
    ];
}
