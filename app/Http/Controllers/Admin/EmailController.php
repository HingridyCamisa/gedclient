<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DataTables;
use App\Contrato;
use DB;
use App\Email;
use App\Mail\Geral;
use App\Jobs\SendEmailGeral;
use Carbon\Carbon;


class EmailController extends Controller
{

      protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }

      public function all()
      {
        $this->authorize('emails');
        $sent=Email::where('status',0)->count();
        $drafts=Email::where('status',1)->count();
       return view('email.emailAll', compact('sent','drafts'));
      }

      public function allsource()
      {
         $data=Email::select('emails_send.*','users.name')->join('users', 'emails_send.user_id', '=', 'users.id');
         return Datatables::of($data)
                ->addColumn('assuntox','{{$assunto}} - {{$name_cliente}}')
                ->addColumn('time', '{{\Carbon\Carbon::parse($created_at)->diffForHumans()}}')
                ->make(true);
      }

    public function index($id, $source)
    {


    $this->authorize('emails');

    $sent=Email::where('status',0)->count();
    $drafts=Email::where('status',1)->count();

        $client=DB::table($source)->where('id',$id)->first();
        if($source=="clientes")
        {
            if($client->cliente_email==null)
            {
                return back()->with('error','Cliente sem email');
            };
            $nome_cliente=$client->cliente_nome;
            $email_cliente=$client->cliente_email;
        }else
        {
            return "Não foi possivel localizar os dados do cliente";
        };
        
        return view('email.email', compact('nome_cliente','email_cliente','sent','drafts'));
    }

    public function enviaremail(Request $request)
    {
    $this->authorize('emails');
        $data=$request->all();
        $this->validate($request, array(
            'message' => 'required|min:3',
            'assunto' => 'required|min:3',
        ));
        $data['type']="geral";

        $id=Email::create($data);
        $id=$id->id;

        //Mail::to($data['to'])->send(new Geral($data));

        $emailJob = (new SendEmailGeral($data,$id));
        dispatch($emailJob);
        
        return back()->with('success','Email enviado');
    }

        public function try($id)
    {
    $this->authorize('emails');

        $data=Email::find($id)->toArray();

        $emailJob = (new SendEmailGeral($data,$id));
        dispatch($emailJob);
        
        return back()->with('success','Email enviado');
    }
}
