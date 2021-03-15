
@extends('base')
@section('title')
Réitialisatonde mot de passe
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="big-box">

    <form class="box" action="" method="">

        <h2> Service d'authentification</h2>
        <br><br><br>
        <input type="password" name="" placeholder="Nouveau mot de passe" class="password1">
        <input type="password" name="" placeholder="Confirmer le mot de passe" class="password1">
        <br>
        <br><br>
        <input type="submit" name="" value="Reinitialiser" class="login">
        <br><br>

        <div class="connexion-index"><a href="#">Revenir à la page d'authentification</a></div>
    </form>


</div>

@endsection
