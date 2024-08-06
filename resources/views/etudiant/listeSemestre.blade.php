@extends('layouts.appClient')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content_client')
        <div class="cadre">
            <h3>Liste des semestres</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>SEMESTRES</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($semestres as $semestre)
                      <tr>
                        <td><a href="{{ route('releveDeNoteEtudiant', ['id' => $semestre->id]) }}">{{ $semestre->nom }}</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
</div>
@endsection