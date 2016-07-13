<?php
session_start();
$callback_URL=Yii::app()->getBaseUrl(true).'/Login/Twitter';
define('CONSUMER_KEY', 'e8h0DKcUbWSSeiwkn0sdYZAwz');
define('CONSUMER_SECRET', 'FkaiTabSdijxjPmzWV4hW0jsZWrbrLXHdDJfDanqzSZPc0nUqS');
define('OAUTH_CALLBACK', $callback_URL);
include_once("inc/twitteroauth.php");

if (isset($_REQUEST['oauth_token']) && $_SESSION['token']  !== $_REQUEST['oauth_token']) {

	session_destroy();
	header('Location: ./index.php');
	
}elseif(isset($_REQUEST['oauth_token']) && $_SESSION['token'] == $_REQUEST['oauth_token']) {

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	if($connection->http_code=='200')
	{
		$_SESSION['status'] = 'verified';
		$_SESSION['request_vars'] = $access_token;
		$_SESSION['username']=$access_token['screen_name'];
		$_SESSION['authid']=$access_token['user_id'];

		unset($_SESSION['token']);
		unset($_SESSION['token_secret']);
		$this->redirect(array('/'));
		header('Location: ./index.php');
	}else{
		die("error, try again later!");
	}
		
}else{

	if(isset($_GET["denied"]))
	{
		header('Location: ./index.php');
		die();
	}

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
	
	$_SESSION['token'] 			= $request_token['oauth_token'];
	$_SESSION['token_secret'] 	= $request_token['oauth_token_secret'];

	if($connection->http_code=='200')
	{
		$twitter_url = $connection->getAuthorizeURL($request_token['oauth_token']);
		header('Location: ' . $twitter_url); 
	}else{
		die("error connecting to twitter! try again later!");
	}
}
?>

