<?php

namespace App\Http\Controllers;

use App\Models\MasterJenisSampah;
use Illuminate\Http\Request;

class MasterJenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = MasterJenisSampah::all();
        return view('pages.jenis.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        return view('pages.jenis.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'type_sampah' => 'required|min:2',
        ]);

        //create post
        MasterJenisSampah::create([
            'type_sampah' => $request->type_sampah,
        ]);

        //redirect to index
        return redirect()->route('jenis.index')->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterJenisSampah $masterJenisSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = MasterJenisSampah::findOrFail($id);
        return view('pages.jenis.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'type_sampah' => 'required|min:2',
        ]);

        //get post by ID
        $data = MasterJenisSampah::findOrFail($id);

        $data->update([
            'type_sampah' => $request->type_sampah,
        ]);

        return redirect()->route('nasabah.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterJenisSampah $masterJenisSampah)
    {
        //
    }
}
