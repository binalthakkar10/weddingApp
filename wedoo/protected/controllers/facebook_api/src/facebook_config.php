<?php
include "facebook.php";
$app_id = ("721635691240010");
$app_secret = ("9a6784c19646e67ede05c6fe8a8bc231");
//$app_namespace = getenv("letsnurture_app");
//$app_url = 'https://apps.facebook.com/' . $app_namespace . '/';
//$scope = 'email,publish_actions';
 
// Init the Facebook SDK
$facebook = new Facebook(array(
    'appId'  => $app_id,
    'secret' => $app_secret,
));