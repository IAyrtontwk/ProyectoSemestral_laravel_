<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $proyectos = [];
        foreach (range(1,5) as $index){
            $proyectos[] = [
                'titulo'=> $faker->text(25),
                /*aprender a usar id de otra tabla para el id_estado*/
            ];
        }
        DB::table('proyectos')->insert($proyectos);

    }
}
