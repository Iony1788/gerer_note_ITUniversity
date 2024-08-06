@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
                    <h3>Liste des etudiants admis en semestre</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Numero etu</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($etudiants as $etudiant)
                                <td> {{$etudiant->num_etu}} </td>
                                <td> {{$etudiant->nom}} </td>
                                <td> {{$etudiant->prenom}} </td>
                                @endforeach
                            </tr>
                        </table>
     @endsection