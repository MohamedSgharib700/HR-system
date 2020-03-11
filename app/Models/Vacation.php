<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacation extends Model
{
   protected $table = 'vacations';
    protected $with = ['user'];


    use SoftDeletes;

    protected $fillable = [

        'user_id' , 'phone' , 'department_id' ,'position_id' , 'vacation_type' , 'duration' ,'start_date' ,
        'end_date' , 'return_date' , 'address_during_vacation' , 'notes' ,'manager_approve' , 'hr_approve' ,'hr_notes'
    ];


    public function user()
    {
        return $this->belongsTo('\App\Models\User','user_id');
    }

}
