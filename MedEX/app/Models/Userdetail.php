<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';

    public function userss(){
        return $this->belongTo(User::class, 'user_id', 'id');
    }
}
