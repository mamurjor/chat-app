<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_room extends Model
{
    use HasFactory;

    public function message(){
        return $this->hasMany('App/Models/chart_message');
    }
}
