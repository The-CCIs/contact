<?php

namespace Database\Seeders;



use App\Repositories\Repository;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        touch('database/database.sqlite');
        $repository = new Repository();
        $repository->createDatabase();
        $repository->insertEtudiant(
                                    ['NomEtudiant' => 'BELKHOUS',
                                    'PrénomEtudiant' => 'Lyes',
                                    'Date_Naissance' => '1989-01-18',
                                    'Email_Etudiant' => 'lyes@hotmail.com',
                                    'Niveau_Etude' => 'Troisième_année']

                                    );


        $repository->insertEtudiant(
                                        ['NomEtudiant' => 'SIYOUCEF',
                                        'PrénomEtudiant' => 'Walid',
                                        'Date_Naissance' => '1992-01-18',
                                        'Email_Etudiant' => 'walid@hotmail.com',
                                        'Niveau_Etude' => 'Troisième_année']

                                        );

        $repository->insertEnseignant(
                                            ['NomEnseignant' => 'karim',
                                            'PrénomEnseignant' => 'nouioua',
                                            'Date_Naissance' => '1989-01-18',
                                            'Email_Enseignant' => 'karim@hotmail.com',
                                            'Matière' => 'Maths']

                                            );
        $repository->insertEnseignant(
                                                ['NomEnseignant' => 'karim',
                                                'PrénomEnseignant' => 'bachir',
                                                'Date_Naissance' => '1989-01-18',
                                                'Email_Enseignant' => 'karimb@hotmail.com',
                                                'Matière' => 'Maths']

                                                );

        $repository->addUser('walid@hotmail.com','123456');
        $repository->addUser('lyes@hotmail.com','123456');
        $repository->addTeacher('karim@hotmail.com','123456');
        $repository->addTeacher('karimb@hotmail.com','123456');



    }
}
