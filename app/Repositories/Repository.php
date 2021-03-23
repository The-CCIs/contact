<?php
namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\Hash;

class Repository
{
//-------------------------------CREATION-DE-BASE-DE-DONNEES-------------------------------
// la méthode createDatabase exécute le script
// build.sql en étant connectée à la base de données de l'application.
function tableEtudiant($email): array
{
    return DB::table('Etudiant')->where('Email_Etudiant', $email)->get()->toArray();
}
//----------------------------------------------------------------------------------------------
function tableUtilisateurEtudiant($email): array
{
    return DB::table('UtilisateurEtudiant')->where('Email_Etudiant', $email)->get()->toArray();
}
//---------------------------------------------------------------------------------------------
function changeCodeConfirmation($email,$code):void
{
    DB::table('UtilisateurEtudiant')
    ->where('Email_Etudiant', $email)
    ->update(['codeReinitialisation'=> $code]);
}
function changeMotDePasseOublier($email,$Mot_Passe_Hashé):void
{
    $code = rand(100000,999999);
    DB::table('UtilisateurEtudiant')
    ->where('Email_Etudiant', $email)
    ->update(['Mot_Passe_Hashé'=>Hash::make($Mot_Passe_Hashé),'codeReinitialisation'=> $code]);
}
function createDatabase(): void
{
    DB::unprepared(file_get_contents('database/build.sql'));
   // La méthode unprepared exécute le script qui lui est donné en argument.
   // La fonction PHP file_get_contents prend en argument un nom de fichier
}
function getTableUser($email): array{
    return DB::table('Etudiant')->where('Email_Etudiant', $email)->get()->toArray();
}
function etudiantExiste($email): bool
{
    $table = $this->getTableUser($email);
    if(count($table)!==0)
        return true;
    return false;
}

function modifInfoEtudiant(string $email,string $email2,string $nomEtudiant,
                            string $PrénomEtudiant,string $Date_Naissance, string $NumTelephone)
{
    //dd($Date_Naissance);
    $table = $this->getTableUser($email);
    //dd($table[0]->Email_Etudiant);

    if(count($table)!==0){
        DB::table('Etudiant')
            ->where('Email_Etudiant', $email)
            ->update([  'NomEtudiant'=> $nomEtudiant,
                        'PrénomEtudiant'=> $PrénomEtudiant,
                        'Date_Naissance'=> $Date_Naissance,
                        'Email_Etudiant'=> $email2,
                        'NumTelephone'=> $NumTelephone

                    ]);
    }else{
        throw new Exception('Modifications échouées');
    }

    }
    function insertEtudiant(array $Etudiant): int
    {
        //throw new Exception("bonjour bonjour");
       // DB::table('teams')->insert($team);
       //yfcygfgfygtfytf
        $id = DB::table('Etudiant')->insertGetId($Etudiant);

        return $id;
    }
    function addUser(string $email, string $password): int
    {
      $passwordHash= Hash::make($password);

      return DB::table('UtilisateurEtudiant')->insertGetId(['Email_Etudiant'=>$email,'Mot_Passe_Hashé'=>$passwordHash]);

    }

    function getStudent(string $email, string $password): array
    {
    // TODO
    $users=DB::table('UtilisateurEtudiant')->where('Email_Etudiant',$email)->get()->toArray();
    if(count($users)==0 ){
        throw new Exception('Utilisateur inconnu');
    }
    $user=$users[0];
    $ok = Hash::check($password, $user->Mot_Passe_Hashé);
    //dd($ok);
    //dump($ok);
    if(!$ok)
    {
        throw new Exception('Utilisateur inconnu');
    }
        return [$user->Id,$user->Email_Etudiant];
    }



    function insertEnseignant(array $Enseignant): int
    {
        //throw new Exception("bonjour bonjour");
       // DB::table('teams')->insert($team);
       //yfcygfgfygtfytf
        $id = DB::table('Enseignant')->insertGetId($Enseignant);
        return $id;

    }
    function addTeacher(string $email, string $password): int
    {
      $passwordHash= Hash::make($password);

      return DB::table('UtilisateurEnseignant')->insertGetId(['Email_Enseignant'=>$email,'Mot_Passe_Hashé'=>$passwordHash]);

    }

    function getTeacher(string $email, string $password): array
    {
        // TODO
        $users=DB::table('UtilisateurEnseignant')->where('Email_Enseignant',$email)->get()->toArray();
        if(count($users)==0)
            {
                throw new Exception('Utilisateur inconnu');
            }
        $user=$users[0];
        $ok = Hash::check($password, $user->Mot_Passe_Hashé);
        //dd($ok);
        //dump($ok);
        if(!$ok)
            {
                throw new Exception('Utilisateur inconnu');
            }

        return [$user->Id,$user->Email_Enseignant];

    }

    function searchProf(string $q): array
    {
      return  DB::table('Enseignant')
      ->where('NomEnseignant', 'like', "%$q%")
      ->orWhere('PrénomEnseignant', 'like', "%$q%")
      ->get()
      ->toArray();
     }

     function searchEtud(string $q): array
     {
       return  DB::table('Etudiant')
       ->where('NomEtudiant', 'like', "%$q%")
       ->orWhere('PrénomEtudiant', 'like', "%$q%")
       ->get()
       ->toArray();
      }
    function RDV(string $message ,string $select ,string $avatar ,string $dispo):void
    {
           DB::table('RendezVous')->insert(
            ['Date_RDV'=>$dispo,
            'Message'=>$message,
            'Fichier'=>$select,
            'objet'=>$avatar,
            'IdEtudiant'=>1,
            'Id_Enseignant'=>1]);
    }

}



