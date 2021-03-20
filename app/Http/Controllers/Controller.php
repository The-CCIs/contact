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
        return view('page_autentification_etudiant');
    }

    function storeLoginEtudiant()
    {
         /*
        $value = $repository->getUser($email, $password);
        1- verification des information saisis
        2- se souvenir de l'authentification de l'utilisateur $request->session()->put('user', $value);
        avec traitement des exceptions
        verifier s'il s'agit d'un étudiant ou d'un enseignant pour retourner la vue adéquate.
        */
        return view('tableau_de_bord_etudiant');
    }
//-----------------------------------------------------------------------------------------------------------------------------------
function showLoginEnseignant()
{
    return view('page_autentification_enseignant');
}

function storeLoginEnseignant()
{
     /*
    $value = $repository->getUser($email, $password);
    1- verification des information saisis
    2- se souvenir de l'authentification de l'utilisateur $request->session()->put('user', $value);
    avec traitement des exceptions
    verifier s'il s'agit d'un étudiant ou d'un enseignant pour retourner la vue adéquate.
    */
    return view('tableau_de_bord_enseignant');
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
    function showTableauDeBordEtudiant()
    {
        return view('tableau_de_bord_etudiant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function showTableauDeBordEnseignant()
    {
        return view('tableau_de_bord_enseignant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function showProfil(Repository $repository)
    {
        /*
        verifier si l'utilisateur est connecté ou pas si non rediriger 'utlisateur vers la page
        d'autentification. avec un message vous "devez vous authentifier d'abord".
        */
        //$infosEtudiant = $repository->tableEtudiant($email);

        
        
        $nom = '<h1>BELKHOUS</h1>';
        $nom = htmlentities($nom);
        dump($nom);
        $prenom = 'Lyes';
        $dateNaissance = "18/01/1989";
        $phone = "0614623344";
        $classe = 5;
        $tableInformations = [['nom'=>$nom , 'prenom'=>$prenom , 'dateNaissance'=>$dateNaissance , 'phone'=>$phone , 'classe'=>$classe]];
        return view('profil_etudiant',['tab' => $tableInformations]);
    }
//-------------------------------------------------------------------------------------------------------------------------------
    function modificationEtudiantForm()
    {
        /*
        verifier si l'utilisateur est connecté ou pas si non rediriger 'utlisateur vers la page
        d'autentification. avec un message vous "devez vous authentifier d'abord".
        */
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
    function showMesRendezVousEtudiant()
    {
        /*
        recuperation des données de drv a partir de la base de donnée
        */
        return view('mes_rendez_vous_etudiant');
    }
//--------------------------------------------------------------------------------------------------------------------------------
    function priseRendezVousForm()
    {
        /*
        verifier tjrs si la requette http a été faite aprés une connexion si non rediriger
        l'ulilisateur a la page de connexion
        */
        return view('prise_rendez_vous_etudiant');
    }
    function storePriseRendezVous()
    {
        /*
        verification des champs saisis
        verification de la disponibilité de l'enseignant

        */
        return view('mes_rendez_vous_etudiant');
    }
    function annulationRendezVous()
    {
        /*
        verification que la requette a été faite apres connexion
        affichafge d'un message "voulez vous confirmez l'annulation du rdv"
        retirer le rdv de la base de donnée et actualiser l'affichage des rdv
        */
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
