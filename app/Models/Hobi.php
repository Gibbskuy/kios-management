<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;

    public function Profile (){
        return $this-hasMany(Profile::class, 'id_hobi');
    }
}
