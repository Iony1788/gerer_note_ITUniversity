<!-- resources/views/vehicules/create.blade.php -->
@extends('layouts.app')

@section('title', 'Page_Acceuil')

@section('style')
    <link rel="stylesheet" href={{asset("style/index.css")}}>
@endsection
@section('content')
    <div class="cadre">
            {{-- message succes ou erreur --}}
                        @if(session('errtm'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach(session('errtm') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    @if(session('cath'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach(session('cath') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            {{-- end mmessage --}}
        <div class="card-body">
            <div class="card-title" >
                <h3> Importation donne </h3>
            </div>
            <form action="{{ route('importConfigPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label> Configuration note</label>
                    <input type="file" placeholder="note etudiant" class="form-control"d="exampleInputPassword1" name="fileConfig">
                </div>
                <button type="submit" class="btn btn-primary">Importer</button>
            </form>
        </div>
        </form>
    </div>
</div>
@endsection

