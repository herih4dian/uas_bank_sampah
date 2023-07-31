<?php

namespace App\Http\Controllers;

use App\Models\MasterHargaSampah;
use App\Models\MasterJenisSampah;
use Illuminate\Http\Request;

class MasterHargaSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = MasterHargaSampah::with('jenis_sampah')->get();
        return view('pages.harga.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $j_sampah = MasterJenisSampah::all();
        return view('pages.harga.form', compact('data', 'j_sampah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_master_jenis_sampah' => 'required|min:1',
            'harga_sampah' => 'required',
        ]);

        //create post
        MasterHargaSampah::create([
            'id_master_jenis_sampah' => $request->id_master_jenis_sampah,
            'harga_sampah' => $request->harga_sampah,
        ]);

        //redirect to index
        return redirect()->route('harga.index')->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterHargaSampah $masterHargaSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = MasterHargaSampah::findOrFail($id);
        $j_sampah = MasterJenisSampah::all();
        return view('pages.harga.form', compact('data', 'j_sampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_master_jenis_sampah' => 'required|min:1',
            'harga_sampah' => 'required',
        ]);

        //get post by ID
        $data = MasterHargaSampah::findOrFail($id);

        $data->update([
            'id_master_jenis_sampah' => $request->id_master_jenis_sampah,
            'harga_sampah' => $request->harga_sampah,
        ]);

        return redirect()->route('harga.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterHargaSampah $masterHargaSampah)
    {
        //
    }
}
