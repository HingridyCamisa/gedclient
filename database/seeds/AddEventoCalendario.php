<?php

use Illuminate\Database\Seeder;
use App\Calendario;

class AddEventoCalendario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['titulo'=>'Demo 1', 'data_inicio'=>'2017-09-11', 'data_final'=>'2017-09-12'],
        	['titulo'=>'Demo 2', 'data_inicio'=>'2017-09-11', 'data_final'=>'2017-09-13'],
        	['titulo'=>'Demo 3', 'data_inicio'=>'2017-09-14', 'data_final'=>'2017-09-14'],
        	['titulo'=>'Demo 3', 'data_inicio'=>'2017-09-17', 'data_final'=>'2017-09-17'],
        ];
        foreach ($data as $key => $value) {
        	Calendario::create($value);
        }
    }
}
