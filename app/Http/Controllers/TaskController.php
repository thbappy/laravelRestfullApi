<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskController extends Controller
{
    public function task(){
        return response()->json(Task::get(),200);
    }

    public function taskId($id){
        $task = Task::find($id);
        if(is_null($task)){
            return response()->json("Sorry Data Not Found !!",404);
        }
        return response()->json($task,200);
    }

    public function taskSave(Request $request)
    {
        $rules = [
          'name' => 'required|min:4',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $task = Task::create($request->all());
        return response()->json($task,201);
    }

    public function taskUpdate(Request $request, $id)
    {
        $task = Task::find($id);
        if(is_null($task)){
            return response()->json(['message' => 'Record Not Found'],404);
        }
        $task->update($request->all());
        return response()->json($task,200);
    }
    public function taskDelete(Request $request, $id)
    {
        $task= Task::find($id);
        if(is_null($task)){
            return response()->json(['message' => 'Record Not Found for Delete'],404);
        }
        $task->delete();
        return response()->json(null,204);
    }

}
