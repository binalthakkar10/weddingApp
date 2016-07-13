
<?php
session_start();	
	require 'facebook_api/src/facebook.php';  // Include facebook SDK file
	$facebook = new Facebook(array(
	  'appId'  => '1041501029199975',   // Facebook App ID
	  'secret' => '02dc52ffbd3d6a41a668260bc54c375b',  // Facebook App Secret
	  'cookie' => true,    
	));
	
	$user = $facebook->getUser();
	if ($user) {
				  try {
				    $user_profile = $facebook->api('/me');
							//print_r($user_profile);
							
				          $fbid = $user_profile['id'];           
				        $fbfullname = $user_profile['name'];  
						$email = $user_profile['email'];   
						
				  } catch (FacebookApiException $e) {
				    error_log($e);
				   $user = null;
				  }
	}
if ($user) {
			  $logoutUrl = $facebook->getLogoutUrl(array(
			         'next' => 'http://demos.krizna.com/1353/logout.php',  // Logout URL full path
			        ));
	} else {
				$login_url = $facebook->getLoginUrl(array( 'scope' => 'public_profile,email'));
							    header("Location: " . $login_url);// Permissions to request from the user
	       
	}

if(!empty($fbid) && !empty($fbfullname)){
	
	$_SESSION['authid']=$fbid;
	$_SESSION['username']=$fbfullname;
	$_SESSION['email']=$email;
	$this->redirect(array('/'));
	
}
?>
