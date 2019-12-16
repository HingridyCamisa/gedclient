<?php

namespace App\Http\Controllers;
require_once "../vendor/smsgatewayme/client/autoload.php";

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
use Hash;
use Session;
use App\Http\Requests\BulckSmsRequest;
use App\Bulcksms;
use App\Http\Requests\MessageBulckSmsRequest;
use App\Messagebulcksms;
use App\Http\Requests\SendBulckSmsRequest;

class BulckSmsController extends Controller
{




	public function saveclient(BulckSmsRequest $request){
		$data=$request->all();

		Bulcksms::create($data);
		Session::flash('success', 'Contacto adicionado com successo');
		return view('sms.bulcksms');
	}
	public function savemessagen(MessageBulckSmsRequest $request){
		$data=$request->all();

		Messagebulcksms::create($data);
		Session::flash('success', 'Messagem adicionada com successo');
		return view('sms.bulcksms');
	}

	public function sendbulcksms(){
		$messege=Messagebulcksms::get();
		$contact=Bulcksms::get();

		return view('sms.sendbulcksms',compact('contact','messege'));

	}

	public function sendsmsfinal(SendBulckSmsRequest $request){
		$messege=Messagebulcksms::find($request->title);
		
		$contact=Bulcksms::get();
		$output="";
		$cout=0;
		$numeros="";

		foreach ($contact as $key => $cil) {//vamos contruir o bulck dos numeros
     		$numeros.=$cil->pnumber.',';

			//$this->enviarsms($cil->dname,$messege->subject,$cil->pnumber);
			$cout=1+$cout;

     	}

		$this->enviarsms($cil->dname,$messege->subject,$numeros);
		Session::flash('success', 'Foi enviado um total de '.$cout);
		return back();



	}

	public function enviarsms($dname,$subject,$pnumber){
		$dname=$dname;
		$subject=$subject;
		$pnumber=$pnumber;
		// Configure client
		$config = Configuration::getDefaultConfiguration();
		$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1NTA3MzgwOCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjcwMDM2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.e8NQD3z1QEllMQi1Q17hXSic3YkfcdFX1vTvFvSGYTU');
		$apiClient = new ApiClient($config);
		$messageClient = new MessageApi($apiClient);

		// Sending a SMS Message

		$sendMessageRequest2 = new SendMessageRequest([
			'from'=>'Almond',
		    'phoneNumber' => $pnumber,
		    'message' => $subject,
		    'deviceId' => 110782
		]);

		$sendMessages = $messageClient->sendMessages([
		        $sendMessageRequest2
		]);

		





	}





	
}
