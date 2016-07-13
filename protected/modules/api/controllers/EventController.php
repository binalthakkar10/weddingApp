<?php
class EventController extends ApiController{

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
	 * @Params		  : event_id,user_id,event_name,event_datetime,event_location,event_address,event_latitute,event_longitude,event_description,event_link_album_id,uploadedfile,wedding_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya March 27 2015
	 * @Comment		  : Add Event Management.
	 **/

	
	public function actionAddEvent(){
	
		$response=array();
		$eventData = json_decode(file_get_contents('php://input'), TRUE);
		//p($eventData);
		if(empty($eventData['data']['user_id']) && !isset($eventData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($eventData['data']['event_name']) && !isset($eventData['data']['event_name']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_name";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($eventData['data']['event_datetime']) && !isset($eventData['data']['event_datetime']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_datetime";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($eventData['data']['wedding_id']) && !isset($eventData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($eventData['data']['event_location']) && !isset($eventData['data']['event_location']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_location";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($eventData['data']['event_address']) && !isset($eventData['data']['event_address']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_address";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}if(empty($eventData['data']['event_description']) && !isset($eventData['data']['event_description']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_description";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			// Check Event Name Already Exist or Not
			$eventName = Event::model()->find("event_name  = '".$eventData['data']['event_name']."' AND user_id='".$eventData['data']['user_id']."' AND wedding_id='".$eventData['data']['wedding_id']."' ");
			if($eventName){
				$response['status'] = "0";
				$response['data'] = "This Event Name Already Exists.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
			// Insert Event Data
			$model = new Event();
			if(isset($eventData['data']['user_id']) && !empty($eventData['data']['user_id'])){
				$model->user_id = $eventData['data']['user_id'];
			}else{
				$model->user_id = '';
			}
			if(isset($eventData['data']['event_name']) && !empty($eventData['data']['event_name'])){
				$model->event_name = $eventData['data']['event_name'];
			}else{
				$model->event_name = '';
			}
			if(isset($eventData['data']['event_datetime']) && !empty($eventData['data']['event_datetime'])){
				$model->event_datetime =$eventData['data']['event_datetime']; //date('Y-m-d H:i:s',strtotime($eventData['data']['event_datetime']));
			}else{
				$model->event_datetime = '';
			}
			if(isset($eventData['data']['wedding_id']) && !empty($eventData['data']['wedding_id'])){
				$model->wedding_id =$eventData['data']['wedding_id']; //date('Y-m-d H:i:s',strtotime($eventData['data']['event_datetime']));
			}else{
				$model->event_datetime = '';
			}
			if(isset($eventData['data']['event_location']) && !empty($eventData['data']['event_location'])){
				$model->event_location = $eventData['data']['event_location'];
			}else{
				$model->event_location = '';
			}
			if(isset($eventData['data']['event_address']) && !empty($eventData['data']['event_address'])){
				$model->event_address = $eventData['data']['event_address'];
				$lat=$this->findLatLog($eventData['data']['event_address']);
				
				$model->event_latitute=$lat['Lat'];
				$model->event_longitude=$lat['Long'];
			}else{
				$model->event_address = '';
			}
			if(isset($eventData['data']['event_description']) && !empty($eventData['data']['event_description'])){
				$model->event_description = $eventData['data']['event_description'];
			}else{
				$model->event_description = '';
			}
			if(isset($eventData['data']['uploadedfile']) && !empty($eventData['data']['uploadedfile'])){
				$model->field1 = $eventData['data']['uploadedfile'];
			}else{
			     
			    if(isset($eventData['data']['event_link_album_id']) && !empty($eventData['data']['event_link_album_id']))
				{
				  $model->event_link_album_id=$eventData['data']['event_link_album_id'];     
				}
				else
				{
				$model->field1 = '';
				$albumCategory = AlbumCategory::model()->find("album_cate_name = '".$eventData['data']['event_name']."'");
			    $model->field2=$albumCategory->album_cover_image;
				}
			}
			if($model->save(false)){
				$response['status'] = "1";
				$response['data']['success'] = "Add event successfully.";
				$response['data']['event_id'] = ($model->event_id)?$model->event_id:'';
				$response['data']['user_id'] = ($model->user_id)?$model->user_id:'';
				$response['data']['wedding_id'] = ($model->wedding_id)?$model->wedding_id:'';
				$response['data']['event_name'] = ($model->event_name)?$model->event_name:'';
				$response['data']['event_datetime'] = ($model->event_datetime)?$model->event_datetime:'';
				$response['data']['event_location'] = ($model->event_location)?$model->event_location:'';
				$response['data']['event_address'] = ($model->event_address)?$model->event_address:'';
				$response['data']['event_latitute'] = ($model->event_latitute)?$model->event_latitute:'';
				$response['data']['event_longitude'] = ($model->event_longitude)?$model->event_longitude:'';
				$response['data']['event_description'] = ($model->event_description)?$model->event_description:'';
				if(isset($eventData['data']['uploadedfile']) && !empty($eventData['data']['uploadedfile'])){
				$response['data']['event_image'] =$model->field1;
			   }
			   if(isset($model->field2) && !empty($model->field2))
			   {
			     $response['data']['event_image'] =$model->field2;
			   }
			   if(isset($model->event_link_album_id) && !empty($model->event_link_album_id))
			   {
			    $user_id=$model->user_id;
			    $link_id=$model->event_link_album_id; 
				$albumData = Album::model()->find("user_id = '".$user_id."' AND album_category_id = '".$link_id."'");
				if($albumData){
					$albumphoto = AlbumPhotoGallery::model()->find("album_photo_id = '".$albumData['album_category_id']."'");
					if($albumphoto){
						$response['data']['event_image'] =$albumphoto['photo_image'];
					}else{
						$albumCategory = AlbumCategory::model()->find("album_cate_id = '".$link_id."'");
						$response['data']['event_image'] =$albumCategory['album_cover_image'];
					}
				}else{
					//$response['data']['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/default.jpg';
				}
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
	 * @Params		  : event_id,user_id,event_name,event_datetime,event_location,event_address,event_latitute,event_longitude,event_description,event_link_album_id,uploadedfile
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya March 27 2015
	 * @Comment		  : Edit Event Management.
	 **/
	
	public function actionEditEvent(){
		$response=array();
		$editeventData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($editeventData['data']['event_id']) && !isset($editeventData['data']['event_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$eventID =  $editeventData['data']['event_id'];
			$eventDataList = $this->loadModel($eventID, 'Event');
			if(isset($editeventData['data']['user_id']) && !empty($editeventData['data']['user_id'])){
				$eventDataList->user_id = $editeventData['data']['user_id'];
			}
			if(isset($editeventData['data']['wedding_id']) && !empty($editeventData['data']['wedding_id'])){
				$eventDataList->wedding_id = $editeventData['data']['wedding_id'];
			}
			if(isset($editeventData['data']['event_name']) && !empty($editeventData['data']['event_name'])){
				$eventDataList->event_name = $editeventData['data']['event_name'];
			}
			if(isset($editeventData['data']['event_datetime']) && !empty($editeventData['data']['event_datetime'])){
				$eventDataList->event_datetime =$editeventData['data']['event_datetime']; //date('Y-m-d H:i:s',strtotime($editeventData['data']['event_datetime']));
			}
			if(isset($editeventData['data']['event_location']) && !empty($editeventData['data']['event_location'])){
				$eventDataList->event_location = $editeventData['data']['event_location'];
			}
			if(isset($editeventData['data']['event_address']) && !empty($editeventData['data']['event_address'])){
				$eventDataList->event_address = $editeventData['data']['event_address'];
				$lat=$this->findLatLog($editeventData['data']['event_address']);
				$eventDataList->event_latitute=$lat['Lat'];
				$eventDataList->event_longitude=$lat['Long'];
			}
			if(isset($editeventData['data']['event_description']) && !empty($editeventData['data']['event_description'])){
				$eventDataList->event_description = $editeventData['data']['event_description'];
			}
			if(isset($editeventData['data']['uploadedfile']) && !empty($editeventData['data']['uploadedfile'])){
				$eventDataList->field1 = $editeventData['data']['uploadedfile'];
				$eventDataList->field2="";
				$eventDataList->event_link_album_id="";
			}
			if($eventDataList->save(false)){
				$response['status'] = "1";
				$response['data']['success'] = "Edit event successfully.";
				$response['data']['event_id'] = ($eventDataList->event_id)?$eventDataList->event_id:'';
				$response['data']['user_id'] = ($eventDataList->user_id)?$eventDataList->user_id:'';
				$response['data']['wedding_id'] = ($eventDataList->wedding_id)?$eventDataList->wedding_id:'';
				$response['data']['event_name'] = ($eventDataList->event_name)?$eventDataList->event_name:'';
				$response['data']['event_datetime'] = ($eventDataList->event_datetime)?$eventDataList->event_datetime:'';
				$response['data']['event_location'] = ($eventDataList->event_location)?$eventDataList->event_location:'';
				$response['data']['event_address'] = ($eventDataList->event_address)?$eventDataList->event_address:'';
				$response['data']['event_latitute'] = ($eventDataList->event_latitute)?$eventDataList->event_latitute:'';
				$response['data']['event_longitude'] = ($eventDataList->event_longitude)?$eventDataList->event_longitude:'';
				$response['data']['event_description'] = ($eventDataList->event_description)?$eventDataList->event_description:'';
				$response['data']['event_image'] = ($eventDataList->field1)?Yii::app()->getBaseUrl(true).'/upload/event_image/'.$eventDataList->field1:Yii::app()->getBaseUrl(true)."/upload/album_category_cover/".$eventDataList->field2;
				if(isset($eventDataList->field2) && !empty($eventDataList->field2))
				{
				  if(isset($editeventData['data']['event_link_album_id']) && !empty($editeventData['data']['event_link_album_id']))
				  {
					   $eventDataList->field2="";
					   $eventDataList->event_link_album_id = $editeventData['data']['event_link_album_id'];
					   $user_id=$eventDataList->user_id;
					   $link_id=$eventDataList->event_link_album_id; 
					   $eventDataList->event_link_album_id=$link_id;
					   $albumData = Album::model()->find("user_id = '".$user_id."' AND album_category_id = '".$link_id."'");
					   if($albumData){
							$albumphoto = AlbumPhotoGallery::model()->find("album_photo_id = '".$albumData['album_category_id']."'");
							if($albumphoto){
								$response['data']['event_image'] = $albumphoto['photo_image'];
							}else{
								$albumCategory = AlbumCategory::model()->find("album_cate_id = '".$link_id."'");
								$response['data']['event_image'] = $albumCategory['album_cover_image'];
							}
					}else{
						//$response['data']['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/default.jpg';
					}
					$eventDataList->save(false);
			      }
				}
				if(empty($eventDataList->field1) && empty($eventDataList->field2) && empty($editeventData['data']['event_link_album_id']))
				{	  			   
				    $user_id=$eventDataList->user_id;
					$link_id=$eventDataList->event_link_album_id; 
					$albumData = Album::model()->find("user_id = '".$user_id."' AND album_category_id = '".$link_id."'");
					if($albumData){
						$albumphoto = AlbumPhotoGallery::model()->find("album_photo_id = '".$albumData['album_category_id']."'");
						if($albumphoto){
							$response['data']['event_image'] = $albumphoto['photo_image'];
						}else{
							$albumCategory = AlbumCategory::model()->find("album_cate_id = '".$link_id."'");
							$response['data']['event_image'] = $albumCategory['album_cover_image'];
						}
					}else{
						//$response['data']['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/default.jpg';
					}
				}
				if(empty($eventDataList->field1) && empty($eventDataList->field2) && isset($editeventData['data']['event_link_album_id']) && !empty($editeventData['data']['event_link_album_id']))
				{				   
				    $user_id=$eventDataList->user_id;
					$link_id=$editeventData['data']['event_link_album_id']; 
                    $eventDataList->event_link_album_id = $editeventData['data']['event_link_album_id'];
					$albumData = Album::model()->find("user_id = '".$user_id."' AND album_category_id = '".$link_id."'");
					if($albumData){
						$albumphoto = AlbumPhotoGallery::model()->find("album_photo_id = '".$albumData['album_category_id']."'");
						if($albumphoto){
							$response['data']['event_image'] = $albumphoto['photo_image'];
						}else{
                   			$albumCategory = AlbumCategory::model()->find("album_cate_id = '".$link_id."'");
							$response['data']['event_image'] = $albumCategory['album_cover_image'];
						}
					}else{
						//$response['data']['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/default.jpg';
					}
					$eventDataList->save(false);
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
	
	// Get Album Category Data 
	public function actionGetAlbumCategoryData(){
		$res = array();
		$response = array();
		$getAlbumCategory = array();
		$albumCategory = AlbumCategory::model()->findAll("album_cate_name NOT IN ('All Photos')");
		foreach ($albumCategory as $categoryData){
			$res['album_cate_id'] = $categoryData['album_cate_id'];
			$res['album_cate_name'] = $categoryData['album_cate_name'];
			$res['album_cover_image'] = $categoryData['album_cover_image'];
			$getAlbumCategory[] = $res;
		}
		if($getAlbumCategory){
			$response['status'] = "1";
			$response['data'] = $getAlbumCategory;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$response['status'] = "0";
			$response['data'] = "No Album Category Found.";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya March 27 2015
	 * @Comment		  : View Event Listing.
	 **/
	
	public function actionViewEvent(){
	
		$res = array();
		$response = array();
		$geteventListing = array();
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
		else{
			$eventViewData = Event::model()->findAll("user_id = '".$_REQUEST['user_id']."' AND wedding_id='".$_REQUEST['wedding_id']."' order by created_at DESC");
			
			foreach ($eventViewData as $eventListing){
				$res['event_id'] = $eventListing['event_id'];
				$res['user_id'] = $eventListing['user_id'];
				$res['wedding_id'] = $eventListing['wedding_id'];
				$res['event_name'] = ucfirst(strtolower($eventListing['event_name']));
				$res['event_datetime'] = date('d-m-Y h:m A',strtotime($eventListing['event_datetime'])); //date('g:i A,jS F',strtotime($eventListing['event_datetime']));
				$res['event_location'] = $eventListing['event_location'];
				$res['event_address'] = $eventListing['event_address'];
				$res['event_latitute']=$eventListing['event_latitute'];
				$res['event_longitude']=$eventListing['event_longitude'];
				$res['event_description'] = $eventListing['event_description'];
				if(isset($eventListing['field1']) && !empty($eventListing['field1'])){
				$res['event_image'] =Yii::app()->getBaseUrl(true).'/upload/event_image/'.$eventListing['field1'];
			   }
			   if(isset($eventListing['field2']) && !empty($eventListing['field2']))
			   {
			     $res['event_image'] =Yii::app()->getBaseUrl(true)."/upload/album_category_cover/". $eventListing['field2'];
			   }
			   if(isset($eventListing['event_link_album_id']) && !empty($eventListing['event_link_album_id']))
			   {
					$albumData = Album::model()->find("user_id = '".$_REQUEST['user_id']."' AND album_category_id = '".$eventListing['event_link_album_id']."'");
					if($albumData){
						$albumphoto = AlbumPhotoGallery::model()->find("album_photo_id = '".$albumData['album_category_id']."'");
						if($albumphoto){
							$res['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_image/'.$albumphoto['photo_image'];
						}else{
							$albumCategory = AlbumCategory::model()->find("album_cate_id = '".$eventListing['event_link_album_id']."'");
							$res['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/'.$albumCategory['album_cover_image'];
						}
					}else{
						$res['event_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/default.jpg';
					}
				}
				$res['created_at'] = $eventListing['created_at'];
				$res['status'] = $eventListing['status'];
				$geteventListing[] = $res;
			}
			if($geteventListing){
				$response['status'] = "1";
				$response['data'] = $geteventListing;
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$response['status'] = "0";
				$response['data'] = "No Event Found.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}
		}
	}
	
	public function findLatLog($address){
		$prepAddr = str_replace(' ','+',$address);
		//$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyBHfAY7HD7dwXu6AXrxVmg7Pp2VNfHMI9M');
		$output= json_decode($geocode);
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
		
		$latitute=array();
		if(empty($lat)){
		 	$latitute['Lat']="0.00";
		}else {
			$latitute['Lat']=$lat; }
		if(empty($lat)){
		  	$latitute['Long']="0.00";
		}else{
			$latitute['Long']=$long; 
		}
		return $latitute;    
	}
	
	/**
	 * @Method		  :	GET
	 * @Params		  : 
	 * @author        : Atul Baraiya
	 * @created		  :	March 18 2015
	 * @Modified by	  :
	 * @Comment		  : Dislpay event name
	 **/
	 
	 public function actionEventName(){
	    $res=array();
		$response = array();
		$getArray = array();
		$albumCatModel = AlbumCategory::model()->findAll("user_id='0'");
		foreach($albumCatModel as $categories){
			$res[] = ucfirst(strtolower($categories['album_cate_name']));	
		}
		if($res){
			$response['status']= '1';
			$response['event_name'] = $res;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);exit;
		}
	 }
	 
	 /**
	 * @Method		  :	POST
	 * @Params		  : event_id,wedding_id,user_id
	 * @author        : Atul Baraiya
	 * @created		  :	March 27 2015
	 * @Modified by	  :
	 * @Comment		  : Delete Event Web Service.
	 **/
	
	public function actionDeleteEvent(){
		$response = array();
		$deleteeventData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($deleteeventData['data']['event_id']) && !isset($deleteeventData['data']['event_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the event_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($deleteeventData['data']['user_id']) && !isset($deleteeventData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($deleteeventData['data']['wedding_id']) && !isset($deleteeventData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			$eventID = $deleteeventData['data']['event_id'];
			$eventUserId = $deleteeventData['data']['user_id'];
			$eventWeddingId = $deleteeventData['data']['wedding_id'];
			$eventData = Event::model()->find("event_id = '".$eventID."' AND user_id='".$eventUserId."' AND wedding_id='".$eventWeddingId."'");
			if($eventData){
				  $eventData->delete();
				  $response['status'] = "1";				
				  $response['data'] = "Event deleted successfully.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}else{
				  $response['status'] = "0";				
				  $response['data'] = "Error in event remove.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : Event Image Upload
	 * @author        : Atul Baraiya
	 * @created		  :	March 19  2015
	 * @Modified by	  :
	 * @Comment		  :  Event Image Upload.
	 **/

	public function actionUploadEventImage(){
		$response = array();
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "./upload/event_image/".$_FILES["uploadedfile"]["name"])){
			$response['status'] = "1";
			$response['data'] = "File Upload Successfully.";
			$response['event_image'] = Yii::app()->getBaseUrl(true).'/upload/event_image/'.$_FILES["uploadedfile"]["name"];
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
	 * @Params		  : user_id, accom_name, accom_address, accom_web_url, accom_desc,wedding_id,wedding_uniq_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya April 16 2015
	 * @Comment		  : Create Accomodation Web Service.
	 **/
	
	public function actionAddAccommodation(){
		$response=array();
		$res=array();
		$accomodationData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($accomodationData['data']['user_id']) && !isset($accomodationData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['wedding_id']) && !isset($accomodationData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['wedding_uniq_id']) && !isset($accomodationData['data']['wedding_uniq_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_uniq_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['accom_name']) && !isset($accomodationData['data']['accom_name']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_name";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['accom_address']) && !isset($accomodationData['data']['accom_address']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_address";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['accom_web_url']) && !isset($accomodationData['data']['accom_web_url']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_web_url";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($accomodationData['data']['accom_desc']) && !isset($accomodationData['data']['accom_desc']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_desc";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			$accomodationDataList = Accomodation::model()->find("accom_name = '".$accomodationData['data']['accom_name']."'");
			if($accomodationDataList){
				$response['status'] = "0";
				$response['data'] = "This Accommodation Name Already Exists.";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
			}else{
				$accomodation = new Accomodation();
				$accomodation->user_id = $accomodationData['data']['user_id'];
				if(isset($accomodationData['data']['accom_name']) && !empty($accomodationData['data']['accom_name'])){
					$accomodation->accom_name = $accomodationData['data']['accom_name'];
				}
				if(isset($accomodationData['data']['accom_address']) && !empty($accomodationData['data']['accom_address'])){
					$accomodation->accom_address = $accomodationData['data']['accom_address'];
				}
				if(isset($accomodationData['data']['accom_web_url']) && !empty($accomodationData['data']['accom_web_url'])){
					$accomodation->accom_web_url = $accomodationData['data']['accom_web_url'];
				}
				if(isset($accomodationData['data']['accom_desc']) && !empty($accomodationData['data']['accom_desc'])){
					$accomodation->accom_desc = $accomodationData['data']['accom_desc'];
				}
				if(isset($accomodationData['data']['wedding_id']) && !empty($accomodationData['data']['wedding_id'])){
					$accomodation->wedding_id = $accomodationData['data']['wedding_id'];
				}
				if(isset($accomodationData['data']['wedding_uniq_id']) && !empty($accomodationData['data']['wedding_uniq_id'])){
					$accomodation->wedding_uniq_id = $accomodationData['data']['wedding_uniq_id'];
				}
				if($accomodation->save(false)){
					$res['status'] = "1";
					$res['success'] = "Accommodation saved successfully.";
					$response['accomodation_id'] = ($accomodation->accomodation_id)?$accomodation->accomodation_id:'';
					$response['user_id'] = ($accomodation->user_id)?$accomodation->user_id:'';
					$response['wedding_id'] = ($accomodation->wedding_id)?$accomodation->wedding_id:'';
					$response['wedding_uniq_id'] = ($accomodation->wedding_uniq_id)?$accomodation->wedding_uniq_id:'';
					$response['accom_name'] = ($accomodation->accom_name)?$accomodation->accom_name:'';
					$response['accom_address'] = ($accomodation->accom_address)?$accomodation->accom_address:'';
					$response['accom_web_url'] = ($accomodation->accom_web_url)?$accomodation->accom_web_url:'';
					$response['accom_desc'] = ($accomodation->accom_desc)?$accomodation->accom_desc:'';
					$res['data']=$response;
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($res);
					exit();
				}else{
					$response['status'] = "0";
					$response['data'] = "Error in accommodation.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
				}			
			}
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : accomodation_id,user_id, accom_name, accom_address, accom_web_url, accom_desc
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  : Atul Baraiya April 16 2015
	 * @Comment		  : Edit Accomodation Web Service.
	 **/
	
	public function actionEditAccommodation(){
		$response=array();
		$res=array();
		$editaccomodationData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($editaccomodationData['data']['accomodation_id']) && !isset($editaccomodationData['data']['accomodation_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		
		else{
			$accomodationID = $editaccomodationData['data']['accomodation_id'];
			$editAccomodation = $this->loadModel($accomodationID, 'Accomodation');
			if(isset($editaccomodationData['data']['accom_name']) && !empty($editaccomodationData['data']['accom_name'])){
				$editAccomodation->accom_name = $editaccomodationData['data']['accom_name'];
			}
			if(isset($editaccomodationData['data']['accom_address']) && !empty($editaccomodationData['data']['accom_address'])){
				$editAccomodation->accom_address = $editaccomodationData['data']['accom_address'];
			}
			if(isset($editaccomodationData['data']['accom_web_url']) && !empty($editaccomodationData['data']['accom_web_url'])){
				$editAccomodation->accom_web_url = $editaccomodationData['data']['accom_web_url'];
			}
			if(isset($editaccomodationData['data']['accom_desc']) && !empty($editaccomodationData['data']['accom_desc'])){
				$editAccomodation->accom_desc = $editaccomodationData['data']['accom_desc'];
			}
			if($editAccomodation->save(false)){
					$res['status'] = "1";
					$res['success'] = "Edit Accommodation Edited successfully.";
					$response['accomodation_id'] = ($editAccomodation->accomodation_id)?$editAccomodation->accomodation_id:'';
					$response['user_id'] = ($editAccomodation->user_id)?$editAccomodation->user_id:'';
					$response['wedding_id'] = ($editAccomodation->wedding_id)?$editAccomodation->wedding_id:'';
					$response['wedding_uniq_id'] = ($editAccomodation->wedding_uniq_id)?$editAccomodation->wedding_uniq_id:'';
					$response['accom_name'] = ($editAccomodation->accom_name)?$editAccomodation->accom_name:'';
					$response['accom_address'] = ($editAccomodation->accom_address)?$editAccomodation->accom_address:'';
					$response['accom_web_url'] = ($editAccomodation->accom_web_url)?$editAccomodation->accom_web_url:'';
					$response['accom_desc'] = ($editAccomodation->accom_desc)?$editAccomodation->accom_desc:'';
					$res['data']=$response;
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($res);
					exit();
			}else{
					$response['status'] = "0";
					$response['data'] = "Error in edit accommodation.";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					exit();
			}	
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : accomodation_id,wedding_id,user_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  :
	 * @Comment		  : Delete Accomodation Web Service.
	 **/
	
	public function actionDeleteAccommodation(){
		$response = array();
		$deleteaccomodationData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($deleteaccomodationData['data']['accomodation_id']) && !isset($deleteaccomodationData['data']['accomodation_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the accomodation_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($deleteaccomodationData['data']['user_id']) && !isset($deleteaccomodationData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($deleteaccomodationData['data']['wedding_id']) && !isset($deleteaccomodationData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the wedding_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			$accomodationID = $deleteaccomodationData['data']['accomodation_id'];
			$accomodationData = Accomodation::model()->find("accomodation_id = '".$accomodationID."' AND wedding_id='".$deleteaccomodationData['data']['wedding_id']."' AND user_id='".$deleteaccomodationData['data']['user_id']."'");
			if($accomodationData){
				  $accomodationData->delete();
				  $response['status'] = "1";				
				  $response['data'] = "Accommodation deleted successfully.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}else{
				  $response['status'] = "0";				
				  $response['data'] = "Error in accommodation remove.";
				  header('Content-Type: application/json; charset=utf-8');
				  echo json_encode($response);
				  exit();
			}
		}
	}
	
	/**
	 * @Method		  :	POST
	 * @Params		  : user_id,wedding_id
	 * @author        : Ankit Sompura
	 * @created		  :	February 11 2015
	 * @Modified by	  :
	 * @Comment		  : View Accomodation Listing.
	 **/
	public function actionViewAccommodation(){
		$res = array();
		$response = array();
		$getaccomodationListing = array();
		$viewaccomodationData = json_decode(file_get_contents('php://input'), TRUE);
		if(empty($viewaccomodationData['data']['user_id']) && !isset($viewaccomodationData['data']['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		if(empty($viewaccomodationData['data']['wedding_id']) && !isset($viewaccomodationData['data']['wedding_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}
		else{
			$accomodationList = Accomodation::model()->findAll("user_id = '".$viewaccomodationData['data']['user_id']."' AND wedding_id='".$viewaccomodationData['data']['wedding_id']."'");
			foreach ($accomodationList as $accomodation){
				$res['accomodation_id'] = ($accomodation['accomodation_id'])?$accomodation->accomodation_id:'';
				$res['user_id'] = ($accomodation['user_id'])?$accomodation['user_id']:'';
				$res['wedding_id'] = ($accomodation['wedding_id'])?$accomodation['wedding_id']:'';
				$res['wedding_uniq_id'] = ($accomodation['wedding_uniq_id'])?$accomodation['wedding_uniq_id']:'';
				$res['accom_name'] = ($accomodation['accom_name'])?$accomodation['accom_name']:'';
				$res['accom_address'] = ($accomodation['accom_address'])?$accomodation['accom_address']:'';
				$res['accom_web_url'] = ($accomodation['accom_web_url'])?$accomodation['accom_web_url']:'';
				$res['accom_desc'] = ($accomodation['accom_desc'])?$accomodation['accom_desc']:'';
				$getaccomodationListing[] = $res;
			}
			if($getaccomodationListing){
				 $response['status'] = "1";				
				 $response['data'] = $getaccomodationListing;
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
}