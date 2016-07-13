<?php

require 'src/Instagram.php';
use MetzWeb\Instagram\Instagram;

$instagram = new Instagram(array(
  'apiKey'      => 'ddcbda4ee59f4ecbbf7fbe6a3a317062',
  'apiSecret'   => '34c79769fe8a4c71832f52c7919d464a',
  'apiCallback' => Yii::app()->getBaseUrl(true).'/Login/InstagramSuccess' // must point to success.php
));

if (isset($code)) {
session_start();
  $data = $instagram->getOAuthToken($code);
  $_SESSION['username']= $data->user->username;
  $_SESSION['authid']=$data->user->id;
  $_SESSION['website']= $data->user->website;
  $this->redirect(array('/User/Dashboard'));


} 

?>
