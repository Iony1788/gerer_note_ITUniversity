<?php

namespace App\Http\Controllers;

use App\Models\ImportNote;
use Illuminate\Http\Request;

class ImportNoteController extends Controller
{

    public function importNote(){

        return view("admin.importNoteEtudiant");
    }

    public function importNoteEtudiantPost(Request $request){

        $request->validate([
            'fileNote'=>['required'],     
        ]);

        $note =$request->file('fileNote');

        try {
            $filename1 = "CSV1_".time().".".$note->getClientOriginalExtension();

    
            $path1 = 'data/'. $filename1;
           
            $note->move(storage_path('data/'), $filename1);

            $import = new ImportNote();

            $errors = $import->importDonneNote($path1);
            
             
            if (count($errors) > 0) {
                return back()->with([
                    'errtm' => $errors
                ]);
            }
    
            // Si l'importation est réussie
            return back()->with([
                'message' => 'Import terminé'
            ]);
    
        } catch (\Exception $e) {
            // En cas d'exception
            $errors[] = $e->getMessage();
            return back()->with('cath', $errors);
        }
     }

}
