<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transactions';
    protected $fillable = ['machine_code','trans_date','type'];

    public function user()
    {
        return $this->belongsTo(User::class,'machine_code');
    }
}
