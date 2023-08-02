<?php

namespace App\Http\Controllers;

use App\Models\MasterJenisSampah;
use App\Models\MasterNasabah;
use App\Models\MasterSatuan;
use App\Models\TransaksiNasabah;
use Illuminate\Http\Request;

class TransaksiNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TransaksiNasabah::all();
        return view('pages.transaksi.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $nasabah = MasterNasabah::all();
        $j_sampah = MasterJenisSampah::all();
        $satuan = MasterSatuan::all();
        return view('pages.transaksi.form', compact('data', 'nasabah', 'j_sampah','satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'tanggal_transaksi' => 'required',
            'id_nasabah' => 'required',
            'id_jenis_sampah' => 'required',
            'satuans' => 'required',
            'satuan_status' => 'required'
        ]);

        $date = date('Y-m-d H:i:s', strtotime($request->tanggal_transaksi));

        TransaksiNasabah::create([
            'tanggal_transaksi' => $date,
            'id_nasabah' => $request->id_nasabah,
            'id_jenis_sampah' => $request->id_jenis_sampah,
            'satuans' => $request->satuans,
            'satuan_status' => $request->satuan_status,
        ]);

        //redirect to index
        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiNasabah $transaksiNasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        $data = TransaksiNasabah::findOrFail($id);
        $nasabah = MasterNasabah::all();
        $j_sampah = MasterJenisSampah::all();
        $satuan = MasterSatuan::all();
        return view('pages.transaksi.form', compact('data', 'nasabah', 'j_sampah', 'satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiNasabah $transaksiNasabah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiNasabah $transaksiNasabah)
    {
        //
    }
}
