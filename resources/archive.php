<?php

$data = array("id" => $_GET['id']);

$url = curl_init("http://localhost/biosec/api/archive.php");

curl_setopt($url, CURLOPT_POSTFIELDS, $data);
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($url);
curl_close($url);

$resp = json_decode($response);
header("Location: ../employees.php?alert=$resp");
exit();