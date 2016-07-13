<?php
class AccommodationController extends FrontCoreController{

	public function actionIndex(){
			
	}
	
	public function actionAddaccommodation(){
	
		session_start();
	if(isset($_SESSION['uid'])  && isset($_SESSION['username'])){
		$invite=count(InviteFriend::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."' AND invite_email='".$_SESSION['email']."' AND is_block='0'"));
		$id=$_SESSION['uid'];
		$accommodation=new Accomodation();
		if($invite==0)
		{
		  $accommodation=Accomodation::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'  AND (wedding_id='".$_SESSION['wedding_id']."')");
		  // $accommodation=Accomodation::model()->findAll("user_id='".$id."' AND wedding_id='".$_SESSION['wedding_id']."'");
		}
		if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin'])){
		    $accommodation=Accomodation::model()->findAll("wedding_uniq_id ='".$_SESSION['wedding_uniq_id']."'");
		}
	
			$this->render('accommodations',array("accommodation"=>$accommodation,"invite"=>$invite));	
		}else{
			$this->redirect(array('/Index/'));
		}	
	}	
	public function actionEditAccommodation(){
		session_start();
		if(isset($_SESSION['uid'])  && isset($_SESSION['username'])){
			
		}else{
			$this->redirect(array('/Index/'));	
		}
	}
	
	public function actionCreateAccommodation(){
	//p($_POST);
	    if($_POST)
		{
		  session_start();
		  $model=new Accomodation();
		  $total = "11"; 

			// Change to the type of files to use eg. .jpg or .gif 
			$file_type = ".jpg"; 

			// Change to the location of the folder containing the images 
			$image_folder = Yii::app()->getBaseUrl(false)."/images"; 
           // echo $image_folder;exit;
			// You do not need to edit below this line 

			$start = "1"; 

			$random = mt_rand($start, $total); 

			$image_name = $random . $file_type;
		  
		  if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
				$model->user_id = $_SESSION['uid'];
			}				
			if(isset($_POST['txtName']) && !empty($_POST['txtName'])){
				$model->accom_name = $_POST['txtName'];
			}
			if(isset($_POST['txtAddress']) && !empty($_POST['txtAddress'])){
				$model->accom_address = $_POST['txtAddress'];
			}
			if(isset($_SESSION['wedding_id']) && !empty($_SESSION['wedding_id'])){
				$model->wedding_id = $_SESSION['wedding_id'];
			}
			if(isset($_POST['txtWebsiteUrl']) && !empty($_POST['txtWebsiteUrl'])){
				$model->accom_web_url = $_POST['txtWebsiteUrl'];
			}
			if(isset($_POST['txtAccommodationDescription']) && !empty($_POST['txtAccommodationDescription'])){
				$model->accom_desc = $_POST['txtAccommodationDescription'];
			}
			if(isset($image_name) && !empty($image_name)){
				$model->field1 = $image_name;
			}
			if(isset($_SESSION['wedding_uniq_id']) && !empty($_SESSION['wedding_uniq_id'])){
				$model->wedding_uniq_id = $_SESSION['wedding_uniq_id'];
			}
			if($model->save(false))
			{
			    echo "1";
			}
			else
			{
			  echo "0";
			}
		}
	
	}
	
	public function actionEditAccommodation1()
	{
	  // p($_POST);
	   $id=$_POST['txtid'];
	   $model=new Accomodation();
	   $name=$_POST["txtName".$id];
	   $address=$_POST["txtAddress".$id];
	   
	   $model= $this->loadModel($id,'Accomodation');
	        if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
				$model->user_id = $_SESSION['uid'];
			}				
			if(isset($name) && !empty($name)){
				$model->accom_name = $name;
			}
			if(isset($address) && !empty($address)){
				$model->accom_address = $address;
			}
			if(isset($_POST['txtWebsiteUrl']) && !empty($_POST['txtWebsiteUrl'])){
				$model->accom_web_url = $_POST['txtWebsiteUrl'];
			}
			if(isset($_POST['txtAccommodationDescription']) && !empty($_POST['txtAccommodationDescription'])){
				$model->accom_desc = $_POST['txtAccommodationDescription'];
			}
			if($model->save(false))
			{
			    echo "1";
			}
			else
			{
			   echo "0";
			}
	}
   public function actionDeleteAccommodation()
   {
		   $id=$_POST['id'];
		   $model=new Accomodation();
		   $model=Accomodation::model()->find("accomodation_id=$id");
					
		   if($model->delete($id))
		   {
		      echo "1";
		   }
		   else
		   {
		       echo "0";
		   }
   }
}
