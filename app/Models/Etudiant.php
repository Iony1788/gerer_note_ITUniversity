<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Etudiant extends Authenticatable
{
    use HasFactory;

    protected $table = 'etudiant';

    protected $fillable = [
        'num_etu',
        'nom',
        'prenom',
        'date_naissance',
        'genre',
        'id_promotion',
        'id_semestre'
    ];


}
