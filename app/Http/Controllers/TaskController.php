<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "My Work Log";
        $types[] = ['id'=>1,'name'=>'Programming'];
        $types[] = ['id'=>2,'name'=>'Change Request'];
        $types[] = ['id'=>3,'name'=>'Bug'];
        $types[] = ['id'=>4,'name'=>'Meeting'];
        $types[] = ['id'=>5,'name'=>'Learning'];
        $types[] = ['id'=>6,'name'=>'Other'];
      //  return view('form-worklog')->with(['header'=> $header,'types'=>$types]);
         $tasks = Task::all();
        return view('showlog')->with(['header'=> $header,'types'=>$types,'tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task=\App\Task::create($request->all());
        return redirect()->back()->with('success','Create Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //update status completed
        $task = Task::find($id);
        if(empty($task)){
      
           // return "Not Found Task=".$task;
            return redirect()->back()->with('error','Not Found');
        }
         $task->completed = 0;
         $task->update();
        return redirect()->back()->with('success','Update Status Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'type' => 'required',
            'name' => 'required|max:100',
            'completed' => 'required'
         ]);
         
           $task =  Task::find($id);
           if(empty($task)){
             // return "Not Found Task=".$id;
              return redirect()->back()->with('success','Not Found');
          }
           $task->update($request->all());
          //return $request ->all();
          return redirect()->back()->with('success','Update Detail Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
            $task = Task::find($id);
            $task->delete();

            $task = new \App\Task();
            
            return redirect()->back()->with('success','Delete Successfully');
          
    }
}
