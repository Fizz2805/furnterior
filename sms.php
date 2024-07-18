<?php

$api_key="923404104346-deade160-5601-4629-bae9-c6191508921e";///YOUR API KEY
$mobile = "923001234567";///Recepient Mobile Number
$sender = "Furnterior";
$template_id='9796';

$message = array("name" => "Umair", "pin" => "667543");
$message = json_encode($message);

////sending sms
$post = "api_key=923404104346-deade160-5601-4629-bae9-c6191508921e&sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."&template_id=".$template_id."";
$url = "https://sendpk.com/api/sms.php";
$ch = curl_init();
$timeout = 10; // set to zero for no timeout
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$result = curl_exec($ch); 
/*Print Responce*/
echo $result; 

?>