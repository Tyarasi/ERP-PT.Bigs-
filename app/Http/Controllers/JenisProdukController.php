<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisProduk;

class JenisProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPenawaran()
    {
        $jenisproduk = JenisProduk::find(1);
        $penawaran = $jenisproduk->penawaran;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($penawaran as $penawaran){

        }
       
    }

    public function getKontrak()
    {
        $jenisproduk = JenisProduk::find(1);
        $kontrak = $jenisproduk->kontrak;
        foreach($kontrak as $kontrak){

        }
    }
    
    public function index()
    {
        $jenisproduk = JenisProduk::latest()->paginate(10);
        return view('crm.jenisproduk.index', compact('jenisproduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.jenisproduk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisproduk = JenisProduk::create([
            'jenis_produk' => $request->jenis_produk,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisproduk){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisproduk = JenisProduk::find($id);
        return view('crm.jenisproduk.update', compact('jenisproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisproduk = JenisProduk::findOrFail($id);
        $jenisproduk->update
        ([
            'jenis_produk' =>$request->jenis_produk,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($jenisproduk){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisProduk  $jenisProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisproduk = JenisProduk::findOrFail($id);
        $jenisproduk->delete();
        if ($jenisproduk) {
            return redirect()->route('jenisproduk.index')->with(['delete' => 'Data berhasil dihapus!']);
        } else {
            return redirect()->route('jenisproduk.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}