<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiNasabah extends Model
{
    use HasFactory;

    protected $table = 'transaksi_nasabah_table';
    protected $fillable = [
        'tanggal_transaksi', 'id_nasabah', 'id_jenis_sampah', 'satuans', 'satuan_status'
    ];
}
