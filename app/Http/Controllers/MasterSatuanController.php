<?php

namespace App\Http\Controllers;

use App\Models\MasterSatuan;
use Illuminate\Http\Request;

class MasterSatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = MasterSatuan::all();
        return view('pages.satuan.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        return view('pages.satuan.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'satuan' => 'required|min:1',
        ]);

        //create post
        MasterSatuan::create([
            'satuan' => $request->satuan,
        ]);

        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(MasterSatuan $masterSatuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = MasterSatuan::findOrFail($id);
        return view('pages.satuan.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'satuan' => 'required|min:1',
        ]);

        //get post by ID
        $data = MasterSatuan::findOrFail($id);

        $data->update([
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterSatuan $masterSatuan)
    {
        //
    }
}
