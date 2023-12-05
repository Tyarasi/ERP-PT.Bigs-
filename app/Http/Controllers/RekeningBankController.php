<?php

namespace App\Http\Controllers;

use App\Models\JenisBank;
use App\Models\RekeningBank;
use Illuminate\Http\Request;

class RekeningBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenisbank()
    {
        return $this->belongsTo(App\Models\RekeningBank::class);
    }

    
    public function index()
    {
        $rekeningbank = RekeningBank::with('jenisbank')->get();
        return view('finance.rekeningbank.index', compact('rekeningbank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisbank= JenisBank::all();
       
        return view('finance.rekeningbank.tambah', compact('jenisbank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rekeningbank = RekeningBank::create([
            'id_namabank' => $request->id_namabank,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_pemilik' => $request->nama_pemilik,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($rekeningbank){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningBank $rekeningBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekeningbank = RekeningBank::findOrFail($id);
        $jenisbank = JenisBank::all();
       
        return view('finance.rekeningbank.update', compact('rekeningbank', 'jenisbank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rekeningbank = RekeningBank::find($id);
        $rekeningbank->update([
            'id_namabank' => $request->id_namabank,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_pemilik' => $request->nama_pemilik,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($rekeningbank){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $rekeningbank = RekeningBank::findOrFail($id);
        RekeningBank::findOrFail($rekeningbank->id)->delete(); //koding pagi bisa ngehapus
      
        $rekeningbank->delete();
        if ($rekeningbank) {
            return redirect()->route('rekeningbank.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('rekeningbank.index')->with(['error' => 'Data Gagal dihapus']);
 
        }
    }
}