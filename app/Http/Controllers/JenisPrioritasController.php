<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPrioritas;

class JenisPrioritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPenawaran()
    {
        $jenisprioritas = JenisPrioritas::find(1);
        $penawaran = $jenisprioritas->penawaran;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($penawaran as $penawaran){

        }  
    }
    
    public function index()
    {
        $jenisprioritas = JenisPrioritas::latest()->paginate(10);
        return view('crm.jenisprioritas.index', compact('jenisprioritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.jenisprioritas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisprioritas = JenisPrioritas::create([
            'jenis_prioritas' => $request->jenis_prioritas,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisprioritas){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPrioritas  $jenisPrioritas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPrioritas  $jenisPrioritas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisprioritas = JenisPrioritas::find($id);
        return view('crm.jenisprioritas.update', compact('jenisprioritas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPrioritas  $jenisPrioritas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisprioritas = JenisPrioritas::findOrFail($id);
        $jenisprioritas->update
        ([
            'jenis_prioritas' =>$request->jenis_prioritas,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisprioritas){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPrioritas  $jenisPrioritas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisprioritas = JenisPrioritas::findOrFail($id);
        $jenisprioritas->delete();
        if ($jenisprioritas) {
            return redirect()->route('jenisprioritas.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('jenisprioritas.index')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}