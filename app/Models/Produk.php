<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function Kategori (){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }



}
