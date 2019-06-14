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
}
