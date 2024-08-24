<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedModel extends Model
{
    
    use HasFactory;
    protected $primaryKey = 'file_id';
    protected $table = 'archivedfile';
    protected $fillable = [
        'file_idID',
        'file_submittedby',
        'file_authoredby',
        'file_name',
        'file_docketnum',
        'file_casestatus',
        'file_casetype',
        'file_casetypetype',
        'file_genID',
        'file',
        'file_client',
        'file_court',
        'file_branch',
        'created_at',
        'client_id', // Add the 'client_id' field here
    ];
    
}
