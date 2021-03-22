
@extends('base')
@section('title')
Disponibilité
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')


<form action="">

    <div class="container">
        <h2> disponibilité</h2>
        <div class="bar_iden">
            <ul>
                <li>

                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">WALID SIYOUCEF</span>
                        <span class="matière">MATHS</span>
                    </div>
                </li>
            </ul>
        </div><br>

        <h3> Fixer vos disponibilités</h3><br>
        <h2></h2>
        <br><br>
        <table>
            <thead>
                <tr>
                    <td> LINDI</td>


                    @if({{$tabDispoLundi[0]['Etat']=="oui"}})
                    <td><input type="checkbox" id="ten" name="L1000" checked><label for="ten" class="checkbox2">10:00</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="L1000"><label for="ten" class="checkbox2">10:00</label></td>
                    @endif

                    <td><input type="checkbox" id="tenhalf" name="L1030" ><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="checkbox" id="eleven" name="L1100" ><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="checkbox" id="elevenhalf" name="L1130" ><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="checkbox" id="twelf" name="L1200" ><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="checkbox" id="twelfhalf" name="L1230"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="checkbox" id="forty" name="L1400"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="checkbox" id="fortyhalf" name="L1430"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="checkbox" id="fifty" name="L1500"><label for="fifty" class="checkbox2">15:00</label></td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    <td><input type="checkbox" id="ten" name="dispo" ><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="checkbox" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="checkbox" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="checkbox" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="checkbox" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="checkbox" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="checkbox" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="checkbox" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="checkbox" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    <td><input type="checkbox" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="checkbox" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="checkbox" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="checkbox" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="checkbox" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="checkbox" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="checkbox" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="checkbox" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="checkbox" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> JEUDI</td>
                    <td><input type="checkbox" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="checkbox" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="checkbox" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="checkbox" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="checkbox" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="checkbox" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="checkbox" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="checkbox" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="checkbox" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    <td><input type="checkbox" id="ten" name="dispo"><label for="ten" class="checkbox2">10:00</label></td>
                    <td><input type="checkbox" id="tenhalf" name="dispo"><label for="tenhalf" class="checkbox2">10:30</label></td>
                    <td><input type="checkbox" id="eleven" name="dispo"><label for="eleven" class="checkbox2">11:00</label></td>
                    <td><input type="checkbox" id="elevenhalf" name="dispo"><label for="elevenhalf" class="checkbox2">11:30</label></td>
                    <td><input type="checkbox" id="twelf" name="dispo"><label for="twelf" class="checkbox2">12:00</label></td>
                    <td><input type="checkbox" id="twelfhalf" name="dispo"><label for="twelfhalf" class="checkbox2">12:30</label></td>
                    <td><input type="checkbox" id="forty" name="dispo"><label for="forty" class="checkbox2">14:00</label></td>
                    <td><input type="checkbox" id="fortyhalf" name="dispo"><label for="fortyhalf" class="checkbox2">14:30</label></td>
                    <td><input type="checkbox" id="fifty" name="dispo"><label for="fifty" class="checkbox2">15:00</label></td>
                </tr>

            </tbody>
        </table>
        <!--<input type="submit" name="" value="Confirmer disponibilité" id="Confirmation_disp">-->
        <button type="submit" id="Confirmation_disp" class="btn btn-dark">confirmez</button>

    </div>

</form>




@endsection
