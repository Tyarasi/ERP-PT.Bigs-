<?php

namespace App\Http\Controllers;

use App\Models\Pemasukkan;
use App\Models\Laporan;
use App\Models\JenisProduk;
use Illuminate\Http\Request;

class PemasukkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\Pemasukkan::class);
    }
    
    public function index()
    {
        $pemasukan = Pemasukkan::with('jenisproduk')->get();
        $total_pemasukan = Pemasukkan::select('biaya')->get()->sum('biaya');
        return view('finance.pemasukkan.index', compact('pemasukan','total_pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisproduk= JenisProduk::all();
       
        return view('finance.pemasukkan.tambah', compact('jenisproduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemasukan = Pemasukkan::create([
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_pemasukan' => $request->tgl_pemasukan,
            'biaya' => $request->biaya,
            
        ]);
        
        if($pemasukan){
            return Redirect()->route('pemasukan.index');
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
    public function show(Pemasukkan $pemasukan)
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
        $pemasukan = Pemasukkan::findOrFail($id);
        $jenisproduk = JenisProduk::all();
       
        return view('finance.pemasukkan.update', compact('pemasukan', 'jenisproduk'));
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
        $pemasukan = Pemasukkan::findOrFail($id);
        $pemasukan -> update([
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_pemasukan' => $request->tgl_pemasukan,
            'biaya' => $request->biaya,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($pemasukan){
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
        $pemasukan = Pemasukkan::findOrFail($id);
        Pemasukkan::findOrFail($pemasukan->id)->delete(); //koding pagi bisa ngehapus
      
        $pemasukan->delete();
        if ($pemasukan) {
            return redirect()->route('pemasukan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('pemasukan.index')->with(['error' => 'Data Gagal dihapus']);
 
        }
    }
}