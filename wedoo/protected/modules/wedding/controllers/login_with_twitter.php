<?php
/*
 * login_with_twitter.php
 *
 * @(#) $Id: login_with_twitter.php,v 1.8 2014/11/14 10:37:51 mlemos Exp $
 *
 */

	/*
	 *  Get the http.php file from http://www.phpclasses.org/httpclient
	 */
	require('http.php');
	require('oauth_client.php');

	$client = new oauth_client_class;
	$client->debug = false;
	$client->debug_http = true;
	$client->server = 'Twitter';
	$client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
	dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_twitter.php';

	//error_reporting(0);
	/*
	 * Uncomment the next line if you want to use
	 * the pin based authorization flow
	 */
	// $client->redirect_uri = 'oob';

	/*
	 * Was this script included defining the pin the
	 * user entered to authorize the API access?
	 */
	if(defined('OAUTH_PIN'))
		$client->pin = OAUTH_PIN;

	$client->client_id = 'NT5OK03fsAjVrjWaZSyxTCbBb'; $application_line = __LINE__;
	$client->client_secret = '2HBXCmQisQhOXf30Rp2JBCZFIwyVkKCdZBDnJEVOtDOMQ8d3sK';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to Twitter Apps page https://dev.twitter.com/apps/new , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri.' If you want to post to '.
			'the user timeline, make sure the application you create has write permissions');

	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{
				$success = $client->CallAPI(
					'https://api.twitter.com/1.1/friends/list.json', 
					'GET', array(), array('FailOnAccessError'=>true), $user);

/*
				$values = array(
					'status'=>str_repeat('x', 140)
				);
				$success = $client->CallAPI(
					'https://api.twitter.com/1.1/statuses/update.json', 
					'POST', $values, array('FailOnAccessError'=>true), $update);
				if(!$success)
					error_log(print_r($update->errors[0]->code, 1));
*/

/* Tweet with an attached image
				$success = $client->CallAPI(
					"https://api.twitter.com/1.1/statuses/update_with_media.json",
					'POST', array(
						'status'=>'This is a test tweet to evaluate the PHP OAuth API support to upload image files sent at '.strftime("%Y-%m-%d %H:%M:%S"),
						'media[]'=>'php-oauth.png'
					),array(
						'FailOnAccessError'=>true,
						'Files'=>array(
							'media[]'=>array(
							)
						)
					), $upload);
*/
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if($success)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Twitter OAuth client results</title>
</head>
<body>
<?php
	if(isset($_POST['logout']))
	{	
		echo '<h1>', HtmlSpecialChars($user->name), 
			' you have logged out from twitter!..</h1>';
		$client->ResetAccessToken();
		session_unset();
		setcookie("auth_token","", "/", "http://www.twitter.com", 1);
	}
	else
	{
		//echo '<h1>', HtmlSpecialChars($user->name), 
			' you have logged in successfully with Twitter!</h1>';
		//echo '<pre>', HtmlSpecialChars(print_r($user, 1)), '</pre>';
		/*echo '<table border="0">
				
				<tr><td><img src="'.$user->profile_image_url.'" width=100 height=100></td></tr>
				<tr><td>ID: </td><td>'.$user->id.'</td></tr>
				<tr><td>Name: </td><td>'.$user->name.'</td></tr>
				<tr><td>Screen_Name: </td><td>'.$user->screen_name.'</td></tr>
				<tr><td>Followers: </td><td>'.$user->followers_count.'</td></tr>
				<tr><td>Friends: </td><td>'.$user->friends_count.'</td></tr>
		
		
		</table>';*/
		//echo '<pre>', HtmlSpecialChars(print_r($user, 1)), '</pre>';
		// echo "<pre>";
		// print_r($user);
		// $len=count($user);
        // echo "</pre>";	exit;	
		$i=0;
		$array =  (array) $user;
		echo "<pre>";
		//print_r($array['users']);
		 foreach($array['users'] as $key)
		 {
		  // print_r($key->profile_image_url);exit;
		   $img=$key->profile_image_url
?>
        <img src="<?php echo $img; ?>">
<?php		   
		  // echo $key->id."<br />";		
		  }
		echo '<pre>'.print_r($_COOKIE).'</pre>';
		
		
		echo '<form name="logout" action="" method="post">
		<input type="submit" name="logout" value="logout"> 
		</form>';
	}
?>

</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<pre>Error: <?php echo HtmlSpecialChars($client->error); ?></pre>

</body>
</html>
<?php
	}

?>