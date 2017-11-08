<?php
/**
 * Created by PhpStorm.
 * User: Dmitrij
 * Date: 08.11.2017
 * Time: 20:46
 */
$data_string = json_encode(array("login" => $_POST['login'], "password" => hash( "sha256",$_POST['password'])));

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://95.213.187.204/spbcup/regist.php");
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic ' . base64_encode("lin.dmitriy@ordotrans.ru:2IDBOa"),

    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
));
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_PORT, 6662);
curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
//$json = curl_exec($curl);
//var_dump($json);
//$object = json_decode($json);