<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Student extends Model
// {
//     //
//     use HasFactory;
//     protected $fillable = ['name', 'email', 'image','gender'];
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'image', 'gender' , 'track_id' ,'course_id'];


    function course(){
        return $this->belongsTo(Course::class,'course_id');
        }
        function track(){
            return $this->belongsTo(Track::class,'track_id');
            }
            
}
