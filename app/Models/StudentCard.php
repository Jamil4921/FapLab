<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model
{
    public $timestamps = false;
    public $table = 'student_cards';
    //protected $fillable = ['id','student_name','student_email','user_id','amount'];
    protected $guarded = []; 
}
