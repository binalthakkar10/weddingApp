<?php

class WeddingController extends WeddingCoreController
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
	public function actionWedding_Signup()
	{
		session_start();
		if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
			$count=count(Wedding::model()->findAll("user_id='".$_SESSION['uid']."'"));
			$invite=count(InviteFriend::model()->findAll("invite_email='".$_SESSION['email']."'"));
			//p($invite);
			$this->render('wedding_signup',array("count"=>$count,"invite"=>$invite));
		} else {
		    $this->redirect(array('/Index/'));
		}
	}
	public function actionImageUpload(){
		$data = substr($_POST['imgBase64'], strpos($_POST['imgBase64'], ",") + 1);
		$decodedData = base64_decode($data);
		
		$filename = md5(uniqid()) . '.png';
		$path	= 	YiiBase::getPathOfAlias('webroot');
		$file=$path.'/upload/wedding/'.$filename;
		$fp = fopen($file, 'wb');
		fwrite($fp, $decodedData);
		fclose();
		echo $filename;
	}
	
	public function actionCreate() { 
        session_start();	
		//p($_POST['Wedding']['street_address']);
        $model = new Wedding; 
        if (isset($_POST['Wedding'])) {
        	$model->setAttributes($_POST['Wedding']);
        	if(isset($_POST['Wedding']['wedding_date']) && !empty($_POST['Wedding']['wedding_date'])){
        		//$model->wedding_date = date('Y-m-d H:i:s',strtotime($_POST['Wedding']['wedding_date']));
				//$model->wedding_date=$_POST['Wedding']['wedding_date'];
				$finalDate = DateTime::createFromFormat('d/m/Y', $_POST['Wedding']['wedding_date']);
			    $model->wedding_date = $finalDate->format('Y-m-d');
        	}
			$model->street_address = $_POST['Wedding']['street_address'];
        	if ($model->save(false)) {
        		$_SESSION['wedding_id']=$model->wedding_id;
        		$categoryData = AlbumCategory::model()->findAll("user_id = '0'");
        		$i = 1;
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
        				$albumData->save(false);
        				$i++;
        			}
        		}
        		$this->redirect('visitpage');
        	}
        }
    }
    
	public function actionWedding_Listing(){	
		$weddingData = Wedding::model()->find("wedding_uniq_id ='".$_POST['txtWeddingId']."'");
		if($weddingData){
			session_start();
			$_SESSION['wedding_id']=$weddingData['wedding_id'];
			echo 1;
		}
		
	}
	public function actionVisitPage(){
		session_start();
		//p($_SESSION['email']);
		if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		
		$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");
		//p($weddingData);
		if(count($weddingData)==0)
		{
		  $this->redirect('createnewwedding');
		}
		$this->render('visitpage',array('weddingData'=>$weddingData));
		}else{
			$this->redirect(array('/Index/'));
		}
	}
	
	public function actionEditAlbum(){
		session_start();  
         	
		if($_SESSION['uid'] && $_SESSION['wedding_id']){
		$id=$_POST['txtWeddingHidden'];
		$weddingData = new Wedding;
		$weddingData = $this->loadModel($id, 'Wedding');
		if(isset($_POST['txtEditBride']) && !empty($_POST['txtEditBride'])){
				if(isset($weddingData->to_bride_name) && !empty($weddingData->to_bride_name)){
					$weddingData->to_bride_name=$_POST['txtEditBride'];
				}elseif(isset($weddingData->to_groom_name) && !empty($weddingData->to_groom_name)){
					$weddingData->to_groom_name=$_POST['txtEditBride'];
				}elseif(isset($weddingData->to_partner_name) && !empty($weddingData->to_partner_name)){
					$weddingData->to_partner_name=$_POST['txtEditBride'];
				}
					
		}
		
		if(isset($_POST['txtEditGroom']) && !empty($_POST['txtEditGroom'])){
				if(isset($weddingData->from_bride_name) && !empty($weddingData->from_bride_name)){
					$weddingData->from_bride_name=$_POST['txtEditGroom'];
				}elseif(isset($weddingData->from_groom_name) && !empty($weddingData->from_groom_name)){
					$weddingData->from_groom_name=$_POST['txtEditGroom'];
				}elseif(isset($weddingData->from_partner_name) && !empty($weddingData->from_partner_name)){
					$weddingData->from_partner_name=$_POST['txtEditGroom'];
				}
					
		}
		if(isset($_POST['txtEditweddingDate']) && !empty($_POST['txtEditweddingDate'])){
			//$weddingData->wedding_date=date('Y/m/d',strtotime($_POST['txtEditweddingDate']));
			$finalDate = DateTime::createFromFormat('d/m/Y', $_POST['txtEditweddingDate']);
			$weddingData->wedding_date = $finalDate->format('Y-m-d');
		}
		//p($_POST);
		if(isset($_POST['txtEditweddingId']) && !empty($_POST['txtEditweddingId'])){
			$weddingData->wedding_uniq_id=$_POST['txtEditweddingId'];
		}
		if(isset($_POST['txtEditweddingLocation']) && !empty($_POST['txtEditweddingLocation'])){
			$weddingData->wedding_location=$_POST['txtEditweddingLocation'];
		}
		if(isset($_FILES['txtEditweddingImage']['name']) && !empty($_FILES['txtEditweddingImage']['name'])){
			$target_file = $_FILES['txtEditweddingImage']['name'];
			$ext = explode(".",$_FILES['txtEditweddingImage']['name']);
			$path = YiiBase::getPathOfAlias('webroot');
			if(isset($weddingData->image) && $weddingData->image != "")
			{
				$old_file = $path.'/upload/wedding/'.$weddingData->image;
				unlink($old_file);
			}
			$target_file = $_POST['txtEditweddingId'].".".$ext[1];
			$weddingData->image=$target_file;
			$upload_file=$path.'/upload/wedding/'.$target_file;
			if(move_uploaded_file($_FILES['txtEditweddingImage']['tmp_name'],$upload_file))
			{
				$weddingData->image=$target_file;
			}

		}
		if(isset($_POST['biography']) && !empty($_POST['biography'])){
			$weddingData->biography=$_POST['biography'];
		}
		if(isset($_POST['street_address']) && !empty($_POST['street_address'])){
			$weddingData->street_address=$_POST['street_address'];
		}
		if(isset($_POST['sample-checkbox-01']) && !empty($_POST['sample-checkbox-01']))
		{
		   $weddingData->share_social="1";
		} else { $weddingData->share_social="0"; }
		
		if(isset($_POST['sample-checkbox-02']) && !empty($_POST['sample-checkbox-02']))
		{
		   $weddingData->is_private="1";
		} else { $weddingData->is_private="0"; }
		
		
		if($weddingData->save(false)){
			echo 1;
		}else{
			echo 0;
		}
	}else{
			$this->redirect(array('/Index/'));
		}	
	}
	public function actionManageAlbums(){
		session_start();
		if($_SESSION['uid'] && $_SESSION['wedding_id']){
		
		$album = (Yii::app()->db->createCommand("SELECT album.*,album_category.album_cate_name,album_category.album_cover_image,album_category.user_id as albumCatuserid FROM album 
															JOIN album_category ON album.album_category_id=album_category.album_cate_id WHERE album.user_id='".$_SESSION['uid']."' 
															AND album.wedding_id='".$_SESSION['wedding_id']."' AND album.is_delete='0'  ORDER BY album.position ASC  " ));
					$model = $album->queryAll();
		$albumCatLastId = (Yii::app()->db->createCommand("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_NAME = 'album' " ));
			$albumCatcount = $albumCatLastId->queryRow();		
			
			$albumSuggested = (Yii::app()->db->createCommand("SELECT album.*,album_category.album_cate_name,album_category.album_cover_image,album_category.user_id as albumCatuserid FROM album 
															JOIN album_category ON album.album_category_id=album_category.album_cate_id WHERE album.user_id='".$_SESSION['uid']."' 
															AND album.wedding_id='".$_SESSION['wedding_id']."' AND album.is_delete='1'  ORDER BY album.position ASC  " ));
					$modelSuggested = $albumSuggested->queryAll();		
		$this->render('manage-albums',array('model'=>$model,'albumCatcount'=>$albumCatcount['AUTO_INCREMENT'],'modelSuggested'=>$modelSuggested));
		}else{
			$this->redirect(array('/Index/'));
		}
	}
	public function actionCheckWeddingId(){
		$result = Wedding::model()->find("wedding_uniq_id ='".$_POST['txtWeddingId']."'");
		//$_SESSION['wedding_uniq_id']=$_POST['txtWeddingId'];
		unset($_SESSION['make_admin']);
		if($result){
		$valid = 'true';
		}else{
		$valid = 'false';
		}
		echo $valid;
	}
		public function actionUpdateAlbumPosition(){
		session_start();
		if(isset($_POST['recordsArray'])){
		$updateRecordsArray = $_POST['recordsArray'];
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {
				$albumModel=  Album::model()->find("wedding_id='".$_SESSION['wedding_id']."' AND album_id= '".$recordIDValue."'");
				if($albumModel){
					$id =$albumModel['album_id'];
					$weddingData = $this->loadModel($id, 'Album');
					$weddingData->position=$listingCounter;
					$weddingData->save(false);
					$listingCounter = $listingCounter + 1;	
					
					}
				}
				$allAlbumName=$this->AlbumNames();
					echo json_encode($allAlbumName);
		}
	}
	public function actionAddAlbumTemporary(){
		if(isset($_POST['album_id']) && !empty($_POST['album_id'])){
			$albumModel=  Album::model()->find("album_id= '".$_POST['album_id']."'");
			if($albumModel){
					$id =$albumModel['album_id'];
					$albumDelModel = $this->loadModel($id, 'Album');
						$albumPosition = (Yii::app()->db->createCommand("SELECT MAX( `position` ) as maxposition FROM album WHERE user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
						$albumpositionmodel = $albumPosition->queryRow();
					$albumDelModel->position=($albumpositionmodel['maxposition']+1);	
					$albumDelModel->is_delete='0';
					$delAlbum=$albumDelModel->save(false);
				if($delAlbum){
					$allAlbumName=$this->AlbumNames();
					echo json_encode($allAlbumName);
				}else{
					echo 0;
				}
			}
		}
		
	}
	public function actionAddNewAlbum(){
		session_start();
		if($_SESSION['uid'] && $_SESSION['wedding_id']){
			$albumCategory=new AlbumCategory();
			if($albumCategory){
				if(isset($_POST['customtxt']) && !empty($_POST['customtxt'])){
				$albumCategory->album_cate_name=$_POST['customtxt'];
				$albumCategory->user_id=$_SESSION['uid'];
				$albumCat=$albumCategory->save(false);
			}
			$albumModel= new Album();
			if($albumModel){
				$albumModel->user_id=$_SESSION['uid'];
				$albumModel->wedding_id=$_SESSION['wedding_id'];
				$albumModel->album_category_id=$albumCategory->album_cate_id;
				$albumPosition = (Yii::app()->db->createCommand("SELECT MAX( `position` ) as maxposition FROM album WHERE user_id='".$_SESSION['uid']."' AND wedding_id='".$_SESSION['wedding_id']."'"));
				$albumpositionmodel = $albumPosition->queryRow();
				$albumModel->position=($albumpositionmodel['maxposition']+1);
				$albumTbl=$albumModel->save(false);
			}
			if($albumCat || $albumTbl){
				$allAlbumName=$this->AlbumNames();
					echo json_encode($allAlbumName);
			}else{
				echo 0;
			}
			}
		}
	}
	public function actionDeleteNewAlbum(){
		if(isset($_POST['album_id']) && !empty($_POST['album_id'])){
			$albumModel=  Album::model()->find("album_id= '".$_POST['album_id']."'");
			if($albumModel){
				$albumcategoryId=$albumModel['album_category_id'];
				$albumCatModel=  AlbumCategory::model()->find("album_cate_id= '".$albumcategoryId."'");
				$delAlbumCat=$albumCatModel->delete();
				$delAlbum=$albumModel->delete();
				if($delAlbum || $delAlbumCat){
					$allAlbumName=$this->AlbumNames();
					echo json_encode($allAlbumName);
				}else{
					echo 0;
				}
			}
		}
		
	}
	
	public function actionDeleteAlbumTemporary(){
		if(isset($_POST['album_id']) && !empty($_POST['album_id'])){
			$albumModel=  Album::model()->find("album_id= '".$_POST['album_id']."'");
			if($albumModel){
					$id =$albumModel['album_id'];
					$albumDelModel = $this->loadModel($id, 'Album');
					$albumDelModel['is_delete']='1';
					$delAlbum=$albumDelModel->save(false);
				if($delAlbum){
					$allAlbumName=$this->AlbumNames();
					$allAlbumName = $allAlbumName?$allAlbumName:'0';
					echo json_encode($allAlbumName);
				}else{
					echo 0;
				}
			}
		}
		
	}
	public function AlbumNames(){
			$albumAllData = (Yii::app()->db->createCommand("SELECT album.*,album_category.album_cate_name,album_category.album_cover_image,album_category.user_id as albumCatuserid FROM album 
															JOIN album_category ON album.album_category_id=album_category.album_cate_id WHERE album.user_id='".$_SESSION['uid']."' 
															AND album.wedding_id='".$_SESSION['wedding_id']."' AND album.is_delete='0'  ORDER BY album.position ASC  " ));
					$albumAllDataArr = $albumAllData->queryAll();
					if($albumAllDataArr){
						$albumNameArr=array();
						foreach($albumAllDataArr as $albumName){
							$albumNameArr[]=$albumName['album_cate_name'];
						}
						return $albumNameArr;
					}
		
	}/* ORder App Card */
	public function actionOrderAppCard(){
		session_start();
		//if(isset($_SESSION['wedding_id']) && $_SESSION['uid']){
			$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");
			$this->render('order-app-card',array('weddingData'=>$weddingData));
		//}
	}

   public function actionOrderPrint(){

		session_start();
		if(isset($_SESSION['uid'])){
			//$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");
			$this->render('orderprint');
		}
	}
	
	public function actionLiveFeed(){
     
		//session_start();
		if(isset($_SESSION['uid'])){
			//$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");
			$this->render('livefeed');
		}
	}
	
	public function actionPhotoAlbum()
	{
	   //echo "PhotoAlbum";exit;
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
			//$weddingData= Wedding::model()->find("wedding_id='".$_SESSION['wedding_id']."'");
			$this->render('photoalbum');
		} else {
		    $this->redirect(array('/Index/'));
		}
	}
	
	public function actionSlideShow()
	{
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		$this->render('wedding_slideshow');
		}
		else {
		    $this->redirect(array('/Index/'));
		}
	}
	
	public function actionFaq()
	{	if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		$this->render('wedding_faq');
		}
		else {
		    $this->redirect(array('/Index/'));
		}
	}
	
	public function actionBlog()
	{	
	    if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		$this->render('wedding_blog');
		}
		else {
		    $this->redirect(array('/Index/'));
		}
	}

	public function actionPrintOwn()
	{
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	   $this->render('printown');
	   }
	   else {
		    $this->redirect(array('/Index/'));
		}
	}
	
	public function actionUniqueIdExist()
	{
		$result = Wedding::model()->find("wedding_uniq_id ='".$_POST['Wedding']['wedding_uniq_id']."'");
		if($result)
		{
		$valid = 'false';}
		else{
		$valid = 'true';
		}
		echo $valid;
		
	}
	
	public function actionCreateNewWedding()
	{
	  //echo "safasfasgasgasg";exit;
	  if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		$this->render('wedding_signup');
		}
		   else {
		    $this->redirect(array('/Index/'));
		}
	}
	
	public function actionEditProfile()
	{
	  if(isset($_SESSION['uid']) && !empty($_SESSION['uid']))
	  {
	   $user=UserDetail::model()->find("user_id='".$_SESSION['uid']."'");
	  // p($user->user_id);	
	   $this->render('editprofile',array("user"=>$user));
	   }
	   else { $this->redirect(array('/Index/')); }
	}
	
	public function actionEditUser()
	{
	//  p($_FILES);
	  $userDetail=new UserDetail;
	  $id=$_POST['user_id'];
	  $password=md5($_POST['old_password']);
	  session_start();
	  if(!empty($_POST['old_password']) && empty($_SESSION['authid']))
	  {
	  	
		  $chk=UserDetail::model()->find("user_id='".$id."' AND password='".$password."'");
		 // p($chk->image);
				  if(!empty($chk))
				  {
					  $userDetail = $this->loadModel($id, 'UserDetail');
					  $userDetail->email=$_POST['email'];
					    if(!empty($_POST['new_password']))
						{
					  	$userDetail->password=md5($_POST['new_password']);
						}
						
						if(isset($_POST['username']) && !empty($_POST['username']))
						{
						    $userDetail->username=$_POST['username'];
						}
					if(isset($_FILES['txtEditweddingImage']['name']) && !empty($_FILES['txtEditweddingImage']['name']))
					{
							$ext = explode(".",$_FILES['txtEditweddingImage']['name']);
							$path = YiiBase::getPathOfAlias('webroot');
							$time=time();
							$target_file = $time.$_FILES['txtEditweddingImage']['name'];
							//$userDetail->image=$_FILES['txtEditweddingImage']['name'];
							$upload_file=$path.'/upload/user_image/'.$target_file;
							if(move_uploaded_file($_FILES['txtEditweddingImage']['tmp_name'], $upload_file))
							{
								$userDetail->image=$target_file;
								if(!empty($chk->image))
								{
									unlink($path.'/upload/user_image/'.$chk->image);
								}
							}
				
						}
						     if($userDetail->save(false))
							 {
							 	echo "1";
							 }
					  
				  }
		        else { echo "0"; } 
	  }
	  else if(isset($_SESSION['authid']) && !empty($_SESSION['authid']))
	  {
	      $userDetail = $this->loadModel($id, 'UserDetail');
		  if(isset($_POST['username']) && !empty($_POST['username']))
			{
				$userDetail->username=$_POST['username'];
			}
			$userDetail->email=$_POST['email'];
			if(isset($_FILES['txtEditweddingImage']['name']) && !empty($_FILES['txtEditweddingImage']['name']))
					{
							$ext = explode(".",$_FILES['txtEditweddingImage']['name']);
							$path = YiiBase::getPathOfAlias('webroot');
							$time=time();
							$target_file = $time.$_FILES['txtEditweddingImage']['name'];
							//$userDetail->image=$_FILES['txtEditweddingImage']['name'];
							$upload_file=$path.'/upload/user_image/'.$target_file;
							if(move_uploaded_file($_FILES['txtEditweddingImage']['tmp_name'], $upload_file))
							{
								$userDetail->image=$target_file;
								if(!empty($chk->image))
								{
									unlink($path.'/upload/user_image/'.$chk->image);
								}
							}
				
						}
			if($userDetail->save(false))
			 {
				echo "1";
			 }
	  }
	  
	
	  	  

	}
	
	public function actionColorEdit()
	{
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		$this->render('coloredit'); 
	   }
	   else {
	       $this->redirect(array('/Index/'));
        }
	}
	public function actionAddSite()
	{
	  if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	      $this->render('addsite'); 
	   } 
	   else {
	       $this->redirect(array('/Index/'));
        }
	}
	
	public function actionEditUserProfile()
	{
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
		  $this->render('editprofile'); 
		}
		else {
	       $this->redirect(array('/Index/'));
        }
	}
	public function actionViewProfile()
	{
	   if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
			$user=UserDetail::model()->find("user_id='".$_SESSION['uid']."'");
			$this->render('viewprofile',array("user"=>$user));
      } else {
	       $this->redirect(array('/Index/'));
        }	  
	}
	public function actionSitemap()
	{
		$this->render('sitemap'); 
	}
}