@extends('base')
@section('title')
Inscription Etudiant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')



    <div class="big-box2">
        <form class="Inscription-box" action="" method="">

            <h2> Inscrivez-vous avec votre adresse e-mail</h2>
            <input type="text" name="" placeholder="Nom" class="last-name1">
            <input type="text" name="" placeholder="Prénom" class="first-name1">
            <input type="email" name="" placeholder="Email" class="email1">
            <input type="tel" name="" placeholder="Téléphone" class="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
            <input type="password" name="" placeholder="Mot de passe" class="password1">
            <input type="password" name="" placeholder="Confirmation Mot de passe" class="password1">
            <br>
            <select name="" id="">
                <option >Niveau d'étude</option>

                <option value="1">Premiere année</option>
                <option value="2">Deuxième année</option>
                <option value="3">Troisième année</option>
            </select>
            <br><br>
            <div class="form-group">
               <span id="date_de_naissance">Date de naissance</span>
               <input type="date" class="last-name1" id="date" name="date" >

            <!--</select>-->
            </div>
            <div>
               <input type="checkbox" id="scales" name="scales" checked>
               <label for="scales">J'ai lu et j'accepte les Conditions Générales d'Utilisation</label>
            </div>


            <br>
            <input type="submit" name="" value="S'INSCRIRE" class="signup">


            <div class="connexion-index">Vous avez déjà un compte ?
                <a href="#">Connectez-vous</a></div>

        </form>

    </div>


@endsection
