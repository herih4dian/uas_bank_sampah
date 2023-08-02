<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MasterJenisSampah extends Model
{
    use HasFactory;
    
    protected $table = 'master_jenis_sampah';
    protected $fillable = [
        'type_sampah'
    ];
    
   
}
