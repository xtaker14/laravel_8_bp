<?php

namespace Modules\Pegawai\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;
use DB;

class PegawaiSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // data faker indonesia
        $faker = Faker::create('id_ID');

        // membuat data dummy sebanyak 50 record
        for($x = 1; $x <= 50; $x++){
            // insert data dummy pegawai dengan faker
            DB::table('pegawai')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'no_phone' => $faker->phoneNumber,
                'address' => $faker->address, 
            ]);
        }
    }
}
