<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'ects', 'semester'
    ];
    
    public function materials()
    {
        return $this->hasMany('App\Material');
    }
 
}
