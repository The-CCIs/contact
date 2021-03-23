
@extends('base')
@section('title')
Prise rendez-vous
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<form method="POST" action="{{route('priseRendezVous.post')}}" >
@csrf

    <div class="container22">
        <h2> Rendez-vous</h2>
        <div class="bar_iden">
              <!--<ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$PrénomEnseignant}} {{$NomEnseignant}}</span>
                        <span class="matière">{{$Matière}}</span>
                    </div>
                </li>
            </ul>-->
            <input name="profN" type="hidden" value="{{$NomEnseignant}}">
            <input name="profP" type="hidden" value="{{$PrénomEnseignant}}">
        </div><br>
        <h3> Message</h3>
        <div class="Message2">
            <textarea placeholder="Message" name="message"></textarea>
        </div>
        <div class="cc">
            <ul>
                <li>
                    <select name="select" id="objet">
                    <option >Objet</option>
                    <option value="Reclamation de note">Reclamation de note</option>
                    <option value="Absence">Absence</option>
                    <option value="Retard">Retard</option>
                    <option value="Explication">Explication</option>
                    <option value="Autre">Autre</option>
                </select>
                </li>
                <!--<li>
                    <label for="avatar">Choose a file:</label>
                    <input type="file" id="avatar" name="avatar" class="docs">
                </li>-->
            </ul>
        </div>

        <h2></h2>
        <h3> Rendez-vous</h3>

        <table>
            <thead>
            <!--<tr>
                    <td> LINDI</td>

                    <td><input type="radio" id="ten" name="dispo" value="L1000"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo" value="L1000"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo" value="L1000"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo" value="L1000"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo" value="L1000"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>

                </tr>-->
                <tr>
                <td> LINDI</td>

@foreach($tabDispoLundi as $tab)
@if($tab['Etat']=='oui')
<td><input value="{{$tab['Heure']}}" type="radio" id="ten" name="dispo" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@else
<td><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@endif
@endforeach

</tr>
</thead>
<tbody>
<tr>
<td> MARDI</td>
@foreach($tabDispoMardi as $tab)
@if($tab['Etat']=='oui')
<td><input value="{{$tab['Heure']}}" type="radio" id="ten" name="dispo" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@else
<td><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@endif
@endforeach
</tr>
<tr>
<td> MERCREDI</td>
@foreach($tabDispoMercredi as $tab)
@if($tab['Etat']=='oui')
<td><input value="{{$tab['Heure']}}" type="radio" id="ten" name="dispo" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@else
<td><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@endif
@endforeach
</tr>
<tr>
<td> JEUDI</td>
@foreach($tabDispoJeudi as $tab)
@if($tab['Etat']=='oui')
<td><input value="{{$tab['Heure']}}" type="radio" id="ten" name="dispo" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@else
<td><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@endif
@endforeach
</tr>
<tr>
<td> VENDREDI</td>
@foreach($tabDispoVendredi as $tab)
@if($tab['Etat']=='oui')
<td><input value="{{$tab['Heure']}}" type="radio" id="ten" name="dispo" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@else
<td><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
@endif
@endforeach
</tr>
            </tbody>
        </table>
        <button type="submit" class="Confirmation_disp">Soumettre</button>

    </div>

</form>



@endsection
