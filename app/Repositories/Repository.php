<?php
namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\VarDumper\Cloner\Data;

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
    function insertEtudiantMotDePasse(array $utilisateur): int
    {   
        //throw new Exception("bonjour bonjour");
       // DB::table('teams')->insert($team);
       //yfcygfgfygtfytf
        $id = DB::table('UtilisateurEtudiant')->insertGetId($utilisateur);
        
        return $id;
    }
    



}



