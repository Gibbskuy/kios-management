<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel;

class Kategori extends Model {
    use HasFactory;

    // protected $fillable = [ 'nama_kategori', 'slug' ];

    public function artikels() {
        return $this->hasMany( Artikel::class, 'id_kategori' );
    }

}
