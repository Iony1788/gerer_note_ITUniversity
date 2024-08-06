<!-- resources/views/vehicules/create.blade.php -->
@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
                    <h3>Liste des etudiants</h3>
                <form action="{{ route('filtrageEtudiant') }}" method="POST">
                        @csrf
                    {{-- filtre par recherce --}}
                    <div class="form-group">
                        <label for="search">Rechercher par nom etudiant</label>
                        <input id="nom" type="text" class="form-control" name="nom" value="{{ request('nom') }}" placeholder="Nom ou prénom">
                    </div>
                    <div class="form-group">
                        <label for="nom_promotion">Promotion</label>
                        <select id="nom_promotion" class="form-control" name="nom_promotion">
                            <option value="">Toutes les promotions</option>
                            @foreach ($promotions as $promotion)
                                <option value="{{ $promotion->id }}" {{ request('promotion') == $promotion->id ? 'selected' : '' }}>
                                    {{ $promotion->nom_promotion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </form>
                    {{-- fin filtre par recherche --}}
                        <div class="card-body">
                            {{-- message succes ou erreur --}}
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                            {{-- end mmessage --}}
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Numero ETU</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date naissance</th>
                                    <th>Genre</th>
                                    <th>Promotion</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($etudiants as $etudiant )
                                  <tr>
                                    <td>{{$etudiant->id}}</td>
                                    <td>{{$etudiant->num_etu}}</td>
                                    <td>{{$etudiant->nom}}</td>
                                    <td>{{$etudiant->prenom}}</td>
                                    <td>{{$etudiant->date_naissance}}</td>
                                    <td>{{$etudiant->genre}}</td>
                                    <td>{{$etudiant->nom_promotion}}</td>
                                    <td><a href="{{ route('listesemestre',['id'=>$etudiant->id]) }}" class="btn btn-info btn-md btn-blockr">Voir Semestres</a></td>
                                    <td><a href="{{ route('listeanne',['id'=>$etudiant->id]) }}" class="btn btn-info btn-md btn-blockr">Voir annee</a></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
        </div>
    </div>
@endsection
