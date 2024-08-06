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
                    <h3>Saisir note d'etudiant</h3>
                    <form action="{{ route('saisiNotePost') }}" method="POST">
                        @csrf
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
                            <div class="form-group">
                                <label for="num_etu">Entrez l' ETU</label>
                                <input id="num_etu" type="text" class="form-control" name="num_etu" value="{{ old('num_etu') }}" required autofocus>

                            </div>
                            <div class="form-group">
                                <label for="id_matiere">Code matiere</label>
                                <select id="id_matiere" class="form-control" name="id_matiere" required>
                                    <option value="">Sélectionner matière</option>
                                        @foreach ($matieres as $matiere)
                                            <option value="{{ $matiere->id }}">{{ $matiere->code_matiere }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <input id="note" type="text" class="form-control" name="note" value="{{ old('note') }}" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
