<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPenawaran;

class StatusPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPenawaran()
    {
        $statuspenawaran = StatusPenawaran::find(1);
        $penawaran = $statuspenawaran->penawaran;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($penawaran as $penawaran){

        }  
    }
    
    public function index()
    {
        $statuspenawaran = StatusPenawaran::latest()->paginate(10);
        return view('crm.statuspenawaran.index', compact('statuspenawaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.statuspenawaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statuspenawaran = StatusPenawaran::create([
            'status_penawaran' => $request->status_penawaran,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($statuspenawaran){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusPenawaran  $statusPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusPenawaran  $statusPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuspenawaran = StatusPenawaran::find($id);
        return view('crm.statuspenawaran.update', compact('statuspenawaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusPenawaran  $statusPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $statuspenawaran = StatusPenawaran::findOrFail($id);
        $statuspenawaran->update
        ([
            'status_penawaran' =>$request->status_penawaran,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($statuspenawaran){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusPenawaran  $statusPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statuspenawaran = StatusPenawaran::findOrFail($id);
        $statuspenawaran->delete();
        if ($statuspenawaran) {
            return redirect()->route('statuspenawaran.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('statuspenawaran.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}