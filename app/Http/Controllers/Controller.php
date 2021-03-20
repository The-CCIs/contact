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

use Symfony\Component\HttpFoundation\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }


    function showPageAccueil()
    {
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

    function storeInscription()
    {
        /*

        1- verification des information saisis
        2- ajout de l'étudiant dans la base de donnée

        */
        return "bien venu au tableau de bord de l'étudiant ... inscription ok";
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
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        try {
      # TODO 1 : lever une exception si le mot de passe de l'utilisateur n'est pas correct
        $student=$this->repository->getStudent($email,$password);
      # TODO 2 : se souvenir de l'authentification de l'utilisateur

        //$value = $request->session()->get($user['email']);
        $request->session()->put('student', $student);

        } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
    }



    return redirect()->route('tableauDeBordEtudiant.show');
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
        $hasKey = $request->session()->has('teacher');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        try {
      # TODO 1 : lever une exception si le mot de passe de l'utilisateur n'est pas correct
        $teacher=$this->repository->getTeacher($email,$password);
      # TODO 2 : se souvenir de l'authentification de l'utilisateur

        //$value = $request->session()->get($user['email']);
        $request->session()->put('teacher', $teacher);

        } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        return redirect()->route('tableauDeBordEnseignant.show');

}
//-----------------------------------------------------------------------------------------------------------------------
    function logout()
    {
        /*
        on peut afficher un message qui nous demande de confirmer le déconnexion
        */
        return redirect()->route('Logine.show');
    }
//-----------------------------------------------------------------------------------------------------------------------
    function motDePasseOublieForm()
    {
        return view('mot_de_passe_oublie');
    }
    function storemotDePasseOublie()
    {
        /*
        verification des champs saisi
        verification de l'existance du mail de l'utilisateur
        envoi d'un lien de reinitialisation du mot de passe a la boite mail de l'étudiant
        */
        return view('reinitialisation_mot_de_passe');
    }
//---------------------------------------------------------------------------------------------------------------------------------

    function reinitialisationMotDePasseForm()
    {
        return view('reinitialisation_mot_de_passe');
    }

    function storereinitialisationMotDePasse()
    {
         /*
        verification des champs saisi
        verification des deux mot de passe saisie
        */

        return 'mot de passe reinitialiser avec sucee';
    }
//--------------------------------------------------------------------------------------------------------------------------------
   function showTableauDeBordEtudiant(Request $request)
    {
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('tableau_de_bord_etudiant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function showTableauDeBordEnseignant(Request $request)
    {
        $hasKey = $request->session()->has('teacher');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('tableau_de_bord_enseignant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function showProfil(Request $request)
    {
        /*
        verifier si l'utilisateur est connecté ou pas si non rediriger 'utlisateur vers la page
        d'autentification. avec un message vous "devez vous authentifier d'abord".
        */
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('profil_etudiant');
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
            'nom.required' => "Vous devez saisir un nom.",
            'prenom.required' => "Vous devez saisir un Pres nom.",
            'ancienEmail.required' => "Vous devez saisir votre ancien email.",
            'nouveauEmail.required' => "Vous devez saisir votre nouveau email.",
            'date.required' => "Vous devez selectionner une date valide."

          ];

        $rules = [  'nom' => ['required'],
                    'prenom' => ['required'],
                    'phone' => [''],
                    'ancienEmail' => ['required'],
                    'nouveauEmail' => ['required'],
                    'date' => ['required','date']

                ];
        //verification des champs saisi
        $validatedData = $request->validate($rules,$messages);
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
//-------------------------------------------------------------------------------------------------------------------------------
    function showMesRendezVousEtudiant(Request $request)
    {
        /*
        recuperation des données de drv a partir de la base de donnée
        */
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
    function storePriseRendezVous()
    {
        /*
        verification des champs saisis
        verification de la disponibilité de l'enseignant

        */
        $hasKey = $request->session()->has('student');
        if(!$hasKey){
            return redirect()->route('PageAccueil.show');
        }
        return view('mes_rendez_vous_etudiant');
    }
    function annulationRendezVous()
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


}

