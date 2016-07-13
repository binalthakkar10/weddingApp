<?php
class WeddingController extends ApiController{

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
	 * @Params		  : wedding_id,user_id,wedding_date,wedding_location,wedding_uniq_id,wedding_time,street_address
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya April 1 2015
	 * @Comment		  : Add Wedding Management.
	 **/

	public function actionAddWedding(){
		$response=array();
		$addWeddingData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($addWeddingData['data']['user_id']) && !isset($addWeddingData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($addWeddingData['data']['wedding_date']) && !isset($addWeddingData['data']['wedding_date']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_date";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($addWeddingData['data']['wedding_date']) && !isset($addWeddingData['data']['wedding_date']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding time;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($addWeddingData['data']['wedding_location']) && !isset($addWeddingData['data']['wedding_location']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_location";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$weddingData = Wedding::model()->find("wedding_uniq_id  = '".$addWeddingData['data']['wedding_uniq_id']."'");
			if($weddingData){
				$response['status'] = "0";
				$response['data'] = "This WeddingID Already Exists.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			// Insert Wedding Data
			$model = new Wedding();
			if(isset($addWeddingData['data']['user_id']) && !empty($addWeddingData['data']['user_id'])){
				$model->user_id = $addWeddingData['data']['user_id'];
			}else{
				$model->user_id = '';
			}
			if(isset($addWeddingData['data']['to_bride_name']) && !empty($addWeddingData['data']['to_bride_name'])){
				$model->to_bride_name = $addWeddingData['data']['to_bride_name'];
			}else{
				$model->to_bride_name = '';
			}
			if(isset($addWeddingData['data']['to_groom_name']) && !empty($addWeddingData['data']['to_groom_name'])){
				$model->to_groom_name = $addWeddingData['data']['to_groom_name'];
			}else{
				$model->to_groom_name = '';
			}
			if(isset($addWeddingData['data']['to_partner_name']) && !empty($addWeddingData['data']['to_partner_name'])){
				$model->to_partner_name = $addWeddingData['data']['to_partner_name'];
			}else{
				$model->to_partner_name = '';
			}
			if(isset($addWeddingData['data']['from_bride_name']) && !empty($addWeddingData['data']['from_bride_name'])){
				$model->from_bride_name = $addWeddingData['data']['from_bride_name'];
			}else{
				$model->from_bride_name = '';
			}
			if(isset($addWeddingData['data']['from_groom_name']) && !empty($addWeddingData['data']['from_groom_name'])){
				$model->from_groom_name = $addWeddingData['data']['from_groom_name'];
			}else{
				$model->from_groom_name = '';
			}
			if(isset($addWeddingData['data']['from_partner_name']) && !empty($addWeddingData['data']['from_partner_name'])){
				$model->from_partner_name = $addWeddingData['data']['from_partner_name'];
			}else{
				$model->from_partner_name = '';
			}
			if(isset($addWeddingData['data']['wedding_date']) && !empty($addWeddingData['data']['wedding_date'])){
				$model->wedding_date = date('d-m-Y',strtotime($addWeddingData['data']['wedding_date']));
			}else{
				$model->wedding_date = '';
			}
			if(isset($addWeddingData['data']['wedding_location']) && !empty($addWeddingData['data']['wedding_location'])){
				$model->wedding_location = $addWeddingData['data']['wedding_location'];
			}else{
				$model->wedding_location = '';
			}
			if(isset($addWeddingData['data']['wedding_uniq_id']) && !empty($addWeddingData['data']['wedding_uniq_id'])){
				$model->wedding_uniq_id = $addWeddingData['data']['wedding_uniq_id'];
			}else{
				$model->wedding_uniq_id = '';
			}
			if(isset($addWeddingData['data']['image']) && !empty($addWeddingData['data']['image'])){
				$model->image = $addWeddingData['data']['image'];
			}else{
				$model->image = '';
			}
			if($model->save(false)){
				$response['status'] = "1";
				$response['data']['success'] = "Add Wedding successfully.";
				$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
				$response['data']['to_bride_name'] = ($model->to_bride_name)?$model->to_bride_name:'';
				$response['data']['to_groom_name'] = ($model->to_groom_name)?$model->to_groom_name:'';
				$response['data']['to_partner_name'] = ($model->to_partner_name)?$model->to_partner_name:'';
				$response['data']['from_bride_name'] = ($model->from_bride_name)?$model->from_bride_name:'';
				$response['data']['from_groom_name'] = ($model->from_groom_name)?$model->from_groom_name:'';
				$response['data']['from_partner_name'] = ($model->from_partner_name)?$model->from_partner_name:'';
				$response['data']['wedding_date'] = ($model->wedding_date)?$model->wedding_date:'';
				$response['data']['wedding_location'] = ($model->wedding_location)?$model->wedding_location:'';
				$response['data']['wedding_uniq_id'] = ($model->wedding_uniq_id)?$model->wedding_uniq_id:'';
				$response['data']['image'] = Yii::app()->getBaseUrl(true).'/upload/wedding_cover_image/'.$model->image;
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
	 * @Params		  : Upload Photo Wedding
	 * @author        : Ankit Sompura
	 * @created		  :	February 13 2015
	 * @Modified by	  :
	 * @Comment		  : Upload Photo Album.
	 **/
	
	public function actionUploadPhotoWedding(){
		$response = array();
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "./upload/wedding_cover_image/".$_FILES["uploadedfile"]["name"])){
				$response['status'] = "1";
				$response['data'] = "File Upload Successfully.";
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
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : Wedding Listing User Wise
	 * @author        : Ankit Sompura
	 * @created		  :	February 13 2015
	 * @Modified by	  :
	 * @Comment		  : Wedding Listing User Wise.
	 **/
	
	public function actionWeddingListingUser(){
		$res = array();
		$response=array();
		$getWeddingList = array();
		$weddingData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($weddingData['data']['user_id']) && !isset($weddingData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$weddingData = Wedding::model()->findAll("user_id = '".$weddingData['data']['user_id']."'");
			foreach ($weddingData as $weddingList){
				$res['wedding_id'] = $weddingL