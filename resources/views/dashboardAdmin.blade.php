@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
<div class="cadre">
  <div class="card-body">
    <h3 class="card-title">Bienvenue sur le dashboard admin</h3>
    <h3 class="card-subtitle mb-2 text-muted">Nombre total d'étudiants: {{$nb_etudiant}}</h2>
    <h3 class="card-subtitle mb-2 text-succes">Nombre admis: {{$admis['nb_admis']}}</h3>
    <h3 class="card-subtitle mb-2 text-danger">Nombre ajourné: {{$admis['nb_non_admis']}}</h3>
</div>
    </div>
  </div>
</div>
</div>
@endsection