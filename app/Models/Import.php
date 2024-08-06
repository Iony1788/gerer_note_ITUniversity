<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class Import extends Model
{
    use HasFactory;

    public function importDonne($configeNote): array
    {
    
        $config=Excel::toArray(new \App\Imports\Import(),storage_path($configeNote))[0];
        $message = [];
        $i = 0;


        foreach ($config as $data) {
            try {

                $validation = Validator::make([
                    'code' => $data['code'],
                    'config' => $data['config'],
                    'valeur' => $data['valeur'],
                ], [
                    'code' => ['required'],
                    'config' => ['required'],
                    'valeur' => ['required'],
                ]);


                $validation->validated();

                $valeur = str_replace(',', '.',$data['valeur']);

                DB::table('import_config')->insert([
                    'code' => $data['code'],
                    'config' => $data['config'],
                    'valeur' => $valeur,
                ]);

            } catch (\Exception $e) {
                $message[] = $e->getMessage() . ' || ligne : ' . $i;
            }


        }
        
            // insert dans la table

            try {
                DB::insert('insert into config(code,config,valeur)
                                    select code,config,valeur
                                    from import_config 
                                   ');
            } catch (\Exception $e) {
                $message[] = $e->getMessage();
            }
      
    DB::commit();
    return $message;

}

}
