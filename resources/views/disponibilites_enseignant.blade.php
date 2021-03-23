
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

                    @foreach ($tabDispoLundi as $item)
                    @if ($item['Etat']=='oui')
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" checked><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" ><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @endif
                    @endforeach

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    @foreach ($tabDispoMardi as $item)
                    @if ($item['Etat']=='oui')
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" checked><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" ><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    @foreach ($tabDispoMercredi as $item)
                    @if ($item['Etat']=='oui')
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" checked><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" ><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> JEUDI</td>
                    @foreach ($tabDispoJeudi as $item)
                    @if ($item['Etat']=='oui')
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" checked><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" ><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    @foreach ($tabDispoVendredi as $item)
                    @if ($item['Etat']=='oui')
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" checked><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @else
                    <td><input type="checkbox" id="ten" name="{{$item['Heure']}}" ><label for="ten" class="checkbox2">{{$item['Heure']}}</label></td>
                    @endif
                    @endforeach
                </tr>

            </tbody>
        </table>
        <!--<input type="submit" name="" value="Confirmer disponibilité" id="Confirmation_disp">-->
        <button type="submit" id="Confirmation_disp" class="btn btn-dark">confirmez</button>

    </div>

</form>




@endsection
