<?php

namespace App\Http\Controllers;

use App\Models\JenisJabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jenisjabatan()
    {
        return $this->belongsTo(App\Models\User::class);
    }

    public function getKontrak()
    {
        $karyawan = User::find(1);
        $kontrak = $karyawan->kontrak;
        foreach($kontrak as $kontrak){

        }
    }

    public function index()
    {
        $karyawan = User::with('jenisjabatan')->get();
        $jenisjabatan = JenisJabatan::all();
        return view('crm.karyawan.index', compact('karyawan', 'jenisjabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisjabatan = JenisJabatan::all();
        return view('crm.karyawan.tambah', compact('jenisjabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto_karyawan = $request->file('profile_photo_path');
        
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($foto_karyawan->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/karyawan/';

        $last_img = $up_location.$img_name;
        $foto_karyawan->move($up_location,$img_name);
        $idfi = 1;
        
        $karyawan = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik_karyawan' => $request->nik_karyawan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'profile_photo_path' => $last_img,
            'id_jenisjabatan' => $request->id_jenisjabatan,
            
            
        ]);
        if($karyawan){
            return Redirect()->route('karyawan.index');
        }else{
            return Redirect()->route('karyawan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        $jenisjabatan = JenisJabatan::all();
        return view('crm.karyawan.update', compact('karyawan', 'jenisjabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_image = $request->old_image;
        
        $foto_karyawan = $request->file('profile_photo_path');

        if($foto_karyawan){
            
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($foto_karyawan->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/karyawan/';
        $last_img = $up_location.$img_name;
        $foto_karyawan->move($up_location,$img_name);

        unlink($old_image);
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nik_karyawan' => $request->nik_karyawan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'profile_photo_path' => $last_img,
            'id_jenisjabatan' => $request->id_jenisjabatan,
           
        ]);

        return Redirect()->route('karyawan.index');
            
        }else{
        unlink($old_image);
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nik_karyawan' => $request->nik_karyawan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'id_jenisjabatan' => $request->id_jenisjabatan,
           
        ]);

            return Redirect()->route('karyawan.index');
        }
   
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        User::findOrFail($karyawan->id)->delete(); //koding pagi bisa ngehapus
        Storage::disk('local')->delete('public/kontak/' . $karyawan->foto_karyawan);
        $karyawan->delete();
        if ($karyawan) {
            return redirect()->route('karyawan.index')->with(['delete' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('karyawan.index')->with(['error' => 'Data Gagal dihapus']);
 
        }
    }
}