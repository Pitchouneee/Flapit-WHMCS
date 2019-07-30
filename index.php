<?php
//Execution de la requete pour recupérer le nombre de tickets en attente
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://yourDomainNameWHMCS/includes/api.php');
//curl_setopt($ch, CURLOPT_HTTPGET, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
	http_build_query(
		array(
			'action' => 'GetTicketCounts',
			// See https://developers.whmcs.com/api/authentication
			'username' => 'yourApiKeyUsername',
			'password' => 'yourApiKeyPasswor',
			'ignoreDepartmentAssignments' => false,
            'includeCountsByStatus' => true,
            'responsetype' => 'json'
		)
	)
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

//On parse le Json
$parsedJson = json_decode($response);
//On récupère la valeur dans awaitingReply
$nbAwaitingReply = $parsedJson->{'allActive'};

//Requête pour afficher en direct sur Flapit
$data = array("device_id" => ["yourFlapitDeviceId"], "token" => "yourToken", "message" => "SAV_".$nbAwaitingReply);
$header = array('Content-Type: application/json');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.flapit.com/control/device");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$result = curl_exec($ch);
curl_close($ch);