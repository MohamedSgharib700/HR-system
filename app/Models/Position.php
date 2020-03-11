<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{

    use SoftDeletes;
    protected $table = 'positions';

    protected $fillable = ['name', 'active'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
