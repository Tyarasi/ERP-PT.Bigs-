<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\JenisProduk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\Transaksi::class);
    }

    public function index()
    {
        $transaksi= Transaksi::with('jenisproduk')->get();
        return view('finance.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $jenisproduk = JenisProduk::all();
      
        return view('finance.transaksi.tambah', compact('jenisproduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
        
            'id_jenisproduk' => $request->id_jenisproduk,
            'status_transaksi' => $request->statustransaksi,
            'tgl_bayar' => $request->tgl_bayar,
            'total_bayar' => $request->total_bayar,
        ]);
        if($transaksi){
            return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil disimpan']);
        }else{
            return redirect()->route('transaksi.index')->with(['error' => "Data gagal disimpan"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $jenisproduk = JenisProduk::all();
       
        return view('finance.transaksi.update', compact('transaksi', 'statustransaksi', 'jenisproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'id_jenisproduk' => $request->id_jenisproduk,
            'status_transaksi' => $request->status_transaksi,
            'tgl_bayar' => $request->tgl_bayar,
            'total_bayar' => $request->total_bayar,
        
        ]);
    if($transaksi){
        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan']);
    } else{
        return redirect()->route('transaksi.index')->with(['error' => 'Data Gagal Disimpan']);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        Transaksi::findOrFail($transaksi->id)->delete(); //koding pagi bisa ngehapus
        $transaksi->delete();
        if($transaksi){
            return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('transaksi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}