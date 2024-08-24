<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedBilling extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'archivedbilling';
    protected $fillable = [
        'client_id',
        'case_id',
        'case_title',
        'b_clientbalance',
        'b_casetype',
        'b_paymethod',
        'bclient_paystatus',
        'created_at',
        'client_id', // Add the 'client_id' field here
    ];
    
}
