@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
                    <h3>Liste des etudiants admis</h3>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Numero etu</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->num_etu }}</td>
                                    <td>{{ $etudiant->nom }}</td>
                                    <td>{{ $etudiant->prenom }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
     @endsection