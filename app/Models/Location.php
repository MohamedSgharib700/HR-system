<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;


class Location extends Model
{

    use NodeTrait;
    use SoftDeletes;
    protected $table = 'locations';
    protected $fillable = ['name','parent_id', 'active'];

    public function branch()
    {
        return $this->belongsToMany(User::class);
    }
}
