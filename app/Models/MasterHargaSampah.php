<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class MasterHargaSampah extends Model
{
    use HasFactory;
    
    protected $table = 'master_harga_sampah';
    protected $fillable = [
        'id_master_jenis_sampah', 'harga_sampah'
    ];

    public function jenis_sampah(): BelongsTo
    {
        return $this->belongsTo(MasterJenisSampah::class, 'id_master_jenis_sampah', 'id');
    }
}
