<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/index',function(){
//    return "<h1>Hello Sansanee</h>";
//});

Route::get('/name/{name}',function($name){
  return "UserName:".$name;
});

Route::get('/fullname/{name}/{sname}',function($x,$y){
    return "UserName:".$x.$y;
});

Route::get('/index',function(){
   return view('index');
});

Route::get('/testweb',function(){
    return view('testweb');
 });

 Route::get('/create',function(){
     $header = "create form";
     $genders[] = ['id'=>0,'name'=>'หญิง'];
     $genders[] = ['id'=>1,'name'=>'ชาย'];
     return view('create-form')->with(['header'=> $header,'genders'=>$genders]);
 });

 Route::get('/form-worklog',function(){
    $header = "My Work Log";
    $types[] = ['id'=>1,'name'=>'Programming'];
    $types[] = ['id'=>2,'name'=>'Change Request'];
    $types[] = ['id'=>3,'name'=>'Bug'];
    $types[] = ['id'=>4,'name'=>'Meeting'];
    $types[] = ['id'=>5,'name'=>'Learning'];
    $types[] = ['id'=>6,'name'=>'Other'];
    return view('form-worklog')->with(['header'=> $header,'types'=>$types]);
});

 Route::get('/store',function(){
    $username = Illuminate\support\Facades\Input::get('username');
    $password = Illuminate\support\Facades\Input::get('password');
    return "test login=".$username.' '.$password;
 });

//  Route::post('/store',function(){
//     return "test login POST";
//  });

 Route::post('/store',function(Illuminate\Http\Request $request){
    //return $request->all();  
    return $request->username;
 });

 Route::post('/savelog',function(Illuminate\Http\Request $request){   
 
   $validate = $request->validate([
      'type' => 'required',
      'name' => 'required|max:100',
      'completed' => 'required'
   ]);
   // insert แบบที่ 1
    $task=\App\Task::create($request->all());
   
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
       return redirect()->back()->with('success','Create Successfully');
   //$task = new \App\Task();
   //return view('savelog')->with(['tasks'=>$task::all()]);
 });

 Route::post('/updatestatuslog',function($id){
   echo "......Updating....";
   //return $request->all();  
 });

 Route::get('/deletelog/{id}',function($id){
  
   //echo "......Deleting....";
 
  $task = new \App\Task();
  $task = App\Task::find($id);
  $task->delete();

  $task = new \App\Task();
   return view('savelog')->with(['tasks'=>$task::all()]);
  
  //return "ID:".$id;
   
 });

 Route::get('/edit/{id}',function($id){
  $header = "My Work Log Edit";
  $types[] = ['id'=>1,'name'=>'Programming'];
  $types[] = ['id'=>2,'name'=>'Change Request'];
  $types[] = ['id'=>3,'name'=>'Bug'];
  $types[] = ['id'=>4,'name'=>'Meeting'];
  $types[] = ['id'=>5,'name'=>'Learning'];
  $types[] = ['id'=>6,'name'=>'Other'];
 
  //return \App\Task::find($id);
    $task =  \App\Task::find($id);
    return  view('edit')->with(['task'=> $task,'header'=> $header,'types'=>$types] );
 });

 Route::patch('/edit/{id}',function(Illuminate\Http\Request $request , $id){
  $validate = $request->validate([
    'type' => 'required',
    'name' => 'required|max:100',
    'completed' => 'required'
 ]);
   $task = \App\Task::find($id);
   $task->update($request->all());
  //return $request ->all();
  return redirect()->back()->with('success','Update Successfully');
 });
