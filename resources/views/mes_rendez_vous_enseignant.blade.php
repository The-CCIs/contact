
@extends('base')
@section('title')
Mes rendez-vous enseignant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')
<div class="big-box2">
    <h2> Rendez-vous</h2>
    <h3>Mes rendez-vous</h3><br>


    <div class="bar_iden">
        <div>
            <ul>
                <a href="{{route('RDV-enseignant-etudiant')}}">
                <li>
                    <div class="RDV">
                        <span class="date">Lundi 15 fevrier 15:30</span>
                        <span class="annuler"></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">CAMIILE DINAZ</span>
                        <span class="matière">1ère année</span>
                    </div>
                </li>
                </a>
                <a href="{{route('RDV-enseignant-etudiant')}}">
                <li>
                    <div class="RDV">
                        <span class="date">Lundi 15 fevrier 15:30</span>
                        <span class="annuler"></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">CAMIILE DINAZ</span>
                        <span class="matière">1ère année</span>
                    </div>
                </li>
                </a>





            </ul>
        </div>
    </div>
    <h2></h2>
    <div class="bar_rech">
        <h3>Etudiant</h3><br>
        <form action="{{route('barre2.reserch')}}">
            <div class="search_box">
                <input type="text" name="q" placeholder="Trouvez l'étudiant?">
                <button type="submit" class="btn btn-info">Chercher</button>
            </div>
            </form>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <h2></h2>



    <br>


</div>
@endsection
