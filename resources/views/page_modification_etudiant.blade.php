
@extends('base')
@section('title')
Modification profil
@endsection


@section('content')

<div class="big-box">
    <h2> Profil</h2>
    <h3>A propos de moi</h3><br>
    <form class="profil-edit-box" method="POST" action="{{route('modificationEtudiant.post')}}">
        @csrf
        @if ($errors->any())
        <div class="alert alert-warning">
            hhhhhhhhhhhhhhhhhhhh &#9785;
        </div>
        @endif
        <table>
            <tr>
                <td class="td1">
                    <ul class="">
                        <li>
                            <img class="photo_profil2" src="/icon/image.jpg" alt=""><br>
                        </li>
                        <li>
                            <input type="submit" name="" value="Modifier" class="Modifier2">
                        </li>
                    </ul>
                </td>
                <td>
                    <div class="profil_edit">
                      
                        <input type="text" id="nom" name="nom" class="first-name1" placeholder="Nom">
                        <div class="alert-danger"> {{ $errors->first('nom')}} </div>
                        

                        <input type="text" name="prenom" placeholder="Prénom" class="last-name1">
                        <div class="alert-danger"> {{ $errors->first('Prénom')}} </div>

                        <input type="tel" placeholder="Téléphone" name="phone" class="tel" >
                        <div class="alert-danger"> {{ $errors->first('phone')}} </div>

                        <input type="email" name="ancienEmail" placeholder="Ancien E-mail" class="email1">
                        <div class="alert-danger"> {{ $errors->first('ancienEmail')}} </div>

                        <input type="email" name="nouveauEmail" placeholder="Nouveau E-mail" class="email1">
                        <div class="alert-danger"> {{ $errors->first('nouveauEmail')}} </div>
                        <br>

                        <span id="date_de_naissance2">Date de naissance</span>
                        <br>
                        <br>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        <div class="alert-danger"> {{ $errors->first('date')}} </div>
                        <br><br>
                    </div>
                    <input type="submit" name="" value="Enregistrer" id="Enregistrer">

                </td>
            </tr>
        </table>
    </form>
    <h2></h2>
</div>
@endsection
