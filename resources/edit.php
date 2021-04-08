<?php

$data = array(
    "id" => $_POST['id'],
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "designation" => $_POST['designation'],
    "photo" => $_POST['photo']
);

$url = curl_init("http://localhost/biosec/api/update.php");

curl_setopt($url, CURLOPT_POSTFIELDS, $data);
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($url);
curl_close($url);

$resp = json_decode($response);
header("Location: ../update.php?alert=$resp");
exit();