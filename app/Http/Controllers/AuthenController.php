<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Etudiant;
use App\Models\Note;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    
    public function homeClient(){
        return view('dashboardClient');
    }
    public function loginClient(){
        return view('etudiant.loginUtilisateur');
    }

    public function loginClientPost(Request $request)
    {
        $request->validate([
            'id_etudiant' => 'required',
        ]);

        $etudiant = Etudiant::where('num_etu', $request->input('id_etudiant'))->first();

        if ($etudiant) {
            Auth::login($etudiant);
            return redirect()->route('homeClient');
        } else {
            return redirect()->route('loginClient')->with('error', 'Vérifiez votre numéro ETU');
        }
    }


    public function homeAdmin(){
        $admis = Note::get_all_admis();
        $nb_etudiant = count(Etudiant::all());

        
    
        return view('dashboardAdmin',compact('admis','nb_etudiant'));
    }
    public  function loginAdmin(){
        return view('admin.loginAdmin');
    }
    public function loginAdminPost(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:4',
        ]);
    
        $admin = Admin::where('email', $validatedData['email'])->first();
        if ($admin) {

            Auth::login($admin);
    
            return redirect()->route('homeAdmin');
        } else {
            return redirect()->route('loginAdmin')->with('error', 'Cet email ou mot de passe est incorrect.');
        }
    }
    


}
