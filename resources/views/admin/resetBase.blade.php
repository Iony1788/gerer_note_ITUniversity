
<!-- resources/views/vehicules/create.blade.php -->
@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('resetBase') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Réinitialiser la Base de Données</button>
               </form>
    </div>
</div>
@endsection
















