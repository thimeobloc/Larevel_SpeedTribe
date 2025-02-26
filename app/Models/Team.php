<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams'; // Assure le bon lien avec la table
    protected $fillable = ['name']; // Ajoute les colonnes modifiables
    public $timestamps = false; // Si pas de created_at et updated_at
}
