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
        $estados = DB::table('parametros')->where('tipo', '=', 'estado')->get('id')->pluck('id')->toArray();
        $camaras = DB::table('parametros')->where('tipo', '=', 'camara')->get('id')->pluck('id')->toArray();
        $proyectos = [];
        foreach (range(1,5) as $index){
            $proyectos[] = [
                'titulo'=> $faker->text(25),
                'id_estado'=> $faker->randomElement($estados),
                'fecha'=> $faker->date($format = 'Y-m-d', $max = 'now'),
                'id_camara'=> $faker->randomElement($camaras),
                'urlProyecto'=> $faker->url(),
                'urlVotacion'=> $faker->url(),
                'created_at'=> now()
            ];
        }
        DB::table('proyectos')->insert($proyectos);

    }
}
