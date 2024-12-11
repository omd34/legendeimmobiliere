<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public function pictureUrl() { // Retourne le chemin complet de l'image 
        return asset('storage/images/properties/' . basename($this->path));
     }
}
