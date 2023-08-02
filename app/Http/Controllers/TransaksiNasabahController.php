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
        //
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
