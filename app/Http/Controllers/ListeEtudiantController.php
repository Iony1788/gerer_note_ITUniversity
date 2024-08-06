<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Note;
use App\Models\Semestre;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\V_listeEtudiant;
use App\Models\V_MatiereOption;
use Illuminate\Support\Facades\DB;

class ListeEtudiantController extends Controller
{
     public function listeEtudiant(){

        $etudiants = V_listeEtudiant::all();

        $promotions = Promotion::all();

        return view("admin.listeEtudiant",compact("etudiants","promotions"));
     }

     public function filtrageEtudiant(Request $request)
     {
         $query = V_listeEtudiant::query();
     
         if ($request->has('nom') && !empty($request->nom)) {
             $nom = $request->input('nom');
             $query->where(function ($q) use ($nom) {
                 $q->where('nom', 'like', "%{$nom}%");
             });
         }
         if ($request->has('nom_promotion') && !empty($request->nom_promotion)) {
            $nom_promotion = $request->input('nom_promotion');
            $query->where('id_promotiom', $nom_promotion);
        }
     
         $etudiants = $query->get();
         
         $promotions = Promotion::all();

         return view('admin.listeEtudiant', compact('etudiants','promotions'));
     }

     public function listesemestre($id)
    {

        $semestres = Semestre::all();

        for ($i=0; $i <count($semestres); $i++) { 
            

            $semestres[$i]['moyenne']  = Note::getReleveDeNotes($id, $semestres[$i]->id)[0]->moyenne_etudiant;
            
        }


        return view('admin.listeSemestre', compact('semestres','id'));
    }


    public function releveDeNote($id, $semestre)
    {
        $releveDeNotes = Note::getReleveDeNotes($id, $semestre);
        
        return view('admin.releverNote', compact('releveDeNotes'));
    }

    public function getanne($id){

    }

    //liste etudiante  admis
    public function listeadmis(){

        $etudiants = Note::listeEtudiantAdmis();

        return view('admin.listeEtudiantAdmis', compact('etudiants'));
    }


    public function listeanne($id)
    {

       $anne  = [];

        for ($i=0; $i <3; $i++) { 
            $anne[$i]['anne'] =$i+1;
            $total_credit=Note::sum_credit_Anne($id, $i+1);
            $res= '';
            if($total_credit==60){
                $res = 'admis';
            }
            else $res= 'ajourne';

            $anne[$i]['resultat']=$res;
        }


        return view('admin.listeanne', compact('id','anne'));
    }

    public function releveDeNoteAnne($id, $anne)
    {
        $semestres = null;
        if($anne==1){
            $semestres = Semestre::where('id',1)->orwhere('id',2)->get(); 
        }
        if($anne==2){
            $semestres = Semestre::where('id',3)->orwhere('id',4)->get(); 
        }
        if($anne==3){
            $semestres = Semestre::where('id',5)->orwhere('id',6)->get(); 
        }
        $releveDeNotesAnne =[];
        $i=0;
        foreach($semestres as $semestre){
                $releveDeNotesAnne[$i] = Note::getReleveDeNotes($id, $semestre->id);
                $i++;
        }
    

    
        
        return view('admin.releverNoteAnne', compact('releveDeNotesAnne'));
    }



    public function listeSemestreEtudiant(){
        $semestres = Semestre::all(); 

        return view('admin.listeEtudiantAdminSemestre', compact('semestres'));
    }

    // public function listeEtudiantAdminSemestre($id,$idsemestre){

    //     $etudiants = Etudiant::liste_etudiant_admis_semestre($id,$idsemestre);
        

    //     return view('admin.listeEtudiantAdminSemestre', compact('etudiants'));

    // }


   
    
    

}
