<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monografia extends Model
{
    use HasFactory;

    public $fillable = [
        'titulo',
        'anyo',
    ];

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class);
    }
}
