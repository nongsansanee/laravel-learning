<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        //การประกาศตัวแปร array พร้อมใส่ค่า 2 แบบ
        //แบบที่ 1
        // $role[]=['name'=>'Admin'];
        // $role[]=['name'=>'Staff'];
        // $role[]=['name'=>'User'];

        //แบบที่ 2
        $roles= array(['name'=>'Admin'],['name'=>'Staff'],['name'=>'User'],['name'=>'Super User']);
        foreach($roles as $role){
            \App\Role::create($role);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
