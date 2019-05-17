<?php

namespace App\Http\Controllers;
require_once "../vendor/smsgatewayme/client/autoload.php";

use Illuminate\Http\Request;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
use Hash;
use App\Http\Requests\SmsRequest;
use Session;
use App\Contrato;

class SmsController extends Controller
{
	

	public function enviarsms(SmsRequest $request){

        $fname=$request->fname;
		$dname=$request->dname;
		$subject=$request->subject;
		$pnumber=$request->pnumber;
		
		$contrato = Contrato::all();

				// Configure client
		$config = Configuration::getDefaultConfiguration();
		$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1NTA3MzgwOCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjcwMDM2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.e8NQD3z1QEllMQi1Q17hXSic3YkfcdFX1vTvFvSGYTU');
		$apiClient = new ApiClient($config);
		$messageClient = new MessageApi($apiClient);

		// Sending a SMS Message

		$sendMessageRequest2 = new SendMessageRequest([
		    'phoneNumber' => $pnumber,
		    'message' => 'Sr(a) '.$dname.' '.$subject,
		    'deviceId' => 110782
		]);
		$sendMessages = $messageClient->sendMessages([
		        $sendMessageRequest2
		]);

		//$respons=print_r($sendMessages);
		Session::flash('success', 'SMS envida com sucesso de: '.$fname.' para: '.$pnumber.' '.$dname);
		//return view('sms.sms');
		return redirect('/admin/contrato/index');






	}
}
