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

      // Ajouter un accessoire pour retourner l'URL de l'image
    public function getPictureUrlAttribute()
    {
        return asset('storage/images/properties/' . basename($this->path));
    }
}
