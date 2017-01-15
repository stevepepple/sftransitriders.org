<?php

$ch = curl_init();
 
//set the endpoint url
curl_setopt($ch,CURLOPT_URL, 'https://api.twitter.com/oauth2/token');
// has to be a post
curl_setopt($ch,CURLOPT_POST, true);
$data = array();
$data['grant_type'] = "client_credentials";
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
 
// here's where you supply the Consumer Key / Secret from your app:
$consumerKey = 'mL3XUK3nS7oG8G83VLYTZwp3T';
$consumerSecret = '8FVhXvan7381wuB3o4PKaYg28eClBSFjkoIPrCbWfgoco4ID4H';           
curl_setopt($ch,CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
 
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
 
//execute post
$result = curl_exec($ch);
 
//close connection
curl_close($ch);
 
// show the result, including the bearer token (or you could parse it and stick it in a DB)       
print_r($result);

// AAAAAAAAAAAAAAAAAAAAALMNdwAAAAAA99FdRu5rJCjLwoqGDauThMMcP9w%3DxTYHAorjOH4vMMNte0jAAPaIbXW6dyZVhcrh8lVsgwncRizQgV

?>