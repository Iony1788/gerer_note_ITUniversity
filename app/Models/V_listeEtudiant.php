<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_listeEtudiant extends Model
{
    use HasFactory;

    protected $table = 'v_liste_etudiant';

    public $timestamps = false;
}
