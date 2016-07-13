<?php

require 'src/Instagram.php';
use MetzWeb\Instagram\Instagram;

// initialize class
$instagram = new Instagram(array(
  'apiKey'      => 'ddcbda4ee59f4ecbbf7fbe6a3a317062',
  'apiSecret'   => '34c79769fe8a4c71832f52c7919d464a',
  'apiCallback' => Yii::app()->getBaseUrl(true).'/Login/instagramSuccess' // must point to success.php
));
// create login URL
$loginUrl = $instagram->getLoginUrl();
print_r('<a class="login" href="'. $loginUrl.'">» Login with Instagram</a>');
exit;
//echo $loginUrl;

?>
