<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class donate extends ResourceController
{
	use ResponseTrait;

	public function index()
	{
	}

	public function postcard() {
		$curl = curl_init();
		$fields = array('telco' => 'VIETTEL','code' => '312821445892982','serial' => '10004783347874','amount' => '50000','request_id' => '323233','partner_id' => '3681148751','sign' => '19db4f1670100764069dba47429a9d94','command' => "check");
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://thesieure.com/chargingws/v2',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => http_build_query($fields),
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $this->respond($response);
	}
}