
@extends('base')
@section('title')
Message enseignant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

<div class="big-box">
    <h2> Messagerie</h2>


    <div class="bar_iden">
        <div>
            <ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$PrénomEtudiant}} {{$NomEtudiant}}</span>
                        <span class="matière">{{$Niveau_Etude}}</span>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <br><br>
    <form action="">
        <div class="Message1">
            <textarea placeholder="Message"></textarea><br>
            <input type="submit" name="submitInfo" value="Envoyer" id="Envoyer">
        </div>
    </form>





    <br>


</div>

@endsection
