<?php

namespace App\Http\Controllers;

use App\Models\MasterNasabah;
use Illuminate\Http\Request;

class MasterNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = MasterNasabah::all();
        return view('pages.nasabah.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        return view('pages.nasabah.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
        ]);

        //create post
        MasterNasabah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('nasabah.index')->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterNasabah $masterNasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = MasterNasabah::findOrFail($id);
        return view('pages.nasabah.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
        ]);

        //get post by ID
        $data = MasterNasabah::findOrFail($id);

        $data->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('nasabah.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterNasabah $masterNasabah)
    {
        //
    }
}
