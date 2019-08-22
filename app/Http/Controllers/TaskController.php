<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use \App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth')->except('test','xxxxx');  
        $this->middleware('auth');
    }

    public function index()
    {

        $header = "My Work Log";
        // $types[] = ['id'=>1,'name'=>'Programming'];
        // $types[] = ['id'=>2,'name'=>'Change Request'];
        // $types[] = ['id'=>3,'name'=>'Bug'];
        // $types[] = ['id'=>4,'name'=>'Meeting'];
        // $types[] = ['id'=>5,'name'=>'Learning'];
        // $types[] = ['id'=>6,'name'=>'Other'];
      //  return view('form-worklog')->with(['header'=> $header,'types'=>$types]);

       // $role = \Auth::user()->roles()->where('role_id',1)
                                      //  ->first();
        

        //   $role = \Auth::user()->roles()->where(function($query){
        //     $query->where('role_id',1)->orWhere('role_id',2);
        //   })->first();
            
        //เปลี่ยนไปใช้ query Scope ใน model role
        $role = \Auth::user()->roles()->adminOrStaff()->first();   

       //return $role;
        if(!empty($role)){
            // $tasks = Task::all();
            // $tasks = DB::table('tasks')->get();

            // $tasks = DB::table('tasks')
            //                     ->join('types','tasks.type_id','=','types.id')
            //                     ->join('users','tasks.user_id','=','users.id')
            //                     ->select(
            //                         'tasks.*',
            //                         'types.name as type_name',
            //                         'users.username as username'
            //                     )
            //                     ->get();
            //เปลี่ยนไปใช้ query Scope ใน model task
            $sort = 'ASC';
            $tasks = Task::taskAll($sort)->paginate(10);
          // return $tasks;
        }else{
           // $tasks = Task::where('user_id',\Auth::id())->get();
                    // $tasks = DB::table('tasks')
                    // ->join('types','tasks.type_id','=','types.id')
                    // ->join('users','tasks.user_id','=','users.id')
                    // ->select(
                    //     'tasks.*',
                    //     'types.name as type_name',
                    //     'users.username as username'
                    // )
                    // ->where('user_id',\Auth::id())
                    // ->get();

                    //เปลี่ยนไปใช้ query Scope ใน model
                    $sort="ASC";
                    $tasks = Task::where('user_id',\Auth::id())
                                ->taskAll($sort)
                                ->paginate(10);
            

        }

         $types = \App\Type::all();
        //  $tasks = Task::all();
        // return $tasks;
        return view('showlog')->with(['header'=> $header,'types'=>$types,'tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      // return $request->all();
       $task=\App\Task::create($request->all()+ ['user_id' => 1]);
        
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

       // return $request->all();
         //การ validate และ show msg error  ที่เราต้องการ
        $validate = [
            'type_id' => 'required',
            'name' => 'required|max:100',
            'completed' => 'required',
            'file_upload' => 'required|mimes:pdf,jpg,jpeg|max:1024'
        ];

        $errorMsg = [
            'type_id.required' => 'กรุณาเลือกประเภทงาน',
            'name.required' => 'กรุณากรอกชื่องาน',
            'completed.required' => 'กรุณาเลือกสถานะงาน'
        ];

        $request->validate($validate,$errorMsg);

        $task=\App\Task::create($request->all()+ ['user_id' => \Auth::id()]);
        if($request->hasFile('file_upload'))
        {
            //$path = $request->file('file_upload')->store('public/tasks');
           // $path = $request->file('file_upload')->storeAs('public/tasks',$request->file('file_upload')->getClientOriginalName());
            $path = $request->file('file_upload')->storeAs('/tasks',$request->file('file_upload')->getClientOriginalName());
          
           // return $path;
            //return Storage::url($path);
            $file = pathInfo($path);
            $task->file = $file['basename'];
            $task->update();
           // return $file;
           return Storage::download($path);
        }else{
            return 'no file';
        }
        // insert แบบที่ 1
           
        
        /**** insert แบบที่ 2 
         $task = new \App\Task();
        $task->type= $request->type;
        $task->name= $request->name;
        $task->detail= $request->detail;
        $task->completed=$request->completed;
        $task->save();
        ***/

        // echo "Save Success";
        // return $request->all();  

            // return redirect()->back();
        /******การ retrun แบบส่งข้อความกลับไป */
            return redirect()->back()->with('success','Create Successfully');

        //$task = new \App\Task();
        //return view('savelog')->with(['tasks'=>$task::all()]);
      
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
       

        $header = "My Work Log Edit111111";
        // $types[] = ['id'=>1,'name'=>'Programming'];
        // $types[] = ['id'=>2,'name'=>'Change Request'];
        // $types[] = ['id'=>3,'name'=>'Bug'];
        // $types[] = ['id'=>4,'name'=>'Meeting'];
        // $types[] = ['id'=>5,'name'=>'Learning'];
        // $types[] = ['id'=>6,'name'=>'Other'];
       
        //return \App\Task::find($id);
          //$task =  \App\Task::find($id);

          //OR

          $task = DB::table('tasks')->where('id',$id)->first();

          if(empty($task)){
            //return "Not Found";
             return "Not Found Task=".$id;
         }
         //  return  view('edit')->with(['task'=> $task,'header'=> $header,'types'=>$types] );

         $types = \App\Type::all();

         $role = \Auth::user()->roles()->where(function($query){
            $query->where('role_id',1)->orWhere('role_id',2);
          })->first();
        if(!empty($role)){
            //$tasks = Task::all();
            $tasks = DB::table('tasks')
                            ->join('types','tasks.type_id','=','types.id')
                            ->join('users','tasks.user_id','=','users.id')
                            ->select(
                                'tasks.*',
                                'types.name as type_name',
                                'users.username as username'
                            )
                            ->get();
            
          //  return $tasks;
            //taskAll  
        }else{
            $tasks = Task::where('user_id',\Auth::id())->get();

        }
       
      
         //$tasks = \App\Task::all();
         return  view('showlog')
                  ->with([
                     'task'=> $task,
                     'header'=> $header,
                     'types'=>$types,
                     'tasks'=>$tasks,
                     'task'=> $task,
                    
                  ] );
    }
    public function updateStatus(Request $request,$id)
    {
        //return "update status";
        $task = \App\Task::find($id);
           if(empty($task)){
              return "Not Found";
              // return "Not Found Task=".$task;
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
            'type_id' => 'required',
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
