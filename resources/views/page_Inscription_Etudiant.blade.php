@extends('base')
@section('title')
Inscription Etudiant
@endsection
@section('asset')
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
            <br><br>
            <select name="" id="">
                <option >Niveau d'étude</option>

                <option value="1">Premiere année</option>
                <option value="2">Deuxième année</option>
                <option value="3">Troisième année</option>
            </select>
            <br><br>
            <span id="date_de_naissance">Date de naissance</span>
            <br>
            <br>
            <select name="" id="Date">
            <option >jour</option>

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>

            <select name="" id="Date">

            <option >mois</option>

            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Aout</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
            </select>

            <select name="" id="Date">

            <option >année</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>

            </select>
            <br><br>
            <label class="checkbox"> <input type="checkbox">J'ai lu et j'accepte les Conditions Générales d'Utilisation</label><br>
            <br>
            <input type="submit" name="" value="S'INSCRIRE" class="signup">
            <br>
            <br>

            <div class="connexion-index">Vous avez déjà un compte ?
                <a href="#">Connectez-vous</a></div>

        </form>

    </div>


@endsection
