
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
                    <td> <label class="checkbox2"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:30</label></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> JEUDI</td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:30</label></td>
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">10:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">11:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">13:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">14:30</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:00</label></td>
                    <td> <label class="checkbox2"> <input type="checkbox">15:30</label></td>
                </tr>

            </tbody>
        </table>
        <input type="submit" name="" value="Confirmer disponibilité" id="Confirmation_disp">

    </div>

</form>




@endsection
