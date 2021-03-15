@extends('base')
@section('title')
Accueil
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

    <div class="big-box">

        <div class="min-box">

<<<<<<< HEAD
            <a href="{{route('connexionEtudiant.show')}}">
                <button type="submit" class="Etudiant">Etudiant</button>
            </a>

            <a href="{{route('LogineEnseignant.show')}}">
                <button type="submit" class="Enseignant">Enseignant</button>
=======
            <a href="#">
                <button class="Etudiant"><span>Etudiant</span></button>
            </a>

            <a href="#">
                <button class="Enseignant"><span>Enseignant</span></button>
>>>>>>> 78095ddf31d8f60e425f926eabe0e7d8b56cc0b7
            </a>

        </div>
    </div>

@endsection
