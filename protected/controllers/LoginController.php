<?php
use MetzWeb\Instagram\Instagram;
class LoginController extends FrontCoreController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : email,password
	 * @author        : Nital Chauhan
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Check Login  User & Employer User.
	**/
	
	public function actionCheckLogin()
	{
	
		session_start();
				if(empty($_POST['txtEmail']) && !isset($_POST['txtEmail']) || empty($_POST['txtPassword']) && !isset($_POST['txtPassword'])){
					echo "Incorrect Username or Password Combination! Please try again.";
					
				}else{
					if(isset($_POST['txtEmail']) && isset($_POST['txtPassword']))
					{
					
						$Emailvalidation = UserDetail::model()->find("email = '".strtolower($_POST['txtEmail'])."' AND is_verify = '1'");
						if($Emailvalidation){
										//Check Login Data 
										$email = $_POST['txtEmail'];
										$password = md5($_POST['txtPassword']);
										$remeber = $_POST['chkRemember'];
										$model = UserDetail::model()->find("email = '".$email."' AND password = '".$password."'");
										if($model){
											
											$_SESSION['uid'] = $model->user_id;
											$_SESSION['email'] = $model->email;
											$_SESSION['username'] = $model->username;
											//p($_SESSION);
											$weddingcount=count(Wedding::model()->findAll("user_id='".$model->user_id."'"));
											$invite=count(InviteFriend::model()->findAll("invite_email='".$model->email."' AND is_block='0'"));
											//p($invite);
											if(($weddingcount==0) && ($invite==0))
											{
											// echo $weddingcount;
											 //echo $invite;
											  echo 2;
											}
											else {
											echo 1;
											}
											
										}else{
											echo 0;
										}
									}else{
										echo 0;
									}	
					}
				}

	}
		/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Binal Thakkar
	 * @created		  :	December 22 2014
	 * @Modified by	  :
	 * @Comment		  : facebook
	**/
	public function actionFacebook()
	{
			$this->FacebookRegistration();			
	}
	
	public function FacebookRegistration(){		
	session_start();	
		require 'facebook_api/src/facebook.php';  // Include facebook SDK file
		$facebook = new Facebook(array(
		  		'appId'  => '1569974543244216',   // Facebook App ID
		  		'secret' => '1bc9636aa465e84dfb001d07a5802567',  // Facebook App Secret
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
				}else{
							$login_url = $facebook->getLoginUrl(array( 'scope' => 'public_profile,email'));
										    header("Location: " . $login_url);// Permissions to request from the user  
				}
				//p($user);
		if(!empty($fbid) && !empty($fbfullname)){
				$result = UserDetail::model()->find("auth_id ='".$user_profile['id']."'");
				if(empty($result)){
					$userDetails = new UserDetail();
				if(isset($user_profile['name']) && !empty($user_profile['name'])){
					$userDetails->username = $user_profile['name'];
				}
				if(isset($user_profile['email']) && !empty($user_profile['email'])){
					$userDetails->email = strtolower($user_profile['email']);
				}
				// if(isset($user_profile['first_name']) && !empty($user_profile['first_name'])){
					// $userDetails->firstname = $user_profile['first_name'];
				// }
				// if(isset($user_profile['last_name']) && !empty($user_profile['last_name'])){
					// $userDetails->lastname = $user_profile['last_name'];
				// }
				if(isset($user_profile['first_name']) && !empty($user_profile['first_name'])){
					$userDetails->fullname = $user_profile['first_name']." ".$user_profile['last_name'];
				}
				
				if(isset($user_profile['id']) && !empty($user_profile['id'])){
					$userDetails->auth_id = $user_profile['id'];
					$userDetails->auth_provider = 'facebook';
					$userDetails->user_type = 'guest';
					$userDetails->is_verify = '1';
				}
				$userDetails->save(false);
				
			}
			if($result){
						$_SESSION['uid']=$result['user_id'];	
					}else{
						$_SESSION['uid']=$userDetails['user_id'];
					}	
			$_SESSION['authid']=$fbid;
			$_SESSION['username']=$fbfullname;
			$_SESSION['email']=$_SESSION['username'];
			
			$weddingcount=count(Wedding::model()->findAll("user_id='".$_SESSION['uid']."'"));
			$invite=count(InviteFriend::model()->findAll("invite_email='".$_SESSION['email']."' AND is_block='0'"));
			if(($weddingcount==0) && ($invite==0))
			{
			  $this->redirect(array('/wedding/Wedding/Wedding_Signup'));
			}
			$this->redirect(array('/'));
			
		}
	}
		/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Binal Thakkar
	 * @created		  :	December 23 2014
	 * @Modified by	  :
	 * @Comment		  : twitter
	**/
	public function actionTwitter(){
			$this->TwitterRegistration();		
	}
	
	public function TwitterRegistration(){
	session_start();
			$callback_URL=Yii::app()->getBaseUrl(true).'/Login/Twitter';
			define('CONSUMER_KEY', 'e8h0DKcUbWSSeiwkn0sdYZAwz');
			define('CONSUMER_SECRET', 'FkaiTabSdijxjPmzWV4hW0jsZWrbrLXHdDJfDanqzSZPc0nUqS');
			define('OAUTH_CALLBACK', $callback_URL);
			include_once("twitter_api/twitteroauth.php");
			
			if(isset($_REQUEST['oauth_token']) && $_SESSION['token']  !== $_REQUEST['oauth_token']) {
					session_destroy();
					$this->redirect(array('/'));
			}elseif(isset($_REQUEST['oauth_token']) && $_SESSION['token'] == $_REQUEST['oauth_token']) {
			
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['token'] , $_SESSION['token_secret']);
				$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
				
				if($connection->http_code=='200')
				{
						$result = UserDetail::model()->find("auth_id ='".$access_token['user_id']."'");
						if(empty($result)){
							$userDetails = new UserDetail();
							if(isset($access_token['screen_name']) && !empty($access_token['screen_name'])){
								$userDetails->username = $access_token['screen_name'];
							}
							if(isset($access_token['user_id']) && !empty($access_token['user_id'])){
								$userDetails->auth_id = $access_token['user_id'];
								$userDetails->auth_provider = 'twitter';
								$userDetails->user_type = 'guest';
								$userDetails->is_verify = '1';
							}
							$userDetails->save(false);
						}					
					if($result){
						$_SESSION['uid']=$result['user_id'];	
					}else{
						$_SESSION['uid']=$userDetails['user_id'];
					}	
					
					$_SESSION['status'] = 'verified';
					$_SESSION['request_vars'] = $access_token;
					$_SESSION['username']=$access_token['screen_name'];
					$_SESSION['email']=$access_token['screen_name'];
					$_SESSION['authid']=$access_token['user_id'];
			
					unset($_SESSION['token']);
					unset($_SESSION['token_secret']);
					$weddingcount=count(Wedding::model()->findAll("user_id='".$_SESSION['uid']."'"));
					$invite=count(InviteFriend::model()->findAll("invite_email='".$_SESSION['email']."' AND is_block='0'"));
					if(($weddingcount==0) && ($invite==0))
					{
					  $this->redirect(array('/wedding/Wedding/Wedding_Signup'));
					}
					$this->redirect(array('/'));
				}else{
					die("error, try again later!");
				}
					
			}else{
			
				if(isset($_GET["denied"]))
				{
					$this->redirect(array('/'));
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
	}
	
		/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Binal Thakkar
	 * @created		  :	December 23 2014
	 * @Modified by	  :
	 * @Comment		  : Instagram
	**/
	public function actionInstagramSuccess()
	{
			$code = $_GET['code'];
			//$this->render('instagramSuccess',array('code'=>$code));
			
			$this->InstagramRegistration($code);		
	}
	
	public function InstagramRegistration($code){
		require 'instagram_api/Instagram.php';
	
		$instagram = new Instagram(array(
	  		'apiKey'      => 'ddcbda4ee59f4ecbbf7fbe6a3a317062',
	  		'apiSecret'   => '34c79769fe8a4c71832f52c7919d464a',
	  		'apiCallback' => Yii::app()->getBaseUrl(true).'/Login/InstagramSuccess' // must point to success.php
		));	
		
		if (isset($code)) {
			session_start();
		  	$data = $instagram->getOAuthToken($code);
			$result = UserDetail::model()->find("auth_id ='".$data->user->id."'");
						if(empty($result)){
							$userDetails = new UserDetail();
							if(isset($data->user->username) && !empty($data->user->username)){
								$userDetails->username = $data->user->username;
							}
							if(isset($data->user->id) && !empty($data->user->id)){
								$userDetails->auth_id = $data->user->id;
								$userDetails->auth_provider = 'instagram';
								$userDetails->user_type = 'guest';
								$userDetails->is_verify = '1';
							}
							$userDetails->save(false);
						}
			if($result){
					$_SESSION['uid']=$result['user_id'];	
			}else{
				$_SESSION['uid']=$userDetails['user_id'];
			}						
		  	$_SESSION['username']= $data->user->username;
		  	$_SESSION['authid']=$data->user->id;
		  	$_SESSION['website']= $data->user->website;
			$weddingcount=count(Wedding::model()->findAll("user_id='".$_SESSION['uid']."'"));
			if($weddingcount==0)
			{
			  $this->redirect(array('/wedding/Wedding/Wedding_Signup'));
			}
		  	$this->redirect(array('/'));
		} 
	}	
	
	/**
	 * @Method		  :	POST
	 * @Params		  : email
	 * @author        : Binal Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Forgot Password  User & Employer User.
	**/
	
	public function actionForgotPassword()
	{
	
		session_start();
		if(isset($_POST['type']) && $_POST['type']== ""){
				// Change Password
				if(empty($_POST['txtEmail']) && !isset($_POST['txtEmail']))
				{
					echo "Incorrect Username ! Please try again.";
					
				}else{
					if(isset($_POST['txtEmail']) && isset($_POST['type']) && $_POST['type'] == "")
					{
					
						$Emailvalidation = Detail::model()->find("email = '".strtolower($_POST['txtEmail'])."'");
						if($Emailvalidation){
								$new_pass =  $this->random_string(9); 
								$id = $Emailvalidation['_id'];
								$model = $this->loadModel($id,'Detail');
								$model->password = md5($new_pass);
								$username = $model->first_name." ".$model->last_name;
										if($model->save(false)){
											$this->sendForgotPasswordMail($model->email,$new_pass,$username);
											echo 1;
										}else{
										echo 0;
											}	
							}else{
									echo 0;
								}	
					}
				}
				//End Change Password
		}else{
				
					//Employer Change Password
				if(empty($_POST['txtEmployerEmail']) && !isset($_POST['txtEmployerEmail']))
				{
					echo "Incorrect Username! Please try again.";
				}else{
					if(isset($_POST['txtEmployerEmail']) && isset($_POST['type']) && $_POST['type'] == "employer"){
						$Emailvalidation = EmployerDetail::model()->find("email = '".strtolower($_POST['txtEmployerEmail'])."'");
							if($Emailvalidation){
								$new_pass =  $this->random_string(9); 
								$id = $Emailvalidation['employer_id'];
								$model = $this->loadModel($id,'EmployerDetail');
								$model->password = md5($new_pass);
								$username = $model->first_name." ".$model->last_name;
										if($model->save(false)){
											$this->sendForgotPasswordMail($model->email,$new_pass,$username);
											echo 1;
										}else{
										echo 0;
											}	
							}else{
									echo 0;
								}							
					 }
				}
		}

		
	}

	/**
	 * @Method		  :	Forgot Password Mail Sent To User  
	 * @Params		  : email.
	 * @author        : Binal Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Send Mail To Client For Forgot Password Web Services.
	**/
	
	public function sendForgotPasswordMail($email,$newpassword,$username)
	{
			$to = $email;
			$subject = "Yacht Project Forgot Password Request";
			$txt = "Dear $username,\r\n\n";
			$txt .= "Your Password has been reset.\r\n\n";
			$txt .= "Email :: $email \r\n" ;
			$txt .= "NewPassword :: $newpassword" ;
			$headers = "yacht@gmail.com";
				
			mail($to,$subject,$txt,"From: $headers");
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : logout
	**/
	public function actionLogout()
	{
		session_start();
		unset($_SESSION['authid']);
		unset($_SESSION['uid']);
		unset($_SESSION['wedding_id']);
		unset($_SESSION['fname']);
		unset($_SESSION['lname']);
		unset($_SESSION['email']);
		unset($_SESSION['type']);
		unset($_SESSION['status']);
		unset($_SESSION['request_vars']);
		unset($_SESSION['username']);
		unset($_SESSION['website']);
		unset($_SESSION['wedding_uniq_id']);
		unset($_SESSION['make_admin']);
		unset($_SESSION['is_block']);
		//session_destroy();
		
		setcookie("yt__data","",time()-3600*24*24,'/');
		setcookie("yt_employer_data","",time()-3600*24*24,'/');
	}
	public function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));
	
	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	
	    return $key;
	}	
}