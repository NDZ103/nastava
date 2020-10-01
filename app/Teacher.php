<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];
    
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function materials()
    {
        return $this->belongsToMany('App\Material');
    }
}
