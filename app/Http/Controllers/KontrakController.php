<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JenisProduk;
use App\Models\Karyawan;
use App\Models\Kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function customer()
    {
        return $this->belongsTo(App\Models\Customer::class);
    }

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\JenisProduk::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(App\Models\Karyawan::class);
    }
    
    public function index()
    {
        $kontrak = Kontrak::with('jenisproduk', 'customer', 'karyawan')->get();
        return view('crm.kontrak.index', compact('kontrak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisproduk = JenisProduk::all();
        $customer = Customer::all();
        return view('crm.kontrak.tambah', compact('jenisproduk', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'null';
        $kontrak = Kontrak::create([
            'id_jenisproduk' => $request->id_jenisproduk,
            'id_cs' => $request->id_cs,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'status' => $status,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($kontrak){
            return Redirect()->route('kontrak.index')->with($notification);
        }else{
            return Redirect()->route('kontrak.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontrak = Kontrak::findOrFail($id);
        $jenisproduk = JenisProduk::all();
        $customer = Customer::all();
        return view('crm.kontrak.update', compact('kontrak', 'jenisproduk', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $kontrak = Kontrak::findOrFail($id);
            $kontrak->update([
                'id_jenisproduk' => $request->id_jenisproduk,
                'id_cs' => $request->id_cs,
            'tanggal_awal' => $request->tangal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($kontrak){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $kontrak = Kontrak::findOrFail($id);
        Kontrak::findOrFail($kontrak->id)->delete();
        $kontrak->delete();
        if($kontrak){
            return redirect()->route('kontrak.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('kontrak.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}