<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImportNote extends Model
{
    use HasFactory;

    public function importDonneNote($note): array
    {
    
        $note = Excel::toArray(new \App\Imports\Import(),storage_path($note))[0];
        // dd($note);
        $message = [];
        $i = 0;


        foreach ($note as $data) {
            try {
                $validation = Validator::make([
                    'numetu' => $data['numetu'],
                    'nom' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'genre' => $data['genre'],
                    'datenaissance' => $data['datenaissance'],
                    'promotion' => $data['promotion'],
                    'codematiere' => $data['codematiere'],
                    'semestre' => $data['semestre'],
                    'note' => $data['note'],
                ], [
                    'numetu' => ['required'],
                    'nom' => ['required'],
                    'prenom' => ['required'],
                    'genre' => ['required'],
                    'datenaissance' => ['required'],
                    'promotion' => ['required'],
                    'codematiere' => ['required'],
                    'semestre' => ['required'],
                    'note' => 'required',
                ]);


                $validation->validated();

                $note = str_replace(',', '.',$data['note']);
    
                DB::table('import_note')->insert([
                    'numetu' => $data['numetu'],
                    'nom' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'genre' => $data['genre'],
                    'datenaissance' => $data['datenaissance'],
                    'promotion' => $data['promotion'],
                    'codematiere' => $data['codematiere'],
                    'semestre' => $data['semestre'],
                    'note' => $note,
                ]);
            

            } catch (\Exception $e) {
                $message[] = $e->getMessage() . ' || ligne : ' . $i;
            }
        }

        
        try {
            DB::insert('
                INSERT INTO promotion (nom_promotion)
                SELECT DISTINCT promotion
                FROM import_note
                WHERE NOT EXISTS (
                    SELECT 1 
                    FROM promotion 
                    WHERE promotion.nom_promotion = import_note.promotion
                )
            ');
        } catch (\Exception $e) {
            $message[] = $e->getMessage();
        }
        

        try {
            DB::insert('
                INSERT INTO semestre (nom)
                SELECT DISTINCT semestre
                FROM import_note
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM semestre
                    WHERE semestre.nom = import_note.semestre
                )
            ');
        } catch (\Exception $e) {
            $message[] = $e->getMessage();
        }
        

        
        try {
            DB::statement('
                INSERT INTO etudiant (num_etu, nom, prenom, genre, date_naissance, id_promotiom)
                SELECT 
                  DISTINCT ON (numetu)
                    numetu,
                    n.nom,
                    n.prenom,
                    n.genre,
                    n.datenaissance,
                    p.id
                FROM import_note n
                JOIN promotion p ON p.nom_promotion = n.promotion
            ');
        } catch (\Exception $e) {
            $message[] = $e->getMessage();
        }

        try {
            DB::statement('
                INSERT INTO note (id_etudiant,note,  id_matiere)
                SELECT e.id as e_id,note,m.id as m_id
                FROM import_note n
                JOIN etudiant e ON e.num_etu = n.numetu
                join matiere m on m.code_matiere = n.codematiere
            ');
        } catch (\Exception $e) {
            $message[] = $e->getMessage();
        }


        
    
    DB::commit();
    return $message;

}

}
