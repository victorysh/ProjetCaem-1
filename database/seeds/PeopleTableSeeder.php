<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
 				# code...
 				$data[] = array(
                    'name' => 'Pierre',
                    'family_name' => 'CHIRAC'.uniqid(),
                    'mail' => 'pierre.chirac@test.fr',
                    'tel_fix' => 012002202,
                    'tel_mob' => 2545050550,
                    'postal_code' => 50000,
                    'adress' => 'Ocimum basilicum ssp basilicum',
                    'birthday' => '1990-02-07',
                    'observation' => 'Ocimum basilicum ssp basilicum',
                    'code_analytique' => 'Cette huile essentielle est antibactérienne...',
                    'gender' => 'Mr'
                );
 			}

 			for ($i=0; $i < 100; $i++) { 
 				# code...
 				$data[] = array(
                    'name' => 'Monique',
                    'family_name' => 'RANOU'.uniqid(),
                    'mail' => 'Monique.RANOU@test.fr',
                    'tel_fix' => 012002202,
                    'tel_mob' => 2545050550,
                    'postal_code' => 20000,
                    'adress' => 'Ocimum basilicum ssp basilicum',
                    'birthday' => '1980-02-07',
                    'observation' => 'Ocimum basilicum ssp basilicum',
                    'code_analytique' => 'Cette huile essentielle est antibactérienne...',
                    'gender' => 'Mme'
                );
 			}

 			for ($i=0; $i < 100; $i++) { 
 				# code...
 				$data[] = array(
                    'name' => 'Bernadette',
                    'family_name' => 'CHIRAC'.uniqid(),
                    'mail' => 'Bernadette.chirac@test.fr',
                    'tel_fix' => 012002202,
                    'tel_mob' => 2545050550,
                    'postal_code' => 20000,
                    'adress' => 'Ocimum basilicum ssp basilicum',
                    'birthday' => '2002-02-07',
                    'observation' => 'Ocimum basilicum ssp basilicum',
                    'code_analytique' => 'Cette huile essentielle est antibactérienne...',
                    'gender' => 'Mme'
                );
 			}

    	DB::table('people')->insert($data);
        // $this->call(UsersTableSeeder::class);
    }
}


