<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseClientModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'file_client';
    protected $table = 'files';
}
