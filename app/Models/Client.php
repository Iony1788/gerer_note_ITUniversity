<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Client  extends Authenticatable
{
    use HasFactory;

    protected $table = 'client';

    protected $fillable = [
        'contact',
    ];

    public $timestamps = false;

}

// use Illuminate\Support\Facades\DB;

// public function index()
// {
//     // Exécuter la requête SQL personnalisée pour récupérer les données de la vue
//     $vehicules = DB::select('SELECT * FROM v_infos_vehicule');

//     // Parcourir les résultats pour ajouter la propriété de couleur
//     foreach ($vehicules as $vehicule) {
//         $jours_restants = $vehicule->jours_restant_jusqua_l_echeance;

//         if ($jours_restants < 15) {
//             $vehicule->couleur = 'rouge';
//         } elseif ($jours_restants < 30) {
//             $vehicule->couleur = 'jaune';
//         } else {
//             $vehicule->couleur = 'normal'; // Optionnel, si nécessaire
//         }
//     }

//     // Passer les données à la vue
//     return view('vehicules.index', ['vehicules' => $vehicules]);
// }
// @foreach ($vehicules as $vehicule)
//     <div class="vehicule {{ $vehicule->couleur }}">
//         <p>{{ $vehicule->numero }} - {{ $vehicule->marque }} - {{ $vehicule->model }}</p>
//         <p>{{ $vehicule->type_vehicule }}</p>
//         <p>{{ $vehicule->type_echeance }} - {{ $vehicule->date_echance }}</p>
//         <p>Jours restants : {{ $vehicule->jours_restant_jusqua_l_echeance }}</p>
//     </div>
// @endforeach






// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class TrajetController extends Controller
// {
//     public function index()
//     {
//         // Récupérer les trajets avec la vitesse moyenne calculée
//         $trajets = DB::table('vue_trajet')->get();

//         // Vérifier si la vitesse moyenne est supérieure à 72 km/h
//         foreach ($trajets as $trajet) {
//             if ($trajet->vitesse_moyenne_kmh > 72) {
//                 return redirect('trajet')
//                     ->with('error', 'La vitesse moyenne pour le trajet ID ' . $trajet->id . ' est supérieure à 72 km/h.');
//             }
//         }

//         // Afficher la vue avec les trajets
//         return view('trajets.index', ['trajets' => $trajets]);
//     }
// }






// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Validation\ValidationException;

// class MaintenanceController extends Controller
// {
//     public function store(Request $request)
//     {
//         try {
//             // Valider et insérer la maintenance
//             $request->validate([
//                 'maintenance' => 'required',
//                 'id_vehicule' => 'required|exists:vehicule,id',
//             ]);

//             // Vérifier si la maintenance est valide en utilisant la vue v_validation_maintenance
//             $validation = DB::table('v_validation_maintenance')
//                 ->where('id_vehicule', $request->input('id_vehicule'))
//                 ->where('maintenance', $request->input('maintenance'))
//                 ->first();

//             if ($validation && $validation->validation === 'Non Valide') {
//                 throw ValidationException::withMessages([
//                     'maintenance' => ['Le kilométrage pour cette maintenance est inférieur aux exigences.']
//                 ]);
//             }

//             // Insertion de la maintenance si elle passe la validation
//             DB::table('maintenance')->insert([
//                 'maintenance' => $request->input('maintenance'),
//                 'id_vehicule' => $request->input('id_vehicule'),
//             ]);

//             return redirect()->route('maintenance.index')->with('success', 'Maintenance ajoutée avec succès.');
//         } catch (ValidationException $e) {
//             return back()->withErrors($e->validator->errors())->withInput();
//         } catch (\Exception $e) {
//             return back()->with('error', 'Erreur : ' . $e->getMessage())->withInput();
//         }
//     }
// }
