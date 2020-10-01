<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name', 'file', 'subject_id', 'teacher_id'
    ];


    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
