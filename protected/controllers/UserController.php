<?php
class UserController extends FrontCoreController{

	public function actionIndex()
		{
			session_start();
			$model= new EmployerDetail();
			
			$this->pageTitle = ".:: Yacht Relief Crew | Employer Registration ::.";
			
			if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer"){
				?>
			<script>window.location.href="<?php echo Yii::app()->getBaseUrl(true).'/Dashboard' ?>;</script>	
			<?php }else{	
				$this->render('index',array('model'=>$model));
			}	
		}
	/**
	 * @Method		  :	POST
	 * @Params		  : txtFirstname,txtLastname,txtEmail,txtPassword
	 * @author        : Nital Chauhan
	 * @created		  :	August 25 2014
	 * @Modified by	  :
	 * @Comment		  : Employer Registration.
	**/	
	public function actionRegistration(){
	 	if(strlen($_POST['textFullname']) == 0)
		{
			echo "Please enter fullname";
		}
		//else if(!ctype_alpha($_POST['textFullname']))
		else if (!ctype_alpha(str_replace(' ', '', $_POST['textFullname'])))
		{
			echo "First name should be alpha characters only.";
		}
		else if(intval(strlen($_POST['textFullname'])) <= 2 || intval(strlen($_POST['textFullname'])) > 20)
		{
			echo "First name should be within 3-20 characters long";
		}
		else if(strlen($_POST['textEmail'])<=0)
		{
			echo "Please enter email";
		}
		else if(!filter_var($_POST['textEmail'], FILTER_VALIDATE_EMAIL))
		{
			echo "Please enter valid email addess";
		}
		else if(strlen($_POST['txtRegisterPassword'])<=0)
		{
			echo "Please enter password";
		}
		else if(strlen($_POST['txtRegisterPassword']) < 8 OR strlen($_POST['txtRegisterPassword']) > 20)
		{
			echo "Password should be within 8-20 characters long";
			
		}else{
			$userDetails = new UserDetail();
			//p($_POST);
			if(isset($_POST['textFullname']) && !empty($_POST['textFullname'])){
				$userDetails->username = $_POST['textFullname'];
			}
			if(isset($_POST['textEmail']) && !empty($_POST['textEmail'])){
				$userDetails->email = strtolower($_POST['textEmail']);
			}
			if(isset($_POST['txtRegisterPassword']) && !empty($_POST['txtRegisterPassword'])){
				$userDetails->password = md5($_POST['txtRegisterPassword']);
			}
			$userDetails->auth_provider = 'normal';
			$userDetails->user_type = 'admin'; 
			$userDetails->verification_key = md5($userDetails->email+rand(1, 1000));
			if($userDetails->save(false)){
			   
			   
			   $to = $_POST['textEmail'];
			   $id=Yii::app()->db->getLastInsertID();
				//SEND YOUR MAIL
				$subject = "Thanks for signup, Welcome to WeDoo !";
				
				$message = "<span style='font-size:14px; font-family: calibri;'>
					<b>Dear User,<br /><br />Thanks for signup, Welcome to WeDoo !</b><br />
					<br />
					But before we can activate your account, one last step must be taken to complete your registration.<br /><br />
					Please note, you must complete this last step to become a registered member. You will only need to visit this URL once to activate your account.<br /><br />
					To complete your registration, please visit this URL:
					<br /><br />
					<a href=".Yii::app()->getBaseUrl(true)."/User/Emailverify?key=".$userDetails->verification_key.">".Yii::app()->getBaseUrl(true)."/User/Emailverify?key=".$userDetails->verification_key."</a>
					<br /><br />
				
					If you are still having problems signing in to our website, please contact <a href=".Yii::app()->getBaseUrl(true)."/>here</a>.
					</span>";	

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From:  Wedoo < no-reply@wedoo.com >'."\r\n";
				$mailStatus=mail($to,$subject,$message,$headers);
			  // p($result['user_id']);
			  // $_SESSION['uid']=$result['user_id'];
				echo 1;			
			}else{
				echo '<strong>Error !! </strong> Sorry, unable to register. Try again later.';			
			}	
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : email
	 * @author        : Nital Chauhan
	 * @created		  :	August 26 2014
	 * @Modified by	  :
	 * @Comment		  : Employer Email exists check
	**/
	public function actionEmailExist(){
		$result = UserDetail::model()->find("email ='".$_POST['textEmail']."'");
		if($result)
		{
		$valid = 'false';}
		else{
		$valid = 'true';
		}
		echo $valid;
		
	}
	
	public function actionSignup(){
	$this->render('thanks-for-sign-up');
	}
	
	public function actionEmailverify()
	{
	    if(isset($_GET['key']) && !empty($_GET['key'])){
				$result = UserDetail::model()->find("verification_key ='".$_GET['key']."'");
				if($result){
					$id = $result['user_id'];
					$userDetails= $this->loadModel($id,'UserDetail');
					$userDetails->is_verify = 1;
					$userDetails->verification_key = "";
					if($userDetails->save(false)){	
						$this->render('success');
					}else{
						$this->render('not-success');
					}
				}else{
					$this->render('not-success');
				}
		
			}
	}

	/**
	 * @Method		  :	GET
	 * @Params		  : verification key
	 * @author        : Nital Chauhan
	 * @created		  :	August 26 2014
	 * @Modified by	  :
	 * @Comment		  : Employer Email Verification.
	**/
	public function actionVerify()
	{
			$this->pageTitle = ".:: Yacht Relief Crew | Employer Email Verification ::.";
			if(isset($_GET['key']) && !empty($_GET['key']))
			{
				
				$result = UserDetail::model()->find("verified_key ='".$_GET['key']."'");
				if($result)
				{
					$id = $result['user_id'];
					$userDetails= $this->loadModel($id,'UserDetail');
					$userDetails->is_verified = 1;
					$userDetails->verified_key = "";
					if($userDetails->save(false)){
						
						$this->render('success');
					}else{
						$this->render('not-success');
					}
					
				}else{
					$this->render('not-success');
				}
		
			}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Binal Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Employer Dashboard.
	**/
	public function actionDashboard()
	{
	
		session_start();
		$this->pageTitle = "Bluhso";
		if((isset($_SESSION['authid'])  || isset($_SESSION['uid'])) &&  isset($_SESSION['username'])){
			$model= new Product();
			$this->render('dashboard',array('model'=>$model));
		}else{
			
			$this->redirect(array('Login/'));
		}
			
	}
	
		/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Binal Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Add find.
	**/
	public function actionAddFind()
	{
	
		session_start();
		$this->pageTitle = "Bluhso";
		if((isset($_SESSION['authid'])  || isset($_SESSION['uid'])) &&  isset($_SESSION['username'])){
			$model= new Product();
			$this->render('addfind',array('model'=>$model));
		}else{
			
			$this->redirect(array('Login/'));
		}
			
	}
	public function actionvpb_fetch_url_contents()
	{
	
		session_start();
		$this->pageTitle = "Bluhso";
		if((isset($_SESSION['authid'])  || isset($_SESSION['uid'])) &&  isset($_SESSION['username'])){
			$model= new Product();
			$this->renderpartial('vpb_fetch_url_contents',array('model'=>$model));
		}else{
			
			$this->redirect(array('Login/'));
		}
			
	}
	

	public function actionImageTag()
	{
			$this->render('imgtag',array('model'=>$model));
		
			
	}
	

	
	/**
	 * @Method		  :	POST
	 * @Params		  : Password
	 * @author        : Binal Thakkar
	 * @created		  :	August 26 2014
	 * @Modified by	  :
	 * @Comment		  : Crew password match
	**/
	public function actionPasswordMatch()
	{
		session_start();
		$password=md5($_POST['txtOldPassword']);
		$id=$_SESSION['uid'];
		$result = EmployerDetail::model()->find("password ='".$password."' AND employer_id='".$id."'");
		
		if($result)
		{
		$valid = 'true';}
		else{
		$valid = 'false';
		}
		echo $valid;
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : password
	 * @author        : Bial Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Change User Password
	**/
	public function actionChangePassword()
	{
		session_start();
		
		$this->pageTitle = ".:: Yacht Relief Crew | Change Password ::.";
		
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer"){
					if(isset($_POST['txtCnfPassword']) && !empty($_POST['txtCnfPassword']) && isset($_POST['txtOldPassword']) && !empty($_POST['txtOldPassword'])
					&& isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])){
						$id=$_SESSION['uid'];	
						$oldPassword=md5($_POST['txtOldPassword']);
						$newPassword=$_POST['txtPassword'];
						$empModel = EmployerDetail::model()->find("employer_id = '".$id."' && password='".$oldPassword."'");
								if($empModel){
										$id = $empModel['employer_id'];
										$model = $this->loadModel($id,'EmployerDetail');
										$model->password = md5($_POST['txtCnfPassword']);
										if($model->save(false)){
										$username = $model->first_name." ".$model->last_name;	
										$this->sendChangePasswordMail($model->email,$oldPassword,$newPassword);
										echo 1;
										}else{
											echo 0;
										}
						}else{
							echo 0;
						}
						
					}else{							
					$model= new EmployerDetail();
					$this->render('changepassword',array('model'=>$model));
					}
		}else{
			
			$this->redirect(array('Login/'));
		}		

		}
		
	/**
	 * @Method		  :	Change Password Mail Sent To User  
	 * @Params		  : email,currentpassword,newpassword etc.
	 * @author        : Binal Thakkar
	 * @created		  :	August 27 2014
	 * @Modified by	  :
	 * @Comment		  : Send Mail To Client For Change Password Web Services.
	**/
	public function sendChangePasswordMail($email,$oldpassword,$newpassword){
					$to = $email;
					$subject = "Yacht New Account Verification";
					$separator = md5(time());
					$eol = PHP_EOL;
					$from = 'mail@yacht.com';
					$message="<span>Your Password for the yatchrelifcrew.com site is changed.<br><br>
                                Please Login with your New Password to continue.<br><br>
                                New Password :: $newpassword<br/>
                                <b>With Best Regards,<br />
                                Yatch Team (www.yatchrelifcrew.com)</b>
                                </span>";
					
					$headers = "From: ".$from.$eol;
					$headers .= "Reply-To: ".$email."\r\n";
					$headers .= "MIME-Version: 1.0".$eol;
					$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
					$headers .= "Content-Transfer-Encoding: 7bit".$eol;
					$headers .= ".".$eol.$eol;
					// message
					$headers .= "--".$separator.$eol;
					$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
					$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
					$headers .= $message.$eol.$eol;
					$res = mail($to, $subject, "", $headers);
	}		
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	August 29 2014
	 * @Modified by	  : Sepetmber 17 2014
	 * @Comment		  : Employer Calendar.
	**/
	public function actionCalendar()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | My Calendar ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) /*&& $_SESSION['type'] == "employer"*/){
			
			$employer_id = $_SESSION['uid'];
			$jobArray=array();
			//$EmployerJob = JobPost::model()->findAll("employer_id='$employer_id'");
			$jobData = (Yii::app()->db->createCommand("SELECT job_post.* FROM `job_post` WHERE job_post.`employer_id`='".$_SESSION['uid']."' and job_post.job_end_date>=CURDATE() and job_post.status='1'" ));
			$EmployerJob = $jobData->queryAll();
				
			foreach($EmployerJob as $job){
				$jobList['title']=$job['job_title'];
				$jobList['start']=$job['job_start_date'];
				$jobList['end']=$job['job_end_date'];
				$jobArray[]=$jobList;
			}
				
					$jobJson= json_encode($jobArray);
					$this->render('calendar',array('jobJson'=>$jobJson));
		}else{
				
				$this->redirect(array('Login/'));
			}		
			
	}	
	/**
	 * @Method		  :	GET
	 * @Params		  : SESSION = uid
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 01 2014
	 * @Modified by	  :
	 * @Comment		  : Call Edit Employer Profile page
	**/	
	public function actionMyProfile()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | My Profile ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer"){
			
			$employer_id = $_SESSION['uid'];
			
			$Profile_data = EmployerDetail::model()->find("employer_id='".$employer_id."'");
			
			$this->render('edit-profile',array('Profile_data' => $Profile_data));
			
		}else{
			
			$this->redirect(array('Login/'));
		}		
		
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : txtFirstname,txtLastname,txtEmail,txtPassword
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 01 2014
	 * @Modified by	  :
	 * @Comment		  : Edit Employer Profile
	**/	
	public function actionEditEmployerProfile()
	{
		if(strlen($_POST['txtFirstname']) == 0)
		{
			echo "Please enter firstname";
			
			
		}
		else if(!ctype_alpha($_POST['txtFirstname']))
		{
			echo "First name should be alpha characters only.";
			
			
		}
		else if(intval(strlen($_POST['txtFirstname'])) <= 2 || intval(strlen($_POST['txtFirstname'])) > 20)
		{
			echo "First name should be within 3-20 characters long";
			
			
		}
		else if(strlen($_POST['txtLastname'])<=0)
		{
			echo "Please enter lastname";
			
		}
		else if(intval(strlen($_POST['txtLastname'])) <= 2 || intval(strlen($_POST['txtLastname'])) > 20)
		{
			echo "Last name should be within 3-20 characters long";
			
		}
		else if(!ctype_alpha($_POST['txtLastname']))
		{
			echo "Last name should be alpha characters only.";
			
		}
		else if(strlen($_POST['txtEmail'])<=0)
		{
			echo "Please enter email";
			
		}
		else if(!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL))
		{
			echo "Please enter valid email addess";
			
			
		}else{
		
			$checkemployerEditProfile = EmployerDetail::model()->find("employer_id='".$_POST['hdnID']."'");

			if($checkemployerEditProfile){
				$employerID = $checkemployerEditProfile['employer_id'];
				$empoyerprofileEditData = $this->loadModel($employerID, 'EmployerDetail');
				if(isset($_POST['txtFirstname']) && !empty($_POST['txtFirstname'])){
					$empoyerprofileEditData->first_name = $_POST['txtFirstname'];
				}
				if(isset($_POST['txtLastname']) && !empty($_POST['txtLastname'])){
					$empoyerprofileEditData->last_name = $_POST['txtLastname'];
				}
				if(isset($_POST['txtContact']) && !empty($_POST['txtContact'])){
					$empoyerprofileEditData->contact_number = $_POST['txtContact'];
				}
				if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])){
					$empoyerprofileEditData->email = strtolower($_POST['txtEmail']);
				}
				if(isset($_POST['txtVesselName']) && !empty($_POST['txtVesselName'])){
					$empoyerprofileEditData->vessel_name = $_POST['txtVesselName'];
				}
				if(isset($_POST['txtImo']) && !empty($_POST['txtImo'])){
					$empoyerprofileEditData->imo_number = $_POST['txtImo'];
				}
				if(isset($_POST['txtVesselSize']) && !empty($_POST['txtVesselSize'])){
					$empoyerprofileEditData->size_of_vessel = $_POST['txtVesselSize'];
				}
				if(isset($_POST['cmbYachtType']) && !empty($_POST['cmbYachtType'])){
					$empoyerprofileEditData->yacht_type = $_POST['cmbYachtType'];
				}
				if(isset($_POST['txtPosition']) && !empty($_POST['txtPosition'])){
					$empoyerprofileEditData->position_onboard = $_POST['txtPosition'];
				}
				if(isset($_FILES['fleVesselDoc']['name']) && !empty($_FILES['fleVesselDoc']['name'])){
					
				
				if(($_FILES['fleVesselDoc']['name']!=''))
					{
						$path	= 	YiiBase::getPathOfAlias('webroot');
						$url=Yii::app()->getBaseUrl(true);
						move_uploaded_file($_FILES['fleVesselDoc']['tmp_name'], $path."/upload/employer_doc/".$_FILES["fleVesselDoc"]["name"]);
						$empoyerprofileEditData->vessel_document=$_FILES["fleVesselDoc"]["name"];
					}
					
				}
				
				if($empoyerprofileEditData->save(false)){
					echo 1;
				}else{
					echo 0;
			    }
			}
	    }
	}		
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 02 2014
	 * @Modified by	  : Septmber 05 2014
	 * @Comment		  : My Jobs
	**/		
	public function actionMyJobs()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | My Jobs ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer"){
		
		/*$jobData = (Yii::app()->db->createCommand("SELECT job_post.*,country_data.*,department.*,employer_detail.*,w.* FROM `job_post`
		 								join employer_detail ON job_post.`employer_id`= employer_detail.employer_id 
										join department ON job_post.`department_id`= department.department_id
										join country_data ON job_post.`country_id`= country_data.`country_id`
										join type_of_work as w ON job_post.`type_of_work` = w.type_id
										WHERE employer_detail.`employer_id`='".$_SESSION['uid']."' and job_post.repost='0' order by job_post.job_id" ));*/
		
		$jobData = (Yii::app()->db->createCommand("SELECT job_post.*,department.*,employer_detail.*,w.* FROM `job_post`
		 								join employer_detail ON job_post.`employer_id`= employer_detail.employer_id 
										join department ON job_post.`department_id`= department.department_id
										join type_of_work as w ON job_post.`type_of_work` = w.type_id
										WHERE employer_detail.`employer_id`='".$_SESSION['uid']."' and job_post.status='1' and job_post.repost='0' order by job_post.job_id desc" ));
										
		$jobDetails = $jobData->queryAll();
		$cntry_array = array();
		$response = array();
		$j=0;
		

		foreach($jobDetails as $jobDetail)
		{
			$cntry_name = "";	
			
			$cnt = explode(",",$jobDetail['country_id']);
			
			for($i=0;$i<count($cnt);$i++)
			{
				$res = CountryData::model()->find("country_id='".$cnt[$i]."'");
				
				$cntry_name.= $res['country_name'].",";
				$i++;
			}
			$cntry_array[$j] =rtrim($cntry_name,"," );
			
			$response[$j]['job_id'] = $jobDetail['job_id'];
			$response[$j]['employer_id'] = $jobDetail['employer_id'];
			$response[$j]['department_id'] = $jobDetail['department_id'];
			$response[$j]['type_of_work'] = $jobDetail['type_of_work'];
            $response[$j]['job_position'] = $jobDetail['job_position'];
            $response[$j]['job_code'] = $jobDetail['job_code'];
            $response[$j]['job_title'] = $jobDetail['job_title'];
            $response[$j]['job_description'] = $jobDetail['job_description'];
            $response[$j]['job_start_date']= $jobDetail['job_start_date'];
            $response[$j]['job_end_date']= $jobDetail['job_end_date'];
            $response[$j]['daily_rate']= $jobDetail['daily_rate'];
            $response[$j]['currency_type'] = $jobDetail['currency_type'];
            $response[$j]['size_of_vessel']= $jobDetail['size_of_vessel'];
            $response[$j]['yacht_type']= $jobDetail['yacht_type'];
            $response[$j]['job_exp']= $jobDetail['job_exp'];
            $response[$j]['is_published'] = $jobDetail['is_published'];
            $response[$j]['is_accepted']= $jobDetail['is_accepted'];
           	$response[$j]['created_date'] = $jobDetail['created_date'];
            $response[$j]['updated_date'] = $jobDetail['updated_date'];
            $response[$j]['repost']= $jobDetail['repost'];
            $response[$j]['status'] = $jobDetail['status'];
            $response[$j]['parent_id'] = $jobDetail['parent_id'];
            $response[$j]['department_name'] = $jobDetail['department_name'];
            $response[$j]['nationality_id'] = $jobDetail['nationality_id'];
            $response[$j]['first_name']= $jobDetail['first_name'];
            $response[$j]['last_name'] = $jobDetail['last_name'];
            $response[$j]['country_name'] = rtrim($cntry_name,"," );
			$j++;	
		}
		
		
		$departments = Department::model()->findAll('parent_id=0',array('order'=>'department_name asc'));
		//$ranks = RankOfRelief::model()->findAll("status='1'",array('order'=>'rank asc'));
		$works = TypeOfWork::model()->findAll("status='1'",array('order'=>'work_type asc'));
		$locations = CountryData::model()->findAll(array('order'=>'country_name asc'));
		
		 
		$this->render('my-jobs',array('jobDetails'=>$response,'departments'=>$departments,'works'=>$works,'locations'=>$locations));
			
		
		}else{
	    	$this->redirect(array('Login/'));
	    }
	}
	
	public function actionMyJoblist()
	{
		session_start();
		
		
		/*$jobData = (Yii::app()->db->createCommand("SELECT job_post.*,country_data.*,department.*,employer_detail.*,w.* FROM `job_post`
		 								join employer_detail ON job_post.`employer_id`= employer_detail.employer_id 
										join department ON job_post.`department_id`= department.department_id
										join country_data ON job_post.`country_id`= country_data.`country_id`
										join type_of_work as w ON job_post.`type_of_work` = w.type_id
										WHERE employer_detail.`employer_id`='".$_SESSION['uid']."' and job_post.repost='0' order by job_post.job_id" ));*/
		
		$jobData = (Yii::app()->db->createCommand("SELECT job_post.*,department.*,employer_detail.*,w.* FROM `job_post`
		 								join employer_detail ON job_post.`employer_id`= employer_detail.employer_id 
										join department ON job_post.`department_id`= department.department_id
										join type_of_work as w ON job_post.`type_of_work` = w.type_id
										WHERE employer_detail.`employer_id`='".$_SESSION['uid']."' and job_post.status='1' and job_post.repost='0' order by job_post.job_id desc" ));
										
		$jobDetails = $jobData->queryAll();
		$cntry_array = array();
		$response = array();
		$j=0;
		

		foreach($jobDetails as $jobDetail)
		{
			$cntry_name = "";	
			
			$cnt = explode(",",$jobDetail['country_id']);
			
			for($i=0;$i<count($cnt);$i++)
			{
				$res = CountryData::model()->find("country_id='".$cnt[$i]."'");
				
				$cntry_name.= $res['country_name'].",";
				$i++;
			}
			$cntry_array[$j] =rtrim($cntry_name,"," );
			
			$response[$j]['job_id'] = $jobDetail['job_id'];
			$response[$j]['employer_id'] = $jobDetail['employer_id'];
			$response[$j]['department_id'] = $jobDetail['department_id'];
			$response[$j]['type_of_work'] = $jobDetail['type_of_work'];
            $response[$j]['job_position'] = $jobDetail['job_position'];
            $response[$j]['job_code'] = $jobDetail['job_code'];
            $response[$j]['job_title'] = $jobDetail['job_title'];
            $response[$j]['job_description'] = $jobDetail['job_description'];
            $response[$j]['job_start_date']= $jobDetail['job_start_date'];
            $response[$j]['job_end_date']= $jobDetail['job_end_date'];
            $response[$j]['daily_rate']= $jobDetail['daily_rate'];
            $response[$j]['currency_type'] = $jobDetail['currency_type'];
            $response[$j]['size_of_vessel']= $jobDetail['size_of_vessel'];
            $response[$j]['yacht_type']= $jobDetail['yacht_type'];
            $response[$j]['job_exp']= $jobDetail['job_exp'];
            $response[$j]['is_published'] = $jobDetail['is_published'];
            $response[$j]['is_accepted']= $jobDetail['is_accepted'];
           	$response[$j]['created_date'] = $jobDetail['created_date'];
            $response[$j]['updated_date'] = $jobDetail['updated_date'];
            $response[$j]['repost']= $jobDetail['repost'];
            $response[$j]['status'] = $jobDetail['status'];
            $response[$j]['parent_id'] = $jobDetail['parent_id'];
            $response[$j]['department_name'] = $jobDetail['department_name'];
            $response[$j]['nationality_id'] = $jobDetail['nationality_id'];
            $response[$j]['first_name']= $jobDetail['first_name'];
            $response[$j]['last_name'] = $jobDetail['last_name'];
            $response[$j]['country_name'] = rtrim($cntry_name,"," );
			$j++;	
		}

		
		$records = array();
		
		$records['draw'] = "1";
		$records['recordsTotal'] = count($response);
		$records['recordsFiltered'] = count($response);
		$list = array();
		
		$i=1;	
	if(count($response)>0)
		 {
		   foreach($jobDetails as $jobDetail)
		 	{?>
		
				<!--<td><input type="checkbox" name="chkJob" id="<?php if(isset($jobDetail['job_id']) && !empty($jobDetail['job_id'])){ echo $jobDetail['job_id'];}?>" class="checkbox"/>
				</td>-->
				
				<?php $no=$i.".";?>
				<?php if(isset($jobDetail['country_name']) && !empty($jobDetail['country_name'])){ echo $jobDetail['country_name'];}?>
				<?php if(isset($jobDetail['job_title']) && !empty($jobDetail['job_title'])){ echo $jobDetail['job_title'];}?>
				<?php if(isset($jobDetail['daily_rate']) && !empty($jobDetail['daily_rate'])){ echo $jobDetail['daily_rate'];}?>
				<?php if(isset($jobDetail['department_name']) && !empty($jobDetail['department_name'])){ echo $jobDetail['department_name'];}?>
				<?php if(isset($jobDetail['yacht_type']) && !empty($jobDetail['yacht_type'])){ if($jobDetail['yacht_type'] == "M"){$yacht_type ="Motor";}else{$yacht_type ="Sail";}}?>
				<?php $edit="<input type='button' name='btnEdit' id='".$jobDetail['job_id']."' class='edit' value='Edit' />";?>
				<?php $del="<input type='button' name='btnDel' id='".$jobDetail['job_id']."' class='del' value='Delete' />";?>
			<?php if(isset($jobDetail['job_end_date']) && strtotime($jobDetail['job_end_date']) < strtotime(date('y-m-d'))){
				 $repost="<button name='btnRepost' id='".$jobDetail['job_id']."' class='read-but repost'>Repost</button>"; 
			}else{
				$repost='';
			} ?>
				
		 <?php 
		
		 $list[]=array("blank"=>"","no"=>$i,"country"=>"india","job_title"=>$jobDetail['job_title'],"daily_rate"=>$jobDetail['daily_rate'],"department"=>$jobDetail['department_name'],"yacht_type"=>$yacht_type,"edit"=>"","delete"=>"","repost"=>"");
		 
		 $i++; } 
		$records['data'] = $list;
		echo json_encode($records);
	}else{
		 	echo "<tr>No Records Found</tr>";
		 }
	
	}

	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 05 2014
	 * @Modified by	  :
	 * @Comment		  : Post New Job
	**/		
	public function actionPostNewJob()
	{
		session_start();
		$JobPost = new JobPost();
		$locations = "";
		foreach($_POST['cmbLocation'] as $arr) {
			    $locations .=$arr.",";
		}
		
		$selected_locations = rtrim($locations,",");
			
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			
		if(isset($_POST['txtJobTitle']) && !empty($_POST['txtJobTitle']))
		{
			$JobPost->job_title = $_POST['txtJobTitle'];
			 
		}
		if(isset($_POST['taJobDesc']) && !empty($_POST['taJobDesc']))
		{
			$JobPost->job_description = $_POST['taJobDesc'];
			 
		}
		if(isset($_POST['cmbDepartment']) && !empty($_POST['cmbDepartment']))
		{
			$JobPost->department_id = $_POST['cmbDepartment'];
			 
		}
		if(isset($_POST['cmbRank']) && !empty($_POST['cmbRank']))
		{
			$JobPost->job_position = $_POST['cmbRank'];
			
		}
		if(isset($_POST['cmbTypeWork']) && !empty($_POST['cmbTypeWork']))
		{
			$JobPost->type_of_work = $_POST['cmbTypeWork'];
			
		}
		if(isset($_POST['txtStartDate']) && !empty($_POST['txtStartDate']))
		{
			$JobPost->job_start_date = date('Y-m-d',strtotime($_POST['txtStartDate']));
				
		}
		if(isset($_POST['txtEndDate']) && !empty($_POST['txtEndDate']))
		{
			$JobPost->job_end_date = date('Y-m-d',strtotime($_POST['txtEndDate']));
			
		}
		if(isset($_POST['cmbLocation']) && !empty($_POST['cmbLocation']))
		{
			if(!empty($selected_locations))
			{
				$JobPost->country_id = $selected_locations;
			}	
			
		}
		if(isset($_POST['cmbJobExp']) && !empty($_POST['cmbJobExp']))
		{
			$JobPost->job_exp = $_POST['cmbJobExp'];
			
		}
		if(isset($_POST['txtDailyRate']) && !empty($_POST['txtDailyRate']))
		{
			$JobPost->daily_rate = $_POST['txtDailyRate'];
			
		}
		if(isset($_POST['txtVesselSize']) && !empty($_POST['txtVesselSize']))
		{
			$JobPost->size_of_vessel = $_POST['txtVesselSize'];
			
		}
		if(isset($_POST['cmbYachtType']) && !empty($_POST['cmbYachtType']))
		{
			$JobPost->yacht_type = $_POST['cmbYachtType'];
			
		}
		
		if(isset($_POST['txtCurrencyType']) && !empty($_POST['txtCurrencyType']))
		{
			$JobPost->currency_type = $_POST['txtCurrencyType'];
			
		}else{
			$jobPost->currency_type  = '';
		}
		
		if(isset($_POST['txtVacancy']) && !empty($_POST['txtVacancy']))
		{
			$JobPost->no_of_position = $_POST['txtVacancy'];
			
		}else{
			$jobPost->no_of_position  = '';
		}
		
		$jobPost->is_published  = '0';
		
		$jobPost->is_accepted  = '0';
		
		if(!empty($_POST['txtJobTitle']) && !empty($_POST['taJobDesc']) && !empty($_POST['cmbDepartment']) && !empty($_POST['cmbRank']) && !empty($_POST['cmbTypeWork']) && !empty($_POST['txtStartDate']) && !empty($_POST['txtEndDate']) && !empty($_POST['cmbLocation']))
		{
			
			$JobPost->employer_id = $_SESSION['uid'];
			
			$JobPost->job_code  = 1;
			
			
			if($JobPost->save(false)){
				
				$job_id = $JobPost->primaryKey;
				
				$Jobs = JobPost::model()->find("job_id='".$job_id."'");
				
				if(isset($_POST['dept_name']) && $_POST['dept_name'] == "Deck")
				{
					$Jobs->job_code = "01-".$job_id."-Deck";
				}
				if(isset($_POST['dept_name']) && $_POST['dept_name'] == "Engineering")
				{
					$Jobs->job_code = "02-".$job_id."-Engineering";
				}
				if(isset($_POST['dept_name']) && $_POST['dept_name'] == "Interior")
				{
					$Jobs->job_code = "05-".$job_id."-Interior";
				}
				if(isset($_POST['dept_name']) && $_POST['dept_name'] == "Galley")
				{
					$Jobs->job_code = "07-".$job_id."-Galley";
				}
				if(isset($_POST['dept_name']) && $_POST['dept_name'] == "Other")
				{
					$Jobs->job_code = "06-".$job_id."-Other";
				}
				
				if($Jobs->save(false))
				{
					echo 1;
				}
			}else{
				
				echo 0;
			}	
		}else{
			   echo 0;	
		}	
	 }else{
			$this->redirect(array('Login/'));
	 }
   }	
	 
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 17 2014
	 * @Modified by	  :
	 * @Comment		  : Repost Jobs
	**/			
	public function actionRepostJob()
	{
		session_start();
		
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && isset($_POST['job_id']) && isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['action'] == "Repost")
		{
			
			$jobId=$_POST['job_id'];
			$employer_id = $_SESSION['uid'];
			$msg = "";
			
			$employerDetail = EmployerDetail::model()->find("employer_id='".$employer_id."'");
			$RepostJob = JobPost::model()->find("job_id='".$jobId."' and employer_id='".$employer_id."' and  repost='0'");
					
			if($RepostJob){
						
							$RepostJob->repost = '1';
							$RepostJob->job_start_date = date('Y-m-d',strtotime($_POST['startDate']));
							$RepostJob->job_end_date = date('Y-m-d',strtotime($_POST['endDate'])); 
							
							if($RepostJob->save(false)){
					
								   $myInbox = new MyInbox();
									
								   $emailTemplate = EmailTemplate::model()->find("email_shortcode = 'REPOST_JOB'");
									
									//Admin Email Details 
									$adminDetails = Users::model()->find("id = '1'");
									//$to = $adminDetails['email'];
									$to ='nital@letsnurture.com';
									$from = $employerDetail['email'];
									$subject = $RepostJob['job_code'];

									$empname = $employerDetail['first_name']." ".$employerDetail['last_name'];

									$array_one = array("#employer_name#","#job_code#","#job_title#","#job_desc#","#job_start_date#","#job_end_date#","");

									$array_two = array($empname,$subject,$RepostJob['job_title'],$RepostJob['job_description'],date('m-d-Y',strtotime($RepostJob['job_start_date'])),date('m-d-Y',strtotime($RepostJob['job_end_date'])),"");
			
									$txt = str_replace($array_one, $array_two, $emailTemplate['email_body']);
									$message = $txt;
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= "From: < $from >"."\r\n";
									$status = mail($to,$subject,$message,$headers);
							
								if($status)
								{
										$myInbox->message_type = 'job_repost';
										$myInbox->thread_id = '0';
										$myInbox->user_type = 'employer';
										$myInbox->to_account_id = $adminDetails['id'];
										$myInbox->from_account_id = $employer_id;
										$myInbox->subject = $RepostJob['job_code'];
										$myInbox->message = $message;
										$myInbox->is_deleted_to = '0';
										$myInbox->is_deleted_from = '0';
										$myInbox->is_read_to = '0';
										$myInbox->delete_date_to = '0000-00-00';
										$myInbox->delete_date_from = '0000-00-00';
										$myinboxData->save(false);
					
									
									if($myInbox->save(FALSE)){
											$msg = 1;
									}else{
											$msg = 0;
									}
									
									
								}else{
									$msg = 0;
								}
								
							 }else{
								
								$msg = 0;
							}	
						}else{
							$msg = 0; 
					}
			echo $msg;
		}
	}
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 09 2014
	 * @Modified by	  :
	 * @Comment		  : Browse Relief Crews
	**/				
	public function actionBrowseCrews()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | Browse Relief Crews ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer"){
		//Premium crews								
		$premium_crews = (Yii::app()->db->createCommand("SELECT country_data.*,department.*,crew_detail.*,q.* from `crew_detail`
														join country_data ON crew_detail.`country_id`= country_data.`country_id`
														join department ON crew_detail.`department_id`= department.`department_id`
														join qualifications  as q ON crew_detail.`qualification_id`= q.`qualification_id`	
														where crew_detail.is_premium='1' and crew_detail.status='1'  GROUP BY  crew_detail.crew_id"));		
		$premCrews = $premium_crews->queryAll();
		
		//Employer's favourite crews															
		$fav_crews = (Yii::app()->db->createCommand("SELECT country_data.*,department.*,crew_detail.*,q.*,f.* from `crew_detail`
													join country_data ON crew_detail.`country_id`= country_data.`country_id`
													join department ON crew_detail.`department_id`= department.`department_id`
													join qualifications as q ON crew_detail.`qualification_id`= q.`qualification_id`
													join fav_crew as f ON crew_detail.`crew_id`= f.`crew_id`
													where crew_detail.is_premium='0' and f.employer_id='".$_SESSION['uid']."' and f.status='1'  GROUP BY  crew_detail.crew_id"));
		$favCrews = $fav_crews->queryAll();		
													
		//Shown Intereset by Employer											
	    $shownIns_crews = (Yii::app()->db->createCommand("SELECT shown_int.*,country_data.*,department.*,crew_detail.*,q.* FROM `employer_job_interest` as shown_int
													      join crew_detail ON shown_int.`crew_id`= crew_detail.crew_id 
													      join department ON crew_detail.`department_id`= department.department_id
													      join country_data ON crew_detail.`country_id`= country_data.`country_id`
													      join qualifications  as q ON crew_detail.`qualification_id`= q.`qualification_id`
													      WHERE crew_detail.is_premium='0' and shown_int.`employer_id`='".$_SESSION['uid']."' and shown_int.status='1' and crew_detail.crew_id NOT IN (SELECT crew_id From `fav_crew`) GROUP BY  crew_detail.crew_id" ));
		$shownIntCrews = $shownIns_crews->queryAll();														
														
		//Other Crews
	   $crews = (Yii::app()->db->createCommand("SELECT country_data.*,department.*,crew_detail.*,q.* from `crew_detail`
												join country_data ON crew_detail.`country_id`= country_data.`country_id`
												join department ON crew_detail.`department_id`= department.`department_id`
												join qualifications  as q ON crew_detail.`qualification_id`= q.`qualification_id`
												where crew_detail.is_premium='0' and crew_detail.status='1' and crew_detail.crew_id NOT IN (SELECT crew_id From `fav_crew`) and crew_detail.crew_id NOT IN (SELECT crew_id From `employer_job_interest`)  GROUP BY  crew_detail.crew_id"));
	    $OtherCrews = $crews->queryAll();	
	    
	    //Get Departments in which employer posted jobs
	     
	    $EmpJobPostedDepts = (Yii::app()->db->createCommand("SELECT distinct(department_name) from department where department_id IN (Select department_id from job_post where employer_id='".$_SESSION['uid']."' and status='1')"));
		
		$departments = $EmpJobPostedDepts->queryAll();
		
		$names_res = (Yii::app()->db->createCommand("SELECT CONCAT(first_name,' ',last_name) as name FROM crew_detail where status='1'"));

		$fullnames = $names_res->queryAll();
			
		$rates = (Yii::app()->db->createCommand("SELECT DISTINCT(daily_rate) as daily_rate FROM crew_detail where status='1'"));
			
		$daily_rates = $rates->queryAll();
			
		$locations = CountryData::model()->findAll(array('order'=>'country_name asc'));
			
		$depts = Department::model()->findAll('parent_id=0',array('order'=>'department_name asc'));
			
		$qualifications = Qualifications::model()->findAll('parent_id NOT iN(0)',array('order'=>'qualification_name asc'));
	
		 																													
		$this->render('browse-relief-crews',array('premCrews'=>$premCrews,"favCrews"=>$favCrews,"shownIntCrews"=>$shownIntCrews,"OtherCrews"=>$OtherCrews,"departments"=>$departments,"fullnames"=>$fullnames,"daily_rates"=>$daily_rates,"locations"=>$locations,"depts"=>$depts,"qualifications"=>$qualifications));
		
		}else{
			
			$this->redirect(array('Login/'));
		}
	
	}
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 11 2014
	 * @Modified by	  :
	 * @Comment		  : Shown Interest (Jobs)
	**/	
	public function actionJobShownInterest()
	{
		session_start();
		$response=array();
		
		
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			
		if(isset($_POST['crew_id']) && isset($_POST['job_id']))
		{
			$crewId = $_POST['crew_id'];
			$jobId = $_POST['job_id'];
			
			$msg = "";
			$email_message = "";
			$message = "";
			
				$job = JobPost::model()->find("job_id='".$jobId."' and employer_id='".$_SESSION['uid']."' and  repost='0' and status='1'");	
					
					if($job){
				
					$crewDetail = CrewDetail::model()->find("crew_id = '".$crewId."'");
				
					$employerDetail = EmployerDetail::model()->find("employer_id = '".$_SESSION['uid']."'");
					
					$jobIntId = EmployerJobInterest::model()->find("job_id='".$job['job_id']."' and crew_id ='".$crewId."' and employer_id='".$_SESSION['uid']."'");
							
							if($jobIntId){
									
										echo 2;
										
									}else{
											
										$jobInterest=new EmployerJobInterest();
										
										$myInbox = new MyInbox();
										
										if(isset($job['job_id']) && !empty($job['job_id'])){
										$jobInterest->job_id=$job['job_id'];	
										}
										if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
											$jobInterest->employer_id=$_SESSION['uid'];
										}
										if(isset($crewId) && !empty($crewId)){
											$jobInterest->crew_id=$crewId;
										}
										
										if($jobInterest->save(FALSE)){
											
											
										$emailTemplate = EmailTemplate::model()->find("email_shortcode = 'SHOW_INTEREST_EMPLOYER'");
									
										$to = $crewDetail['email'];
										$from = $employerDetail['email'];
										$subject = $job['job_code'];
	
										$empname = $employerDetail['first_name']." ".$employerDetail['last_name'];
	
										$array_one = array("#username#","#crew_email#","#employer_name#","#job_code#","#job_title#","#job_desc#","#job_start_date#","#job_end_date#","");
	
										$array_two = array($crewDetail['first_name'],$crewDetail['email'],$empname,$job['job_code'],$job['job_title'],$job['job_description'],date('m-d-Y',strtotime($job['job_start_date'])),date('m-d-Y',strtotime($job['job_end_date'])),"");
				
										$txt = str_replace($array_one, $array_two, $emailTemplate['email_body']);
										
										$message = $txt;
										
										
										$headers  = 'MIME-Version: 1.0' . "\r\n";
										$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
										$headers .= "From: < $from >"."\r\n";
										$status = mail($to,$subject,$message,$headers);
										
										if($status)
												{
													$myInbox->message_type = "shown_interest_started";
													$myInbox->thread_id = 0;
													$myInbox->job_id = $job['job_id'];
													$myInbox->user_type = "employer";
													$myInbox->to_account_id = $crewId;
													$myInbox->from_account_id = $_SESSION['uid'];
													$myInbox->subject = $subject;
													$myInbox->message = $message;
													$myInbox->is_deleted_to = '0';
													$myInbox->is_deleted_from = '0';
													$myInbox->is_read_to = '0';
													$myInbox->delete_date_to = '0000-00-00';
													$myInbox->delete_date_from = '0000-00-00';
													
													if($myInbox->save(FALSE)){
															
														echo 1;
													}else{
														echo 0;
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
			}else{
				$this->redirect(array('Login/'));
			}
			
	}	
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	Septmber 20 2014
	 * @Modified by	  :
	 * @Comment		  : Add crew as Employer's favourite()
	**/	
	public function actionFavourite(){
		session_start();
		$response=array();
		
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['crew_ids']))
		{
			
			$crewIds = explode(',',$_POST['crew_ids']);
		
			$msg="";
			for($i=0;$i<count($crewIds);$i++){
				
					$FavId = FavCrew::model()->find("crew_id ='".$crewIds[$i]."' and employer_id='".$_SESSION['uid']."'");
						
						if($FavId){
								
									$msg = 2;
								
								}else{
										
									$crewId = $crewIds[$i];
									
									$fav = new FavCrew();
									if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
										
										$fav->employer_id=$_SESSION['uid'];
									}
									if(isset($crewId) && !empty($crewId)){
										
										$fav->crew_id=$crewId;
									}
								
									if($fav->save(FALSE)){
										
										$msg =  1;
										
									}else{
										$msg =  0;
									}
								}
					}

				echo $msg;
				
			}else{
				
				$this->redirect(array('Login/'));
				
			}
	}	

	/**
	 * @Method		  :	POST
	 * @Params		  : department_id
	 * @author        : Nital Chauhan
	 * @created		  :	September 23 2014
	 * @Modified by	  :
	 * @Comment		  : Get Ranks(designation on basis of department )
	**/	
	public function actionGetRanks()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['department_id']))
		{
			$department_id = $_POST['department_id'];
			
			$departments = Department::model()->findAll('parent_id='.$department_id,array('order'=>'department_name asc'));
			
			if(count($departments)>0)
			{?>
				
				<?php foreach($departments as $dept)
				{ ?>
					<option value='<?php if(isset($dept['department_id'])){ echo $dept['department_id'];?>'><?php echo $dept['department_name'];?></option><?php } ?>
				<?php }
			}
			
			
		}else{
			$this->redirect(array('Login/'));
		}
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : department_id
	 * @author        : Nital Chauhan
	 * @created		  :	September 23 2014
	 * @Modified by	  :
	 * @Comment		  : Get Recent Jobs(Latest jobs on basis of department )
	**/	
	public function actionGetRecentJobs()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['department_name']) && isset($_POST['crew_id']))
		{
			$department_name = $_POST['department_name'];
			$crew_id = $_POST['crew_id'];
			
					
			$postedJobs = (Yii::app()->db->createCommand("SELECT job_posted.*,d.* FROM `job_post` as job_posted join department as d on job_posted.department_id=d.department_id
			where job_posted.employer_id='".$_SESSION['uid']."' and job_posted.repost='0' and job_posted.job_end_date>CURDATE()  and job_posted.status='1' and d.department_name LIKE '%$department_name%' and job_posted.job_id NOT IN(SELECT job_id from employer_job_interest where crew_id='".$crew_id."') and job_posted.job_id NOT IN(SELECT job_id from job_application where crew_id='".$crew_id."') order by job_posted.created_date desc"));

			$jobs = $postedJobs->queryAll();
		
			if(count($jobs)>0)
			{ foreach($jobs as $job)
				{ ?>
					<li><input type="checkbox" class="chk-job" id="<?php echo $job['job_id'];?>"><label><?php echo $job['job_title'];?></label><label><?php echo "From: ".date('F j Y',strtotime($job['job_start_date']))." to ".date('F j Y',strtotime($job['job_end_date']));?></label></li>
				<?php }
			}else{ ?>
				<!--<a href="<?php echo Yii::app()->getBaseUrl(true);?>/Employer/MyJobs">Post New Job</a>-->
				<a href="javascript:;" id="btnPostNewJob">Post New Job</a>
				<div class='new-job' style="display:none;">
				<ul>
					<li><label>Job Title</label><input type="text" name="txtJobTitle" id="txtJobTitle" class="txt-bx"/></li>
					<li><label>Job Description</label><textarea name="taJobDesc" id="taJobDesc"></textarea></li>
					<li><label>Department</label>
					<select name='cmbDepartment' id='cmbDepartment' title='Department' class='selectpicker'>
						<option value=''>Please select Department</option>
					<?php if(count($departments)>0){
						foreach($departments as $department){?>	
                  <option value="<?php if(isset($department['department_id']) && !empty($department['department_id'])){ echo $department['department_id']; }?>"><?php if(isset($department['department_name']) && !empty($department['department_name'])){ echo $department['department_name']; }?></option>
                  <?php } }?>
                  <option value='-1'>Other</option>
             </select>
                  </li>
                       <li><label>Rank</label>
                       	<select name='cmbRank' id='cmbRank' class='selectpicker'>
                       		<option value=''>Please select Rank</option>
                        
                        	</select>
                        	</li>
                       <li><label>Type of work</label><select name='cmbTypeWork' id='cmbTypeWork' class='selectpicker'>
                        	<option value=''>Please select Type of Work</option>
                        	<?php if(count($works)>0){
							foreach($works as $work){?>	
	                  <option value="<?php if(isset($work['type_id']) && !empty($work['type_id'])){ echo $work['type_id']; }?>"><?php if(isset($work['work_type']) && !empty($work['work_type'])){ echo $work['work_type']; }?></option>
	                  <?php } }?>
                        	
                        	</select>
                        	
                        	</li>
                        	<li><label>Date Range</label>
                        		<input type='text' placeholder='Start Date' title='Start Date' name='txtStartDate' class="datepicker txt-bx dt"> 
                        		<input type='text' placeholder='End Date' title='End Date' name='txtEndDate' class="datepicker txt-bx dt">
                        		
                        		</li>
                        	<li><label>Location</label>
                        	<select name='cmbLocation[]' id='cmbLocation' class='multiselect' multiple="multiple">
                        	<?php if(count($locations)>0){
							foreach($locations as $location){
								if(!empty($location['country_id']) && !empty($location['country_name']))
								{?>	
	                  <option value="<?php if(isset($location['country_id']) && !empty($location['country_id'])){ echo $location['country_id']; }?>"><?php if(isset($location['country_name']) && !empty($location['country_name'])){ echo $location['country_name']; }?></option>
	                  <?php } } } ?>
                        	</select>
                        	
                        	</li>
                        	<li><label>Experience</label>
                        	<select class="selectpicker" name="cmbJobExp" id="cmbJobExp">
                            <option value="">Please experience</option>
                            <option value="-1">less than 1 Year</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Years</option>
                            <option value="3">3 Years</option>
                            <option value="4">4 Years</option>
                            <option value="5">5 Years</option>
                            <option value="6">6 Years</option>
                            <option value="7">7 Years</option>
                            <option value="8">8 Years</option>
                            <option value="9">9 Years</option>
                            <option value="10">10 Years</option>
                            <option value="11">More than 10 Years</option>
                            </select> 
                        		
                        		
                        	</li>
                        	<li><label>Daily Rate</label>
 							
                        	<div id="slider-range"></div>
                        	<input type="text" id="txtDailyRate" name="txtDailyRate" class="txt-bx sl">
                        	<span id="validRate"></span>
                        	</li>
                        	<li>
                        		<label>Currency Type</label>
                        		<input type="text" name="txtCurrencyType" id="txtCurrencyType" class="txt-bx"/>
                        	</li>
                        	<li>
                        		<label>Total Vacancy</label>
                        		<input type="text" name="txtVacancy" id="txtVacancy" class="txt-bx"/>
                        	</li>
                        	<li>
                        		<label>Size of Vessel</label>
                        		<input type="text" name="txtVesselSize" id="txtVesselSize" class="txt-bx"/>
                        	</li>
                        	<li>
                        		<label>Type of Yacht</label>
                        		<select name="cmbYachtType" id="cmbYachtType" class='selectpicker'>
                        			<option value="">Please select yacht type</option>
                        			<option value="M">Motor</option>
                        			<option value="S">Sail</option>
                        		</select>
                        	</li>
                         </ul>
                   <script type="text/javascript">
					$(function() {
				$('.selectpicker').selectpicker("refresh");		
				 $( "#slider-range" ).slider({
					      range: true,
					      min: 0,
					      max: 100,
					      values: [1,5],
					      slide: function( event, ui ) {
					        $( "#txtDailyRate" ).val(ui.values[ 1 ] );
					       
					      }
					    });
					    $( "#txtDailyRate" ).val($( "#slider-range" ).slider( "values", 1 ) );
					   
					  });
					</script>
               		</div>		
			<?php }	
			
			
		}else{
			$this->redirect(array('Login/'));
		}
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : selName,selDepartment,selQual,selDailyRate,selLocation
	 * @author        : Nital Chauhan
	 * @created		  :	September 30 2014
	 * @Modified by	  :
	 * @Comment		  : save selected search criteria
	**/	
	public function actionSavedSearchRecords()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | Saved History ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$saveSearch = new SavedSearchEmployer();
			
			$saveSearch->employer_id = $_SESSION['uid']; 
			
			if(isset($_POST['selName']) && !empty($_POST['selName']))
			{
				$saveSearch->name = $_POST['selName'];
			}else{
				$saveSearch->name ='';
			}
			if(isset($_POST['selGender']) && !empty($_POST['selGender']))
			{
				$saveSearch->gender = $_POST['selGender'];
			}		
			if(isset($_POST['selDepartment']) && !empty($_POST['selDepartment']))
			{
				$saveSearch->department = $_POST['selDepartment'];
			}else{
				$saveSearch->department ='';
			}
			if(isset($_POST['selQual']) && !empty($_POST['selQual']))
			{
				$saveSearch->qualification = $_POST['selQual'];
			}else{
				$saveSearch->qualification ='';
			}
			if(isset($_POST['selDailyRate']) && !empty($_POST['selDailyRate']))
			{
				$saveSearch->daily_rate = $_POST['selDailyRate'];
			}else{
				$saveSearch->daily_rate ='';
			}
			if(isset($_POST['selJobExp']) && !empty($_POST['selJobExp']))
			{
				$saveSearch->job_exp = $_POST['selJobExp'];
			}else{
				$saveSearch->job_exp ='';
			}
			if(isset($_POST['selLocation']) && !empty($_POST['selLocation']))
			{
				$saveSearch->location = $_POST['selLocation'];
			}else{
				$saveSearch->location ='';
			}
			
			$result = SavedSearchEmployer::model()->find("name ='".$_POST['selName']."' and department='".$_POST['selDepartment']."' and qualification='".$_POST['selQual']."' and daily_rate='".$_POST['selDailyRate']."' and location='".$_POST['selLocation']."'");
			
			if($result)
			{
				echo 2;
				
			}else{
				
				if($saveSearch->save(FALSE))
				{
					echo 1;
				}else{
					echo 0;
				}
			}	
			
		}else{
			$this->redirect(array('Login/'));
		}
	}			
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 1 2014
	 * @Modified by	  :
	 * @Comment		  : My Mail
	**/	
	public function actionMyMail()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | My Mail ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			//Job accepted mails
			/*$hireMsgListing = MyInbox::model()->findAll(array("condition"=>"to_account_id ='".$_SESSION['uid']."' and message_type = 'job_accepted' and is_deleted_to NOT IN(1)",'order'=>'message_ID desc'));
			
			$sql=Yii::app()->db->createCommand("SELECT my_inbox.`job_id`,job_post.country_id,country_data.* FROM `my_inbox` 
			  												JOIN job_post ON my_inbox.`job_id`=job_post.`job_id` 
			  												JOIN country_data ON country_data.country_id=job_post.country_id 
			  												WHERE my_inbox.to_account_id = ".$_SESSION['uid']." AND my_inbox.is_deleted_to NOT IN(1) ORDER BY message_ID DESC ");
			$hireMsgListing = $sql->queryRow();
		
			//shown interest mails
			$shwIntMsgListing = MyInbox::model()->findAll(array("condition"=>"to_account_id ='".$_SESSION['uid']."' and message_type = 'show_interest_crew' and is_deleted_to NOT IN(1)",'order'=>'message_ID desc'));
			
			//Repost job
			$repostMsgListing = MyInbox::model()->findAll(array("condition"=>"to_account_id ='".$_SESSION['uid']."' and message_type = 'job_repost' and is_deleted_to NOT IN(1)",'order'=>'message_ID desc'));
			
			//payment
			$paymentMsgListing = MyInbox::model()->findAll(array("condition"=>"to_account_id ='".$_SESSION['uid']."' and message_type = 'payment' and is_deleted_to NOT IN(1)",'order'=>'message_ID desc'));
			
			//premium crews
			$preMsgListing = MyInbox::model()->findAll(array("condition"=>"to_account_id ='".$_SESSION['uid']."' and message_type = 'premium_crew' and is_deleted_to NOT IN(1)",'order'=>'message_ID desc'));
			
			
			//Total New Job accepted mails
			$newMsg = count(MyInbox::model()->findAll("to_account_id = '".$_SESSION['uid']."' and is_read_to='0' and is_deleted_to NOT IN(1)"));
			
			
			$this->render('my-mail',array('hireMsgListing'=>$hireMsgListing,'shwIntMsgListing'=>$shwIntMsgListing,'repostMsgListing'=>$repostMsgListing,'paymentMsgListing'=>$paymentMsgListing,'preMsgListing'=>$preMsgListing,
			'newMsg'=>$newMsg));*/
			
			$msgListing=array();
			$msgInbox = MyInbox::model()->findAll("to_account_id = '".$_SESSION['uid']."' AND is_deleted_to NOT IN(1) ORDER BY message_ID DESC");
			$newMsg = count(MyInbox::model()->findAll("to_account_id = '".$_SESSION['uid']."' AND is_read_to='0' AND is_deleted_to NOT IN(1) ORDER BY message_ID DESC"));
			
			 
			 foreach($msgInbox as $messages){
				
				$res['message_ID']=$messages['message_ID'];
				$res['job_id']=$messages['job_id'];
				$res['message_type']=$messages['message_type'];
				$res['thread_id']=$messages['thread_id'];
				$res['user_type']=$messages['user_type'];
				$res['to_account_id']=$messages['to_account_id'];
				$res['from_account_id']=$messages['from_account_id'];
				$res['subject']=$messages['subject'];
				$res['message']=$messages['message'];
				$res['is_deleted_to']=$messages['is_deleted_to'];
				$res['is_deleted_from']=$messages['is_deleted_from'];
				$res['is_read_to']=$messages['is_read_to'];
				$res['send_date_from']=$messages['send_date_from'];
				$res['delete_date_to']=$messages['delete_date_to'];
				$res['delete_date_from']=$messages['delete_date_from'];
				$sql=Yii::app()->db->createCommand("SELECT my_inbox.`job_id`,job_post.country_id,country_data.* FROM `my_inbox` 
			  												JOIN job_post ON my_inbox.`job_id`=job_post.`job_id` 
			  												JOIN country_data ON country_data.country_id=job_post.country_id 
			  												WHERE  my_inbox.message_ID=".$messages['message_ID']);
					$model = $sql->queryRow();
					
				$res['country_image']=$model['country_image'];
				$msgListing[]=$res;
			}
			$this->render('my-mail',array('msgListing'=>$msgListing,'newMsg'=>$newMsg));
			
		
		}else{
			$this->redirect(array('Login/'));
		}
		
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 1 2014
	 * @Modified by	  :
	 * @Comment		  : Saved Search 
	**/	
	public function actionSavedSearch()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | Saved History ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$employer_id = $_SESSION['uid'];
			
			$saveSrches = SavedSearchEmployer::model()->findAll("employer_id='$employer_id'");
			
			$names_res = (Yii::app()->db->createCommand("SELECT CONCAT(first_name,' ',last_name) as name FROM crew_detail where status='1'"));

			$fullnames = $names_res->queryAll();
			
			$rates = (Yii::app()->db->createCommand("SELECT DISTINCT(daily_rate) as daily_rate FROM crew_detail where status='1'"));
			
			$daily_rates = $rates->queryAll();
			
			$locations = CountryData::model()->findAll(array('order'=>'country_name asc'));
			
			$departments = Department::model()->findAll('parent_id=0',array('order'=>'department_name asc'));
			
			$qualifications = Qualifications::model()->findAll('parent_id NOT iN(0)',array('order'=>'qualification_name asc'));
			
			$this->render('saved-search',array('saveSrches'=>$saveSrches,"fullnames"=>$fullnames,"daily_rates"=>$daily_rates,"locations"=>$locations,"departments"=>$departments,"qualifications"=>$qualifications));
		
		}else{
			$this->redirect(array('Login/'));
		}
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : selName,selDepartment,selQual,selDailyRate,selLocation
	 * @author        : Nital Chauhan
	 * @created		  :	October 1 2014
	 * @Modified by	  :
	 * @Comment		  : Edit save selected search criteria
	**/	
	public function actionEditSaveSearch()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['hdnSearchID']))
		{
			$search_id = $_POST['hdnSearchID'];
			
			$saveSearch = SavedSearchEmployer::model()->find("search_id='$search_id'");
			
			if($saveSearch)
			{
				$saveSearch->search_id = $search_id;
				
				$saveSearch->employer_id = $_SESSION['uid']; 
				
					if(isset($_POST['selName']) && !empty($_POST['selName']))
					{
						$saveSearch->name = $_POST['selName'];
					}else{
						$saveSearch->name ='';
					}
					if(isset($_POST['selGender']) && !empty($_POST['selGender']))
					{
						$saveSearch->gender = $_POST['selGender'];
						
					}		
					if(isset($_POST['selDepartment']) && !empty($_POST['selDepartment']))
					{
						$saveSearch->department = $_POST['selDepartment'];
					}else{
						$saveSearch->department ='';
					}
					if(isset($_POST['selQual']) && !empty($_POST['selQual']))
					{
						$saveSearch->qualification = $_POST['selQual'];
					}else{
						$saveSearch->qualification ='';
					}
					if(isset($_POST['selDailyRate']) && !empty($_POST['selDailyRate']))
					{
						$saveSearch->daily_rate = $_POST['selDailyRate'];
					}else{
						$saveSearch->daily_rate ='';
					}
					if(isset($_POST['selJobExp']) && !empty($_POST['selJobExp']))
					{
						$saveSearch->job_exp = $_POST['selJobExp'];
					}else{
						$saveSearch->job_exp ='';
					}
					if(isset($_POST['selLocation']) && !empty($_POST['selLocation']))
					{
						$saveSearch->location = $_POST['selLocation'];
					}else{
						$saveSearch->location ='';
					}
					
					if($saveSearch->save(FALSE))
					{
						echo 1;
					}else{
						echo 0;
					}
			}else{
				echo 0;
			}	
			
		}else{
			$this->redirect(array('Login/'));
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : search_id
	 * @author        : Nital Chauhan
	 * @created		  :	October 1 2014
	 * @Modified by	  :
	 * @Comment		  : Delete save selected search criteria
	**/	
	public function actionDelSaveSearch()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['search_id']))
		{
			$search_id = $_POST['search_id'];
			
			$saveSrch = SavedSearchEmployer::model()->find("search_id='$search_id'");
			$deleteRecord = $saveSrch->delete();
			
			if($deleteRecord)
			{
				echo 1;
			}else{
				echo 0;
			}
			
		}else{
			$this->redirect(array('Login/'));
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : search_id
	 * @author        : Nital Chauhan
	 * @created		  :	October 3 2014
	 * @Modified by	  :
	 * @Comment		  : Load selected save search criteria
	**/	
	public function actionLoadSaveSearch()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer" && isset($_POST['search_id']))
		{
			$searchString = $_POST['searchStr'];
			
			$srch = explode(",",$searchString);
			
			$cond = "";
			$name = explode(" ",$srch[0]);
			$firstname = $name[0];
			$lastname = $name[1];
			$country = $srch[1];
			$daily_rate = $srch[2];
			$department = $srch[3];
			$qualification = $srch[4];
			$job_exp = $srch[5];
			$gender = $srch[6];
			
			$search_enabled_fields = array("crew_detail.first_name"=>$firstname,"crew_detail.last_name"=>$lastname,
			"country_data.country_name"=>$country,"crew_detail.daily_rate"=>$daily_rate,"department.department_name"=>$department,
			"q.qualification_name"=>$qualification,"crew_detail.years_in_yachting"=>$job_exp,"crew_detail.gender"=>$gender);
			
			$conditions = array();
			foreach ($search_enabled_fields as $key=>$value) {
			 if (!empty($value)) { 
			    $value = $value;
			 
			    $conditions[] = "$key = '$value'";
			  }
			  
			}
			if (count($conditions) > 0) {
			  $cond.= " WHERE ". implode(' AND ', $conditions);
			}
			$sql = (Yii::app()->db->createCommand("SELECT country_data.*,department.*,crew_detail.*,q.* from `crew_detail`
														join country_data ON crew_detail.`country_id`= country_data.`country_id`
														join department ON crew_detail.`department_id`= department.`department_id`
														join qualifications  as q ON crew_detail.`qualification_id`= q.`qualification_id`	
													    $cond"));
			$rows = $sql->queryAll();
		
			if(count($rows)>0)
			{?>
				<table id="tblSearchResult" class="display" cellspacing="0" width="100%" name="tblSearchResult">
				<thead>
					<tr>
						<th style="display:none;"></th>
						<th></th>
						<th >Name</th>
						<th>Department</th>
						<th>Qualification</th>
						<th>Daily Rate</th>
						<th>Location</th>
						<th>Gender</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($rows as $row)
				{ ?>
				 <tr><td></td>
				<td><input type="checkbox" id="<?php if(isset($row['crew_id']) && !empty($row['crew_id'])){ echo $row['crew_id'];}?>" class="checkbox" name="<?php if(isset($OtherCrew['first_name']) && !empty($OtherCrew['first_name']) && isset($OtherCrew['last_name']) && !empty($OtherCrew['last_name'])){ echo $OtherCrew['first_name']." ".$OtherCrew['last_name'];}?>"/></td>
				<td><?php if(isset($row['first_name']) && !empty($row['first_name']) && isset($row['last_name']) && !empty($row['last_name'])){ echo $row['first_name']." ".$row['last_name'];}?></td>
				<td><?php if(isset($row['department_name']) && !empty($row['department_name'])){ echo $row['department_name'];}?></td>
				<td><?php if(isset($row['qualification_name']) && !empty($row['qualification_name'])){ echo $row['qualification_name'];}?></td>
				<td><?php if(isset($row['daily_rate']) && !empty($row['daily_rate'])){ echo $row['daily_rate'];}?></td>
				<td><?php if(isset($row['country_name']) && !empty($row['country_name'])){ echo $row['country_name'];}?></td>
				<td><?php if(isset($row['gender']) && !empty($row['gender'])){ echo $row['gender'];}?></td>
				<td><input type="button" tabindex="<?php if(isset($row['department_name']) && !empty($row['department_name'])){ echo $row['department_name'];}?>" id="<?php if(isset($row['crew_id']) && !empty($row['crew_id'])){ echo $row['crew_id'];}?>" name="<?php if(isset($row['first_name']) && !empty($row['first_name']) && isset($row['last_name']) && !empty($row['last_name'])){ echo $row['first_name']." ".$row['last_name'];}?>" class="read-but show-int" value="Show Interest"/></td>
				</tr>
			<?php } ?>
			</tbody>
			</table>
			
			<?php }else{
					
				echo 0;
			}
		
		}else{
			$this->redirect(array('Login/'));
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 4 2014
	 * @Modified by	  :
	 * @Comment		  : View Mail Details 
	**/	
	public function actionViewMailDetail()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			if(isset($_POST['message_id']) && !empty($_POST['message_id']))
			{
				$message_id = $_POST['message_id'];
				
				$msgDetail = MyInbox::model()->find("message_id='$message_id'");
				
				if(!empty($msgDetail))
				{
					$response = array();
					$msgDetail->is_read_to = '1';
					
					$msgDetail->save(FALSE);
					
					$employer_id = $_SESSION['uid'];
					
					$msgDetailReadCount = MyInbox::model()->findAll("to_account_id = '".$_SESSION['uid']."' and is_read_to='0' and is_deleted_to NOT IN(1)");
					
					$response[0] = "<div class='positiontab'><h4>Message Detail</h4><div class='maildiv'>".$msgDetail['message']."</div></div>";
					$response[1]= count($msgDetailReadCount);
					
					echo json_encode($response);		
				}
			}else{
				echo "No Message found.";
			}
			
		}else{
			$this->redirect(array('Login/'));
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 4 2014
	 * @Modified by	  :
	 * @Comment		  : Account Settings 
	**/	
	
	public function actionAccountSettings()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | Account Settings ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$employer_id = $_SESSION['uid'];
			
			$employerDetail = EmployerDetail::model()->find("employer_id='$employer_id'");
			
			$this->render('account-setting',array("employerDetail"=>$employerDetail));
			
		}else{
			
			$this->redirect(array('Login/'));
		}
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 4 2014
	 * @Modified by	  :
	 * @Comment		  : Set Email Alerts 
	**/	
	public function actionEmailAlerts()
	{
		
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$employer_id = $_SESSION['uid'];
			
			$model = EmployerDetail::model()->find("employer_id='$employer_id'");
			
			if(isset($_POST['chkEmailAlerts']) && !empty($_POST['chkEmailAlerts']))
			{ 
				$model->email_notification = $_POST['chkEmailAlerts'];
				
				if($model->save(FALSE))
					{
						echo 1;
						
						
					}else{
						echo 0;
					}
			}else{
				$model->email_notification = '0';
				
				if($model->save(FALSE))
					{
						echo 2;
						
						
					}else{
						echo 0;
					}
			}	
			
			
			
		}else{
			
			$this->redirect(array('Login/'));
		}
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 6 2014
	 * @Modified by	  :
	 * @Comment		  : Delete Job Post
	**/	
	public function actionDeleteJobPost(){
		
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
		
		if(empty($_POST['job_id']) && !isset($_POST['job_id']))
		{
			echo 0;
		}else{
			
			$deletejobPost = JobPost::model()->find("job_id = '".$_POST['job_id']."'");
			if($deletejobPost){
				$jobID = $deletejobPost['job_id'];
				$deleteJobPostData = JobPost::model()->find("job_id = '".$jobID."'");
				if($deleteJobPostData->delete()){
					echo 1;
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}
		}else{
			
			$this->redirect(array('Login/'));
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 6 2014
	 * @Modified by	  :
	 * @Comment		  : Edit Job Post Details display
	**/	
	public function actionEditJobPostDetails()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{	
			if(empty($_POST['job_id']) && !isset($_POST['job_id']))
			{
				echo 0;
				
			}else{
					$editjobPost = JobPost::model()->find("job_id = '".$_POST['job_id']."'");
					
					$departments = Department::model()->findAll('parent_id=0',array('order'=>'department_name asc'));
					
					$ranks = Department::model()->findAll('parent_id=7',array('order'=>'department_name asc'));
					
					$works = TypeOfWork::model()->findAll("status='1'",array('order'=>'work_type asc'));
					
					$locations = CountryData::model()->findAll(array('order'=>'country_name asc'));
			
					if($editjobPost){ ?>
						
						<div class='modal'>
	<span class="title">Post New Job</span>
		<div class='formdiv'>
		<form method='POST' name='frmEditJobPost' id='frmEditJobPost' enctype='application/x-www-form-urlencoded'>
			<input type="hidden" name="job_id" id="job_id" value="<?php if(isset($editjobPost['job_id']) && !empty($editjobPost['job_id'])){ echo $editjobPost['job_id']; }?>" />
			 <div class='alert' id='edmsg' style='display:none;'>
				<span id='edmsgData'></span>
				</div>
				<ul>
					<li><label>Job Title</label><input type="text" name="txtJobTitleEdit" id="txtJobTitleEdit" class="txt-bx" value="<?php if(isset($editjobPost['job_title']) && !empty($editjobPost['job_title'])){  echo $editjobPost['job_title'];} ?>"/></li>
					<li><label>Job Description</label><textarea name="taJobDescEdit" id="taJobDescEdit"><?php if(isset($editjobPost['job_title']) && !empty($editjobPost['job_description'])){  echo $editjobPost['job_description'];} ?></textarea></li>
					<li><label>Department</label>
					<select name='cmbDepartmentEdit' id='cmbDepartmentEdit' title='Department' class='selectpicker'>
						<option value=''>Please select Department</option>
					<?php if(count($departments)>0){
						foreach($departments as $department){?>	
                  <option value="<?php if(isset($department['department_id']) && !empty($department['department_id'])){ echo $department['department_id']; }?>" <?php if(isset($department['department_id']) && !empty($department['department_id'])){ if($department['department_id'] == $editjobPost['department_id']){ ?> selected="selected" <?php } } ?>><?php if(isset($department['department_name']) && !empty($department['department_name'])){ echo $department['department_name']; }?></option>
                  <?php } }?>
                  <option value='-1'>Other</option>
             </select>
                  </li>
                       <li><label>Rank</label>
                       	<select name='cmbRankEdit' id='cmbRankEdit' class='selectpicker'>
                       		<option value=''>Please select Rank</option>
                        	<?php if(count($ranks)>0){
							foreach($ranks as $rank){?>	
	                  <option value="<?php if(isset($rank['department_id']) && !empty($rank['department_id'])){ echo $rank['department_id']; }?>" <?php if(isset($rank['department_id']) && !empty($rank['department_id'])){ if($rank['department_id'] == $editjobPost['job_position']){ ?> selected="selected" <?php } } ?>><?php if(isset($rank['department_name']) && !empty($rank['department_name'])){ echo $rank['department_name']; }?></option>
	                  <?php } }?>
                        	</select>
                        	</li>
                       <li><label>Type of work</label><select name='cmbTypeWorkEdit' id='cmbTypeWorkEdit' class='selectpicker'>
                        	<option value=''>Please select Type of Work</option>
                        	<?php if(count($works)>0){
							foreach($works as $work){?>	
	                  <option value="<?php if(isset($work['type_id']) && !empty($work['type_id'])){ echo $work['type_id']; }?>" <?php if(isset($work['type_id']) && !empty($work['type_id'])){ if($work['type_id'] == $editjobPost['type_of_work']){ ?> selected="selected" <?php } } ?>><?php if(isset($work['work_type']) && !empty($work['work_type'])){ echo $work['work_type']; }?></option>
	                  <?php } }?>
                        	
                        	</select>
                        	
                        	</li>
                        	<li><label>Date Range</label>
                        		<input type='text' placeholder='Start Date' title='Start Date' name='txtStartDateEdit' class="datepicker txt-bx dt" value="<?php if(isset($editjobPost['job_start_date']) && !empty($editjobPost['job_start_date'])){ echo date('m/d/Y',strtotime($editjobPost['job_start_date'])); }?>"> 
                        		<input type='text' placeholder='End Date' title='End Date' name='txtEndDateEdit' class="datepicker txt-bx dt" value="<?php if(isset($editjobPost['job_end_date']) && !empty($editjobPost['job_end_date'])){ echo date('m/d/Y',strtotime($editjobPost['job_end_date'])); }?>">
                        		
                        		</li>
                        	<li><label>Location</label>
                        	<select name='cmbLocationEdit[]' id='cmbLocationEdit' class='multiselect' multiple="multiple">
                        	<?php if(count($locations)>0){
                        		//$locs = explode(",",$editjobPost['country_id']);
							foreach($locations as $location){
								if(!empty($location['country_id']) && !empty($location['country_name']))
								{ ?>	
	                  <option value="<?php if(isset($location['country_id']) && !empty($location['country_id'])){ echo $location['country_id']; }?>" ><?php if(isset($location['country_name']) && !empty($location['country_name'])){ echo $location['country_name']; }?></option>
	                  <?php } } } ?>
                        	</select>
                        	
                        	</li>
                        	<li><label>Experience</label>
                        	<select class="selectpicker" name="cmbJobExpEdit" id="cmbJobExpEdit">
                            <option value="">Please experience</option>
                            <option value="Less than 1 Year" <?php if($editjobPost['job_exp'] == 'Less than 1 Year'){ ?> selected="selected" <?php } ?>>less than 1 Year</option>
                            <option value="1 Year" <?php if($editjobPost['job_exp']=="1 Year"){ echo "selected=selected";} ?>>1 Year</option>
                            <option value="2 Years" <?php if($editjobPost['job_exp']=="2 Years"){ echo "selected=selected"; } ?>>2 Years</option>
                            <option value="3 Years" <?php if($editjobPost['job_exp']=="3 Years"){ echo "selected=selected"; } ?>>3 Years</option>
                            <option value="4 Years" <?php if($editjobPost['job_exp']=="4 Years"){ echo "selected=selected"; } ?>>4 Years</option>
                            <option value="5 Years" <?php if($editjobPost['job_exp']=="5 Years"){ echo "selected=selected"; } ?>>5 Years</option>
                            <option value="6 Years" <?php if($editjobPost['job_exp']=="6 Years"){ echo "selected=selected"; } ?>>6 Years</option>
                            <option value="7 Years"<?php if($editjobPost['job_exp']=="7 Years"){ echo "selected=selected"; } ?>>7 Years</option>
                            <option value="8 Years"<?php if($editjobPost['job_exp']=="8 Years"){ echo "selected=selected";} ?>>8 Years</option>
                            <option value="9 Years"<?php if($editjobPost['job_exp']=="9 Years"){ echo "selected=selected";} ?>>9 Years</option>
                            <option value="10 Years"<?php if($editjobPost['job_exp']=="10 Years"){ echo "selected=selected";} ?>>10 Years</option>
                            <option value="More than 10 Years"<?php if($editjobPost['job_exp']=="More than 10 Years"){ echo "selected=selected"; } ?>>More than 10 Years</option>
                                </select> 
                        		
                        		
                        	</li>
                        	<li><label>Daily Rate</label>
 							
                        	<div id="slider-range-edit"></div>
                        	<input type="text" id="txtDailyRateEdit" name="txtDailyRateEdit" class="txt-bx sl" value="<?php if(isset($editjobPost['daily_rate']) && !empty($editjobPost['daily_rate'])){  echo $editjobPost['daily_rate'];} ?>">
                        	<span id="validRateEdit"></span>
                        	</li>
                        	<li>
                        		<label>Currency Type</label>
                        		<select class="selectpicker" name="txtCurrencyTypeEdit" id="txtCurrencyTypeEdit">
		                            <option value="">Please select currency</option>
		                            <option value="USD" <?php if($editjobPost['currency_type']=="USD"){ ?> selected="selected" <?php } ?>>USD</option>
		                            <option value="EURO" <?php if($editjobPost['currency_type']=="EURO"){ ?> selected="selected" <?php } ?>>EURO</option>
		                            <option value="INR" <?php if($editjobPost['currency_type']=="INR"){ ?> selected="selected" <?php } ?>>INR</option>
                           		 </select>
                        		
                        	</li>
                        	<li>
                        		<label>Total Vacancy</label>
                        		<input type="text" name="txtVacancyEdit" id="txtVacancyEdit" class="txt-bx" value="<?php if(isset($editjobPost['no_of_position']) && !empty($editjobPost['no_of_position'])){  echo $editjobPost['no_of_position'];} ?>"/>
                        	</li>
                        	<li>
                        		<label>Size of Vessel</label>
                        		<input type="text" name="txtVesselSizeEdit" id="txtVesselSizeEdit" class="txt-bx" value="<?php if(isset($editjobPost['size_of_vessel']) && !empty($editjobPost['size_of_vessel'])){  echo $editjobPost['size_of_vessel'];} ?>"/>
                        	</li>
                        	<li>
                        		<label>Type of Yacht</label>
                        		<select name="cmbYachtTypeEdit" id="cmbYachtTypeEdit" class='selectpicker'>
                        			<option value="">Please select yacht type</option>
                        			<option value="M" <?php if(isset($editjobPost['yacht_type']) && !empty($editjobPost['yacht_type'])){ if($editjobPost['yacht_type'] == 'M'){ ?> selected="selected" <?php } } ?>>Motor</option>
                        			<option value="S" <?php if(isset($editjobPost['yacht_type']) && !empty($editjobPost['yacht_type'])){ if($editjobPost['yacht_type'] == 'S'){ ?> selected="selected" <?php } } ?>>Sail</option>
                        		</select>
                        	</li>
                         </ul>
                    	 <input type='submit' id='btnEditJobPost' value='Update' class='saveprofile cntct-btn' />
                         <input type='button' id='btnEditCancel' value='Cancel' class='saveprofile cnsl cntct-btn' />     
                         
               		<div class='clear'></div></form>
               		</div>
               		<script type="text/javascript">
					$(function() {
				
						
				 $( "#slider-range-edit" ).slider({
					      range: true,
					      min: 0,
					      max: 100,
					      values: [1,5],
					      slide: function( event, ui ) {
					      		$( "#txtDailyRateEdit" ).val(ui.values[ 1 ] );
					       }
					    });
					    $( "#txtDailyRateEdit" ).val($( "#slider-range-edit" ).slider( "values", 1 ));
					   
					   $(".selectpicker").selectpicker();	
					   
					   var data='<?php echo $editjobPost['country_id']; ?>';

						//Make an array
						var dataarray=data.split(",");
						
						// Set the value
						$(".multiselect").val(dataarray);
						
						// Then refresh
						$(".multiselect").multiselect("refresh");
						
						$(".datepicker").datepicker({
														changeMonth: true,
														changeYear: true,
														minDate: "0", 
														dateFormat: "mm/dd/yy"
													});
														
					  });
					</script>
               		</div>
					<?php } else{
						echo 0;
					}
				
			}	
		}else{
				
				$this->redirect(array('Login/'));
			}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 6 2014
	 * @Modified by	  :
	 * @Comment		  : Edit Job Post
	**/	
	public function actionEditJobPost(){
		
	session_start();
	if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
	{	
		if(empty($_POST['job_id']) && !isset($_POST['job_id']))
		{
			echo 0;
			
		}else{
			$editjobPost = JobPost::model()->find("job_id = '".$_POST['job_id']."'");
			
			if($editjobPost){
				
				$jobID = $editjobPost['job_id'];
				
				$jobPostEdit = $this->loadModel($jobID, 'JobPost');
				
				$locations = "";
				
				foreach($_POST['cmbLocationEdit'] as $arr) {
					    $locations .=$arr.",";
				}
				
				$selected_locations = rtrim($locations,",");
					
				if(isset($_POST['txtJobTitleEdit']) && !empty($_POST['txtJobTitleEdit']))
				{
					$jobPostEdit->job_title = $_POST['txtJobTitleEdit'];
					 
				}
				if(isset($_POST['taJobDescEdit']) && !empty($_POST['taJobDescEdit']))
				{
					$jobPostEdit->job_description = $_POST['taJobDescEdit'];
					 
				}
				if(isset($_POST['cmbDepartmentEdit']) && !empty($_POST['cmbDepartmentEdit']))
				{
					$jobPostEdit->department_id = $_POST['cmbDepartmentEdit'];
					 
				}
				if(isset($_POST['cmbRankEdit']) && !empty($_POST['cmbRankEdit']))
				{
					$JobPost->job_position = $_POST['cmbRankEdit'];
					
				}
				if(isset($_POST['cmbTypeWorkEdit']) && !empty($_POST['cmbTypeWorkEdit']))
				{
					$jobPostEdit->type_of_work = $_POST['cmbTypeWorkEdit'];
					
				}
				if(isset($_POST['txtStartDateEdit']) && !empty($_POST['txtStartDateEdit']))
				{
					$jobPostEdit->job_start_date = date('Y-m-d',strtotime($_POST['txtStartDateEdit']));
						
				}
				if(isset($_POST['txtEndDateEdit']) && !empty($_POST['txtEndDateEdit']))
				{
					$jobPostEdit->job_end_date = date('Y-m-d',strtotime($_POST['txtEndDateEdit']));
					
				}
				if(isset($_POST['cmbLocationEdit']) && !empty($_POST['cmbLocationEdit']))
				{
					if(!empty($selected_locations))
					{
						$jobPostEdit->country_id = $selected_locations;
					}	
					
				}
				if(isset($_POST['cmbJobExpEdit']) && !empty($_POST['cmbJobExpEdit']))
				{
					$jobPostEdit->job_exp = $_POST['cmbJobExpEdit'];
					
				}
				if(isset($_POST['txtDailyRateEdit']) && !empty($_POST['txtDailyRateEdit']))
				{
					$jobPostEdit->daily_rate = $_POST['txtDailyRateEdit'];
					
				}
				if(isset($_POST['txtVesselSizeEdit']) && !empty($_POST['txtVesselSizeEdit']))
				{
					$jobPostEdit->size_of_vessel = $_POST['txtVesselSizeEdit'];
					
				}
				if(isset($_POST['cmbYachtTypeEdit']) && !empty($_POST['cmbYachtTypeEdit']))
				{
					$jobPostEdit->yacht_type = $_POST['cmbYachtTypeEdit'];
					
				}
				if(isset($_POST['txtCurrencyTypeEdit']) && !empty($_POST['txtCurrencyTypeEdit']))
				{
					$jobPostEdit->currency_type = $_POST['txtCurrencyTypeEdit'];
					
				}else{
					$jobPostEdit->currency_type  = '';
				}
				
				if(isset($_POST['txtVacancyEdit']) && !empty($_POST['txtVacancyEdit']))
				{
					$jobPostEdit->no_of_position = $_POST['txtVacancyEdit'];
					
				}else{
					$jobPostEdit->no_of_position  = '';
				}
				
				$jobPostEdit->is_published  = $jobPostEdit['is_published'];
				
				$jobPostEdit->is_accepted  = $jobPostEdit['is_accepted'];
				
				if($jobPostEdit->save(false)){
					echo 1;
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}
	}else{
			
			$this->redirect(array('Login/'));
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 7 2014
	 * @Modified by	  :
	 * @Comment		  : Profile view
	**/	
	public function actionProfileViewHistory()
	{
		session_start();
		$this->pageTitle = ".:: Yacht Relief Crew | Profile View History ::.";
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$profileHistory = (Yii::app()->db->createCommand("SELECT crew_detail.*,p.* FROM `profile_history` as p join crew_detail as crew_detail on p.crew_id=crew_detail.crew_id
			where p.employer_id='".$_SESSION['uid']."' and p.type='crew' group by crew_detail.crew_id"));

			$profileViews = $profileHistory->queryAll();
			$this->render('profile-view-history',array("profileViews"=>$profileViews));
				
		}else{
			
			$this->redirect(array('Login/'));
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 8 2014
	 * @Modified by	  :
	 * @Comment		  : View Crew Profile
	**/	
	public function actionViewCrewProfile()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			if(isset($_POST['crew_id']))
			{
				
				$crewId = $_POST['crew_id'];
				$employer_id = $_SESSION['uid'];
				
				
				$profileHistoryData = ProfileHistory::model()->find("employer_id='$employer_id' AND type='employer' AND crew_id='$crewId'");
				
				
				if($profileHistoryData)
				{
						$id = $profileHistoryData['hist_id'];
						$profileHistory= $this->loadModel($id,'ProfileHistory');
						if(isset($crewId) && !empty($crewId)){
							$profileHistory->crew_id=$crewId;
						}
						$profileHistory->type="employer";
						$profileHistory->employer_id=$_SESSION['uid'];
						$profileHistory->updated_date=date("Y-m-d H:i:s");
						$profileHistory->save(false);
				}else{
					$profileHistory = new ProfileHistory();
						
						if(isset($crewId) && !empty($crewId)){
							$profileHistory->crew_id=$crewId;
						}
						$profileHistory->type="employer";
						$profileHistory->employer_id=$_SESSION['uid'];
						$profileHistory->created_date=date("Y-m-d H:i:s");
						$profileHistory->save(false);
					
				}
				
				$sql = (Yii::app()->db->createCommand("SELECT country_data.*, department.* , crew_detail.* ,q.* ,n.* ,p.* from `crew_detail`
														join country_data ON crew_detail.`country_id`= country_data.`country_id`
														join nationality as n ON crew_detail.`nationality_id`= n.`nationality_id`
														join personal_details as p ON crew_detail.`crew_id`= p.`crew_id`
														join department ON crew_detail.`department_id`= department.`department_id`
														join qualifications as q ON crew_detail.`qualification_id`= q.`qualification_id`	
														where crew_detail.crew_id='".$crewId."'"));
				$CrewDetail = $sql->queryRow();
				
				$query = (Yii::app()->db->createCommand("SELECT * FROM education where crew_id='".$crewId."'"));
				
				$certificates = $query->queryAll();
				
				$references = Reference::model()->findAll("crew_id='".$crewId."' ORDER BY reference_id DESC");
			   
			  	$experienceCV=(Yii::app()->db->createCommand("SELECT experience.* ,dep.department_name AS department,position.department_name AS position FROM `experience` 
																	JOIN department as dep  ON experience.`department_id`= dep.department_id
																	JOIN department as position  ON experience.`designation_id`= position.department_id
																	JOIN country_data ON experience.`country_id`= country_data.`country_id` WHERE experience.`crew_id`='".$crewId."'"));
				$experiences = $experienceCV->queryAll();
				 
				$term = EmployerTermsConditions::model()->find("crew_id='".$crewId."' and employer_id='".$_SESSION['uid']."'");
				?>
				   <div class='profile-tab'>
                            <h4>Relief Crew Profile</h4>
                            <div class='alert' id='cwmsg' style='display:none;'>
							<span id='cwmsgData'></span>
							</div>
                            <form name="frmCrewProfile" id="frmCrewProfile" method="post" enctype="application/x-www-form-urlencoded">
                    		<div class="profile-view">
			                <div class="propic">
											<div class="pro-img">
												<div class="images">
											<?php
												$path =  YiiBase::getPathOfAlias('webroot');
												if($CrewDetail['profile_image']!='' && file_exists($path."/upload/site_images/crew_images/".$myprofile['profile_image']))
												{
													?><img class="pic" src="<?php echo Yii::app()->getBaseUrl(true).'/upload/crew_profile_image/'.$CrewDetail['profile_image']; ?>" style='height: 50;' ><?php 
												}else{
												?>	<img class="pic" src="<?php echo Yii::app()->getBaseUrl(true); ?>/upload/site_images/crew_images/images.jpg"><?php
												}
											?></div>
											<a href=""> <img src="<?php echo Yii::app()->getBaseUrl(true).'/site-images/star.png';?>"/></a>
											</div>
										<ul class="pro-detail"><li>
			                        <span><?php if(isset($CrewDetail['first_name']) && !empty($CrewDetail['first_name']) && isset($CrewDetail['last_name']) && !empty($CrewDetail['last_name'])){  echo ucfirst($CrewDetail['first_name'])." ".ucfirst($CrewDetail['last_name']); }?></span>
			                        </li>
			                        <li>
			                        	<span><?php if(isset($CrewDetail['qualification_name']) && !empty($CrewDetail['qualification_name'])){ }?></span>
			                        </li>
			                        <li>
			                        	<span><?php if(isset($CrewDetail['qualification_name']) && !empty($CrewDetail['qualification_name'])){ echo $CrewDetail['qualification_name']; }?></span>
			                        </li>
			                        <li>
			                        	<a href="#" class="proactive"><?php if(isset($CrewDetail['status']) && !empty($CrewDetail['status']) && $CrewDetail['status']==1){ echo "Active"; }else { echo "Deactive"; }?></a>
			                        </li>
			                       </ul>
			                                <div class="clear"></div>
			                        </div>
			                	<ul>
			                    	
			                        <li><span><h4>Personal Details</h4></span></li>
			                        <?php if($term['is_accept_terms']==1) { ?>
			                        <li><span class="lbl">E-mail Address :</span><span><?php if(isset($CrewDetail['email']) && !empty($CrewDetail['email'])){ echo $CrewDetail['email']; } ?></span></li>
			                        <li><span class="lbl">Mobile :</span><span><?php if(isset($CrewDetail['contact_number']) && !empty($CrewDetail['contact_number'])){ echo $CrewDetail['contact_number']; }?></span></li>
			                       	<?php } ?> 
			                        <li><span class="lbl">Date of Birth :</span><span><?php if(isset($CrewDetail['dob']) && !empty($CrewDetail['dob'])){ echo date('j,F Y',strtotime($CrewDetail['dob'])); }?></span></li>
			                        <li><span class="lbl">Nationality :</span><span><?php if(isset($CrewDetail['nationality_name']) && !empty($CrewDetail['nationality_name'])){ echo $CrewDetail['nationality_name']; }?></span></li>
			                        <li><span class="lbl">Height :</span><span><?php if(isset($CrewDetail['height']) && !empty($CrewDetail['height'])){ echo $CrewDetail['height']; }else{ echo "N/A"; }?></span></li>
			                        <li><span class="lbl">Weight :</span><span><?php if(isset($CrewDetail['weight']) && !empty($CrewDetail['weight'])){ echo $CrewDetail['weight']; }else{ echo "N/A"; }?></span></li>
			                        <li><span class="lbl">Health :</span><span><?php if(isset($CrewDetail['drinking']) && !empty($CrewDetail['drinking'])){ echo "<b>Drinking : </b>".$CrewDetail['drinking']; }else{ echo "N/A";}?> <?php if(isset($CrewDetail['smoking']) && !empty($CrewDetail['smoking'])){ echo "<b>Smoking : </b>".$CrewDetail['smoking']; }else{ echo "N/A";} ?></span></li>
									<li><span class="lbl">Language :</span><span><?php if(isset($CrewDetail['language']) && !empty($CrewDetail['language'])){ echo $CrewDetail['language']; }else{ echo "N/A"; }?></span></li>			                        	
			                        <li><span class="lbl"><h4>Personal Profile</h4></span></li>
			                        <li><span class="lbl"><?php if(isset($CrewDetail['career_objective']) && !empty($CrewDetail['career_objective'])){ echo $CrewDetail['career_objective']; }else{ echo "N/A";}?></span></li>
			                        
			                        <?php if(count($certificates)>0) { ?> 	
			                        <li><span><h4>Maritime Qualifications/Education</h4></span></li>
			                        <?php 
			                          	foreach($certificates as $certificate){
										if(!empty($certificate['certificate_title']))
										{
											?>
			                           <li><span class="lbl">Certificate Name :</span><span><?php echo $certificate['certificate_title']; ?><?php if(isset($certificate['primary_certificate']) && $certificate['primary_certificate']==1){ echo "(Primary)";} ?></span></li>
			                            <li><span class="lbl">Certificate Number :</span><span><?php if(isset($certificate['certificate_number']) && !empty($certificate['certificate_number'])){ echo $certificate['certificate_number']; } ?></span></li>
			                            <li><span class="lbl">Issuing Authority :</span><span><?php if(isset($certificate['issuing_authority']) && !empty($certificate['issuing_authority'])){ echo $certificate['issuing_authority']; } ?></span></li>
			                            <li><span class="lbl">Description :</span><span><?php if(isset($certificate['description']) && !empty($certificate['description'])){ echo $certificate['description']; } ?></span></li>
			                            <li><span class="lbl">Time Duration :</span><span><?php if(isset($certificate['start_date'])){ echo "From : ".date('j,F Y',strtotime($certificate['start_date']));} echo " to "; if(isset($certificate['end_date'])){ echo date('j,F Y',strtotime($certificate['end_date']));}?></span></li>
			                           <?php } } } ?>
			                           
			                            <?php if(count($experiences)>0) { ?>
			                            <li><span><h4>Employment History</h4></span></li>
			                            <?php 
			                          	foreach($experiences as $exp){
										?>
											<li><span class="lbl">Yacht Name :</span><span><?php if(isset($exp['yacht_name'])){echo $exp['yacht_name'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Yacht Type :</span><span><?php if(isset($exp['yacht_type'])){ if($exp['yacht_type']=='M')echo "Motor"; else echo "Sail";}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Department :</span><span><?php if(isset($exp['department'])){echo $exp['department'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Position :</span><span><?php if(isset($exp['position'])){echo $exp['position'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Country Name :</span><span><?php if(isset($exp['country_name'])){echo $exp['country_name'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Time Duration :</span><span><?php if(isset($exp['start_date'])){ echo "From : ".date('j,F Y',strtotime($exp['start_date']));} echo " to "; if(isset($exp['end_date'])){ echo date('j,F Y',strtotime($exp['end_date'])); }?></span></li>
											<li><span class="lbl">Description :</span><span><?php if(!empty($exp['description'])){ echo $exp['description'];}else{echo "N/A";} ?></span></li>
										<?php  } }?>
										
										<?php if(count($references)>0) { ?>
										 <li><span><h4>Refrences</h4></span></li>
										<?php 
			                          	foreach($references as $ref){
										?>
											<li><span class="lbl">Reference Name :</span><span><?php if(isset($ref['reference_name'])){echo $ref['reference_name'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Contact no :</span><span><?php if(isset($ref['contact_number'])){echo $ref['contact_number'];}else{echo "N/A";} ?></span></li>
											<li><span class="lbl">Address :</span><span><?php if(isset($ref['contact_address'])){echo $ref['contact_address'];}else{echo "N/A";} ?></span></li>
										<?php  } } ?>
			                    </ul>
			                    
			                </div>
							</form>
					</div>
					
		<?php }
			
		}else{
			
			$this->redirect(array('Login/'));
		}
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 8 2014
	 * @Modified by	  :
	 * @Comment		  : Delete MY Mail( partially delete)
	**/	
	public function actionDelMyMail()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$msgListing = MyInbox::model()->find("message_ID = '".$_POST['message_id']."'");
			
			if($msgListing){
				
				if($_POST['message_type']=='show_interest_started')
				{
							$inboxId = $msgListing['message_ID'];
							$inbox = $this->loadModel($inboxId,'MyInbox');
							
							$jobApp = JobApplication::model()->find("crew_id='".$msgListing['from_account_id']."' and employer_id='".$_SESSION['uid']."' and job_id='".$msgListing['job_id']."'");
							
							$jobApp->delete();
							
								if($inbox->delete()){
									echo 1;
								}else{
									echo 0;
								}			
				}else{
		
						//Need to send rejection mail to crew.[case : initialy accepted and later on rejected]
						$jobApp = JobApplication::model()->find("crew_id='".$msgListing['from_account_id']."' and employer_id='".$_SESSION['uid']."' and job_id='".$msgListing['job_id']."'");
						$jobApp->delete();
							
						$inboxId = $msgListing['message_ID'];
						
						$myInbox = $this->loadModel($inboxId,'MyInbox');
						$myInbox->message_type = "job_rejected";
						$myInbox->is_deleted_to = '0';
						$myInbox->is_deleted_from = '0';
						$myInbox->is_read_to = '0';
						$myInbox->delete_date_to = '0000-00-00';
						$myInbox->delete_date_from = '0000-00-00';
						
						$inboxCrewId = $msgListing['thread_id'];
						$myInboxCrew = $this->loadModel($inboxCrewId,'MyInbox');
						$myInboxCrew->message_type = "terms_and_conditions_rejected";
					
						$myInboxCrew->is_deleted_to = '0';
						$myInboxCrew->is_deleted_from = '0';
						$myInboxCrew->is_read_to = '0';
						$myInboxCrew->delete_date_to = '0000-00-00';
						$myInboxCrew->delete_date_from = '0000-00-00';
					
						if($myInbox->save(FALSE) && $myInboxCrew->save(FALSE)){
							
							echo 1;
							
						}else{
							
							echo 0;
						}
					}
				}
		}else{
			$this->redirect(array('Login/'));
		}
		
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : 
	 * @author        : Nital Chauhan
	 * @created		  :	October 8 2014
	 * @Modified by	  :
	 * @Comment		  : Also shown interest in crew mail.(if crew is interested in employer's job)
	**/	
	public function actionAcceptCrewMail()
	{
		session_start();
		if(isset($_SESSION['uid']) && isset($_SESSION['type']) && $_SESSION['type'] == "employer")
		{
			$acceptedMsgListing = MyInbox::model()->find("message_ID ='".$_POST['message_id']."'");
				
			$employer_id = $_SESSION['uid'];
							
			$crewId = $acceptedMsgListing['from_account_id'];
			
			//***If Shown Interest thread started by crew***//
			
			if($_POST['message_type'] == 'show_interest_started'){  
				
				$msgListing = MyInbox::model()->find("message_ID ='".$_POST['message_id']."' and thread_id=0");
				
				$employer_id = $_SESSION['uid'];
				
				$crewId = $msgListing['from_account_id'];
				
				$crewDetail = CrewDetail::model()->find("crew_id = '".$crewId."'");
				
				$employerDetail = EmployerDetail::model()->find("employer_id = '".$employer_id."'");
				
				$emailTemplate = EmailTemplate::model()->find("email_shortcode = 'CONFIRM_SHOW_INTEREST_EMPLOYER'");
				
				$job_id = $msgListing['job_id'];
				
				$job = JobPost::model()->find("job_id='$job_id'");
				
				$to = $crewDetail['email'];
				
				$from = $employerDetail['email'];
				
				$subject = $job['job_code'];
	
				$empname = $employerDetail['first_name']." ".$employerDetail['last_name'];
	
				$array_one = array("#username#","#crew_email#","");
	
				$array_two = array($crewDetail['first_name'],$crewDetail['email'],"");
				
				$txt = str_replace($array_one, $array_two, $emailTemplate['email_body']);
										
				$message = $txt;
										
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: < $from >"."\r\n";
				$status = mail($to,$subject,$message,$headers);
				
				if($status)
				{
					$myInbox = new MyInbox();
					$myInbox->message_type = "show_interest";
					$myInbox->thread_id = $msgListing['message_ID'];
					$myInbox->job_id = $job['job_id'];
					$myInbox->user_type = "employer";
					$myInbox->to_account_id = $crewId;
					$myInbox->from_account_id = $_SESSION['uid'];
					$myInbox->subject = $subject;
					$myInbox->message = $message;
					$myInbox->is_deleted_to = '0';
					$myInbox->is_deleted_from = '0';
					$myInbox->is_read_to = '0';
					$myInbox->delete_date_to = '0000-00-00';
					$myInbox->delete_date_from = '0000-00-00';
													
													
					$msgListing->message_type = "interest_shown";
					$msgListing->thread_id = $msgListing['message_ID'];
					$msgListing->job_id = $msgListing['job_id'];
					$msgListing->user_type = "crew";
					$$msgListing->to_account_id = $_SESSION['uid'];
					$msgListing->from_account_id = $crewId;
					$msgListing->subject = $subject;
					$msgListing->message = $message;
					$msgListing->is_deleted_to = '0';
					$msgListing->is_deleted_from = '0';
					$msgListing->is_read_to = '0';
					$msgListing->delete_date_to = '0000-00-00';
					$msgListing->delete_date_from = '0000-00-00';
					
						if($msgListing->save(FALSE) && $myInbox->save(FALSE)){
							
							echo 1;
							
						}else{
							
							echo 0;
						}
				   }else{
						echo 0;
					}										
				
			}else if($_POST['message_type'] == 'show_interest'){ //*** IF Shown Interest thread started by emplloyer***//
						
							$myinboxCrew = MyInbox::model()->find("from_account_id=$crewId AND to_account_id=$employer_id");
							
							//*** send terms and condition mail to employer***//
							if($myinboxCrew){
												$inbox_idCrew=$myinboxCrew['message_ID'];
												$inboxMailId =$this->loadModel($inbox_idCrew,'MyInbox');
												$inboxMailId->message_type='terms_and_conditions';
												$inboxMailId->is_read_to='0';
												$crewInbox=$inboxMailId->save(false);
											 }
										
							$myinboxEmp = MyInbox::model()->find("to_account_id=$crewId AND from_account_id=$employer_id");
							
							//*** send terms and condition mail to crew***//
							if($myinboxEmp){
												$inbox_idEmp=$myinboxEmp['message_ID'];
												$inboxMailId =$this->loadModel($inbox_idEmp,'MyInbox');
												$inboxMailId->message_type='terms_and_conditions';
												
												$inboxMailId->is_read_to='0';
												$empInbox=$inboxMailId->save(false);
											}
			
											if($crewInbox || $empInbox ){
																echo 1;
															}else{
																echo 0;
															}


					}else if($_POST['message_type']=="terms_and_conditions"){
										
										$myinboxEmp = MyInbox::model()->find("to_account_id=$crewId AND from_account_id=$employer_id");
									
											if($myinboxEmp){
												
												$inbox_idEmp=$myinboxEmp['message_ID'];
												$inboxMailId =$this->loadModel($inbox_idEmp,'MyInbox');
												$inboxMailId->message_type='terms_and_conditions_accepted';
												$inboxMailId->is_read_to='0';
												$empInbox=$inboxMailId->save(false);
												
												}
												if($crewInbox || $empInbox ){
													echo 1;
												}else{
													echo 0;
												}
													
					}else if($_POST['message_type']=="terms_and_conditions_accepted"){
										
										$myinboxEmp = MyInbox::model()->find("from_account_id=$employer_id AND to_account_id=$crewId");
											if($myinboxEmp){
												$inbox_idEmp=$myinboxEmp['message_ID'];
												$inboxMailId =$this->loadModel($inbox_idEmp,'MyInbox');
												$inboxMailId->message_type='job_accepted';
												$inboxMailId->is_read_to='0';
												$crewInbox=$inboxMailId->save(false);
											}
												
												$myinboxCrew = MyInbox::model()->find("to_account_id=$employer_id AND from_account_id=$crewId");
												if($myinboxCrew){
													$inbox_idCrew=$myinboxCrew['message_ID'];
													$inboxMailId =$this->loadModel($inbox_idCrew,'MyInbox');
													$inboxMailId->message_type='job_accepted';
													$inboxMailId->is_read_to='0';
													$empInbox=$inboxMailId->save(false);
												}
												if($crewInbox || $empInbox ){
													echo 1;
												}else{
													echo 0;
												}
						}else if($_POST['message_type']=="job_accepted"){
							}	
		}else{
			$this->redirect(array('Login/'));
		}
		
	}

	public function actiongetBrandName(){
		$json_arr = array();
		$display_json = array();
		$user_input = trim($_REQUEST['term']);
		$brand = Brand::model()->findAll("label LIKE '%".$user_input."%'");
		if($brand){
		foreach ($brand as $brandname){
			$json_arr["id"] = $brandname['id'];
		    $json_arr["value"] = $brandname['value'];
		    $json_arr["label"] = $brandname['label'];
		    array_push($display_json, $json_arr);
		}
		}else{
			$json_arr["id"] = "#";
		    $json_arr["value"] = "";
		    $json_arr["label"] = "No Result Found !";
		    array_push($display_json, $json_arr);
		}
		$jsonWrite = json_encode($display_json); //encode that search data
		print $jsonWrite;
	}	
}
