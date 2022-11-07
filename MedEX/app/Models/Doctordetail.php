<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctordetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'doctor_id';

    public function doctors(){
        return $this->belongTo(Doctor::class, 'doctor_id', 'id');
    }
}
