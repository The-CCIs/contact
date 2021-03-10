
@extends('base')
@section('title')
Prise rendez-vous
@endsection


@section('content')

<form action="">

    <div class="container22">
        <h2> Rendez-vous</h2>
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
        <h3> Message</h3>
        <div class="Message2">
            <textarea placeholder="Message"></textarea>
        </div>
        <div class="cc">
            <ul>
                <li>
                    <select name="" id="objet">
                    <option >Objet</option>
                    <option value="1">Reclamation de note</option>
                    <option value="2">Absence</option>
                    <option value="3">Retard</option>
                    <option value="4">Explication</option>
                    <option value="5">Autre</option>
                </select>
                </li>
                <li>
                    <a href="#">
                        <button class="docs">Ajouter un document</button>
                    </a>
                </li>
            </ul>
        </div>

        <h2></h2>
        <h3> Rendez-vous</h3>

        <table>
            <thead>
                <tr>
                    <td> LINDI</td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:30</label></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> JEUDI</td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox3"> <input type="checkbox">15:30</label></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="Confirmation_disp">Soumettre</button>

    </div>

</form>



@endsection
