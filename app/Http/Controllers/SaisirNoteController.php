<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaisirNoteController extends Controller
{
    public function saisiNote(){
        
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();

        return view("admin.saisiNote", compact("matieres","etudiants"));
    }

    public function saisiNotePost(Request $request){

        $request = $request->validate([
           'num_etu' => 'required', 
           'id_matiere' => 'required|exists:matiere,id', 
           'note' => 'required|numeric|between:0,20',
         ]);
      
  
         $etudiant = Etudiant::where('num_etu', $request['num_etu'])->first();
     
        Note::create([
            'id_etudiant' =>$etudiant->id,
            'id_matiere' => $request['id_matiere'],
            'note' => $request['note'],
        ]);
        
        Session::flash('success', 'Saisi note avec succès.');

        return redirect()->route('saisiNote')->with('success',  'Saisi note avec succès.');


    }
}