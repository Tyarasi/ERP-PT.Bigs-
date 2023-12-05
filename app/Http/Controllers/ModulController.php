<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class ModulController extends Controller
{

    public function AllModul($id){
        //$moduls = Modul::latest()->paginate(20);
        $moduls = DB::select("SELECT * FROM moduls as modul
         WHERE modul.id_project = $id");
        $projects = DB::table('projects')->where('id', $id)->first();
        return view('layouts.modul.index', compact('projects', 'moduls'));
    }


    public function AddModul(Request $request){
        $validateRequest = $request->validate([
            'nama_modul' => 'required|unique:moduls|max:255',
        ],
        
        [
            'nama_modul.required' => 'Please Input Category Name',
            'nama_modulx.max' => 'Please Less Than 255Chars',
        ]
    );
        Modul::insert([
            'nama_modul' => $request->nama_modul,
            //Cara Memasukkan Data Sesuai User yang menginputkan
            'id_project' => $request->id_project,
            'created_at' => Carbon::now() 
        ]);
        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );       
            return Redirect()->back()->with($notification);        
    }

    public function DeleteM($id){
        Modul::find($id)->delete();
        $notification = array(
            'message' => 'Delete Modul Succesfully',
            'alert-type' => 'success'
        );       
            return Redirect()->back()->with($notification);
        return Redirect()->back()->with($notification);
    
    }

}   