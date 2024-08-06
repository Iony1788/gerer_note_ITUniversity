<?php

namespace App\Http\Controllers;

use App\Models\Import;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importConfig(){

        return view("admin.importConfig");
    }

    public function importConfigPost(Request $request){

        $request->validate([
            'fileConfig'=>['required'],     
        ]);
        $configeNote =$request->file('fileConfig');

        try {
            $filename1 = "CSV1_".time().".".$configeNote->getClientOriginalExtension();

    
            $path1 = 'data/'. $filename1;
           
            $configeNote->move(storage_path('data/'), $filename1);

            $import = new Import();

            $errors = $import->importDonne($path1);
            
             
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
