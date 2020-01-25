<?php

namespace App\Http\Controllers\Admin;

use App\Calendario;
use Illuminate\Http\Request;
use App\Http\Requests\CalendarioRequest;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar; 
use Validator;


class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendarios = Calendario::all();
            $calendario_list = [];
            $calendario_detalhes = [];
            foreach ($calendarios as $key => $calendario) {
                $calendario_list[]= Calendar::event(
                 $calendario->titulo,
                 true,
                 new \DateTime($calendario->data_inicio),
                 new \DateTime($calendario->data_final. '+1 day')
                );
            $calendario_detalhes=Calendar::addEvents($calendario_list,[
                        'color' => $calendario->cor,
                        'url' => 'http://full-calendar.io',

                    ]);

                     $calendario_list=[];

            }


        return view('admin.calendario.index', compact('calendario_detalhes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEvent(CalendarioRequest $request)
    {
        Calendario::create($request->all());
        return $this->index()->with('success','Evento criado com sucesso.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendario $calendario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendario $calendario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendario $calendario)
    {
        //
    }
}
