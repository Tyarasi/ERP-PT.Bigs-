<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisJabatan;

class JenisJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getKaryawan()
    {
        $jenisjabatan = JenisJabatan::find(1);
        $karyawan = $jenisjabatan->karyawan;
        foreach($karyawan as $karyawan){

        }
       
    }

    public function index()
    {
        $jenisjabatan = JenisJabatan::latest()->paginate(10);
        return view('crm.jenisjabatan.index', compact('jenisjabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.jenisjabatan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisjabatan = JenisJabatan::create([
            'jenis_jabatan' => $request->jenis_jabatan,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisjabatan){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisJabatan  $jenisjabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisJabatan  $jenisjabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisjabatan = JenisJabatan::find($id);
        return view('crm.jenisjabatan.update', compact('jenisjabatan'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKontak  $jenisjabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisjabatan = JenisJabatan::findOrFail($id);
        $jenisjabatan->update
        ([
            'jenis_jabatan' =>$request->jenis_jabatan,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisjabatan){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisJabatan  $jenisjabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisjabatan = JenisJabatan::findOrFail($id);
        $jenisjabatan->delete();
        if ($jenisjabatan) {
            return redirect()->route('jenisjabatan.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('jenisjabatan.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}