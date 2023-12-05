<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\JenisProduk;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Transaksi;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kontak()
    {
        return $this->belongsTo(App\Models\Invoice::class);
    }

    public function jenisproduk()
    {
        return $this->belongsTo(App\Models\Invoice::class);
    }
    
    public function index()
    {
        $invoice = Invoice::with('jenisproduk')->get();
        return view('finance.invoice.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisproduk= JenisProduk::all();
        $customer = Customer::all();
    
        return view('finance.invoice.tambah', compact('jenisproduk','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'nama_customer' => $request->nama_customer,
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_invoice' => $request->tgl_invoice,
            'biaya' => $request->biaya,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($invoice){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
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
        $invoice = Invoice::findOrFail($id);
        $jenisproduk = JenisProduk::all();
        $customer = Customer::all();
        return view('finance.invoice.update', compact('invoice', 'jenisproduk','customer'));
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
        $invoice = Invoice::findOrFail($id);
        $invoice -> update([
            'id_kontak' => $request->id_kontak,
            'id_jenisproduk' => $request->id_jenisproduk,
            'tgl_invoice' => $request->tgl_invoice,
            'biaya' => $request->biaya,
            
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
        if($invoice){
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        Invoice::findOrFail($invoice->id)->delete(); //koding pagi bisa ngehapus
      
        $invoice->delete();
        if ($invoice) {
            return redirect()->route('invoice.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('invoice.index')->with(['error' => 'Data Gagal dihapus']);
 
        }
    }
}