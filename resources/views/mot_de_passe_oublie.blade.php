@extends('base')
@section('title')
Mot de passe oublié
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
<div class="big-box">
    <form class="demande-box" action="" method="">


        <br><br>
        <h2> Vous avez oublié votre mot de passe ? <br> Le changement, ça a du bon !</h2>
        <br><br>
        <br><br>
        <h4>Entrez votre adresse e-mail ci-dessous et nous vous enverrons la marche à suivre. <br> Si vous ne voyez pas notre e-mail, regardez dans votre dossier Spam.</h4><br>
        <br><br>
        <br><br>
        <input type="email" name="" placeholder="Email" class="email1">
        <br><br>

        <input type="submit" name="" value="ENVOYER MA DEMANDE" class="Demande">

    </form>


</div>

@endsection
