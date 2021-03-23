<?php

namespace App\Http\Controllers;

use Exception;
use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Data;

use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\ConvertEmptyStringsToNull;
use App\Mail\ContactMessageCreated;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use PhpParser\Builder\Use_;
use PhpParser\Node\Stmt\Use_ as StmtUse_;
use Symfony\Component\HttpFoundation\Cookie;
use Sentinel;
use Reminder;
//use Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }



    function showPageAccueil(Request $request)
    {
        $hasKey = $request->session()->has('student');
        $hasKey1 = $request->session()->has('teacher');
        if($hasKey){
            return view('tableau_de_bord_etudiant');
        }
       else if($hasKey1){
            return view('tableau_de_bord_enseignant');
       }

        return view('page_accueil');
    }
    function showItablissement()
    {
        return view('itablissement');
    }

    function showContact()
    {
        return view('contact');
    }
//----------------------------------------------------------------------------------------------------------------------------------
    function showConnexionEtudiant()
    {
        return view('page_principale_Etudiant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function showInscriptionEtudiant()
    {
        return view('page_Inscription_Etudiant');
    }

    function storeInscription(Request $request)
    {
        $rules = [
            'nom' => ['required'],
            'prénom' => ['required'],
            'email' => ['required', 'unique:Etudiant,Email_Etudiant'],
            'tel' => ['required', 'unique:Etudiant,Email_Etudiant'],
            'password' => ['required'],
            'passwordconfirmation' => ['required'],
            'niveau' => ['required'],
            'date' => ['required', 'date'],
            'scales' => ['required'],

            ];
            $messages = [
                'nom.required' => 'Vous devez choisir un nom.',
                'prénom.required' => 'Vous devez choisir un prénom.',
                'email.required' => 'Vous devez choisir une adresse mail.',
                'email.unique' => 'Cet Email existe déja.',
                'tel.required' => 'Vous devez choisir un numéro de telephone.',
                'tel.unique' => 'Ce numéro existe déja.',
                'password.required' => 'champs obligatoire',
                'passwordConfirmation.required' => 'champs obligatoire',
                'niveau.required' => 'champs obligatoire',
                'date.required' => 'Vous devez choisir une date de naissance.',
                'date.date' => 'Vous devez choisir une date de naissance valide.',
                'scales.required'=>'vous devez cocher pour continuer'
            ];

            $validatedData = $request->validate($rules,$messages);
            try{

                $this->repository->insertEtudiant(    ['NomEtudiant' => $validatedData['nom'],
                'PrénomEtudiant' => $validatedData['prénom'],
                'Email_Etudiant' => $validatedData['email'],
                'NumTelephone' => $validatedData['tel'],
                'Date_Naissance' => $validatedData['date'],
                'Niveau_Etude' => $validatedData['niveau']]);

                $this->repository->addUser($validatedData['email'], $validatedData['password']);
            }catch (Exception $exception) {

                var_dump($exception);
                return redirect()->route('InscriptionEtudiant.show')->withInput()->withErrors("Impossible de rajouter l'étudiant");
            }
        //return redirect()->route('tableauDeBordEtudiant.show');
        return redirect()->route('PageAccueil.show');
    }
//-----------------------------------------------------------------------------------------------------------------------------------
    function showLoginEtudiant()
    {
        return view('LoginEtudiant');
    }

    function storeLoginEtudiant(Request $request)
    {    $rules = [
        'email' => ['required', 'email'],
        'password' => ['required']
         ];
        $messages = [
        'email.required' => 'Vous devez saisir un e-mail.',
        'email.email' => 'Vous devez saisir un e-mail valide.',
        'email.exists' => "Cet utilisateur n'existe pas.",
        'password.required' => "Vous devez saisir un mot de passe.",
         ];
        $validatedData = $request->validate($rules, $messages);
        $email=$validatedData['email'];
        $password=$validatedData['password'];


        try {
      # TODO 1 : lever une exception si le mot de passe de l'utilisateur n'est pas correct
        $student=$this->repository->getStudent($email,$password);
      # TODO 2 : se souvenir de l'authentification de l'utilisateur

        //$value = $request->session()->get($user['email']);
        $request->session()->put('student', $student);

        } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
    }



    //return redirect()->route('tableauDeBordEtudiant.show');
    return redirect()->route('PageAccueil.show');
    }

//-----------------------------------------------------------------------------------------------------------------------------------
function showLoginEnseignant()
{
    return view('page_autentification_enseignant');
}

function storeLoginEnseignant(Request $request)
{

    $rules = [
        'email_teacher' => ['required', 'email'],
        'password_teacher' => ['required']
         ];
        $messages = [
        'email_teacher.required' => 'Vous devez saisir un e-mail.',
        'email_teacher.email' => 'Vous devez saisir un e-mail valide.',
        'email_teacher.exists' => "Cet utilisateur n'existe pas.",
        'password_teacher.required' => "Vous devez saisir un mot de passe.",
         ];
        $validatedData = $request->validate($rules, $messages);
        $email=$validatedData['email_teacher'];
        $password=$validatedData['password_teacher'];


        try {
      # TODO 1 : lever une exception si le mot de passe de l'utilisateur n'est pas correct
        $teacher=$this->repository->getTeacher($email,$password);
      # TODO 2 : se souvenir de l'authentification de l'utilisateur

        //$value = $request->session()->get($user['email']);
        $request->session()->put('teacher', $teacher);

        } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        //return redirect()->route('tableauDeBordEnseignant.show');
        return redirect()->route('PageAccueil.show');

}
      function logout(Request $request) {
        if($request->session()->has('student'))
        $request->session()->forget('student');
        else
        $request->session()->forget('teacher');

        return redirect()->route('PageAccueil.show');
      }
//-----------------------------------------------------------------------------------------------------------------------

    function motDePasseOublieForm()
    {
        return view('mot_de_passe_oublie');
    }
    function storemotDePasseOublie(Request $request, Repository $repository)
    {
        $messages = ['email.required' => "Vous devez saisir votre mail"];

        $rules = [
                    'email' => ['required']
                 ];

        $validateData = $request->validate($rules, $messages);

        $email = $validateData['email'];
        $repository->tableEtudiant($email);

        $reponse = $repository->etudiantExiste($email);
        if($reponse==true)
        {
            $code = rand(100000,999999);
            //dump($code);
            $tablEtudiant = $repository->tableEtudiant($email);
            $prenom = $tablEtudiant[0]->PrénomEtudiant;

            $mailable = new ContactMessageCreated($email,$prenom,$code);
            Mail::to($email)->send($mailable);
            $repository->changeCodeConfirmation($email,$code);
            return redirect()->back()->with('message', 'Un message a été envoyé dans votre boite mail');
        }


        return redirect()->back()->withErrors('message : La réinitialisation de votre mot de passe a échoué');

    }
//---------------------------------------------------------------------------------------------------------------------------------

    function reinitialisationMotDePasseForm()
    {
        return view('reinitialisation_mot_de_passe');
    }

    function storereinitialisationMotDePasse(Request $request, Repository $repository)
    {
        $messages = [
                    'email.required' => "Vous devez saisir votre mail",
                    'code.required' => "Saisissez le code reçu sur votre boite mail",
                    'password1.required' => "Vous devez saisir un mot de passe",
                    'password2.required' => "Vous devez saisir un mot de passe"
                    ];
        $rules = [
                    'email' => ['required','email'],
                    'code' => ['required','integer'],
                    'password1' => ['required'],
                    'password2' => ['required']
                 ];
        $validateData = $request->validate($rules, $messages);
        //dd($validateData['email']);
        $emailSaisi = $validateData['email'];
        $codeSaisi = $validateData['code'];
        $password1Saisi = $validateData['password1'];
        $password2Saisi = $validateData['password2'];
        $tabUser = $repository->tableUtilisateurEtudiant($emailSaisi);
        if(count($tabUser)!==0){
            $emailExistant = $tabUser[0]->Email_Etudiant;
            $codeExistant =  $tabUser[0]->codeReinitialisation;
            if($codeSaisi=== $codeExistant && $password1Saisi ===$password2Saisi)
            {
                $repository->changeMotDePasseOublier($emailExistant,$password1Saisi);
                return view('page_autentification_etudiant')->with('message','Votre mot de passe a bien été changé');
            }
        }
        return redirect()->back()->withErrors('echeque, vérifiez bien vos informations');
    }
//--------------------------------------------------------------------------------------------------------------------------------
   /*function showTableauDeBordEtudiant(Request $request)
    {
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('tableau_de_bord_etudiant');
    }*/
//--------------------------------------------------------------------------------------------------------------------------------
    /*function showTableauDeBordEnseignant(Request $request)
    {
        $hasKey = $request->session()->has('teacher');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('tableau_de_bord_enseignant');
    }*/
//--------------------------------------------------------------------------------------------------------------------------------
    function showProfil(Request $request)
    {
        /*
        verifier si l'utilisateur est connecté ou pas si non rediriger 'utlisateur vers la page
        d'autentification. avec un message vous "devez vous authentifier d'abord".
        */
        //$infosEtudiant = $repository->tableEtudiant($email);
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }


        $nom = '<h1>BELKHOUS</h1>';
        $nom = htmlentities($nom);
        //dump($nom);
        $prenom = 'Lyes';
        $dateNaissance = "18/01/1989";
        $phone = "0614623344";
        $classe = 5;
        $tableInformations = [['nom'=>$nom , 'prenom'=>$prenom , 'dateNaissance'=>$dateNaissance , 'phone'=>$phone , 'classe'=>$classe]];
        return view('profil_etudiant',['tab' => $tableInformations]);
    }
//-------------------------------------------------------------------------------------------------------------------------------
    function modificationEtudiantForm(Request $request)
    {
        /*
        verifier si l'utilisateur est connecté ou pas si non rediriger 'utlisateur vers la page
        d'autentification. avec un message vous "devez vous authentifier d'abord".
        */
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('page_modification_etudiant');
    }

    function storeModificationEtudiant(Request $request, Repository $repository)
    {
        $messages = [
            'nom.String' => "Vous devez saisir un nom.",
            'prenom.String' => "Vous devez saisir un Pres nom.",
            'ancienEmail.required' => "Vous devez saisir votre ancien email.",
            'nouveauEmail.email' => "Vous devez saisir un email.",
            'date.date' => "Vous devez selectionner une date valide."

          ];

        $rules = [  'nom' => ['String','nullable'],
                    'prenom' => ['String','nullable'],
                    'phone' => ['String','nullable'],
                    'ancienEmail' => ['required','email'],
                    'nouveauEmail' => ['email','nullable'],
                    'date' => ['date','nullable']

                ];
        //verification des champs saisi
        dump($request->all());
        $validatedData = $request->validate($rules,$messages);
        $ancienEmail = $validatedData['ancienEmail'];
        $tableEtudiant = $repository->tableEtudiant($ancienEmail);

        $nom = $tableEtudiant[0]->NomEtudiant;

        $prenom = $tableEtudiant[0]->PrénomEtudiant;
        $phone = $$tableEtudiant[0]->NumTelephone;
        $ancienEmail = $tableEtudiant[0]->Email_Etudiant;
        $nouveauEmail = $tableEtudiant[0]->Email_Etudiant;
        $date = $tableEtudiant[0]->Date_Naissance;
        dd($nom . $prenom . $ancienEmail . $nouveauEmail . $date);
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        try{

        $nom = $validatedData['nom'];
        $prenom = $validatedData['prenom'];
        $phone = $validatedData['phone'];
        $ancienEmail = $validatedData['ancienEmail'];
        $nouveauEmail = $validatedData['nouveauEmail'];
        $date = $validatedData['date'];
        $repository->modifInfoEtudiant($ancienEmail,$nouveauEmail,$nom,$prenom,$date,$phone);


        return "vos informations ont été actualisé avec succe";
        }catch(Exception $e)
        {
            return redirect()->back()->withErrors("Modifs non enrigistrées");
        }
    }
//-------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------
    function showMesRendezVousEtudiant(Request $request)
    {

        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('mes_rendez_vous_etudiant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function priseRendezVousForm(Request $request)
    {
        /*
        verifier tjrs si la requette http a été faite aprés une connexion si non rediriger
        l'ulilisateur a la page de connexion
        */


        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('prise_rendez_vous_etudiant');
    }
    function storePriseRendezVous(Request $request)
    {
        /*verification de la disponibilité de l'enseignant*/
        $messages = [
            'select.required' => "Vous devez choisi un objet."];

        $rules = ['select' => ['required']];
        $validatedData = $request->validate($rules,$messages);

        $hasKey = $request->session()->has('student');

        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }

        try{


            $message = $validatedData['message'];
            $select = $validatedData['select'];
            $avatar = $validatedData['avatar'];
            $dispo = $validatedData['dispo'];
            $this->repository->RDV($message ,$select ,$avatar ,$dispo);
            dd($message);

            return "vos informations ont été actualisé avec succe";
            }catch(Exception $e)
            {
                return redirect()->back()->withErrors("impossible");
            }

        //return view('mes_rendez_vous_etudiant');
        return "vos informations ont été actualisé avec succe";
    }
    function annulationRendezVous(Request $request)
    {
        /*
        verification que la requette a été faite apres connexion
        affichafge d'un message "voulez vous confirmez l'annulation du rdv"
        retirer le rdv de la base de donnée et actualiser l'affichage des rdv
        */
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('mes_rendez_vous_etudiant');
    }

    function showMessageReçu()
    {

        return view('message_reçu_etudiant');
    }
//---------------------------------------------------------------------------------------------------------------------------------
    function rendezVousMessageForm()
    {
        /*
        verifications habituelles
        */
        return view('mes_rendez_vous_enseignant');
    }
    function RendezVousMessage()
    {
        /*
        verifications habituelles + message "message envoyer avec succé"
        */
        return view('message_enseignant_etudiant');
    }

    function storeRendezVousMessage()
    {
        /*
        verifications habituelles + message "message envoyer avec succé"
        */
        return ('messageenboyé');
    }

    function storeannulationRendezVousEnseignant()
    {
        /*
        verifications habituelles + message "etes vous sur de vouloir annuler ce rdv"
        actualisation de la liste des rdv
        */
        return view('mes_rendez_vous_etudiant');
    }

    function RendezVous()
    {
        /*
        verifications habituelles + message "message envoyer avec succé"
        */
        return view('rendez_vous');
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------

    function showdisponibilites()
    {
        return view('disponibilites_enseignant');
    }

    function storeDisponibilites()
    {
        /*
        verifications habituelle
        */
        return redirect()->route('disponibilites.show');
    }
//---------------------------------------------------------------------BARRE DE RECHERCHE-------------------------------------------------------

function showSearchBarre()
{

$q = request()->input('q');
$profss= $this->repository->searchProf($q);
//dd($profss);
// $profs=['NomEnseignant'=>$profss[0]->NomEnseignant,
//         'PrénomEnseignant'=>$profss[0]->PrénomEnseignant,
//         'Matière'=>$profss[0]->Matière];
// dd($profs);
return view('mes_rendez_vous_etudiant-research', ['profss' => $profss]);
}

function showSearchBarre2()
{
$q = request()->input('q');
$etudss= $this->repository->searchEtud($q);

return view('mes_rendez_vous_enseignant-research', ['etudss' => $etudss]);
}

}
