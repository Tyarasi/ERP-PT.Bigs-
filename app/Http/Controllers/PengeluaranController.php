<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\JenisProduk;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\Pemasukan::class);
    }
    
    public function index()
    {
        $pengeluaran = Pengeluaran::with('jenisproduk')->get();
        return view('finance.pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisproduk= JenisProduk::all();
       
        return view('finance.pengeluaran.tambah', compact('jenisproduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengeluaran = Pengeluaran::create([
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_pengeluaran' => $request->tgl_pengeluaran,
            'biaya' => $request->biaya,
            
        ]);
        if($pengeluaran){
            return Redirect()->route('pengeluaran.index');
        }else{
            return Redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $jenisproduk = JenisProduk::all();
       
        return view('finance.pengeluaran.update', compact('pengeluaran', 'jenisproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran -> update([
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_pengeluaran' => $request->tgl_pengeluaran,
            'biaya' => $request->biaya,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($pengeluaran){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        Pengeluaran::findOrFail($pengeluaran->id)->delete(); //koding pagi bisa ngehapus
      
        $pengeluaran->delete();
        if ($pengeluaran) {
            return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('pengeluaran.index')->with(['error' => 'Data Gagal dihapus']);
 
        }
    }
}