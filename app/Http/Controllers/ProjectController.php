<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Modul;
use App\Models\StakTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;

class ProjectController extends Controller
{
    //Route Project
    public function AllProject(){
            $projects = Project::latest()->paginate(20);
            $users = User::latest()->paginate(20);
            $id_project = DB::select("SELECT id FROM projects ORDER by id DESC   limit 1");
        return view('layouts.project.dashboard', compact('projects', 'users', 'id_project'));
    }
    public function AddProject(Request $request){
        $validateRequest = $request->validate([
            'nama_project' => 'required|unique:projects|max:255',
        ],
        
        [
            'nama_project.required' => 'Please Input Category Name',
            'nama_project.max' => 'Please Less Than 255Chars',
        ]
    );
        Project::insert([
            'nama_project' => $request->nama_project,
            //Cara Memasukkan Data Sesuai User yang menginputkan
            'type' => $request->type,
            'deskripsi' => $request->deskripsi,
            'created_at' => Carbon::now() 
        ]);

        $users = $request->stakeholder;
        $Int = $request->id_project;
        $inte = (int)$Int;
        $idps = $inte+1;
        
        foreach($users as $user){
            
        StakTask::insert([
            'id_stakeholder' => $user,
            'id_project' => $idps
        ]);
    }
    $notification = array(
        'message' => 'Project Inserted Succesfully',
        'alert-type' => 'success'
    );       
        return Redirect()->back()->with($notification);        
    }

    public function SoftDelete($id){
        $delete = Project::find($id)->delete();
        $notification = array(
            'message' => 'Project Delete Succesfully',
            'alert-type' => 'success'
        );       
            return Redirect()->back()->with($notification); 
    }
    public function TrachProject(){
        $trachProject = Project::onlyTrashed()->latest()->paginate(8);
        return view('layouts.trash.index', compact('trachProject'));
    }

    public function Logout(){
        Auth::logout();
        $notification = array(
            'message' => 'Project Delete Succesfully',
            'alert-type' => 'success'
        );       
        return Redirect()->route('login')->with($notification);
    }

    public function Restore($id){
        $delete = Project::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Project Restore Succesfully',
            'alert-type' => 'success'
        );       
        return Redirect()->back()->with($notification);
    }

    public function DeleteP($id){
        $delete = Project::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Project Delete Succesfully',
            'alert-type' => 'success'
        );       
        return Redirect()->back($notification);
    }

    

}