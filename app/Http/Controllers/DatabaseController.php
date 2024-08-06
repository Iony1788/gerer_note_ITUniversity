<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{
    public function index(){
        return view("admin.resetBase");
    }

    public function resetBase() {
        $sql = "
            DO $$ 
            DECLARE
                table_record RECORD;
            BEGIN
                FOR table_record IN
                    SELECT table_name 
                    FROM information_schema.tables 
                    WHERE table_schema = 'public' 
                    AND table_type = 'BASE TABLE'
                    AND table_name NOT IN ('semestre','admin','matiere','matiereoption')  
                LOOP
                    EXECUTE format('TRUNCATE TABLE %I RESTART IDENTITY CASCADE', table_record.table_name);
                END LOOP;
            END $$;
        ";
        DB::statement($sql);
        
        return redirect()->route('index')->with('success', 'Suppression avec succès.');
    }
    
}
