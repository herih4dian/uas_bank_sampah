<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterNasabah extends Model
{
    use HasFactory;

    protected $table = 'master_nasabah';
    protected $fillable = [
        'nama', 'alamat'
    ];
}
