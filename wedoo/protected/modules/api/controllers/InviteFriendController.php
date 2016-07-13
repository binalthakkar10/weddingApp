<?php
class InviteFriendController extends ApiController{

	// This function used for Object to Array convert.
	public function objectToArray(&$object){
		$array=array();
		foreach($object as $member=>$data)
		{
			$array[$member]=$data;
		}
		return $array;
	}

	// This function used for Get Current DateTime.
	public function getCurrentDateTime(){

		$connection=Yii::app()->db;
		$sql = 'select NOW() as date';
		$dataReader=$connection->createCommand($sql)->query();
		$date   = $dataReader->read();
		$date   = date('Y-m-d',strtotime($date['date']));

		return  $date;
	}

	// This function get random code generate
	public function random_string($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('a', 'z'));

		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}

		return $key;
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id,invite_type,invite_email
	 * @author        : Atul Baraiya
	 * @created		  :	April 20 2015
	 * @Modified by	  : 
	 * @Comment		  : Add Friend Management.
	 **/

	
	public function actionAddFriend(){
	
		$response=array();
		$inviteData = json_decode(file_get_contents('php://input'), TRUE);
		//p($inviteData);
		if(empty($inviteData['data']['user_id']) && !isset($inviteData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_id']) && !isset($inviteData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_uniq_id']) && !isset($inviteData['data']['wedding_uniq_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_uniq_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['invite_type']) && !isset($inviteData['data']['invite_type']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the invite_type";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['invite_email']) && !isset($inviteData['data']['invite_email']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the invite_email";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			// Check Event Name Already Exist or Not
			$register_email_flag="No";
			      
			  $user=UserDetail::model()->find("email='".$inviteData['data']['invite_email']."'");
			  //p($user);
			  if(!empty($user)){
				 $register_email_flag="Yes";
			  }
			
			// Insert Invite Friend Data
			$model = new InviteFriend();
			if(isset($inviteData['data']['user_id']) && !empty($inviteData['data']['user_id'])){
				$model->user_id = $inviteData['data']['user_id'];
			}else{
				$model->user_id = '';
			}
			if(isset($inviteData['data']['wedding_id']) && !empty($inviteData['data']['wedding_id'])){
				$model->wedding_id = $inviteData['data']['wedding_id'];
			}else{
				$model->wedding_id = '';
			}
			if(isset($inviteData['data']['wedding_uniq_id']) && !empty($inviteData['data']['wedding_uniq_id'])){
				$model->wedding_uniq_id = $inviteData['data']['wedding_uniq_id'];
			}else{
				$model->wedding_uniq_id = '';
			}
			if(isset($inviteData['data']['invite_type']) && !empty($inviteData['data']['invite_type'])){
				$model->invite_type = $inviteData['data']['invite_type'];
			}else{
				$model->invite_type = '';
			}
			if(isset($inviteData['data']['invite_email']) && !empty($inviteData['data']['invite_email'])){
				$model->invite_email = $inviteData['data']['invite_email'];
			}else{
				$model->invite_email = '';
			}
			$model->created_at = $this->getCurrentDateTime();
			$model->register_email_flag = $register_email_flag;
			
			if($model->save(false)){
				$response['status'] = "1";
				$response['data']['success'] = "Add invite friend successfully.";
				$response['data']['invite_id'] = ($model->invite_id)?$model->invite_id:'';
				$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
				$response['data']['wedding_id'] = ($model->wedding_id)?$model->wedding_id:'';
				$response['data']['wedding_uniq_id'] = ($model->wedding_uniq_id)?$model->wedding_uniq_id:'';
				$response['data']['invite_type'] = ($model->invite_type)?$model->invite_type:'';
				$response['data']['register_email_flag'] = ($model->register_email_flag)?$model->register_email_flag:'';
				$response['data']['make_admin'] = ($model->make_admin)?$model->make_admin:'';
				$response['data']['is_block'] = "0";
				if($inviteData['data']['invite_email']=="gmail")
				{
				   $to = $inviteData['data']['invite_email'];
							//SEND YOUR MAIL
					$subject = "Wedoo Project Invitation";
					$message =  "Wedoo Invitation fro uoloading image";

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
					$mailStatus=mail($to,$subject,$message,$headers);
				}
			   
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "Invalid Parameters Inserted.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya March 27 2015
	 * @Comment		  : View Event Listing.
	 **/
	
	public function actionViewFriend(){
	
		$res = array();
		$response = array();
		$getinviteListing = array();
		//p($_REQUEST);
		if(empty($_REQUEST['user_id']) && !isset($_REQUEST['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($_REQUEST['wedding_id']) && !isset($_REQUEST['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($_REQUEST['wedding_uniq_id']) && !isset($_REQUEST['wedding_uniq_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_uniq_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			$inviteViewData = InviteFriend::model()->findAll("user_id = '".$_REQUEST['user_id']."' AND wedding_id='".$_REQUEST['wedding_id']."' AND wedding_uniq_id='".$_REQUEST['wedding_uniq_id']."' order by created_at DESC");
			//p($inviteViewData);
			foreach ($inviteViewData as $inviteListing){
				$res['invite_id'] = $inviteListing['invite_id'];
				$res['user_id'] = $inviteListing['user_id'];
				$res['wedding_id'] = $inviteListing['wedding_id'];
				$res['wedding_uniq_id'] = $inviteListing['wedding_uniq_id'];
				$res['invite_type'] = $inviteListing['invite_type'];
				$res['invite_email'] = $inviteListing['invite_email'];
				$res['register_email_flag'] = $inviteListing['register_email_flag'];
				$res['make_admin'] = $inviteListing['make_admin'];
				$res['status'] = $inviteListing['status'];
				$res['is_block'] = $inviteListing['is_block'];
				
				$res['created_at'] = $inviteListing['created_at'];
				$getinviteListing[] = $res;
			}//p($getinviteListing);
			if(!empty($getinviteListing)){
				$response['status'] = "1";
				$response['data'] = $getinviteListing;
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "No Invited Friend Found.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id
	 * @author        : Kadia ravi
	 * @created		  :	February 11 2015
	 * @Modified by	  : Kadia ravi
	 * @Comment		  : Add invitation.
	**/
	public function actionAddSocialFriend(){
		$FinalArray=array();
		$response=array();
		$inviteData = json_decode(file_get_contents('php://input'), TRUE);
		//p($inviteData);
		if(empty($inviteData['data']['user_id']) && !isset($inviteData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_id']) && !isset($inviteData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_uniq_id']) && !isset($inviteData['data']['wedding_uniq_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_uniq_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['invite_type']) && !isset($inviteData['data']['invite_type']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the invite_type";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['invite_id']) && !isset($inviteData['data']['invite_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the invite_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			// Check Event Name Already Exist or Not
			$register_email_flag="No";
		
			 $user=UserDetail::model()->find("email='".$inviteData['data']['invite_id']."'");
			  //p($user);
			  if(!empty($user)){
				 $register_email_flag="Yes";
			  }
			$exp=explode(",", $inviteData['data']['invite_id']);
			$screen_name=explode(",", $inviteData['data']['screen_name']);
			$cnt=count($exp);
           	
           for($i=0;$i<$cnt;$i++){
				// Insert Invite Friend Data
					if($inviteData['data']['invite_type']=='email' or $inviteData['data']['invite_type']=='gmail'){
						$DupInvite=InviteFriend::model()->findAll("user_id='".$inviteData['data']['user_id']."' AND invite_email='".$exp[$i]."'");
					}else{
						
						$DupInvite=InviteFriend::model()->findAll("user_id='".$inviteData['data']['user_id']."' AND field2='".$exp[$i]."'");
					}	
				
				
				if(!$DupInvite){
					$model = new InviteFriend();
					if(isset($inviteData['data']['user_id']) && !empty($inviteData['data']['user_id'])){
						$model->user_id = $inviteData['data']['user_id'];
					}else{
						$model->user_id = '';
					}
					if(isset($inviteData['data']['wedding_id']) && !empty($inviteData['data']['wedding_id'])){
						$model->wedding_id = $inviteData['data']['wedding_id'];
					}else{
						$model->wedding_id = '';
					}
					if(isset($inviteData['data']['wedding_uniq_id']) && !empty($inviteData['data']['wedding_uniq_id'])){
						$model->wedding_uniq_id = $inviteData['data']['wedding_uniq_id'];
					}else{
						$model->wedding_uniq_id = '';
					}
					if(isset($inviteData['data']['invite_type']) && !empty($inviteData['data']['invite_type'])){
						$model->invite_type = $inviteData['data']['invite_type'];
					}else{
						$model->invite_type = '';
					}
					if(isset($inviteData['data']['make_admin']) && !empty($inviteData['data']['make_admin'])){
						$model->make_admin = $inviteData['data']['make_admin'];
					}else{
						$model->make_admin = '';
					}
					if($inviteData['data']['invite_type']=='email' or $inviteData['data']['invite_type']=='gmail' ){
						if(isset($inviteData['data']['invite_id']) && !empty($inviteData['data']['invite_id'])){
							$model->invite_email = $exp[$i];
						}else{
							$model->invite_email = '';
						}
						$model->field2 = preg_replace('/[^A-Za-z0-9\-\(\) ]/', '', $exp[$i]);
					}else{
						if(isset($inviteData['data']['invite_id']) && !empty($inviteData['data']['invite_id'])){
							$model->field2 = $exp[$i];
						}else{
							$model->field2 = '';
						}
						$model->invite_email = $screen_name[$i];
					}
					
					
					if(isset($inviteData['data']['need_verification']) && !empty($inviteData['data']['need_verification'])){
						$model->need_verification = $inviteData['data']['need_verification'];
					}else{
						$model->need_verification = '0';
					}
					
					$model->make_admin="No";
					$model->created_at = $this->getCurrentDateTime();
					$model->register_email_flag = $register_email_flag;
					
					if($model->save(false)){
						
						//$response['status'] = "1";
						//$response['success'] = "Add invite friend successfully.";
						if($model->invite_type=='email' or $model->invite_type=='gmail')
						{
							$response['screen_name']='';
							$response['invite_id'] = ($model->invite_email)?$model->invite_email:'';
						}else{
							$response['screen_name']=($model->invite_email)?$model->invite_email:'';
							$response['invite_id'] = ($model->field2)?$model->field2:'';
						}
						$response['guest_user_id']=($model->invite_id)?$model->invite_id:'';
						$response['user_id'] = ($model->user_id)?$model->user_id:'';
						$response['wedding_id'] = ($model->wedding_id)?$model->wedding_id:'';
						$response['wedding_uniq_id'] = ($model->wedding_uniq_id)?$model->wedding_uniq_id:'';
						$response['invite_type'] = ($model->invite_type)?$model->invite_type:'';
						$response['register_email_flag'] = ($model->register_email_flag)?$model->register_email_flag:'';
						$response['make_admin'] = ($model->make_admin)?$model->make_admin:'';
						$response['need_verification'] = ($model->need_verification)?$model->need_verification:'';
						$response['is_block'] = ($model->make_admin)?$model->make_admin:'';
						if($inviteData['data']['invite_type']=="email" or $inviteData['data']['invite_type']=="gmail"){
						   $email = $exp[$i];
							$getMail= $this->sendInviteMail($email);
							//SEND YOUR MAIL
							/*$subject = "Wedoo Project Invitation";
							$message =  "Wedoo Invitation fro uoloading image";
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
							$mailStatus=mail($to,$subject,$message,$headers);*/
						}
				}
			 	$FinalArray[]=$response;
			 }
			}
			if($FinalArray){
				$res['status']="1";
				$res['data']=$FinalArray;
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($res);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "Already Send Invitaion.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}
	
	
	function sendInviteMail($email)
	{
			 $to = $email;
			 $subject = "Wedoo Project Invitation ";
			 $txt = "Dear,\r\n\n";
			 $message= "Wedoo  Invitation";
			 $headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
			$msg=$this->Invitemailtempleate($to,$message);
			if(mail($to,$subject,$msg, $headers)){
				 return 1;
			}else{
				return 0;
			}
	}
	 
	//mail Template
	//public function mail templeate
public function Invitemailtempleate($to,$message){
						/*	session_start();
							$crew_id=$_SESSION['uid'];
							$employerDetail = EmployerDetail::model()->find("employer_id = '".$emp_id."'");
							$crewDetail = CrewDetail::model()->find("crew_id = '".$crew_id."'");
							$jobId = JobPost::model()->find("job_id='".$job_id."'");
						$username =ucfirst($employerDetail['first_name'])." ".ucfirst(substr($employerDetail['last_name'],0,1));	
						$crewname = ucfirst($crewDetail['first_name'])." ".ucfirst(substr($crewDetail['last_name'],0,1));*/
						
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
										                                   '.$logoImage.'<br><br><br>&nbsp &nbsp <span style="font-size:20px"> USER INVITE</span>                                   
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



		/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id
	 * @author        : Kadia ravi
	 * @created		  :	February 11 2015
	 * @Modified by	  : Kadia ravi
	 * @Comment		  : Add invitation.
	**/
	public function actionListInvitation(){
		$getData=array();
		$response=array();
		$inviteData = json_decode(file_get_contents('php://input'), TRUE);
		//p($inviteData);
		if(empty($inviteData['data']['user_id']) && !isset($inviteData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_id']) && !isset($inviteData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($inviteData['data']['wedding_uniq_id']) && !isset($inviteData['data']['wedding_uniq_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_uniq_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			$user=InviteFriend::model()->findAll("user_id='".$inviteData['data']['user_id']."' && wedding_id='".$inviteData['data']['wedding_id']."' && remove_user='No'");
			  //p($user);
			if($user){
					foreach ($user as $userData) {
						if($userData['invite_type']=='email' or $userData['invite_type']=='gmail' ){
								$res['invite_id'] = $userData['invite_email'].'';
								$res['screen_name']='';
						}else{
							$res['invite_id'] = $userData['field2'].'';
							$res['screen_name']=$userData['invite_email'].'';
						}
						$res['guest_user_id']= $userData['invite_id'].'';
						$res['user_id'] = $userData['user_id'].'';
						$res['wedding_id'] = $userData['wedding_id'].'';
						$res['wedding_uniq_id'] = $userData['wedding_uniq_id'].'';
						$res['invite_type'] = $userData['invite_type'].'';
						$res['register_email_flag'] = $userData['register_email_flag'].'';
						$res['make_admin'] = $userData['make_admin'].'';
						$res['need_verification'] = $userData['need_verification'].'';
						$res['is_block'] = $userData['is_block'].'';
						$getData[]=$res;
					}
					if($getData){
						$response['status'] = "1";
						$response['data'] = $getData;
						header('Content-Type: application/json; charset=utf-8');
						echo json_encode($response);
						exit();
					}else{
						$response['status'] = "0";
						$response['data'] = "Record not found.";
						header('Content-Type: application/json; charset=utf-8');
						echo json_encode($response);
						exit();
					}
			}else{
					$response['status'] = "0";
					$response['data'] = "Record not found.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
			}
		}
	}

/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id
	 * @author        : Kaida ravi
	 * @created		  :	February 11 2015
	 * @Modified by	  : kadia ravi
	 * @Comment		  : Make admin.
	 **/
	
	public function actionMakeAdmin(){
	
		$res = array();
		$response = array();
		$getinviteListing = array();
		//p($_REQUEST);
		$inviteData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($inviteData['data']['guest_user_id']) && !isset($inviteData['data']['guest_user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the Guest user id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$inviteViewData = InviteFriend::model()->find("invite_id= '".$inviteData['data']['guest_user_id']."'");
			if($inviteViewData){
		        $id = $inviteViewData['invite_id'];
				$model = $this->loadModel($id,'InviteFriend');
				$model->make_admin="1";
				if($model->save(FALSE)){
					$response['status'] = "1";
					$response['data'] = "User make admin successfully.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
			}else{
					$response['status'] = "0";
					$response['data'] = "Guest Id not found.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
			}
		}
	}
	
/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id,wedding_uniq_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya March 27 2015
	 * @Comment		  : View Event Listing.
	 **/
	
	public function actionDeleteUserInvitation(){
	
		$res = array();
		$response = array();
		$getinviteListing = array();
		//p($_REQUEST);
		$inviteData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($inviteData['data']['guest_user_id']) && !isset($inviteData['data']['guest_user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the Guest user id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$inviteViewData = InviteFriend::model()->find("invite_id= '".$inviteData['data']['guest_user_id']."'");
			if($inviteViewData){
		        $id = $inviteViewData['invite_id'];
				$model = $this->loadModel($id,'InviteFriend');
				$model->remove_user="1";
				if($model->save(FALSE)){
					$response['status'] = "1";
					$response['data'] = "User invitation  delete successfully.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
			}else{
					$response['status'] = "0";
					$response['data'] = "Guest Id not found.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
			}
		}
	}

}
