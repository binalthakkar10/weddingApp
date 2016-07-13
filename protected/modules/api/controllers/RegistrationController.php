<?php
class RegistrationController extends ApiController{

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
	 * @Params		  : auth_id,auth_provider,firstname,lastname,username,email,password,image,phone,mobile
	 * device_type,device_token,created_at,updated_at,status
	 * @author        : Ankit Sompura
	 * @created		  :	January 19 2015
	 * @Modified by	  :
	 * @Comment		  : User Registration.
	 **/

	public function actionGetRegistration(){
		$response=array();
		$regiData = json_decode(file_get_contents('php://input'), TRUE);
		if($regiData['data']['auth_provider'] == 'facebook' || $regiData['data']['auth_provider'] == 'twitter' || $regiData['data']['auth_provider'] == 'instagram'){
			if(empty($regiData['data']['auth_id']) && !isset($regiData['data']['auth_id']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_id";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['auth_provider']) && !isset($regiData['data']['auth_provider']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_provider";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['user_type']) && !isset($regiData['data']['user_type']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the user_type";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['device_type']) && !isset($regiData['data']['device_type']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the device_type";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['device_token']) && !isset($regiData['data']['device_token']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the device_token";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$auth_id= UserDetail::model()->find("auth_id  = '".$regiData['data']['auth_id']."'");
				if($auth_id){
					$response['status'] = "0";
					$response['data'] = "This Auth ID Already Exists.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
				// Insert User Detail Data
				$model = new UserDetail();
				if(isset($regiData['data']['cityID']) && !empty($regiData['data']['cityID'])){
					$model->cityID = $regiData['data']['cityID'];
				}else{
					$model->cityID = '';
				}
				if(isset($regiData['data']['stateID']) && !empty($regiData['data']['stateID'])){
					$model->stateID = $regiData['data']['stateID'];
				}else{
					$model->stateID = '';
				}
				if(isset($regiData['data']['countryID']) && !empty($regiData['data']['countryID'])){
					$model->countryID = $regiData['data']['countryID'];
				}else{
					$model->countryID = '';
				}
				if(isset($regiData['data']['auth_id']) && !empty($regiData['data']['auth_id'])){
					$model->auth_id = $regiData['data']['auth_id'];
				}else{
					$model->auth_id = '';
				}
				if(isset($regiData['data']['auth_provider']) && !empty($regiData['data']['auth_provider'])){
					$model->auth_provider = $regiData['data']['auth_provider'];
				}else{
					$model->auth_provider = '';
				}
				if(isset($regiData['data']['user_type']) && !empty($regiData['data']['user_type'])){
					$model->user_type = $regiData['data']['user_type'];
				}else{
					$model->user_type = '';
				}
				if(isset($regiData['data']['fullname']) && !empty($regiData['data']['fullname'])){
					$model->fullname = $regiData['data']['fullname'];
				}else{
					$model->fullname = '';
				}
				if(isset($regiData['data']['username']) && !empty($regiData['data']['username'])){
					$model->username = $regiData['data']['username'];
				}else{
					$model->username = '';
				}
				if(isset($regiData['data']['email']) && !empty($regiData['data']['email'])){
					$model->email = strtolower($regiData['data']['email']);
				}else{
					$model->email = '';
				}
				if(isset($regiData['data']['image']) && !empty($regiData['data']['image'])){
					$model->image = strtolower($regiData['data']['image']);
				}else{
					$model->image = '';
				}
				if(isset($regiData['data']['password']) && !empty($regiData['data']['password'])){
					$model->password = md5($regiData['data']['password']);
				}else{
					$model->password = '';
				}
				if(isset($regiData['data']['phone']) && !empty($regiData['data']['phone'])){
					$model->phone = $regiData['data']['phone'];
				}else{
					$model->phone = '';
				}
				if(isset($regiData['data']['mobile']) && !empty($regiData['data']['mobile'])){
					$model->mobile = $regiData['data']['mobile'];
				}else{
					$model->mobile = '';
				}
				if(isset($regiData['data']['address']) && !empty($regiData['data']['address'])){
					$model->address = $regiData['data']['address'];
				}else{
					$model->address = '';
				}
				if(isset($regiData['data']['address1']) && !empty($regiData['data']['address1'])){
					$model->address1 = $regiData['data']['address1'];
				}else{
					$model->address1 = '';
				}
				if(isset($regiData['data']['image']) && !empty($regiData['data']['image'])){
					$model->image = $regiData['data']['image'];
				}else{
					$model->image = '';
				}
				if(isset($regiData['data']['device_type']) && !empty($regiData['data']['device_type'])){
					$model->device_type = $regiData['data']['device_type'];
				}else{
					$model->device_type = '';
				}
				if(isset($regiData['data']['device_token']) && !empty($regiData['data']['device_token'])){
					$model->device_token = $regiData['data']['device_token'];
				}else{
					$model->device_token = '';
				}
				if($model->save(false)){
					$response['status'] = "1";
					$response['data']['success'] = "Registration done successfully.";
					$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
					$response['data']['cityID'] = ($model->cityID)?$model->cityID:'';
					$response['data']['stateID'] = ($model->stateID)?$model->stateID:'';
					$response['data']['countryID'] = ($model->countryID)?$model->countryID:'';
					$response['data']['auth_id'] = ($model->auth_id)?$model->auth_id:'';
					$response['data']['auth_provider'] = ($model->auth_provider)?$model->auth_provider:'';
					$response['data']['user_type'] = ($model->user_type)?$model->user_type:'';
					$response['data']['fullname'] = ($model->fullname)?$model->fullname:'';
					$response['data']['username'] = ($model->username)?$model->username:'';
					$response['data']['email'] = ($model->email)?$model->email:'';
					$response['data']['image'] = ($model->image)?$model->image:'';
					$response['data']['phone'] = ($model->phone)?$model->phone:'';
					$response['data']['mobile'] = ($model->mobile)?$model->mobile:'';
					$response['data']['address'] = ($model->address)?$model->address:'';
					$response['data']['address1'] = ($model->address1)?$model->address1:'';
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
		}else{
			if(empty($regiData['data']['auth_provider']) && !isset($regiData['data']['auth_provider']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_provider";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['user_type']) && !isset($regiData['data']['user_type']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the user_type";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['fullname']) && !isset($regiData['data']['fullname']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the fullname";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['username']) && !isset($regiData['data']['username']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the username";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['password']) && !isset($regiData['data']['password']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the password";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['email']) && !isset($regiData['data']['email']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the email";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['device_type']) && !isset($regiData['data']['device_type']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the device_type";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($regiData['data']['device_token']) && !isset($regiData['data']['device_token']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the device_token";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$username = UserDetail::model()->find("username  = '".$regiData['data']['username']."'");
				if($username){
					$response['status'] = "0";
					$response['data'] = "This Username Already Exists.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
				$useremail=UserDetail::model()->find("email = '".$regiData['data']['email']."'");
				if($useremail){
					$response['status'] = "0";
					$response['data'] = "This Email Already Exists.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
				// Insert User Detail Data
				$model = new UserDetail();
				if(isset($regiData['data']['cityID']) && !empty($regiData['data']['cityID'])){
					$model->cityID = $regiData['data']['cityID'];
				}else{
					$model->cityID = '';
				}
				if(isset($regiData['data']['stateID']) && !empty($regiData['data']['stateID'])){
					$model->stateID = $regiData['data']['stateID'];
				}else{
					$model->stateID = '';
				}
				if(isset($regiData['data']['countryID']) && !empty($regiData['data']['countryID'])){
					$model->countryID = $regiData['data']['countryID'];
				}else{
					$model->countryID = '';
				}
				if(isset($regiData['data']['auth_id']) && !empty($regiData['data']['auth_id'])){
					$model->auth_id = $regiData['data']['auth_id'];
				}else{
					$model->auth_id = '';
				}
				if(isset($regiData['data']['auth_provider']) && !empty($regiData['data']['auth_provider'])){
					$model->auth_provider = $regiData['data']['auth_provider'];
				}else{
					$model->auth_provider = '';
				}
				if(isset($regiData['data']['user_type']) && !empty($regiData['data']['user_type'])){
					$model->user_type = $regiData['data']['user_type'];
				}else{
					$model->user_type = '';
				}
				if(isset($regiData['data']['fullname']) && !empty($regiData['data']['fullname'])){
					$model->fullname = $regiData['data']['fullname'];
				}else{
					$model->fullname = '';
				}
				if(isset($regiData['data']['username']) && !empty($regiData['data']['username'])){
					$model->username = $regiData['data']['username'];
				}else{
					$model->username = '';
				}
				if(isset($regiData['data']['email']) && !empty($regiData['data']['email'])){
					$model->email = strtolower($regiData['data']['email']);
				}else{
					$model->email = '';
				}
				if(isset($regiData['data']['image']) && !empty($regiData['data']['image'])){
					$model->image = strtolower($regiData['data']['image']);
				}else{
					$model->image = '';
				}
				if(isset($regiData['data']['password']) && !empty($regiData['data']['password'])){
					$model->password = md5($regiData['data']['password']);
				}else{
					$model->password = '';
				}
				if(isset($regiData['data']['phone']) && !empty($regiData['data']['phone'])){
					$model->phone = $regiData['data']['phone'];
				}else{
					$model->phone = '';
				}
				if(isset($regiData['data']['mobile']) && !empty($regiData['data']['mobile'])){
					$model->mobile = $regiData['data']['mobile'];
				}else{
					$model->mobile = '';
				}
				if(isset($regiData['data']['address']) && !empty($regiData['data']['address'])){
					$model->address = $regiData['data']['address'];
				}else{
					$model->address = '';
				}
				if(isset($regiData['data']['address1']) && !empty($regiData['data']['address1'])){
					$model->address1 = $regiData['data']['address1'];
				}else{
					$model->address1 = '';
				}
				if(isset($regiData['data']['image']) && !empty($regiData['data']['image'])){
					$model->image = $regiData['data']['image'];
				}else{
					$model->image = '';
				}
				if(isset($regiData['data']['device_type']) && !empty($regiData['data']['device_type'])){
					$model->device_type = $regiData['data']['device_type'];
				}else{
					$model->device_type = '';
				}
				if(isset($regiData['data']['device_token']) && !empty($regiData['data']['device_token'])){
					$model->device_token = $regiData['data']['device_token'];
				}else{
					$model->device_token = '';
				}
				if($model->save(false)){
					$response['status'] = "1";
					$response['data']['success'] = "Registration done successfully.";
					$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
					$response['data']['cityID'] = ($model->cityID)?$model->cityID:'';
					$response['data']['stateID'] = ($model->stateID)?$model->stateID:'';
					$response['data']['countryID'] = ($model->countryID)?$model->countryID:'';
					$response['data']['auth_id'] = ($model->auth_id)?$model->auth_id:'';
					$response['data']['auth_provider'] = ($model->auth_provider)?$model->auth_provider:'';
					$response['data']['user_type'] = ($model->user_type)?$model->user_type:'';
					$response['data']['fullname'] = ($model->fullname)?$model->fullname:'';
					$response['data']['username'] = ($model->username)?$model->username:'';
					$response['data']['email'] = ($model->email)?$model->email:'';
					$response['data']['image'] = ($model->image)?$model->image:'';
					$response['data']['phone'] = ($model->phone)?$model->phone:'';
					$response['data']['mobile'] = ($model->mobile)?$model->mobile:'';
					$response['data']['address'] = ($model->address)?$model->address:'';
					$response['data']['address1'] = ($model->address1)?$model->address1:'';
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
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : auth_id, auth_provider, email, username, password
	 * @author        : Ankit Sompura
	 * @created		  :	January 19 2015
	 * @Modified by	  : Atul Baraiya 27 March 2015
	 * @Comment		  : User Login.
	 **/

	public function actionCheckLogin(){
		$response=array();
		$response1=array();
		$res=array();
		$res1=array();
		$loginData = json_decode(file_get_contents('php://input'), TRUE);
		//p($loginData);
		if($loginData['data']['auth_provider'] == 'facebook' || $loginData['data']['auth_provider'] == 'twitter' || $loginData['data']['auth_provider'] == 'instagram')
		{
			if(empty($loginData['data']['auth_id']) && !isset($loginData['data']['auth_id']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_id";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($loginData['data']['auth_provider']) && !isset($loginData['data']['auth_provider']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_provider";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$authId = $loginData['data']['auth_id'];
				$model = UserDetail::model()->find("auth_id = '".$authId."' AND auth_provider = '".$loginData['data']['auth_provider']."'");
				if($model){
					$userID = $model['user_id'];
					$userUpdateData = $this->loadModel($userID, 'UserDetail');
					$userUpdateData->device_type = $loginData['data']['device_type'];
					$userUpdateData->device_token = $loginData['data']['device_token'];
					$userUpdateData->save(false);
					$response1['status'] = "1";
					$response1['success'] = "Login Successfully.";
					$response['user_id'] = ($model->user_id)?$model->user_id:'';
					$id=$model->user_id;
					//echo $id;
					$response['cityID'] = ($model->cityID)?$model->cityID:'';
					$response['stateID'] = ($model->stateID)?$model->stateID:'';
					$response['countryID'] = ($model->countryID)?$model->countryID:'';
					$response['auth_id'] = ($model->auth_id)?$model->auth_id:'';
					$response['auth_provider'] = ($model->auth_provider)?$model->auth_provider:'';
					$response['user_type'] = ($model->user_type)?$model->user_type:'';
					$response['fullname'] = ($model->fullname)?$model->fullname:'';
					$response['username'] = ($model->username)?$model->username:'';
					$response['email'] = ($model->email)?$model->email:'';
					$response['image'] = ($model->image)?$model->image:'';
					$response['phone'] = ($model->phone)?$model->phone:'';
					$response['mobile'] = ($model->mobile)?$model->mobile:'';
					$response['address'] = ($model->address)?$model->address:'';
					$response['address1'] = ($model->address1)?$model->address1:'';
					$weddingData = Wedding::model()->findAll("user_id='".$id."'");
					//p($weddingData);
					
						foreach($weddingData as $key)
						{
						 // p($key);
						  $res['wedding_id']=$key['wedding_id'];
						  $res['user_id']=$key['user_id'];
						  $res['to_bride_name']=$key['to_bride_name'];
						  $res['to_groom_name']=$key['to_groom_name'];
						  $res['to_partner_name']=$key['to_partner_name'];
						  $res['from_bride_name']=$key['from_bride_name'];
						  $res['from_groom_name']=$key['from_groom_name'];
						  $res['from_partner_name']=$key['from_partner_name'];
						  $res['wedding_date']=$key['wedding_date'];
						  $res['wedding_location']=$key['wedding_location'];
						  $res['street_address']=$key['street_address'];
						  $res['wedding_uniq_id']=$key['wedding_uniq_id'];
						  $res['created_at']=$key['created_at'];
						  $res['updated_at']=$key['updated_at'];
						  $res['status']=$key['status'];
						  $res['image']=$key['image'];
						   if(!empty($key['image']))
						  {
						  $res['image']=Yii::app()->getBaseUrl(true)."/upload/wedding_cover_image/".$key['image'];
						  }
						  else {
						         $res['image']="";
						  }
						  $res['field2']=$key['field2'];
						  $res1[]=$res;
						}
					
					$response['wedding']=$res1;
					$response1['data']=$response;
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response1);
					exit();
				}else{
					$response['status'] = "0";
					$response['data'] = "This Auth ID Not Available";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
			}
		}else{
			if(empty($loginData['data']['email']) && !isset($loginData['data']['email']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the email";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			if(empty($loginData['data']['auth_provider']) && !isset($loginData['data']['auth_provider']))
			{
				$response['status'] = "0";
				$response['data'] = "Please pass the auth_provider";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				//Check Login Data
				$email = $loginData['data']['email'];
				$password = md5($loginData['data']['password']);
				$model = UserDetail::model()->find("email = '".$email."' AND password = '".$password."' AND auth_provider = '".$loginData['data']['auth_provider']."'");
				if($model){
					$userID = $model['user_id'];
					$userUpdateData = $this->loadModel($userID, 'UserDetail');
					$userUpdateData->device_token = $loginData['data']['device_token'];
					$userUpdateData->save(false);
					$response1['status'] = "1";
					$response1['success'] = "Login Successfully.";
					$response['user_id'] = ($model->user_id)?$model->user_id:'';
					$id=$model->user_id;
					$response['cityID'] = ($model->cityID)?$model->cityID:'';
					$response['stateID'] = ($model->stateID)?$model->stateID:'';
					$response['countryID'] = ($model->countryID)?$model->countryID:'';
					$response['auth_id'] = ($model->auth_id)?$model->auth_id:'';
					$response['auth_provider'] = ($model->auth_provider)?$model->auth_provider:'';
					$response['user_type'] = ($model->user_type)?$model->user_type:'';
					$response['fullname'] = ($model->fullname)?$model->fullname:'';
					$response['username'] = ($model->username)?$model->username:'';
					$response['email'] = ($model->email)?$model->email:'';
					$response['image'] = ($model->image)?$model->image:'';
					$response['phone'] = ($model->phone)?$model->phone:'';
					$response['mobile'] = ($model->mobile)?$model->mobile:'';
					$response['address'] = ($model->address)?$model->address:'';
					$response['address1'] = ($model->address1)?$model->address1:'';
					$weddingData = Wedding::model()->findAll("user_id = '".$id."'");
					foreach($weddingData as $key)
						{
						 // p($key);
						  $res['wedding_id']=$key['wedding_id'];
						  $res['user_id']=$key['user_id'];
						  $res['to_bride_name']=$key['to_bride_name'];
						  $res['to_groom_name']=$key['to_groom_name'];
						  $res['to_partner_name']=$key['to_partner_name'];
						  $res['from_bride_name']=$key['from_bride_name'];
						  $res['from_groom_name']=$key['from_groom_name'];
						  $res['from_partner_name']=$key['from_partner_name'];
						  $res['wedding_date']= date('d-m-Y',strtotime($key['wedding_date']));
						  $res['wedding_location']=$key['wedding_location'];
						  $res['street_address']=$key['street_address'];
						  $res['wedding_uniq_id']=$key['wedding_uniq_id'];
						  $res['created_at']=$key['created_at'];
						  $res['updated_at']=$key['updated_at'];
						  $res['status']=$key['status'];
						  $res['image']=$key['image'];
						   if(!empty($key['image']))
						  {
						  $res['image']=Yii::app()->getBaseUrl(true)."/upload/wedding_cover_image/".$key['image'];
						  }
						  else {
						         $res['image']="";
						  }
						  $res['field2']=$key['field2'];
						  $res1[]=$res;
						}
						$response['wedding']=$res1;
					$response1['data']=$response;
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response1);
					exit();
				}else{
					$response['status'] = "0";
					$response['data'] = "Invalid Email ID or Password.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
			}
		}

	}

	/**
	 * @Method		  :	POST
	 * @Params		  : Image Upload
	 * @author        : Ravi Kadia
	 * @created		  :	oct 18  2014
	 * @Modified by	  :
	 * @Comment		  :  User Image Upload.
	 **/

	public function actionUploadProfileImage(){
		$response = array();
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "./upload/user_image/".$_FILES["uploadedfile"]["name"])){
			$response['status'] = "1";
			$response['data'] = "File Upload Successfully.";
			$response['profile_image'] = Yii::app()->getBaseUrl(true).'/upload/user_image/'.$_FILES["uploadedfile"]["name"];
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$response['status'] = "0";
			$response['data'] = "Error In File Uploading.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
	}//end of the User image
	
	/**
	 * @Method		  :	POST
	 * @Params		  : email
	 * @author        : Ankit Sompura
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Forgot Password Web Services.
	 **/

	public function actionForgotpassword(){
		$new_pass =  $this->random_string(5);  // generated 5 characters password
		$response = array();
		if(!isset($forgotPass['data']['email']) && $forgotPass['data']['email'] == ''){
			$response['status'] = "0";
			$response['data'] = "Invalid Parameters Inserted.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$model = UserDetail::model()->find("email='".$forgotPass['data']['email']."'");
			if($model){
				$userid = $model['user_id'];
				$userData = $this->loadModel($userid,'UserDetail');
				$userData->field1 = $new_pass;
				if($userData->save(false)){
					$response['status']='1';
					$response['data'] = "Please check your email for unique code.";
					$this->sendForgotPasswordMail($userData->email,$new_pass);
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}else{
					$response['status']='0';
					$response['data']='Error Storing Data';
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
			}else{
				$response['status']='0';
				$response['data']='Email does not exist.';
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}
	
	/**
	 * @Method		  :	Forgot Password Unique Code Mail Sent To User
	 * @Params		  : email.
	 * @author        : Ankit Sompura
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Send Mail To Client For Forgot Password Web Services.
	 **/
	
	public function sendForgotPasswordMail($email,$newpassword)
	{
		$to = $email;
		$subject = "Wedoo Project App Forgot Password Request Unique Code";
		$txt = "Hi,\r\n\n";
		$txt .= "Plese find your forgot password unique code.\r\n\n";
		$txt .= "Email :: $email \r\n" ;
		$txt .= "Unique Code :: $newpassword" ;
		$headers = "wedoo@gmail.com";

		mail($to,$subject,$txt,"From: $headers");
	}

	/**
	 * @Method		  :	Post  
	 * @Params		  : newpassword
	 * @author        : Ankit Sompura
	 * @created		  :	Feb 20 2015
	 * @Modified by	  : 
	 * @Comment		  : Update Password To Client Web Services.
	**/
	
		
	public function actionUpdatePassword(){
		$response = array();
		$updatePass = json_decode(file_get_contents('php://input'), TRUE);
		if(!isset($updatePass['data']['email']) || $updatePass['data']['email'] == ''){
				$response['status'] = "0";
				$response['message'] = "Please pass the Email";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
		}
		if(!isset($updatePass['data']['newpassword']) || $updatePass['data']['newpassword'] == ''){
				$response['status']='0';
				$response['message']='Please pass the New Password';
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
		}
		if(!isset($updatePass['data']['confirmpassword']) || $updatePass['data']['confirmpassword'] == ''){
				$response['status']='0';
				$response['message']='Please pass the Confirm Password';
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
		}else{
				//get user detail from unique code
				$model2 = UserDetails::model()->find(" email='".$updatePass['data']['email']."' ");
				if($model2){
						$id = $model2['user_id'];
						$model = $this->loadModel($id,'UserDetails');
						$model->password = md5($updatePass['data']['newpassword']);
						if($model->save(false)){
							$response['status']='1';
							$response['data']['new_password'] = $updatePass['data']['newpassword'];
							$this->sendForgotPasswordResetEmail($model->email,$model->username,$updatePass['data']['newpassword']);
							header('Content-Type: application/json; charset=utf-8');
							echo json_encode($response);
							exit();
						}else{
							$response['status']='0';
							$response['message']='Error Storing New Password';
							header('Content-Type: application/json; charset=utf-8');
							echo json_encode($response);
							exit();
						}
				}else{
					$response['status']='0';
					$response['message']='Unique Code is wrong';
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}
				
		}
	}
	
	
	public function sendForgotPasswordResetEmail($email,$username,$newpassword){
			$to = $email;
			$subject = "Wedoo App Change Password Request";
			$txt = "Dear $username,\r\n\n";
			$txt .= "Your Password has been Change.\r\n\n";
			$txt .= "Email :: $email \r\n" ;
			$txt .= "New Password :: $newpassword" ;
			$headers = "wedoo@gmail.com";
			mail($to,$subject,$txt,"From: $headers");
	}
	
	/**
	 * @Method		  :	Post  
	 * @Params		  : email, unique id
	 * @author        : Ankit Sompura
	 * @created		  :	Feb 20 2015
	 * @Modified by	  : 
	 * @Comment		  : Check Unique Code Web Services.
	**/
	
	public function actionCheckUniqueCode(){
		$response = array();
		$checkuniqueCode = json_decode(file_get_contents('php://input'), TRUE);
		if(!isset($checkuniqueCode['data']['email']) && $checkuniqueCode['data']['email'] == ''){
			$response['status'] = "0";
			$response['data'] = "Please pass the Email.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(!isset($checkuniqueCode['data']['unique_id']) && $checkuniqueCode['data']['unique_id'] == ''){
			$response['status'] = "0";
			$response['data'] = "Please pass the Unique ID.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$uniqueCodeData = UserDetails::model()->find("email='".$checkuniqueCode['data']['email']."' AND field1 = '".$checkuniqueCode['data']['unique_id']."'");
			if($uniqueCodeData){
				$response['status']='1';
				$response['message']='Unique code match successfully.';
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status']='0';
				$response['message']='Unique Code does not match please try again.';
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : currentpassword,newpassword,user_id
	 * @author        : Ankit Sompura
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Change Password Web Services.
	 **/

	public function actionChangePassword(){
		$response = array();
		$changePass = json_decode(file_get_contents('php://input'), TRUE);
		if(!isset($changePass['data']['currentpassword']) || $changePass['data']['currentpassword'] =='' ||
		!isset($changePass['data']['newpassword']) || $changePass['data']['newpassword'] == '' ||
		!isset($changePass['data']['user_id']) || $changePass['data']['user_id'] == ''){
			$response['status']='0';
			$response['data']='Not Enough parameter passed';
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			return;
		}else{
			//get user detail from email address
			$userData = UserDetail::model()->find("user_id = '".$changePass['data']['user_id']."' && password='".md5($changePass['data']['currentpassword'])."'");
			if($userData){
				$id = $userData['user_id'];
				$userModel = $this->loadModel($id,'UserDetail');
				$userModel->password = md5($changePass['data']['newpassword']);
				if($userModel->save(false)){
					$response['status']='1';
					$response['new_password'] = $changePass['data']['newpassword'];
					$this->sendChangePasswordMail($userModel->email,$changePass['data']['currentpassword'],$changePass['data']['newpassword']);
				}else{
					$response['status']='0';
					$response['data']='Error Storing Device Id';
				}
			}else{
				$response['status']='0';
				$response['data']='Old Password is wrong';
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			return;
		}
	}

	/**
	 * @Method		  :	Change Password Mail Sent To User
	 * @Params		  : email,currentpassword,newpassword etc.
	 * @author        : Ankit Sompura
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Send Mail To Client For Change Password Web Services.
	 **/

	public function sendChangePasswordMail($email,$oldpassword,$newpassword){
		$to = $email;
		$subject = "Wedoo Project App Change Password Request";
		$txt =  "Hi,\r\n\n";
		$txt .= "Your Password has been Changed.\r\n\n";
		$txt .= "Email :: $email \r\n" ;
		$txt .= "New Password :: $newpassword" ;
		$headers = "wedoo@gmail.com";

		mail($to,$subject,$txt,"From: $headers");
	}

	/**
	 * @Method		  :	GET
	 * @Params		  : user_id
	 * @author        : Ankit Sompura
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Logout Web Services.
	 **/

	public function actionLogout(){
		$response = array();
		$userID = $_REQUEST['user_id'];
		$userData = UserDetail::model()->find("user_id = '".$userID."'");
		if($userData){
			$userID = $userData['user_id'];
			$userUpdateData = $this->loadModel($userID, 'UserDetail');
			$userUpdateData->device_type = '';
			$userUpdateData->device_token = '';
			if($userUpdateData->save(false)){
				$response['status'] = "1";
				$response['data'] = "Logout Successfully.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "Error in logout.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}else{
			$response['status'] = "0";
			$response['data'] = "No Record Found.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
	}

	/**
	 * @Method		  :	POST
	 * @Params		  : user_name,email
	 * @author        : Kadia Ravi
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Contact Us Web Services.
	 **/

	public function actionContactUs(){
		$response = array();
		$data = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($data['data']['username']) && !isset($data['data']['username'])){
			$resonse['status'] = "0";
			$response['data'] = "Please Pass the username";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($data['data']['email']) && !isset($data['data']['email'])){
			$response['status'] = "0";
			$response['data'] = "Please Pass the Email";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($data['data']['message']) && !isset($data['data']['message'])){
			$response['status'] = "0";
			$response['data'] = "Please Pass the Message";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		$username=$data['data']['username'];
		$email=$data['data']['email'];
		$message=$data['data']['message'];
		$getMail= $this->sendcontactUsMail($username,$email,$message);
		if($getMail==1){
			$response['status'] = "1";
			$response['data'] = "successfully send your mail";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$response['status'] = "0";
			$response['data'] = "send  mail error";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
	}

	//Send mail

	function sendcontactUsMail($username,$email,$message)
	{
		$to = "ravi.kadia@letsnurture.com";
		$subject = "Wedoo Contact Us";
		$txt = "Dear $username,\r\n\n";
		$txt .= $message;
			
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:'".$email."'"."\r\n";
		$msg=$this->mailtempleate($to,$message,$username);
		if(mail($to,$subject,$msg, $headers)){
			return 1;
		}else{
			return 0;
		}
	}

	//public function contact us mail templeate
	public function mailtempleate($to,$message,$username){
		$logoImage='<img src="'. Yii::app()->getBaseUrl(true).'/upload/wedoo_logo.png" class="logo" style="float:left;" usemap="#home">';
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
										                                   '.$logoImage.'<br><br><br>&nbsp &nbsp <span style="font-size:20px"> Contact Us</span>                                   
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
										                                                        Dear Admin,
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
										                         								  <span style="color:#e05952; text-align:left;">'.$username.'</span>
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
	 * @Method		  :	GET
	 * @Params		  :
	 * @author        : Kadia Ravi
	 * @created		  :	January 21 2015
	 * @Modified by	  :
	 * @Comment		  : Country List Web Services.
	 **/

	public function actionCountryData(){
		$res = array();
		$response = array();
		$getCountryData = array();
		$countryData = Countries::model()->findAll("1=1 group by countryName");
		if($countryData){
			foreach ($countryData as $countryList){
				$res['countryName'] = $countryList['countryName'];
				$getCountryData[] = $res;
			}
			if($getCountryData){
				$response['status'] = "1";
				$response['data'] = $getCountryData;
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "No Record Found.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}else{
			$response['status'] = "0";
			$response['data'] = "No Record Found.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
	}



	/**
	 * @Method		  :	Feed back
	 * @Params		  : feed back
	 * @author        : kadia Ravi
	 * @created		  :	Nov 25 2014
	 * @Modified by	  :
	 * @Comment		  : Feedback Web Services.
	 **/

	public function actionFeedback(){
		$response = array();
		$data = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($data['data']['username']) && !isset($data['data']['username'])){
			$resonse['status'] = "0";
			$response['data'] = "Please Pass the username";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($data['data']['email']) && !isset($data['data']['email'])){
			$response['status'] = "0";
			$response['data'] = "Please Pass the Email";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($data['data']['feedback']) && !isset($data['data']['feedback'])){
			$response['status'] = "0";
			$response['data'] = "Please Pass the feedback";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$username=$data['data']['username'];
			$email=$data['data']['email'];
			$feedback=$data['data']['feedback'];
			$getMail= $this->sendFeedbackMail($username,$email,$feedback);
			if($getMail==1){
				$response['status'] = "1";
				$response['data'] = "successfully send your mail";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "send  mail error";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}

	//End Feedback

	//Send mail

	function sendFeedbackMail($username,$email,$feedback)
	{
		$to = "ravi.kadia@letsnurture.com";
		$subject = "Wedoo Web service";
		$txt = "Dear $username,\r\n\n";
		$txt .= $feedback;
			
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:'".$email."'"."\r\n";
		$msg=$this->mailtempleatefeedback($to,$feedback,$username);
		if(mail($to,$subject,$msg, $headers)){
			return 1;
		}else{
			return 0;
		}
	}



	//public function mail templeate
	public function mailtempleatefeedback($to,$feedback,$username){
		$logoImage='<img src="'. Yii::app()->getBaseUrl(true).'/upload/wedoo_logo.png" class="logo" style="float:left;" usemap="#home">';
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
										                                   '.$logoImage.'<br><br><br>&nbsp &nbsp <span style="font-size:20px"> USER FEEDBACK</span>                                   
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
										                                                        Dear Admin,
										                                                         </td>
										                                                      </tr>
										                                                      <tr>
										                                                         <td width="100%" height="6" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										                                                      </tr>
										                                                      <tr>
										                                                         <td style=" font-size: 15px; color: #424242; text-align:left; line-height: 24px;" class="padding-right15">
										                                                            '.$feedback.'
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
										                         								  <span style="color:#e05952; text-align:left;">'.$username.'</span>
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