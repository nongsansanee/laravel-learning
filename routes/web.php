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
