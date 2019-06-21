<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 
        'type',
        'name',
        'detail',
        'completed'   
    ];

    public function getTypeName(){
        switch($this->type){
            case 1:
                return "Programing";
                break;
            case 2:
                return "Change Request";
                break;
            case 3:
                return "Bug";
                break;
            case 4:
                return "Meeting";
                break;
            case 5:
                return "Learning";
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
}
