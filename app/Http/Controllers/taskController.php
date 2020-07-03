<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\task;

class taskController extends Controller
{
    function add(Request $request){
        $title = $request->input('title');
        $status = $request->input('status');
        $date = $request->input('date');

        $task = new task();

        $task->title = $title;
        $task->status = $status;
        $task->date = $date;

        $task->save();
        return $task;
    }


    function get(){
        $records = task::all();
        return response()->json($records);
    }

    function delete(Request $request){
        $id = $request->input('id');
        $record = DB::delete("delete from tasks where id ='$id'");
        $response = array('id'=>$id);

        //$response = array('id' => 12 );
        return $response;

        //echo "Delete OK!";

        // $record = task::find($id);
        // $record->delete();
        // return $record;

    }

    function getone( Request $request ){
        $id = $request->input('id');
        $record = task::find($id);
        return response()->json($record);
    }
}
