<?php
namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\DB;


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



}



