<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =['name'];

    public function users(){
        return $this->belongsToMany(User::class,'role_users')
            // ->withPivot('')
            ->withTimestamps();
    }

    public function scopeAdminOrStaff($query){
        $query->where(function($sub_query){
             $sub_query->where('role_id',1)
                       ->orWhere('role_id',2);
        });
    }
}
