<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Contrato;
use DB;
use App\Email;
use App\Mail\Geral;


class EmailController extends Controller
{
    public function index($id, $source)
    {
        $client=DB::table($source)->where('id',$id)->first();
        if($source=="prospecaos")
        {
            if($client->email_cliente==null)
            {
                return back()->with('error','Cliente sem email');
            };
            $nome_cliente=$client->nome_cliente;
            $email_cliente=$client->email_cliente;
        }
        elseif($source=="contratos")
        {
            if($client->email_segurado==null)
            {
                return back()->with('error','Cliente sem email');
            };
            $nome_cliente=$client->nome_segurado;
            $email_cliente=$client->email_segurado;
        }else
        {
            return "Não foi possivel localizar os dados do cliente";
        };
        
        return view('email.email', compact('nome_cliente','email_cliente'));
    }

    public function enviaremail(Request $request)
    {
        $data=$request->all();
        $this->validate($request, array(
            'message' => 'required|min:3',
            'assunto' => 'required|min:3',
        ));

        Email::create($data);
        

        Mail::to($data['to'])->send(new Geral($data));
        
        return back()->with('success','Email enviado');
    }
}
