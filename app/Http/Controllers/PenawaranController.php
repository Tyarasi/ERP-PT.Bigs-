<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Customer;
use App\Models\JenisPrioritas;
use App\Models\StatusPenawaran;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenawaranController extends Controller
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

    public function jenisprioritas()
    {
        return $this->belongsTo(App\Models\JenisPrioritas::class);
    }

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\JenisProduk::class);
    }

    public function statuspenawaran()
    {
        return $this->belongsTo(App\Models\StatusPenawaran::class);
    }

    public function index()
    {
        $penawaran = Penawaran::with('jenisprioritas', 'statuspenawaran', 'jenisproduk', 'customer')->get();
        return view('crm.penawaran.index', compact('penawaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jenisprioritas = JenisPrioritas::all();
        $statuspenawaran = StatusPenawaran::all();
        $jenisproduk = JenisProduk::all();
        $customer = Customer::all();
        return view('crm.penawaran.tambah', compact('jenisprioritas', 'statuspenawaran', 'jenisproduk', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $penawaran = Penawaran::create([
            'id_customer' => $request->id_customer,
            'jenisprioritas' => $request->jenisprioritas,
            'id_jenisproduk' => $request->id_jenisproduk,
            'statuspenawaran' => $request->statuspenawaran,
            'nama_penawaran' => $request->nama_penawaran,
            'deal_value' => $request->deal_value,
            'tanggal' => $request->tanggal,
        ]);
        if($penawaran){
            return Redirect()->route('penawaran.index');
        }else{
            return Redirect()->route('penawaran.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function show(Penawaran $penawaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        $jenisproduk = JenisProduk::all();
        $customer = Customer::all();
        return view('crm.penawaran.update', compact('penawaran', 'jenisproduk', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penawaran = Penawaran::findOrFail($id);
            $penawaran->update([
                'id_customer' => $request->id_customer,
                'jenisprioritas' => $request->jenisprioritas,
                'id_jenisproduk' => $request->id_jenisproduk,
                'statuspenawaran' => $request->statuspenawaran,
                'nama_penawaran' => $request->nama_penawaran,
                'deal_value' => $request->deal_value,
            
            ]);
            
            if($penawaran){
                return redirect()->route('penawaran.index')->with(['delete' => 'Data Berhasil Dihapus!']);
            } else {
                return redirect()->route('penawaran.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        Penawaran::findOrFail($penawaran->id)->delete(); //koding pagi bisa ngehapus
        $penawaran->delete();
        if($penawaran){
            return redirect()->route('penawaran.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('penawaran.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}