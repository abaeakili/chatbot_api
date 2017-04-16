<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
		var_dump($_REQUEST);
		if($_POST["url"]=="parse") {
			try{
			$data = array("text" => $_POST["text"]);
			$data_string = json_encode($data);
			$ch = curl_init('https://api.infermedica.com/v2/parse');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'App-Id: 5f25c2a1', 'App-Key: 936abca73fe6854d917ddcf0c4693ac4', 'Dev-Mode: true',
			    'Content-Type: application/json'
			));
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
			echo $result;
		}

		// second api
		if($_POST["url"]=="diagnosis") {
			try{
				$data = array("sex" => $_POST["sex"], "age"=> $_POST["age"], "evidence" => array(array("id"=>"s_1193","choice_id"=>"present"),array("id"=>"s_488", "choice_id"=>"present"),array("id"=>"s_418","choice_id"=>"present") ));
				$data_string = json_encode($data);
				$ch = curl_init('https://api.infermedica.com/v2/diagnosis');
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'App-Id: 5f25c2a1', 'App-Key: 936abca73fe6854d917ddcf0c4693ac4', 'Dev-Mode: true',
				    'Content-Type: application/json'
				));
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
			echo $result;
		}

	}


?>