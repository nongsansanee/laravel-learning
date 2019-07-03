<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Type;

class TypeController extends Controller
{
    public function store(Request $request)
    {

        //return $request->all();
         //การ validate และ show msg error  ที่เราต้องการ
        $validate = [
            'name' => 'required|max:100',
        ];

        $errorMsg = [       
            'name.required' => 'กรุณากรอกชื่อประเภทงาน',
        ];

        $request->validate($validate,$errorMsg);


        
           $type=\App\Type::create($request->all());
        
     
            return redirect()->back()->with('success','Create Type Successfully');

      
    }
}
