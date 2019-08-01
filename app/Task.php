<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 
        'type_id',
        'name',
        'detail',
        'completed',
        'user_id',  
    ];

    public function getTypeName(){
        switch($this->type_id){
            case 1:
                return "Programing";
                break;
            case 2:
                return "support";
                break;
            case 3:
                return "learning";
                break;
            case 4:
                return "Meeting";
                break;
            case 5:
                return "Other";
                break;
            case 6:
                return "Other";
                break;
            default:
                return "Opps....";
                break;
        }
    }

 

    protected $types=[
        
        ['id'=>1,'name'=>'Programming'],
        ['id'=>2,'name'=>'Change Request'],
        ['id'=>3,'name'=>'Bug'],
        ['id'=>4,'name'=>'Meeting'],
        ['id'=>5,'name'=>'Learning'],
        ['id'=>6,'name'=>'Other']
    ];

    public function getType()
    {
        return $this->types[$this->type];
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeTaskAll($query,$sort)
    {
          $query->join('types','tasks.type_id','=','types.id')
                ->join('users','tasks.user_id','=','users.id')
                ->select(
                    'tasks.*',
                    'types.name as type_name',
                    'users.username as username'
                )
                ->orderBy('tasks.id',$sort);
    }
}
