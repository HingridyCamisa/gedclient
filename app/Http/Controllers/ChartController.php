<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Charts\Charts as grafico;
use App\Contrato;
use App\Prospecao;


class ChartController extends Controller
{
    public function index()
    {	

        $data = Prospecao::get()->groupBy('tipo_prospecao')->map(function ($item) {
            return count($item);
        });
        
        
        $chart = new grafico;
        $chart->labels($data->keys());
        $chart->title('Tipo de Prospecao');
        $chart->dataset('Nº', 'pie', $data->values())->options([
            'color' => [
                '#e74c3c','#2ecc71','#f39c12', '#3498d8','#9b59b6','#34495e','#ebdef0','#f5b7b1',
        ],
        ]);

        $emidiodata=Prospecao::get()->groupby('nome_consultor')->map(function ($item) {
            // Return the number of persons
            return count($item);
        });

        $emidio = new grafico;
        $emidio->labels($emidiodata->keys());
        $emidio->title('Contratos Por Consultor');
        $emidio->dataset('Nº', 'line', $emidiodata->values())->options([
            'color' => [
          '#f5b7b1', '#d2b4de', '#85c1e9','#DAF7A6','#FFC300','#FF5733','#ebdef0','#f5b7b1',
        ],
        ]);

        
        
        return view('chart',compact('chart','emidio'));
    }
}
