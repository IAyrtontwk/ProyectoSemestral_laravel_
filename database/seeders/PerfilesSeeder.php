<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $baja = DB::table('parametros')->where('codigo', '=', 'Baja')->get('id')->pluck('id')->toArray();
        $distrito = DB::table('parametros')->where('codigo', '=', 'Distrito')->get('id')->pluck('id')->toArray();
        $circuns = DB::table('parametros')->where('codigo', '=', 'Circuns')->get('id')->pluck('id')->toArray();
        $alta = DB::table('parametros')->where('codigo', '=', 'Alta')->get('id')->pluck('id')->toArray();
        $partidos = DB::table('parametros')->where('tipo', '=', 'partido')->get('id')->pluck('id')->toArray();
        $perfiles = [];
        foreach (range(1,5) as $index){
            $perfiles[] = [
                'id_camara'=> $faker->randomElement($baja),
                'nombre'=> $faker->firstName(),
                'apellidos'=> $faker->lastName(),
                'id_territorio'=> $faker->randomElement($distrito),
                'numTerritorio'=> $faker->numberBetween($min = 1, $max = 60),
                'id_partido'=> $faker->randomElement($partidos),
                'email'=> $faker->email(),
                'created_at'=> now(),
            ];
        }
        foreach (range(1,3) as $index){
            $perfiles[] = [
                'id_camara'=> $faker->randomElement($alta),
                'nombre'=> $faker->firstName(),
                'apellidos'=> $faker->lastName(),
                'id_territorio'=> $faker->randomElement($circuns),
                'numTerritorio'=> $faker->numberBetween($min = 1, $max = 19),
                'id_partido'=> $faker->randomElement($partidos),
                'email'=> $faker->email(),
                'created_at'=> now(),
            ];
        }
        DB::table('perfil_congresistas')->insert($perfiles);
    }
}
