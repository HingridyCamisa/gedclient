<?php

use Illuminate\Database\Seeder;
use App\Calendario;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['titulo'=>'Evento 1', 'data_inicio'=>'2018-07-16', 'data_final'=>'2018-07-18'],
            ['titulo'=>'Evento 2', 'data_inicio'=>'2018-07-17', 'data_final'=>'2018-07-18'],
            ['titulo'=>'Evento 3', 'data_inicio'=>'2018-07-19', 'data_final'=>'2018-07-20'],
            ['titulo'=>'Evento 4', 'data_inicio'=>'2018-07-20', 'data_final'=>'2018-07-22'],
        ];
        
        foreach ($data as $key => $value) {
            Calendario::create($value);
        }
    }
}
