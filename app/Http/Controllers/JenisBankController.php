<?php

namespace App\Http\Controllers;

use App\Models\JenisBank;
use Illuminate\Http\Request;

class JenisBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getRekeningBank()
    {
        $jenisbank = JenisBank::find(1);
        $rekeningbank = $jenisbank->rekeningbank;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($rekeningbank as $rekeningbank){

        }
       
    }
    
    public function index()
    {
        $jenisbank = JenisBank::latest()->paginate(10);
        return view('finance.jenisbank.index', compact('jenisbank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.jenisbank.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisbank = JenisBank::create([
            'nama_bank' => $request->nama_bank,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisbank){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBank  $jenisBank
     * @return \Illuminate\Http\Response
     */
    public function show( $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBank  $jenisBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisbank = JenisBank::find($id);
        return view('finance.jenisbank.update', compact('jenisbank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBank  $jenisBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $jenisbank = JenisBank::findOrFail($id);
        $jenisbank->update
        ([
            'nama_bank' =>$request->nama_bank,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisbank){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBank  $jenisBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisbank = JenisBank::findOrFail($id);
        $jenisbank->delete();
        if ($jenisbank) {
            return redirect()->route('jenisbank.index')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            return redirect()->route('jenisbank.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}