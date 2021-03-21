
@extends('base')
@section('title')
Mes rendez-vous etudiant
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
                <li>
                    <div class="RDV">
                        <span class="date">Lundi 15 fevrier 15:30</span>
                        <span class="annuler"><a href="#">Annuler</a></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">WALID SIYOUCEF</span>
                        <span class="matière">MATHS</span>
                    </div>
                </li>
                <li>
                    <div class="RDV">
                        <span class="date">Lundi 15 fevrier 15:30</span>
                        <span class="annuler"><a href="#">Annuler</a></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">WALID SIYOUCEF</span>
                        <span class="matière">MATHS</span>
                    </div>
                </li>
                <li>
                    <div class="RDV">
                        <span class="date">Lundi 15 fevrier 15:30</span>
                        <span class="annuler"><a href="#">Annuler</a></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">WALID SIYOUCEF</span>
                        <span class="matière">MATHS</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <h2></h2>
    <div class="bar_rech">
        <h3>Equipe d'enseignement</h3><br>
        <form action="{{route('barre.reserch')}}">
        <div class="search_box">
            <input type="text" name="q" placeholder="Trouvez votre professeur?">
            <button type="submit" class="btn btn-info">Chercher</button>
        </div>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div>
            <ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt=""> <span class="nom_prof">Walid SIYOUCEF</span>
                    <span class="matière">Physique</span>
                    <span class="prendre_rendez_vous"> <a href="#">Prendre un rendez vous</a></span>
                </li>


            </ul>
        </div>
    </div>
    <h2></h2>
    <div  class="bar_iden">

        <a href="{{route('messageRecu.show')}}">
        <ul>
            <li>
                <div class="prof">
                    <span class="nom_prof">Message reçus</span>
                    <span class="matière">1</span>
                </div>

            </li>
        </ul>
        </a>

    </div>




    <br>


</div>


@endsection
