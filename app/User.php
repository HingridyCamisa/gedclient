<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Meta; 
use App\Cliente;
use Carbon\Carbon;
use App\Prospecao;
use App\Contrato;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function meta()
    {
        return $this->hasOne(Meta::class);
    }
    public function aniversarios()
    {

        $clientes = Cliente::where('cliente_tipo','individual')->get();

        $nu_aniversarios=0;

        foreach($clientes as $key => $cliente){ 
            if(Carbon::parse($cliente->cliente_data_nascimento)->isBirthday(carbon::today()))
            {   
                $nu_aniversarios = $nu_aniversarios+1;   
            }

        }
        return $nu_aniversarios;
    }

    public function prospecoes()
    {
        $Prospecao = Prospecao::where('status',1)->count();
        return $Prospecao;
    }

    public function contratos()
    {
        $contrato = Contrato::where('status',1)->count();
        return $contrato;
    }
}
