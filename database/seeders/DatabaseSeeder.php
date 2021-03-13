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

    }
}
