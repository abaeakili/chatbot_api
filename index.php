<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
		echo "here";
		/*$uri = 'https://api.infermedica.com/v2/parse';
		$ch = curl_init($uri);
		curl_setopt_array($ch, array(
		    CURLOPT_HTTPHEADER  => array('App-Id: 5f25c2a1', 'App-Key: 936abca73fe6854d917ddcf0c4693ac4', 'Dev-Mode: true', 'Content-Type: application/json'),
		    CURLOPT_RETURNTRANSFER  =>true,
		    CURLOPT_VERBOSE     => 1,
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => "text=couoghing"
		));
		$out = curl_exec($ch);
		curl_close($ch);
		// echo response output*/
		try{
		$data = array("text" => "i feel smoach pain but no couoghing today chest pain and cold headache swelling and itching, chest pain");
		$data_string = json_encode($data);
		var_dump($data_string);
		$ch = curl_init('https://api.infermedica.com/v2/parse');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'App-Id: 5f25c2a1', 'App-Key: 936abca73fe6854d917ddcf0c4693ac4', 'Dev-Mode: true',
		    'Content-Type: application/json'
		));
		var_dump($ch);
		$result = curl_exec($ch);
		if (FALSE === $result)
	        throw new Exception(curl_error($ch), curl_errno($ch));

		    // ...process $content now
		} catch(Exception $e) {

		    trigger_error(sprintf(
		        'Curl failed with error #%d: %s',
		        $e->getCode(), $e->getMessage()),
		        E_USER_ERROR);

		}
		var_dump($result);
		//$data = array("text" => "i feel smoach pain but no couoghing today chest pain and cold headache swelling and itching, chest pain");
		//$data_string = json_encode($data);
		//var_dump($data_string);
		/*try{	
		$ch = curl_init('https://healthcare-chatbot.herokuapp.com/');
		var_dump($ch);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		//	'App-Id: 5f25c2a1', 'App-Key: 936abca73fe6854d917ddcf0c4693ac4', 'Dev-Mode: true',
		 //   'Content-Type: application/json'
		//));
		//var_dump($ch);
		$result = curl_exec($ch);
		if (FALSE === $result)
	        throw new Exception(curl_error($ch), curl_errno($ch));

		    // ...process $content now
		} catch(Exception $e) {

		    trigger_error(sprintf(
		        'Curl failed with error #%d: %s',
		        $e->getCode(), $e->getMessage()),
		        E_USER_ERROR);

		}*/
		//var_dump($result);
		
	}


?>