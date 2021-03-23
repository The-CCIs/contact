
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
                    <option value="1">Reclamation de note</option>
                    <option value="2">Absence</option>
                    <option value="3">Retard</option>
                    <option value="4">Explication</option>
                    <option value="5">Autre</option>
                </select>
                </li>
                <li>
                    <label for="avatar">Choose a file:</label>
                    <input type="file" id="avatar" name="avatar" class="docs">
                </li>
            </ul>
        </div>

        <h2></h2>
        <h3> Rendez-vous</h3>

        <table>
            <thead>
            <tr>
                    <td> LINDI</td>

                    <td><input type="radio" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    <td><input type="radio" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    <td><input type="radio" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> JEUDI</td>
                    <td><input type="radio" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    <td><input type="radio" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="radio" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="radio" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="radio" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="radio" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="radio" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="radio" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="radio" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="radio" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>

            </tbody>
        </table>
        <button type="submit" class="Confirmation_disp">Soumettre</button>

    </div>

</form>



@endsection
