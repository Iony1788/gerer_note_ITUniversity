<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatiereOption extends Model
{
    use HasFactory;

    protected $table = 'matiereOption';

    protected $fillable = [
        'id_matiere',
        'id_semestre',
    ];

    public $timestamps = false;
}

