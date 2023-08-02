<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiNasabah extends Model
{
    use HasFactory;

    protected $table = 'transaksi_nasabah_table';
    protected $fillable = [
        'tanggal_transaksi', 'id_nasabah', 'id_jenis_sampah', 'satuans', 'satuan_status'
    ];

    public function jenis_sampah(): BelongsTo
    {
        return $this->belongsTo(MasterJenisSampah::class, 'id_jenis_sampah', 'id');
    }

    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(MasterNasabah::class, 'id_nasabah', 'id');
    }

    public function satuan(): BelongsTo
    {
        return $this->belongsTo(MasterSatuan::class, 'satuan_status', 'id');
    }
}
