<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    use HasFactory;

    protected $table = 'pilots'; // Lien avec la table existante
    protected $fillable = ['name'];
    public $timestamps = false; // Si tes tables n'ont pas de colonnes created_at et updated_at
}
