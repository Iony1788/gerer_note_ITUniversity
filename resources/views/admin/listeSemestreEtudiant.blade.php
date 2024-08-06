<!-- resources/views/vehicules/create.blade.php -->
@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3>Liste semestres</h3>
                    <td>
                        <a href="{{ route('listeEtudiantAdminSemestre', ['id' => $id, 'semestre' => $semestre->id]) }}" class="btn btn-info btn-block">
                            {{ $semestre->nom }}
                        </a>
                    </td>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
