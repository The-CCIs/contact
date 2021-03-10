
@extends('base')
@section('title')
RDV
@endsection

@section('content')
<div class="big-box">
    <h2> Rendez-vous</h2>


    <div class="bar_iden">
        <div>
            <ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">CAMIILE DINAZ</span>
                        <span class="matière">1ère année</span>
                    </div>
                </li>
                <li>
                    <div class="prof">
                        <span class="nom_prof">Objet</span>
                        <span class="matière">Reclamation de note</span>
                    </div>
                </li>
                <li><a href="">
                    <div class="prof">
                        <span class="nom_prof">Documents</span>
                        <span class="matière">3</span>
                    </div>
                </a>
                </li>

            </ul>
        </div>
    </div>
    <form action="">
        <br><br><br><br>
        <h3> Message reçu :</h3><br>

        <div class="Message">
            <p></p>
        </div>
    </form>





    <br>


</div>

@endsection
