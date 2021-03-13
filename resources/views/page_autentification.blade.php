@extends('base')
@section('title')
Authentification
@endsection
@section('asset')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

<div class="big-box">
    <form class="Conexion-box" action="" method="">

        <h2> Service d'authentification</h2>
        <br><br>
        <input type="text" name="" placeholder="E-mail" class="email1">
        <input type="password" name="" placeholder="Mot de passe" class="password1">
        <br>
        <label class="mot_passe_oubli"> <a href="#">Mot de passe oublié ? </a></label><br>
        <label class="checkbox_c"> <input type="checkbox"> Restez connecté</label><br>
        <br>
        <input type="submit" name="" value="SE CONNECTER" class="login">
        <br>
        <br>
        <div class="connexion-index">Vous n'avez pas encore de compte ?
            <a href="#">Inscrivez-vous</a></div>

    </form>
</div>

@endsection
