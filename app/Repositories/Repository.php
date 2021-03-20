<?php
namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\Hash;

class Repository
{
//-------------------------------CREATION-DE-BASE-DE-DONNEES-------------------------------
// la méthode createDatabase exécute le script
// build.sql en étant connectée à la base de données de l'application.
function createDatabase(): void
{
    DB::unprepared(file_get_contents('database/build.sql'));
   // La méthode unprepared exécute le script qui lui est donné en argument.
   // La fonction PHP file_get_contents prend en argument un nom de fichier
}
function getTableUser($email): array{
    return DB::table('Etudiant')->where('Email_Etudiant', $email)->get()->toArray();
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

        $id = DB::table('Etudiant')->insertGetId($Etudiant);

        return $id;
    }


    function addUser(string $email, string $password): int
    {
        $passwordHash =  Hash::make($password);
        return DB::table('UtilisateurEtudiant')->insertGetId(['Email_Etudiant'=> $email, 'Mot_Passe_Hashé'=> $passwordHash]);
    }

}



