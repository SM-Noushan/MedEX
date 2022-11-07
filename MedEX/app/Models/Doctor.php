<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Doctordetail;

class Doctor extends Model
{
    use HasFactory;

    public function doctordetail(){
        return $this->hasOne(Doctordetail::class, 'doctor_id', 'id');
    }
}
