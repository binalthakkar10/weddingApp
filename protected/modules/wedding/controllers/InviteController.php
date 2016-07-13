<?php
class InviteController extends FrontCoreController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
		),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
		),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
			echo $error['message'];
			else
			$this->render('error', $error);
		}
	}
	public function actionInvite_guest(){
	   session_start();
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		   $invite=count(InviteFriend::model()->findAll("(wedding_uniq_id='".$_SESSION['wedding_uniq_id']."') AND (invite_email='".$_SESSION['email']."') AND (is_block='0')"));  
		  $data=InviteFriend::model()->findAll("register_email_flag='No' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'");
		   $data1=InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'");
		   $twitterData=InviteFriend::model()->findAll("register_email_flag='No' AND invite_type='Twitter' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'");
		  // p($data1);
		   $total_guest=count($data1);
		   //echo $total_guest;exit;
		   $register=InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'");
		   $admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));	  
		  $total_register=count($register);
		   $blocked=InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='1' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'");
		   $total_blocked=count($blocked);
			//p($data);
			$this->render('invite',array("data"=>$data,"register"=>$register,"blocked"=>$blocked,"total_guest"=>$total_guest,"total_register"=>$total_register,"total_blocked"=>$total_blocked,"twitterData"=>$twitterData,"invite"=>$invite,"admin"=>$admin));
	   }
       else {
	       $this->redirect(array('/Index/'));
        }	   
	}
	public function actioninvite_yahoo(){
		$this->render('yahoo');
	}
	public function actioninvite_google(){
	session_start();
		if($_GET['code']){
			$clientid	=	'184063824516-71gkj2rlps362875khh4b1d9putvvmev.apps.googleusercontent.com';
			$clientsecret	=	'6fNsryVv9orKXuAi3zS1QQnI';
			$redirecturi	=	'http://www.letsnurture.co.uk/demo/wedoo/wedding/invite/Invite_guest'; //Add your redirect URl	
			$maxresults	=	 50;
			$authcode		= $_GET["code"];
			$fields=array(
			'code'=>  urlencode($authcode),
			'client_id'=>  urlencode($clientid),
			'client_secret'=>  urlencode($clientsecret),
			'redirect_uri'=>  urlencode($redirecturi),
			'grant_type'=>  urlencode('authorization_code') );
			$fields_string = '';
			foreach($fields as $key=>$value){ $fields_string .= $key.'='.$value.'&'; }
			$fields_string	=	rtrim($fields_string,'&');
			//open connection
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token'); //set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_POST,5);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //to trust any ssl certificates
			$result = curl_exec($ch); //execute post
			curl_close($ch); //close connection
			//extracting access_token from response string
			
			$response   =  json_decode($result);
			$accesstoken = $response->access_token;
			if( $accesstoken!='')
			$_SESSION['token']= $accesstoken;
			//passing accesstoken to obtain contact details
			$xmlresponse=  file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);
			//reading xml using SimpleXML
			$xml=  new SimpleXMLElement($xmlresponse);
			$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
			$result = $xml->xpath('//gd:email');
			$count = 0;
			
			$googleFriends= ""; 
			$googleFriends = '<ul>';
			foreach ($result as $title) {
			$name=$title->attributes()->address;
			$qry=InviteFriend::model()->find("invite_email='".$name."' AND user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'");
				$count++;
				$name1=preg_replace('/[^A-Za-z0-9\-\(\) ]/', '', $title->attributes()->address);
				if(empty($qry)) {
				$googleFriends .='<li>
								<div  class="frnd_list">'.$title->attributes()->address.'</div>
								<a href="javascript:void(0);" onclick="send_gmail(\''.$title->attributes()->address.'\',\''.$name1.'\');" class="'.$name1.'"> Invite </a>
								</li>';
				}
                else {
				           $googleFriends .='<li>
								<div  class="frnd_list">'.$title->attributes()->address.'</div>
								<a href="javascript:void(0);" style="color:blue;" class="'.$name1.'"> Invite </a>
								</li>';
                     }				
			} 
			$googleFriends .='</ul>';
			echo $googleFriends;	
			//$this->render('google');
			}
	}
	public function actionTwitterAunthentication(){
		require('oauth_client.php');
        $twitterFriends= "";
		$client = new oauth_client_class;
		$client->debug = false;
		$client->debug_http = true;
		$client->server = 'Twitter';
		//$client->redirect_uri =  Yii::app()->getBaseUrl(true).'/wedding/Invite/twitter_invite';		
		if(defined('OAUTH_PIN'))
			$client->pin = OAUTH_PIN;

		$client->client_id = 'z4XejprbG6h0JE35UiQws1axj'; $application_line = __LINE__;
		$client->client_secret = 'vG2ep6P0L3i5vqxP6VTRDbAmZQpVYV7Xa2fHuE7TPvgQG7NOGm';

		if(strlen($client->client_id) == 0
		|| strlen($client->client_secret) == 0)
			die('Please go to Twitter Apps page https://dev.twitter.com/apps/new , '.
				'create an application, and in the line '.$application_line.
				' set the client_id to Consumer key and client_secret with Consumer secret. '.
				'The Callback URL must be '.$client->redirect_uri.' If you want to post to '.
				'the user timeline, make sure the application you create has write permissions');

		if(($success = $client->Initialize())){
			if(($success = $client->Process())){
				if(strlen($client->access_token)){
					$success = $client->CallAPI(
						'https://api.twitter.com/1.1/friends/list.json', 
						'GET', array(), array('FailOnAccessError'=>true), $user);
				}
			}
			$success = $client->Finalize($success);
		}
			if($client->exit)
				exit;
			if($success){
			?> 
			<script type="text/javascript">
			window.close();
			</script>
			<?php
			}
	}
	public function actiontwitter_invite()
	{
	  // require_once(login_with_twitter.php);
		require('oauth_client.php');
        $twitterFriends= "";
		$client = new oauth_client_class;
		$client->debug = false;
		$client->debug_http = true;
		$client->server = 'Twitter';
		$client->redirect_uri =  Yii::app()->getBaseUrl(true).'/wedding/Invite/twitter_invite';

		
		if(defined('OAUTH_PIN'))
			$client->pin = OAUTH_PIN;

		$client->client_id = 'z4XejprbG6h0JE35UiQws1axj'; $application_line = __LINE__;
		$client->client_secret = 'vG2ep6P0L3i5vqxP6VTRDbAmZQpVYV7Xa2fHuE7TPvgQG7NOGm';

		if(strlen($client->client_id) == 0
		|| strlen($client->client_secret) == 0)
			die('Please go to Twitter Apps page https://dev.twitter.com/apps/new , '.
				'create an application, and in the line '.$application_line.
				' set the client_id to Consumer key and client_secret with Consumer secret. '.
				'The Callback URL must be '.$client->redirect_uri.' If you want to post to '.
				'the user timeline, make sure the application you create has write permissions');

		if(($success = $client->Initialize())){
			if(($success = $client->Process())){
				if(strlen($client->access_token)){
					$success = $client->CallAPI(
						'https://api.twitter.com/1.1/friends/list.json', 
						'GET', array(), array('FailOnAccessError'=>true), $user);
				}
			}
			$success = $client->Finalize($success);
		}
			if($client->exit)
				exit;
			if($success){
				if(isset($_POST['logout'])){	
					echo '<h1>', HtmlSpecialChars($user->name), 
						' you have logged out from twitter!..</h1>';
					$client->ResetAccessToken();
					session_unset();
					setcookie("auth_token","", "/", "http://www.twitter.com", 1);
				}else{	
					$i=0;
					$array =  (array) $user;
					 foreach($array['users'] as $key){
					   $img = $key->profile_image_url;
					   $screenName = $key->screen_name;	
					   $id = $key->id;
					   $qry=InviteFriend::model()->find("invite_email='".$key->screen_name."' AND wedding_id='".$_SESSION['wedding_id']."'");
						if(empty($qry)) {
						$twitterFriends.= '<ul  class="fb_frnds"><li>
						<img src="'.$img.'" width="30" height="30"/>
						<div  class="frnd_list">'.$screenName.'
						</div>
						<a href="javascript:void(0);" onclick="send_twitter('.$id.',\''.$screenName.'\');" class="'.$id.' facebook_invite"> Invite </a>
						</li></ul>';
						}
						else {
						      $twitterFriends.= '<ul  class="fb_frnds"><li>
						<img src="'.$img.'" width="30" height="30"/>
						<div  class="frnd_list">'.$screenName.'
						</div>
						<a href="javascript:void(0);" style="color:blue;"  class="'.$id.' facebook_invite"> Invite </a>
						</li></ul>';
						}
							   	
					  }
					
				}
			}
			echo $twitterFriends;
            			
	}
	public function actiontwitter(){
	
	$this->render('twitter');
	}
	
	public function actionfacebook_invite(){
		session_start();
		 $appID='341270709343143';
		 $appSecret='2409b1178117ff8183c5bc83e442b568';
		// $appID='1041501029199975';
		// $appSecret='02dc52ffbd3d6a41a668260bc54c375b';
		require 'lib/facebook/facebook.php';
		
		$facebook = new Facebook(array(
				'appId'		=>  $appID,
				'secret'	=> $appSecret,
				));
		//get the user facebook id	
			
		$user = $facebook->getUser();
		//p($user);
		
		
		if($user){
			try{ 
				//get the facebook friends list
				$user_friends = $facebook->api('/me/friends');
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}
		//p($user_friends);
		/*<a href="javascript:void(0);" onclick="fb_logout();">Logout</a> */
			if(isset($user_friends)){ //p($user_friends); 
			$fbFriends= ""; 
			$fbFriends = '<ul  class="fb_frnds">';
				foreach($user_friends['data'] as $user_friend){
					$idName= $user_friend['id'].','.$user_friend['name'];
					$name=mysql_escape_string($user_friend['name']);
					$qry=InviteFriend::model()->find("invite_email='".$name."' AND wedding_id='".$_SESSION['wedding_id']."'");
			if(empty($qry)) {		
			$fbFriends.= '<li>
			<img src="https://graph.facebook.com/'.$user_friend['id'].'/picture"/>
			<div  class="frnd_list">'.$user_friend['name'].'
			</div>
			<a href="javascript:void(0);" onclick="send_invitation('.$user_friend['id'].',\''.$user_friend['name'].'\');" class="'.$user_friend['id'].' facebook_invite"> Invite </a>
			</li>';
			}
			  else
			  {
			     $fbFriends.= '<li>
			<img src="https://graph.facebook.com/'.$user_friend['id'].'/picture"/>
			<div  class="frnd_list">'.$user_friend['name'].'
			</div>
			<a href="javascript:void(0);" style="color:blue;" class="'.$user_friend['id'].' facebook_invite"> Invite </a>
			</li>';
			  }
			 }  
			$fbFriends.='</ul>';
			
			}else{
				
			$fbFriends = header('Location: '.$base_url);	
			}
			
			echo $fbFriends;
			?>
			<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"> </script>
			
			<script type="text/javascript">
			FB.init({ 
			       appId:'<?php echo $appID; ?>', cookie:true, 
			       status:true, xfbml:true 
			     });
			function fb_logout(){
				FB.logout(function(response) {
					  parent.location ='<?php echo CController::createURL('invite/invite_guest') ?>';
			});
				
			}
			</script> 
			<?php
		//$this->render('facebook_invite');
	}
	 public function actioninsert_facebook(){
	 
			$model=new InviteFriend();
			 if($_POST){
			 session_start();
			 $query=InviteFriend::model()->find("invite_email='".$_POST['name']."' AND user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'");
			 if(empty($query)){
				   session_start();
					 $model->user_id=$_SESSION['uid'];;
					 $model->invite_type="Facebook";
					 $model->invite_email=$_POST['name'];
					 $model->wedding_id=$_SESSION['wedding_id'];
					 $model->wedding_uniq_id=$_SESSION['wedding_uniq_id'];
					 $model->register_email_flag="No";
					 $model->make_admin="No";
					 $model->field2=$_POST['fb_frnd_id'];
					 $model->remove_user="No";
					 $model->created_at=date('Y-m-d h:m:s');
					 $model->status="1";
					 if($model->save(false)){
					    $insert_id = Yii::app()->db->getLastInsertID();
						$qry=InviteFriend::model()->find("invite_id='".$insert_id."'");
						$final_response=array();
						$data1=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
						$admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
						//  echo "1";
						$checked="false";
                         if($qry->make_admin=='Yes') {
						   $checked="true";
						 }
						 else
						 {
						   $checked="false";
						 }
                         $res='<tr class='.$qry->invite_id.'>
									
								<td>
										
										<a class="list-mail-id" href="#">'.$qry->invite_email.'</a>
									</td>
									<td>
										<label class="label_radio" for="radio-'.$qry->invite_id.'">
											<i class="fa fa-check-square-o"></i>
											<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$checked.'>
										</label>
									</td>
									<td>
										<label class="label_radio">
											<i class="fa fa-check-square-o"></i>
											<input name="sample-radio-0"  onclick="deleteadmin('.$qry->invite_id.');" value="'.$qry->invite_id.'" type="radio">
										</label>
									</td>
												
                        </tr>';
                    
						
					 }
					  $final_response[]=$res;
					  $final_response[]=$data1;
					  $final_response[]=$admin;
					   echo json_encode($final_response);
					 // else{
						 // echo "0";
					 // }
			 }
	    }
	       // echo "insert facebook";exit;
	}
	
	public function actioninsert_twitter()
	{
     //p($_POST);
	ini_set('display_errors', 1);
	require_once('TwitterAPIExchange.php');

	$settings = array(
	'oauth_access_token' => "2275809991-NBWMNeLr0TZa5D9r2CyloAWIIkb4O1GJGx3Pwzi",
	'oauth_access_token_secret' => "4AbU1hgtWzHIRC6IRM7BuSU8yKS2TtsdgP927U7aoYgsq",
	'consumer_key' => "z4XejprbG6h0JE35UiQws1axj",
	'consumer_secret' => "vG2ep6P0L3i5vqxP6VTRDbAmZQpVYV7Xa2fHuE7TPvgQG7NOGm"
	);
	$url = "https://api.twitter.com/1.1/statuses/update.json";
	 
	$requestMethod = 'POST'; 
	
	  if($_POST)
	  {
	      session_start();
		   $check1=$_POST['check1'];
		   $message=$_POST['message'];
		   $name=$_POST['name'];
		   // for($i=0;$i<count($check1);$i++)
		   // { 
				   
		         $model=new InviteFriend();
				 $model->user_id=$_SESSION['uid'];
				 $model->wedding_id=$_SESSION['wedding_id'];
				 $model->wedding_uniq_id=$_SESSION['wedding_uniq_id'];
				 $model->invite_type="Twitter";
				 $model->invite_email=$name;
				 $model->register_email_flag="No";
				 $model->make_admin="No";
				 $model->remove_user="No";
				 $model->field2=$_POST['id'];
				 $model->created_at=date('Y-m-d h:m:s');
				 $model->status="1";
				 if($model->save(false))
				 { 
				   $postfields = array(
					//'status' => 'Testing Twitter how are you #ankitms9100'
					'status' => "@$name Hello "
				);
	 
			$twitter = new TwitterAPIExchange($settings);
			 
			$response = $twitter->buildOauth($url, $requestMethod)
							   ->setPostfields($postfields)
							   ->performRequest();
				  $insert_id = Yii::app()->db->getLastInsertID();
				  $qry=InviteFriend::model()->find("invite_id='".$insert_id."'");

					  $data1=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
					  $admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
					  $check="false";
					  if($qry->make_admin=='Yes') {  $check="true";  } else { $check="false";} 
				$res =	'<tr class='.$qry->invite_id.'>
					
						<td>
								<!--<span class="list-name">Brandon J. Daniels</span>-->
								<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
							</td>
							<td>
								<label class="label_radio" for="radio-'.$qry->invite_id.'">
									<i class="fa fa-check-square-o"></i>
									<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
								</label>
							</td>
							<td>
								<label class="label_radio">
									<i class="fa fa-check-square-o"></i>
									<input   onclick="deleteadmin('.$insert_id.');" value="'.$qry->invite_id.'" type="radio">
								</label>
							</td>
								
					</tr>';
					$user_status=0;
					$final['body']=$res;
					$final['status']=$user_status;
					$final['datacount']=$data1;
					$final['class']=$qry->field2;
					$final['class']=$qry->field2;
					$final['admin']=$admin;
					//$final['emailcount']=count($user_email);
					$final_response[] = $final;
										   
				 }
				  
		  // }
		   echo json_encode($final_response);
	  }
	}
	
	public function actionbyemail()
	{
	   
	   $data=InviteFriend::model()->findAll();
	   //p($data);
	   $this->render('byemail',array('data'=>$data));
	}
	
	public function actioninsert_other()
	{
	   //p($_POST['user_email']);
	     
		if($_POST)
		   {
				   session_start();
				   $user_email=array();
				   $user_email=$_POST['user_email'];
				   $final_response =array();
				   for($i=0;$i<count($user_email);$i=$i+1)
				   { 
				         $register_email_flag="No";
			      
						  $user=UserDetail::model()->find("email='".$user_email[$i]."'");
						  if(!empty($user)){
							 $register_email_flag="Yes";
						  }
				        //$query=InviteFriend::model()->find("invite_email='".$check[$i]."'");
                         $query=InviteFriend::model()->find("invite_email='".$user_email[$i]."' AND wedding_id='".$_SESSION['wedding_id']."'");
                         if(empty($query))
                        {						 
						 $model=new InviteFriend();
						 $model->user_id=$_SESSION['uid'];
						 $model->invite_type="Other";
						 $model->wedding_id=$_SESSION['wedding_id'];
						 $model->wedding_uniq_id=$_SESSION['wedding_uniq_id'];
						 $model->invite_email=$user_email[$i];
						 $model->register_email_flag=$register_email_flag;
						 $model->make_admin="No";
						 $model->field2=preg_replace('/[^A-Za-z0-9\-\(\) ]/', '', $user_email[$i]);
						 $model->remove_user="No";
						 $model->created_at=date('Y-m-d h:m:s');
						 $model->status="1";
						      if($model->save(false))
							  {
									$to = $user_email[$i];
									//SEND YOUR MAIL
									$subject = "Wedoo Project invitation";
									$message =  "Wedoo invitation";

									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
									$msg=$this->Invitemailtempleate($to,$message);
									$mailStatus=mail($to,$subject,$msg,$headers);
									$insert_id = Yii::app()->db->getLastInsertID();
									$qry=InviteFriend::model()->find("invite_id='".$insert_id."'");
									//p($qry);
									  if(!empty($user)){
									    $data1=count(InviteFriend::model()->findAll("wedding_id='".$_SESSION['wedding_id']."' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
									    $register=count(InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
                                        									
									// $final_response =array();
									  $check="false";
								      if($qry->make_admin=='Yes') {  $check="true";  } else { $check="false";} 
								$res =	'<tr class='.$qry->invite_id.'>
									
										<td>
												<!--<span class="list-name">Brandon J. Daniels</span>-->
												<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
											</td>
											<td>
												<label class="label_radio" >
													<i class="fa fa-check-square-o"></i>
													<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin1('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
												</label>
											</td>
											<td>
												<label class="label_radio">
													<i class="fa fa-check-square-o"></i>
													<input name="sample-radio-0"  onclick="blockuser('.$qry->invite_id.','.$qry->is_block.');" value="'.$qry->invite_id.'" type="radio">
												</label>
											</td>
												
                                    </tr>';
									$user_status='1';
									$final['body']=$res;
									$final['status']=$user_status;
									$final['datacount']=$data1;
									//$final_response[]=count($user_email);
									$final['res1']=$register;
									$final_response[] = $final;
							     }else{ 
									//p("asdfasf");
								      $data1=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
									  $admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
								      //$final_response =array();
									  $check="false";
								      if($qry->make_admin=='Yes') {  $check="true";  } else { $check="false";} 
								$res =	'<tr class='.$qry->invite_id.'>
									
										<td>
												<!--<span class="list-name">Brandon J. Daniels</span>-->
												<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
											</td>
											<td>
												<label class="label_radio" >
													<i class="fa fa-check-square-o"></i>
													<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
												</label>
											</td>
											<td>
												<label class="label_radio" >
													<i class="fa fa-check-square-o"></i>
													<input name="sample-radio-0"  onclick="deleteadmin('.$qry->invite_id.');" value="'.$qry->invite_id.'" type="radio">
												</label>
											</td>
												
                                    </tr>';
									$user_status=0;
									$final['body']=$res;
									$final['status']=$user_status;
									$final['datacount']=$data1;
									$final['admin']=$admin;
									//$final['emailcount']=count($user_email);
									$final_response[] = $final;
								}							 
							 }
				        }
				 }
				 //p($final_response);
			 echo json_encode($final_response);
		   }
		   
	}
	
	public function actionupdateadmin()
	{
	  //p($_POST);
	  //$model=new InviteFriend();
	   
		  $id =$_POST['id'];
		  $admin=$_POST['admin'];
		  $model = $this->loadModel($id, 'InviteFriend');
		  $model->invite_id=$id;
		  if($admin=="Yes")
		  {
			   $model->make_admin="No";
			   
		  }
		  if($admin=="No")
		  {
			   $model->make_admin="Yes";
			   //echo "asfasag";
			   
		  }
		  $model->save(false);
		  $qry=InviteFriend::model()->find("invite_id='".$id."'");
		  if($admin=="No")
		  {
			  // p($qry->invite_email);
			   $to = $qry->invite_email;
			   $name=$qry->invite_email;
			   $wedding_uniq_id=$qry->wedding_uniq_id;
			   $email=$_SESSION['email'];
				//SEND YOUR MAIL
				$subject = "Wedoo Project Invitation";
				//$message =  "You have been made admin by $name for this wedding id $wedding_uniq_id ";
                $message="You have been given rights to invite your friend in wedoo. Enter your wedding id :  Go to the Wedoo website: <a href='http://letsnurture.co.uk/demo/wedoo/'>http://letsnurture.co.uk/demo/wedoo</a>";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
				$mailStatus=mail($to,$subject,$message,$headers);
			   
		  }
		  $final_response =array();
		  $r_on="";
				 if($qry->make_admin=="Yes")
				 {
				     $r_on="r_on";
				 }
				 if($qry->make_admin=="No")
				 {
				     $r_on="";
				 }
				 if($admin=="Yes") {
		  $res =	'<td>
						<!--<span class="list-name">Brandon J. Daniels</span>-->
						<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
					</td>
					<td>
						<label class="label_radio '.$r_on.'" for="radio-'.$qry->invite_id.'">
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
						</label>
					</td>
					<td>
						<label class="label_radio" >
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0"  onclick="deleteadmin('.$qry->invite_id.');" value="'.$qry->invite_id.'" type="radio">
						</label>
					</td>';
					}
					if($admin=="No")
					{
					  $res =	'<td>
						<!--<span class="list-name">Brandon J. Daniels</span>-->
						<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
					</td>
					<td>
						<label class="label_radio '.$r_on.'" for="radio-'.$qry->invite_id.'">
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
						</label>
					</td>
					<td>
						<label class="label_radio" >
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0"  onclick="deleteadmin('.$qry->invite_id.');" value="'.$qry->invite_id.'" type="radio">
						</label>
					</td>';
					}
						
		  $final_response[]=$res;
		  echo json_encode($final_response);
	  
	}
	
	public function actionupdateadmin1()
	{
	  //p($_POST);
	  //$model=new InviteFriend();
	   
		  $id =$_POST['id'];
		  $admin=$_POST['admin'];
		  $model = $this->loadModel($id, 'InviteFriend');
		  $model->invite_id=$id;
		  if($admin=="Yes")
		  {
			   $model->make_admin="No";
			   
		  }
		  if($admin=="No")
		  {
			   $model->make_admin="Yes";
			   
		  }
		  $model->save(false);
		  $qry=InviteFriend::model()->find("invite_id='".$id."'");
		  if($admin=="No")
		  {
			  // p($qry->invite_email);
			   $to = $qry->invite_email;
			   $name=$qry->invite_email;
			   $email=$_SESSION['email'];
			   $wedding_uniq_id=$qry->wedding_uniq_id;
				//SEND YOUR MAIL
				$subject = "Wedoo Project Invitation";
				//$message =  "You have been made admin by $email for this email $name and wedding id $wedding_uniq_id ";
                $message="$name have been given you rights from $email invite your friend in Wedoo. Enter your wedding id :$wedding_uniq_id  Go to the Wedoo website: http://letsnurture.co.uk/demo/wedoo/";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
				$mailStatus=mail($to,$subject,$message,$headers);
			   
		  }
		  $final_response =array();
		  $r_on="";
				 if($qry->make_admin=="Yes")
				 {
				     $r_on="r_on";
				 }
				 if($qry->make_admin=="No")
				 {
				     $r_on="";
				 }
				 if($admin=="Yes") {
		  $res =	'<td>
						<!--<span class="list-name">Brandon J. Daniels</span>-->
						<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
					</td>
					<td>
						<label class="label_radio '.$r_on.'" for="radio-'.$qry->invite_id.'">
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin1('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
						</label>
					</td>
					<td>
						<label class="label_radio" >
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0"  onclick="blockuser('.$qry->invite_id.','.$qry->is_block.');" value="'.$qry->invite_id.'" type="radio">
						</label>
					</td>';
					}
					if($admin=="No")
					{
					  $res =	'<td>
						<!--<span class="list-name">Brandon J. Daniels</span>-->
						<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
					</td>
					<td>
						<label class="label_radio '.$r_on.'" for="radio-'.$qry->invite_id.'">
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin1('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
						</label>
					</td>
					<td>
						<label class="label_radio" >
							<i class="fa fa-check-square-o"></i>
							<input name="sample-radio-0"  onclick="blockuser('.$qry->invite_id.','.$qry->is_block.');" value="'.$qry->invite_id.'" type="radio">
						</label>
					</td>';
					}
						
		  $final_response[]=$res;
		  echo json_encode($final_response);
	  
	}
	
	public function actiondeleteadmin()
	{
	 //p($_POST['id']);
	 session_start();
	 $id=$_POST['id'];
	    if (Yii::app()->getRequest()->getIsPostRequest()) { 
		$data1=array();
		    $data1=InviteFriend::model()->find("invite_id='".$id."' AND (invite_type='Gmail' OR invite_type='Facebook' OR invite_type='Twitter' OR invite_type='Other') ");
			//p($data1);
			$data2=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
            $admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));		   
		    $admin=$admin-1; 
		   $data=$data2-1;
			//p($data1);
			$final_response =array();
			if(!empty($data1))
			{
			 // $name1=preg_replace('/[^A-Za-z0-9\-\(\) ]/', '', $data1->field2);
				 if($data1->invite_type=="Gmail" || $data1->invite_type=="Other")
				 {
				  $user_status=1;
				  $final_response[]=$user_status;
				  $final_response[]=$data;
				  $final_response[]=$data1->invite_email;
				  $final_response[]=$data1->field2;
				  $final_response[]=$admin;
				  }
				  if($data1->invite_type=="Facebook")
				 {
				  $user_status=2;
				  $final_response[]=$user_status;
				  $final_response[]=$data;
				  $final_response[]=$data1->invite_email;
				  $final_response[]=$data1->field2;
				  $final_response[]=$admin;
				  }
				  
				  if($data1->invite_type=="Twitter")
				 {
				  $user_status=3;
				  $final_response[]=$user_status;
				  $final_response[]=$data;
				  $final_response[]=$data1->invite_email;
				  $final_response[]=$data1->field2;
				  $final_response[]=$admin;
				  }
			  
			}
			if(empty($data1))
			{
			 
			   $user_status=0;
			  $final_response[]=$user_status;
			  $final_response[]=$data;
			}
			$this->loadModel($id, 'InviteFriend')->delete();
	        echo json_encode($final_response);
		}
	}
	
	public function actioninsert_gmail()
	{
	//p($_POST);exit;
	    
	   if($_POST)
	   {
	         // require_once('PHPMailer/PHPMailerAutoload.php');
	           session_start();
			      $register_email_flag="No";
			      $model=new InviteFriend();
				 
				  $user=UserDetail::model()->find("email='".$_POST['email']."'");
				  if(!empty($user))
				  {
				     $register_email_flag="Yes";
				  }
				  $query=InviteFriend::model()->find("invite_email='".$_POST['email']."' AND user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'");
				 
				if(empty($query))
				{
				 
						 $model->user_id=$_SESSION['uid'];;
						 $model->invite_type="Gmail";
						 $model->invite_email=$_POST['email'];
						 $model->wedding_id=$_SESSION['wedding_id'];
						 $model->wedding_uniq_id=$_SESSION['wedding_uniq_id'];
						 $model->register_email_flag=$register_email_flag;
						 $model->make_admin="No";
						 $model->remove_user="No";
						 $model->field2=$_POST['name1'];
						 $model->created_at=new CDbExpression('NOW()');//date('Y-m-d h:m:s');
						 $model->status="1";
						 if($model->save(false))
						 {
							
							$to = $_POST['email'];
							//SEND YOUR MAIL
							$subject = "Wedoo Project Invitation";
							$message =  "Wedoo invitation";

							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
							$msg=$this->Invitemailtempleate($to,$message);
							$mailStatus=mail($to,$subject,$msg,$headers);
								if($mailStatus)
								{
									   $insert_id = Yii::app()->db->getLastInsertID();
									   $qry=InviteFriend::model()->find("invite_id='".$insert_id."'");
									   //echo "1";
									   //echo $check[$i];

									  if(!empty($user))
								  {
								           $data1=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
									       $register=count(InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='0' AND user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
										  $final_response =array();
										  $check="false";
										  if($qry->make_admin=='Yes') {  $check="true";  } else { $check="false";} 
									$res =	'<tr class='.$qry->invite_id.'>
										
											<td>
													<!--<span class="list-name">Brandon J. Daniels</span>-->
													<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
												</td>
												<td>
													<label class="label_radio" for="radio-'.$qry->invite_id.'">
														<i class="fa fa-check-square-o"></i>
														<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin1('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
													</label>
												</td>
												<td>
													<label class="label_radio" >
														<i class="fa fa-check-square-o"></i>
														<input name="sample-radio-0"  onclick="blockuser('.$qry->invite_id.','.$qry->is_block.');" value="'.$qry->invite_id.'" type="radio">
													</label>
												</td>
													
										</tr>';
										$user_status='1';
										$final_response[]=$res;
										$final_response[]=$user_status;
										$final_response[]=$data1;
									    $final_response[]=$register;
										echo json_encode($final_response);
									 }
								  else
									{	
									  $data1=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
									  $admin=count(InviteFriend::model()->findAll("register_email_flag='No' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'"));
										$final_response =array();
										  $check="false";
										  if($qry->make_admin=='Yes') {  $check="true";  } else { $check="false";} 
									      $res =	'<tr class='.$qry->invite_id.'>
										
											<td>
													<!--<span class="list-name">Brandon J. Daniels</span>-->
													<a class="list-mail-id" href="#">'.$qry->invite_email.'<!--BrandonJDaniels@dayrep.com--></a>
												</td>
												<td>
													<label class="label_radio" for="radio-'.$qry->invite_id.'">
														<i class="fa fa-check-square-o"></i>
														<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" '.$check.'>
													</label>
												</td>
												<td>
													<label class="label_radio" >
														<i class="fa fa-check-square-o"></i>
														<input name="sample-radio-0"  onclick="deleteadmin('.$qry->invite_id.');" value="'.$qry->invite_id.'" type="radio">
													</label>
												</td>
													
										</tr>';
										$user_status='0';
										$final_response[]=$res;
										$final_response[]=$user_status;
										$final_response[]=$data1;
										$final_response[]=$admin;
										echo json_encode($final_response);
									}
									   
								
								}								

						  }
				}		  
										
	   }
	   else
	   {
	      echo "data not post";
	   } 
	}


	
	public function actionsaveblock()
	{
	     if($_POST)
		 {
			  $id =$_POST['id'];
			  $block=$_POST['block'];
			  $model = $this->loadModel($id, 'InviteFriend');
			  $model->invite_id=$id;
			  if($block=="0")
			  {
				   $model->is_block="1";
				   
			  }
			  if($block=="1")
			  {
				   $model->is_block="0";
				   
			  }
			  if($model->save(false))
			  {
			   $final_response =array();
			    // $insert_id = Yii::app()->db->getLastInsertID();
				 $qry=InviteFriend::model()->find("invite_id='".$id."'");

                     $res='<tr class='.$qry->invite_id.'>	
							<td><a class="list-mail-id" href="#">'.$qry->invite_email.'</a></td>
								<td>
									<label class="label_radio" >
										<i class="fa fa-check-square-o"></i>
										<input name="sample-radio-0"  onclick="unblockuser('.$qry->invite_id.','.$qry->is_block.')" value="'.$qry->invite_id.'" type="radio">
									</label>
								</td>					
                    </tr>';
				 $blockCount=$this->blockCount();								
			     $UnblockCount=$this->UnblockCount();
			     $final_response[]=$res;
				 $final_response[]=$UnblockCount;
				 $final_response[]=$blockCount;
				 echo json_encode($final_response);
			  }
		      
		 }
	}
	
	public function actionsaveunblock()
	{
	    session_start();
	     if($_POST)
		 {
			  $id =$_POST['id'];
			  $block=$_POST['block'];
			  $model = $this->loadModel($id, 'InviteFriend');
			  $model->invite_id=$id;
			  if($block=="0")
			  {
				   $model->is_block="1";
				   
			  }
			  if($block=="1")
			  {
				   $model->is_block="0";
				   
			  }
			  if($model->save(false))
			  {
			    // $insert_id = Yii::app()->db->getLastInsertID();
				$final_response =array();
				 $qry=InviteFriend::model()->find("invite_id='".$id."'");
				 $r_on="";
				 if($qry->make_admin=="Yes")
				 {
				     $r_on="r_on";
				 }
				 if($qry->make_admin=="No")
				 {
				     $r_on="";
				 }
			        $res='<tr class='.$qry->invite_id.'>
												
							<td>
									<a class="list-mail-id" href="#">'.$qry->invite_email.'</a>
								</td>
								<td>
									<label class="label_radio '.$r_on.'" >
										<i class="fa fa-check-square-o"></i>
										<input name="sample-radio-0" id="radio-'.$qry->invite_id.'" onclick="saveadmin1('.$qry->invite_id.',\''.$qry->make_admin.'\');" value="'.$qry->invite_id.'" type="radio" checked='.$check.'>
									</label>
								</td>
								<td>
									<label class="label_radio" >
										<i class="fa fa-check-square-o"></i>
										<input name="sample-radio-0"  onclick="blockuser('.$qry->invite_id.','.$qry->is_block.');" value='.$qry->invite_id.'" type="radio">
									</label>
							</td>
															
					</tr>';
				   $blockCount=$this->blockCount();								
				   $UnblockCount=$this->UnblockCount();
				   $final_response[]=$res;
				   $final_response[]=$UnblockCount;
				   $final_response[]=$blockCount;
				  echo json_encode($final_response);
			  }
		      
		 }
	}
	
	public function blockCount()
	{
	   session_start();
	   $blocked=count(InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='1' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
	   if(!empty($blocked)){
			return $blocked;
     }else { 
			return 0;
	}	 
	}
	public function UnblockCount()
	{
	   session_start();
	   $register=count(InviteFriend::model()->findAll("register_email_flag='Yes' AND is_block='0' AND wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
	      if(!empty($register)){
			return $register;
		}else { 
			return 0;
	}	 
	}

    //mail Template
	//public function mail templeate
public function Invitemailtempleate($to,$message){
						
						$logoImage='<img src="'. Yii::app()->getBaseUrl(true).'/images/logo.png" class="logo" style="float:left;" usemap="#home">';
						$messageTxt='<style type="text/css">
										         /* Client-specific Styles */
										         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
										         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;
												  font-family:Calibri, Helvetica, Arial;}
										         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
										         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
										         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing. */
										         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
										         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
										         a img {border:none;}
										         .image_fix {display:block;}
										         p {margin: 0px 0px !important;}
										         table td {border-collapse: collapse;}
										         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
										         a {color: #33b9ff;text-decoration: none;text-decoration:none!important;}
										         /*STYLES*/
										         table[class=full] { width: 100%; clear: both; }
										         /*IPAD STYLES*/
												 @media only screen and (max-width: 740px) {
													 table[class=devicewidth] {width: 560px!important;text-align:center!important;}
													 table[class=devicewidthmob] {width: 98%!important;text-align:center!important;}
												 }
												 
										         @media only screen and (max-width: 640px) {
										         a[href^="tel"], a[href^="sms"] {
										         text-decoration: none;
										         color: #0a8cce; /* or whatever your want */
										         pointer-events: none;
										         cursor: default;
										         }
										         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
										         text-decoration: default;
										         color: #0a8cce !important;
										         pointer-events: auto;
										         cursor: default;
										         }
										         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
										         table[class=devicewidthmob] {width: 420px!important;text-align:center!important;}
										         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
										         img[class=banner] {width: 440px!important;height:157px!important;}
										         img[class=col2img] {width: 440px!important;height:330px!important;}
										         table[class="cols3inner"] {width: 100px!important;}
										         table[class="col3img"] {width: 131px!important;}
										         img[class="col3img"] {width: 131px!important;height: 82px!important;}
										         table[class="removeMobile"]{width:10px!important;}
										         img[class="blog"] {width: 420px!important;height: 162px!important;}
												 .btnimg{width:100%;}
												 .textfont tr td{font-size:14px !important;}
										         }
										
										         /*IPHONE STYLES*/
										         @media only screen and (max-width: 480px) {
										         a[href^="tel"], a[href^="sms"] {
										         text-decoration: none;
										         color: #0a8cce; /* or whatever your want */
										         pointer-events: none;
										         cursor: default;
										         }
										         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
										         text-decoration: default;
										         color: #0a8cce !important; 
										         pointer-events: auto;
										         cursor: default;
										         }
										         
										         table[class=devicewidthmob] {width: 98%!important;text-align:center!important;}
										         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
										         img[class=banner] {width: 280px!important;height:100px!important;}
										         img[class=col2img] {width: 280px!important;height:210px!important;}
										         table[class="cols3inner"] {width: 260px!important;}
										         img[class="col3img"] {width: 280px!important;height: 175px!important;}
										         table[class="col3img"] {width: 280px!important;}
										         img[class="blog"] {width: 260px!important;height: 100px!important;}
										         td[class="padding-top-right15"]{padding:15px 15px 0 0 !important;}
										         td[class="padding-right15"]{padding-right:15px !important;}
												 
												 table[class="devicewidth"] { text-align: center !important; width: 347px !important;}
												 .textfont tr td{font-size:10px !important;}
										         }
												 @media only screen and (max-width: 369px) {
												 	table[class=devicewidth] {width: 280px!important;text-align:center!important;}
													 table[class=devicewidthmob] {width: 98%!important;text-align:center!important;}
													 .logo{width:232px;}
												 }
										      </style>
										   </head>
										   <body>
										<table width="100%" bgcolor="" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="banner" 
										font-family:Calibri, Helvetica, Arial;>
										   <tbody>
										      <tr>
										         <td>
										            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										               <tbody>
										                  <tr>
										                     <td width="100%">
										                        <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth"
																font-family:Calibri, Helvetica, Arial;>
										                           <tbody>
										                              <tr bgcolor="F7F6F4">
										                                <td style="padding:30px 24px 30px 24px; border-bottom:4px solid #e05952;">
										                                   '.$logoImage.'<br><br><br> <a href="http://letsnurture.co.uk/demo/wedoo/">http://letsnurture.co.uk/demo/wedoo</a> <span style="font-size:20px"> USER INVITE</span> 
                                  
										                                </td>
										                            </tr>
										                           </tbody>
										                        </table>
										                     </td>
										                  </tr>
										               </tbody>
										            </table>
										         </td>
										      </tr>
										   </tbody>
										</table>
										<table width="100%" bgcolor="" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="left-image">
										   <tbody>
										      <tr>
										         <td>
										            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										               <tbody>
										                  <tr>
										                     <td width="100%">
										                        <table bgcolor="#F7F6F4" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										                           <tbody>
										                              <tr>
										                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										                              </tr>
										                              <tr>
										                                 <td>
										                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										                                       <tbody>
										                                          <tr>
										                                             <td>
										                                                <table width="600" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthmob">
										                                                   <tbody>
										                                                      <tr>
										                                                         <td style="font-size: 18px; color: #6F7E95; text-align:left; line-height: 24px; font-weight:bold;" class="padding-top-right15">
										                                                        Dear .,
										                                                         </td>
										                                                      </tr>
										                                                      <tr>
										                                                         <td width="100%" height="6" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										                                                      </tr>
										                                                      <tr>
										                                                         <td style=" font-size: 15px; color: #424242; text-align:left; line-height: 24px;" class="padding-right15">
										                                                            '.$message.'
										                                                         </td>
										                                                      </tr>
										                                                     
										                                                       </table>
										                                                         </td>
										                                                      </tr>
										                                                   </tbody>
										                                                </table>
										                                             </td>
										                                          </tr>
										                                       </tbody>
										                                    </table>
										                                 </td>
										                              </tr>
										                              <tr>
										                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										                              </tr>
										                           </tbody>
										                        </table>
										                     </td>
										                  </tr>
										               </tbody>
										            </table>
										         </td>
										      </tr>
										   </tbody>
										</table>
										<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										               <tbody>
										                  <tr>
										                     <td width="100%">
										                        <table bgcolor="#F7F6F4" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										                           <tbody>
										                              <tr>
										                                 <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										                              </tr>
										                              <tr>
										                                 <td>
										                                    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
										                                       <tbody>
										                                          <tr>
										                                             <td>
										                                                <table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
										                                                   <tbody>
																							<tr>
										                                                         <td width="200" height="100px" align="left" class="devicewidth">
										                                                          <p style="font-size:15px; color:#424242; text-align:left; line-height:24px; ">With Best Regards,</p>
										                         								  <span style="color:#e05952; text-align:left;">wedoo Team</span>
										                                                         </td>
										                                                      </tr>
										                                                   </tbody>
										                                                </table>
										                                              </td>
										                                          </tr>
										                                       </tbody>
										                                    </table>
										                                 </td>
										                              </tr>         
										                           </tbody>
										                        </table>
										                     </td>
										                  </tr>
										               </tbody>
										            </table>
										   </body>
										   </html>';
										   return	$messageTxt;
	}
}