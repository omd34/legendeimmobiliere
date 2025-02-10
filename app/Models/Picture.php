<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'property_id' // Assurez-vous que le champ property_id est également rempli
    ];

    // Relation avec le modèle Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Méthode pour retourner l'URL de l'image
    public function pictureUrl()
    {
        return asset('storage/images/properties/' . basename($this->path));
    }
}
