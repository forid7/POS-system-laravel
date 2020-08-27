<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    
    protected $fillable = [
        'user_id', 'attendance', 'att_year','att_date','edit_date','month'
    ];
}
