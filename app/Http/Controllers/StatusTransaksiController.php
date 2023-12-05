<?php

namespace App\Http\Controllers;

use App\Models\StatusTransaksi;
use Illuminate\Http\Request;

class StatusTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTransaksi()
    {
        $statustransaksi = StatusTransaksi::find(1);
        $transaksi =  $statustransaksi->transaksi;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($transaksi as $transaksi){

        }  
    }
    
    public function index()
    {
        $statustransaksi = StatusTransaksi::latest()->paginate(10);
        return view('finance.statustransaksi.index', compact('statustransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.statustransaksi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statustransaksi = StatusTransaksi::create([
            'nama_status' => $request->nama_status,
            
        ]);
        if($statustransaksi){
            return redirect()->route('statustransaksi.index')->with(['success' => 'Data Berhasil disimpan']);
        }else{
            return redirect()->route('statustransaksi.index')->with(['error' => "Data gagal disimpan"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusTransaksi  $statusTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(StatusTransaksi $statusTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusTransaksi  $statusTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statustransaksi = StatusTransaksi::find($id);
        return view('finance.statustransaksi.update', compact('statustransaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusTransaksi  $statusTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $statustransaksi = StatusTransaksi::findOrFail($id);
        $statustransaksi->update
        ([
            'nama_status' =>$request->nama_status,
        ]);

        if ($statustransaksi) {
            return redirect()->route('statustransaksi.index')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            return redirect()->route('statustransaksi.index')->with(['error' => 'Data gagal disimpan!']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusTransaksi  $statusTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statustransaksi = StatusTransaksi::findOrFail($id);
        $statustransaksi->delete();
        if ($statustransaksi) {
            return redirect()->route('statustransaksi.index')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            return redirect()->route('statustransaksi.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}