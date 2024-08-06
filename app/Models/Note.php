<?php

namespace App\Models;

use PhpParser\Node\Stmt\For_;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    
    protected $table = 'note';

    protected $fillable = [
        'note',
        'id_etudiant',
        'id_matiere',
    ];

    public $timestamps = false;

    public static function classificationNote($note, $moyenne)
    {

        if ($note >= 16) {
            return 'TB';
        } elseif ($note >= 14) {
            return 'B';
        } elseif ($note >= 12) {
            return 'AB';
        } elseif ($note >= 10) {
            return 'P';
        } else {
            return 'Aj';
        }
    }


    public static function getReleveDeNotes($id, $semestre)
    {
        $config = DB::table('config')->get();
        $releveDeNotes = V_MatiereOption::where('id_etudiant', $id)
                            ->where('id_semestre', $semestre)
                            ->select(
                                'id_etudiant',
                                'id_semestre',
                                'groupe',
                                'id_matiere',
                                'num_etu',
                                'code_matiere',
                                'nom_matiere',
                                'credit_obtenu',
                                'note',
                                'credit',
                                DB::raw('SUM(credit_obtenu) OVER (PARTITION BY id_etudiant, id_semestre) as somme_credit'),
                                DB::raw('SUM(note * credit) OVER (PARTITION BY id_etudiant, id_semestre) / SUM(credit) OVER (PARTITION BY id_etudiant, id_semestre) as moyenne_etudiant'),
                            )
                            ->orderBy('id_etudiant')
                            ->orderBy('id_semestre')
                            ->orderBy('groupe')
                            ->orderBy('id_matiere')
                            ->get();
        //  componse note 
         $nb_matiere_non_moyenne = 0;
         $nb_matiere_echec  =0 ; // nombre de matiere ambany limite note ajourne
      
        $moyenne = $releveDeNotes[0]->moyenne_etudiant;
     
        foreach ($releveDeNotes as $releveDeNote) {
            $releveDeNote->classification = Note::classificationNote($releveDeNote->note, $releveDeNote->moyenne_etudiant);
            if($releveDeNote->note<10){
                $nb_matiere_non_moyenne++;
            }
            //limite note componse
            if($releveDeNote->note<$config[0]->valeur){
                $nb_matiere_echec++;
            }
        }
        // compose note raha moyenne izy ka 
        $total_credit=0;
        foreach ($releveDeNotes as $releveDeNote) {
           //Nb de matière max compensé 
            if($moyenne>=10 && $nb_matiere_non_moyenne<=$config[1]->valeur && $nb_matiere_echec==0){
                if($releveDeNote->classification=='Aj'){
                    $releveDeNote->classification = 'Comp';
                    $releveDeNote->credit_obtenu = $releveDeNote->credit;
                }
               
            }
            $total_credit=$total_credit+$releveDeNote->credit_obtenu;
        }
        $releveDeNotes[0]->somme_credit=$total_credit;
        return $releveDeNotes;
   
    }

    public static function sum_credit_semestre($etudiant)
    {
        $semestres = Semestre::all();
    
        $total_credit = 0;
    
        foreach ($semestres as $semestre) {
            $releveDeNotes = Note::getReleveDeNotes($etudiant, $semestre->id);
            
            foreach ($releveDeNotes as $releveDeNote) {
                $total_credit += $releveDeNote->credit_obtenu;
            }
        }
    
        return $total_credit;
    }

    // sum credit par annee
    public static function sum_credit_Anne($etudiant,$anne)
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
       
    
        $total_credit = 0;
    
        foreach ($semestres as $semestre) {
            $releveDeNotes = Note::getReleveDeNotes($etudiant, $semestre->id);
            
            foreach ($releveDeNotes as $releveDeNote) {
                $total_credit += $releveDeNote->credit_obtenu;
            }
        }
    
        return $total_credit;
    }
    

    public static function get_all_admis(){
        $etudiant =Etudiant::all();
        $nb_admis = 0;
        $nb_non_admin = 0;

        for ($i = 0; $i < count($etudiant);$i++) {
            $total_credit =Note::sum_credit_semestre( $etudiant[$i]->id);
            if($total_credit ==180){
                $nb_admis ++;
            }else {
            $nb_non_admin ++;
            }
        }
        $resultat =[];
        $resultat['nb_admis'] = $nb_admis;
        $resultat['nb_non_admis'] = $nb_non_admin;
        return $resultat ;
    }


    // liste etudiant admis >180 si admis
    public static function listeEtudiantAdmis(){
        $etudiant =Etudiant::all();
        $resultat =[];
        for ($i=0; $i <count($etudiant) ; $i++) { 
            $total_credit =Note::sum_credit_semestre( $etudiant[$i]->id);
            if($total_credit == 180){
                $resultat[$i] = $etudiant[$i];
            }
        }
      
        return $resultat; 
    }
    public static function listeEtudiantNonAdmis(){
        $etudiant =Etudiant::all();
        $resultat =[];
        for ($i=0; $i <count($etudiant) ; $i++) { 
            $total_credit =Note::sum_credit_semestre( $etudiant[$i]->id);
            if($total_credit != 180){
                $resultat[$i] = $etudiant[$i];
            }
        }
      
        return $resultat; 
    }

    public static function sum_credit_par_semestre($etudiant,$semestre){
       $semestre = Semestre::where('id',$semestre);

     
        $total_credit = 0;
    
            $releveDeNotes = Note::getReleveDeNotes($etudiant, $semestre->id);
            
            foreach ($releveDeNotes as $releveDeNote) {
                $total_credit += $releveDeNote->credit_obtenu;
            }
            return $total_credit;
      
    }


    public function liste_etudiant_admis_semestre($idsemestre){
        $etudiants = Etudiant::all();

        $resultat = [];
        

        for ($i=0; $i <count($etudiants) ; $i++) { 
            $somme_credit_semestre = Note::sum_credit_par_semestre($etudiants[$i]['id'],$idsemestre);
            if($somme_credit_semestre == 30){
                $resultat[$i] = $etudiants[$i];
            }
        }
        return $resultat;

    }

    public static function somme_moyenne_generale(){
        
    }
}

