<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Semestre;
use Illuminate\Http\Request;
use App\Models\V_MatiereOption;
use Illuminate\Support\Facades\DB;

class ListeSemestreEtudiantController extends Controller
{
    public function listesemestreEtudiant()
    {

        $semestres = Semestre::all();

        return view('etudiant.listeSemestre', compact('semestres'));
    }

    public function releveDeNoteEtudiant($semestre){

        $idEtudiant = auth()->user()->id;

    
    
        $releveDeNotes = Note::getReleveDeNotes($idEtudiant, $semestre);
        
        return view('etudiant.releverNoteEtudiant', compact('releveDeNotes'));
    // controller liste semestre etudiant

    }
}
