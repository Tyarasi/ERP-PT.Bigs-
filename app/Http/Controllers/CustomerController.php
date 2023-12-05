<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getKontrak()
    {
        $customer = Customer::find(1);
        $kontrak = $customer->kontrak;
        foreach($kontrak as $kontrak){

        }
    }

    public function getPenawaran()
    {
        $customer = Customer::find(1);
        $penawaran = $customer->penawaran;
         //return response(['penawaran'=> $penawaran], 250);
        foreach($penawaran as $penawaran){

        }  
    }
    
    public function index()
    {
        $customer = Customer::latest()->paginate(10);
        return view('crm.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.customer.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'nama_cs' => $request->nama_cs,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            
        ]);
        if($customer){
            return Redirect()->route('customer.index');
        }else{
            return Redirect()->back('customer.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customer = Customer::find($id);
        return view('crm.customer.update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update
        ([
            'nama_cs' => $request->nama_cs,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            
        ]);
        if($customer){
            return Redirect()->route('customer.index');
        }else{
            return Redirect()->back('customer.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        if ($customer) {
            return redirect()->route('customer.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('customer.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }
}