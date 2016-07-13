<?php
class AlbumController extends ApiController{

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
	
// Get Album Category Data 
	
	public function actionGetAlbumCategory(){
		$res = array();
		$response = array();
		$getAlbumCategory = array();
		if(empty($_REQUEST['user_id']) && !isset($_REQUEST['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
				$albumCategory = AlbumCategory::model()->findAll("album_cate_name NOT IN ('All Photos') AND user_id='".$_REQUEST['user_id']."'");
				foreach ($albumCategory as $categoryData){
					$res['album_cate_id'] = $categoryData['album_cate_id'];
					$res['user_id'] = $categoryData['user_id'];
					$res['album_cate_name'] = $categoryData['album_cate_name'];
					$res['album_cover_image'] = Yii::app()->getBaseUrl(true).'/upload/album_category_cover/'.$categoryData['album_cover_image'];
					$res['category_type'] = $categoryData['category_type'];
					$res['position'] = $categoryData['position'];
					if($categoryData['category_type'] == 'existing'){
						$getAlbumCategory['existing'][] = $res;
					}
					if($categoryData['category_type'] == 'suggestion'){
						$getAlbumCategory['suggestion'][] = $res;
					}
					if($categoryData['category_type'] == 'custom'){
						$getAlbumCategory['custom'][] = $res;
					}
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
	}
	/**
	 * @Method		  :	POST
	 * @Params		  : Upload Photo Album
	 * @author        : Ankit Sompura
	 * @created		  :	February 13 2015
	 * @Modified by	  :
	 * @Comment		  : Upload Photo Album.
	 **/
	
	/*public function actionUploadPhotoAlbum(){
		$response = array();
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
		if(empty($_REQUEST['album_category_id']) && !isset($_REQUEST['album_category_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the album_category_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "./upload/album_image/".$_FILES["uploadedfile"]["name"])){
				$model = new AlbumPhotoGallery();
				$model->photo_image = $_FILES["uploadedfile"]["name"];
				$model->save(false);
				$albumData = new Album();
				$albumData->user_id = $_REQUEST['user_id'];
				$albumData->wedding_id = $_REQUEST['wedding_id']; 
				$albumData->album_category_id = $_REQUEST['album_category_id'];
				$albumData->album_photo_id = $model->album_photo_id;
				$albumData->save(false);    
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
	}*/
	public function actionUploadPhotoAlbum(){
		$response = array();
		if(empty($_REQUEST['album_id']) && !isset($_REQUEST['user_id']))
		{
			$response['status'] = "0";
			$response['data'] = "Please pass the user_id";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			exit();
		}else{
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "./upload/album_image/".$_FILES["uploadedfile"]["name"])){
				$model = new AlbumPhotoGallery();
				$model->album_id =  $_REQUEST['album_id'];
				$model->photo_image = $_FILES["uploadedfile"]["name"];
				$model->save(false);
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
	}
	public function actionBooklet(){
	 $albumData = json_decode(file_get_contents('php://input'), TRUE);
	 $response=array();
	// p($albumData);
		 if(!isset($albumData['data']['user_id']) && empty($albumData['data']['user_id']))
		 {
				$response['status'] = "0";
				$response['data'] = "Please pass the user_id";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
		 }
		 if(!isset($albumData['data']['wedding_id']) && empty($albumData['data']['wedding_id']))
		 {
				$response['status'] = "0";
				$response['data'] = "Please pass the wedding_id";
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($response);
				exit();
		 }

		 $album=Album::model()->find("user_id='".$albumData['data']['user_id']."' AND wedding_id='".$albumData['data']['wedding_id']."' AND album_id='".$albumData['data']['album_id']."'");
		// p($album);
		   $albumCategory=AlbumCategory::model()->find("album_cate_id='".$album->album_category_id."'");
		   //p($albumCategory);
		   $response['album_cate_id']=$albumCategory->album_cate_id;
		   $response['album_cate_name']=$albumCategory->album_cate_name;
		   $response['album_category_image']=Yii::app()->getBaseUrl(true).'/upload/album_category_cover/'.$albumCategory->album_cover_image;
		   $AlbumPhotoGallery=AlbumPhotoGallery::model()->findAll("album_id='".$albumData['data']['album_id']."'");
		   //p($AlbumPhotoGallery);
		    //$res['data']=$response;
			$res1=array();
			foreach($AlbumPhotoGallery as $key)
			{
			  //p($key['photo_image']);
			   $res1[]=Yii::app()->getBaseUrl(true).'/upload/album_category_cover/'.$key['photo_image'];
			}
			$res['data']=$response;
			$res['data']['image']=$res1;
			//p($res1);
		 //   $res['data']['photo_image']=$AlbumPhotoGallery->photo_image;
		    
		  
		 header('Content-Type: application/json; charset=utf-8');
				echo json_encode($res);
				exit();
	}
}