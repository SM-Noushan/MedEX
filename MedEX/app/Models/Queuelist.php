<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\{Userdetail, Doctordetail, Counter};

class Queuelist extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(Userdetail::class, 'user_id', 'user_id');
    }
    public function doctors(){
        return $this->belongsTo(Doctordetail::class, 'doctor_id', 'doctor_id');
    }
    public function counters(){
        return $this->belongsTo(Counter::class, 'counter_id', 'id');
    }
}
