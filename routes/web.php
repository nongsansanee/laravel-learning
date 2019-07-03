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

 Route::post('/savelog','TaskController@store');

//  Route::get('/savelog',function(){   
 
 
//    // insert แบบที่ 1
//        $task=\App\Task::create($request->all());
   
//     /**** insert แบบที่ 2 
//    $task = new \App\Task();
//    $task->type= $request->type;
//    $task->name= $request->name;
//    $task->detail= $request->detail;
//    $task->completed=$request->completed;
//    $task->save();
//    ***/

//    // echo "Save Success";
//    // return $request->all();  
 
//       // return redirect()->back();
//    /******การ retrun แบบส่งข้อความกลับไป */
//        return redirect()->back()->with('success','Create Successfully');

//    //$task = new \App\Task();
//    //return view('showlog')->with(['tasks'=>$task::all()]);
//  });

//  Route::get('/showlog',function(){   
//    // $header = "My Work Log";
//    // $types[] = ['id'=>1,'name'=>'Programming'];
//    // $types[] = ['id'=>2,'name'=>'Change Request'];
//    // $types[] = ['id'=>3,'name'=>'Bug'];
//    // $types[] = ['id'=>4,'name'=>'Meeting'];
//    // $types[] = ['id'=>5,'name'=>'Learning'];
//    // $types[] = ['id'=>6,'name'=>'Other'];
 
//    //  $tasks = \App\Task::all();
//    // return view('showlog')->with(['header'=> $header,'types'=>$types,'tasks'=>$tasks]);
//    //
//  });

Route::get('/savelog','TaskController@create');

//140662  เปลี่ยนให้ route ไปเรียก controller
 Route::get('/showlog','TaskController@index')->middleware('auth');

//  Route::patch('/updatestatuslog/{id}',function(Illuminate\Http\Request $request ,$id){
  
//     $task = \App\Task::find($id);
//    if(empty($task)){
//       return "Not Found";
//       // return "Not Found Task=".$task;
//    }
//     $task->completed = 0;
//     $task->update();
//    return redirect()->back()->with('success','Update Status Successfully');
 
//  });

  Route::patch('/updatestatuslog/{id}','TaskController@updateStatus');


 
//  Route::get('/deletelog/{id}',function($id){
  
  
//   $task = App\Task::find($id);
//   $task->delete();

//   $task = new \App\Task();
 
//    return redirect()->back()->with('success','Delete Successfully');

   
//  });

Route::get('/deletelog/{id}','TaskController@destroy');

 Route::get('/edit/{id}','TaskController@edit');
 Route::put('/edit/{id}','TaskController@update')->middleware('auth');

//  Route::patch('/edit/{id}',function(Illuminate\Http\Request $request , $id){
//   $validate = $request->validate([
//     'type' => 'required',
//     'name' => 'required|max:100',
//     'completed' => 'required'
//  ]);
 
//    $task =  \App\Task::find($id);
//    if(empty($task)){
//       return "Not Found Task=".$id;
//   }
//    $task->update($request->all());
//   //return $request ->all();
//   return redirect()->back()->with('success','Update Detail Successfully');
//  });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/edit/{id}','TasksController@edit');
// Route::patch('/edit/{id}','TaskController@update');

Route::post('/savetype','TypeController@store');

//Route::post('/savetype',function(Illuminate\Http\Request $request){
//   return $request ->all();
//});

Route::get('/formtype',function(){   

   $header = "Create Job Type";
  
    
      return view('formtype')->with(['header'=> $header]);
      
});