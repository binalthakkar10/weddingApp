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
		if(empty($addWeddingData['data']['wedding_time']) && !isset($addWeddingData['data']['wedding_time']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_time";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($addWeddingData['data']['street_address']) && !isset($addWeddingData['data']['street_address']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the street_address";
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
			if(isset($addWeddingData['data']['wedding_time']) && !empty($addWeddingData['data']['wedding_time'])){
				$model->wedding_time = $addWeddingData['data']['wedding_time'];
			}else{
				$model->wedding_time = '';
			}
			if(isset($addWeddingData['data']['street_address']) && !empty($addWeddingData['data']['street_address'])){
				$model->street_address = $addWeddingData['data']['street_address'];
			}else{
				$model->street_address = '';
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
				$model->wedding_date = date('Y-m-d',strtotime($addWeddingData['data']['wedding_date']));
			    
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
				
				$categoryData = AlbumCategory::model()->findAll("user_id = '0'");
				$i = 1;
				$albumArr = array();
				foreach ($categoryData as $categoryList){
        			$albumDataList = Album::model()->find("user_id = '".$model->user_id."' AND wedding_id = '".$model->wedding_id."' AND album_category_id = '".$categoryList['album_cate_id']."'");
        			if($albumDataList){
        				// Already Album Exist.
        			}else{
        				// By Default Album Category Display
        				$albumData = new Album();
        				$albumData->user_id = $model->user_id;
        				$albumData->wedding_id = $model->wedding_id;
        				$albumData->album_category_id = $categoryList['album_cate_id'];
        				$albumData->position = $i;
        				if($albumData->save(false)){
        					$albumRecord['album_id'] = $albumData->album_id;
							$albumRecord['user_id'] = $albumData->user_id;
							$albumRecord['wedding_id'] = $albumData->wedding_id;
							$albumRecord['album_category_id'] = $albumData->album_category_id;
							$albumName = AlbumCategory::model()->find("album_cate_id = '".$albumData->album_category_id."'");
							$albumRecord['album_name']= $albumName['album_cate_name']?$albumName['album_cate_name']:'';
							$albumRecord['position'] = $albumData->position;
							$albumArr[] = $albumRecord;
	        				$i++;
						}
        			}
        		}

				$response['status'] = "1";
				$response['data']['success'] = "Add Wedding successfully.";
				$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
				$response['data']['wedding_time'] = ($model->wedding_time)?$model->wedding_time:'';
				$response['data']['street_address'] = ($model->street_address)?$model->street_address:'';
				$response['data']['to_bride_name'] = ($model->to_bride_name)?$model->to_bride_name:'';
				$response['data']['to_groom_name'] = ($model->to_groom_name)?$model->to_groom_name:'';
				$response['data']['to_partner_name'] = ($model->to_partner_name)?$model->to_partner_name:'';
				$response['data']['from_bride_name'] = ($model->from_bride_name)?$model->from_bride_name:'';
				$response['data']['from_groom_name'] = ($model->from_groom_name)?$model->from_groom_name:'';
				$response['data']['from_partner_name'] = ($model->from_partner_name)?$model->from_partner_name:'';
				$response['data']['wedding_date'] = ($model->wedding_date)?date('d-m-Y',strtotime($model->wedding_date)):'';
				$response['data']['wedding_location'] = ($model->wedding_location)?$model->wedding_location:'';
				$response['data']['wedding_uniq_id'] = ($model->wedding_uniq_id)?$model->wedding_uniq_id:'';
				$response['data']['image'] = ($model->image)?Yii::app()->getBaseUrl(true).'/upload/wedding_cover_image/'.$model->image:'';
				$response['data']['albumdata']=$albumArr;
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
				$res['wedding_id'] = $weddingList['wedding_id'];
				$res['user_id'] = $weddingList['user_id'];
                $res['wedding_time'] = $weddingList['wedding_time'];
                $res['street_address'] = $weddingList['street_address'];  				
				$res['to_bride_name'] = ucfirst($weddingList['to_bride_name']); 
				$res['to_groom_name'] = ucfirst($weddingList['to_groom_name']); 
				$res['to_partner_name'] = ucfirst($weddingList['to_partner_name']); 
				$res['from_bride_name'] = ucfirst($weddingList['from_bride_name']); 
				$res['from_groom_name'] = ucfirst($weddingList['from_groom_name']); 
				$res['from_partner_name'] = ucfirst($weddingList['from_partner_name']); 	
				$res['wedding_date'] = date('d-m-Y',strtotime($weddingList['wedding_date']));
				$res['wedding_location'] = $weddingList['wedding_location']; 
				$res['wedding_uniq_id'] = $weddingList['wedding_uniq_id']; 
				$res['wedding_days'] = $this->weddingDays(strtotime($weddingList['wedding_date']));
                if(isset($weddingList['image'] ) && !empty($weddingList['image'])) 
                {
				  $res['image']=Yii::app()->getBaseUrl(true).'/upload/wedding_cover_image/'.$weddingList['image'];
                } else {
				     $res['image']='';
                }				
				$getWeddingList[] = $res;
			}
			if($getWeddingList){
				$response['status'] = "1";
				$response['data'] = $getWeddingList;
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
		}
	}
	
	function weddingDays($time){
			if(time() < $time){
				$time = time() - $time; // to get the time since that moment
				$tokens = array (
					86400 => '',
				);
		
				foreach ($tokens as $unit => $text) {
					if ($time > $unit) continue;
					$numberOfUnits = floor($time / $unit);
					return abs($numberOfUnits.' '.$text.(($numberOfUnits<1)?'':''))	;
				}
			}else{
				$time = time() - $time; // to get the time since that moment
				$tokens = array (
					86400 => '',
				);
		
				foreach ($tokens as $unit => $text) {
					if ($time < $unit){
						return '0';
						continue;
					}else{ 
						$numberOfUnits = floor($time / $unit);
						return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
					}
				}
			}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : Wedding Delete
	 * @author        : Atul Baraiya
	 * @created		  :	March 26 2015
	 * @Modified by	  :
	 * @Comment		  : Wedding Delete.
	 **/
	public function actionDeleteWedding(){
	   $weddingData = json_decode(file_get_contents('php://input'), TRUE);
	   $response = array();
		if(empty($weddingData['data']['wedding_id']) && !isset($weddingData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$id=$weddingData[data]['wedding_id'];
			$weddingData = Wedding::model()->find("wedding_id = '".$id."'");
			//p($weddingData);
			if($weddingData){
				  $weddingData->delete();
				  $response['status'] = "1";				
				  $response['data'] = "Wedding deleted successfully.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}else{
				  $response['status'] = "0";				
				  $response['data'] = "Error in wedding remove.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}
		}
	}
}