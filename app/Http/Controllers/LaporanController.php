<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\Pemasukkan;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function AllLaporan(){

     }

    public function index()
    {
        $laporanPemasukan = Pemasukkan::latest()->paginate(10);
        $total_pemasukan = Pemasukkan::select('biaya')->get()->sum('biaya');
        $laporanPengeluaran = Pengeluaran::latest()->paginate(10);
        $total_pengeluaran = Pengeluaran::select('biaya')->get()->sum('biaya');
        
        return view('finance.laporan.index', compact('laporanPemasukan','total_pemasukan', 'laporanPengeluaran', 'total_pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $laporan = Laporan::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'saldo' => $request->saldo,

        ]);
        
        return view('laporan.index', compact('kreditss'));
}               

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return view('laporan.update', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'debit' => $request->debit, 
            'kredit' => $request->kredit,
            'saldo' => $request->saldo,
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($laporan){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        if($laporan){
            return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('laporan.index')->with(['error' => 'Data Gagal Disimpan!']);
    } 
}
}