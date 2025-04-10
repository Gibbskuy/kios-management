<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'tanggal', 'id_kategori', 'foto', 'status', 'id_user'
    ];

    protected $casts = [
        'read_by' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($artikel) {
            if ($artikel->judul && !$artikel->isDirty('slug')) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });
    }
}
