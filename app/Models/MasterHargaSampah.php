<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHargaSampah extends Model
{
    use HasFactory;
    
    protected $table = 'master_harga_sampah';
    protected $fillable = [
        'id_master_jenis_sampah', 'harga_sampah'
    ];
}
