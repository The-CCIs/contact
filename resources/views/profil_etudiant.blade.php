
@extends('base')
@section('title')
Profil etudiant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="big-box">
    <form class="profil-box" action="" method="">
        <h2> Profil</h2>
        <br><br>
        <br><br>
        <section>
            <input type="submit" name="" value="Modifier" class="Modifier">
        </section>
        <section>
            <h3>A propos de moi</h3><br>
            <img class="photo_profil" src="/icon/image.jpg" alt="">
            <br>
            <div class="Non_etudiant">Walid SIYOUCEF</div>
            <div class="date_naissance">Date de naissance : 01/11/2002</div>
            <div class="Tel">Tel :0751192256</div>
            <div class="class">Classe: Terminal</div>
            <br><br><br><br>
        </section>
        <section>
            <h3>compte</h3>
            <br>
            <div class="date_inscription">Date d'inscription : 01/11/2017</div>
            <div class="date_connexion">Derniere connexion : 01/11/2020</div>
        </section>
    </form>

</div>

@endsection
