<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function AddTask(Request $request){
        $id_modul = 1;
        Task::insert([
            //Cara Memasukkan Data Sesuai User yang menginputkan
            'nama_task' => $request->nama_task,
            'type' => $request->type,
            'for' => $request->For,
            'priority' => $request->Priority,
            'task' => $request->task,
            'id_modul' => $request->id_modul,
            'id_stakeholder' => $request->stakeholder,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'created_at' => Carbon::now() 
        ]);

        $notification = array(
            'message' => 'Modul Inserted Succesfully',
            'alert-type' => 'success'
        );
            return Redirect()->back()->with($notification);      
    }

    public function Schedule()
    {
        $events = array();
        $tasks = Task::all();
        foreach($tasks as $task) {
            $color = '#248eec';
            $events[] = [
                'title' => $task->nama_task,
                'start' => $task->start_date,
                'end' => $task->end_date,
                'color' => $color
            ];
        }
        return view('layouts.task.schedule', ['events' => $events]);
    }

    public function AllTask($id){
        $tasks = DB::select("SELECT * FROM tasks as task
        WHERE task.id_modul = $id");
        $moduls = DB::table('moduls')->where('id', $id)->first();
        $low = DB::select("SELECT priority FROM tasks WHERE priority ='Lows' AND id_modul = '$id' ");
        $middle = DB::select("SELECT priority FROM tasks WHERE priority ='Middle' AND id_modul = '$id' ");
        $high = DB::select("SELECT priority FROM tasks WHERE priority ='High' AND id_modul = '$id' ");
        $veryhigh = DB::select("SELECT priority FROM tasks WHERE priority ='Very High' AND id_modul = '$id' ");
        $users = User::latest()->paginate(20);
        
        return view('layouts.task.index', compact('tasks','users','moduls', 'low', 'middle', 'high', 'veryhigh'));
    }

    public function DetailM($id){
        $middle = DB::select("SELECT * FROM tasks WHERE priority ='Middle' AND id_modul ='$id' ");
        return view('layouts.task.middles', compact('middle')); 
    }

    public function DetailVh($id){
        
        $Vhigh = DB::select("SELECT * FROM tasks WHERE priority ='Very High' AND id_modul ='$id' ");
        return view('layouts.task.veryhigh', compact('Vhigh')); 
    }
    public function DetailH($id){
        $High = DB::select("SELECT * FROM tasks WHERE priority ='High' AND id_modul ='$id' ");
        return view('layouts.task.high', compact('High')); 
    }

    public function DetailL($id){
        $Low = DB::select("SELECT * FROM tasks WHERE priority ='Lows' AND id_modul ='$id' ");
        return view('layouts.task.low', compact('Low')); 
    }
     
    public function DeleteTask($id){
        Task::find($id)->delete();
        return Redirect()->back()->with('success', 'Project Permanently Deleted');
    
    }

    public function EditTask(Request $request, $id_modul, $id){
            $tasks = DB::table('tasks')->where('id', $id)->first();
            $id_stakeholder = DB::select("SELECT id_stakeholder FROM tasks WHERE id ='$id' ");
            $id_tasks = $id_modul;
            
            
            return view('layouts.task.status', compact('tasks', 'id_stakeholder', 'id_tasks'));
    }

    public function UpdateStatus(Request $request, $id){
        Task::find($id)->update([
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Status Changed Succesfully',
            'alert-type' => 'success'
        );
        $id_modul = $request->id_tasks;  
        
        return Redirect()->route('view.task', [$id_modul])->with($notification);  
  
        
        // return Redirect()->url('/project/modul/task/'.$id_modul)->with($notification);
    }
    
    
}