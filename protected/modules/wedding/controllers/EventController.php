<?php
class EventController extends FrontCoreController{

	public function actionIndex()
		{
			session_start();
			
			$this->pageTitle = ".:: Wedoo | Event Management::.";
			if(isset($_SESSION['uid'])  || isset($_SESSION['username'])){
			   $invite=count(InviteFriend::model()->findAll("(wedding_uniq_id='".$_SESSION['wedding_uniq_id']."') AND (invite_email='".$_SESSION['email']."') AND (is_block='0')"));
			   //p($invite);
				$albumCat=  AlbumCategory::model()->findAll("user_id IN(0) OR user_id IN('".$_SESSION['uid']."')");
				$albumCatLastId = (Yii::app()->db->createCommand("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_NAME = 'album_category' " ));
					$albumCatcount = $albumCatLastId->queryRow();
					
				$albumCatEvent=  AlbumCategory::model()->findAll("user_id IN(0)");
				if($invite==0)
				{
				$eventAll=Event::model()->findAll("wedding_uniq_id='".$_SESSION['wedding_uniq_id']."'  AND (wedding_id='".$_SESSION['wedding_id']."')");
				}
				if(isset($_SESSION['make_admin']) && !empty($_SESSION['make_admin']))
				{
				  $eventAll=Event::model()->findAll("wedding_uniq_id ='".$_SESSION['wedding_uniq_id']."'");
				}
			//	p($eventAll);
				if($eventAll){
				$eventAllData=array();
				foreach($eventAll as $eventRecords){ //p($eventRecords);
					$event['event_id']=$eventRecords['event_id'];
					$event['user_id']=$eventRecords['user_id'];
					$event['event_name']=$eventRecords['event_name'];
					$event['event_datetime']=$eventRecords['event_datetime'];
					$event['event_location']=$eventRecords['event_location'];
					$event['event_address']=$eventRecords['event_address'];
					$event['event_latitute']=$eventRecords['event_latitute'];
					$event['event_longitude']=$eventRecords['event_longitude'];
					$event['event_description']=$eventRecords['event_description'];
					$event['event_link_album_id']=$eventRecords['event_link_album_id'];
					$event['created_at']=$eventRecords['created_at'];
					$event['updated_at']=$eventRecords['updated_at'];
					if($event['event_link_album_id']){
					$albumEventCat=  AlbumCategory::model()->find("album_cate_id='".$event['event_link_album_id']."'");
					if($albumEventCat){
							$event['album_cate_id']=$albumEventCat['album_cate_id'];
							$event['album_cate_id']=$albumEventCat['album_cate_id'];
							$event['album_cate_name']=$albumEventCat['album_cate_name'];
							$event['album_cover_image']=$albumEventCat['album_cover_image'];
					}
					$eventAllData[]=$event;
					} else {
					   $eventAllData[]=$event;
					}
				}
				 //$eventAllData[]=$event;
				}
				$this->render('index',array('albumCat'=>$albumCat,'albumCatEvent'=>$albumCatEvent,'eventAllData'=>$eventAllData,'albumCatcount'=>$albumCatcount['AUTO_INCREMENT'],'invite'=>$invite));
			 }else{
			 	$this->redirect(array('/Index/'));
			 }	
		}
	
	public function actionCreateEvent(){
		session_start();
	//	echo $_SESSION['wedding_uniq_id'];exit;
		if(isset($_SESSION['uid'])  && isset($_SESSION['username'])){
			$user_id=$_SESSION['uid'];	
			$eventModel=  Event::model()->find("event_name IN('".$_POST['eventName']."') AND user_id  IN('".$user_id."') AND wedding_id='".$_SESSION['wedding_id']."' ");
			if($eventModel){
				echo 2;
			}else{
				
			$eventModel= new Event();
			if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
				$eventModel->user_id = $user_id;
			}				
			if(isset($_POST['eventName']) && !empty($_POST['eventName'])){
				$eventModel->event_name = $_POST['eventName'];
			}
			if(isset($_POST['txtEventTime']) && !empty($_POST['txtEventTime'])){
				$finalDate = DateTime::createFromFormat('m/d/Y H:i A', date('m/d/Y',strtotime($_POST['txtEventTime'])).' '.$_POST['hours'].':'.$_POST['minutes'].' '.$_POST['txtAmPm']);
				$eventModel->event_datetime = $finalDate->format('Y-m-d H:i:s');
			}
			if(isset($_SESSION['wedding_id']) && !empty($_SESSION['wedding_id'])){
			   
				$eventModel->wedding_id = $_SESSION['wedding_id'];
				//echo $eventModel->wedding_uniq_id;exit;
			}
			if(isset($_POST['txtEventLocation']) && !empty($_POST['txtEventLocation'])){
				$eventModel->event_location = $_POST['txtEventLocation'];
			}
			if(isset($_POST['txtEventAddress']) && !empty($_POST['txtEventAddress'])){
				$eventModel->event_address = $_POST['txtEventAddress'];
			}
			if(isset($_POST['txtEventDescription']) && !empty($_POST['txtEventDescription'])){
				$eventModel->event_description = $_POST['txtEventDescription'];
			}
			if(isset($_POST['albumId']) && !empty($_POST['albumId'])){
				$eventModel->event_link_album_id = $_POST['albumId'];
			}
			
			if(isset($_SESSION['wedding_uniq_id']) && !empty($_SESSION['wedding_uniq_id'])){
				$eventModel->wedding_uniq_id = $_SESSION['wedding_uniq_id'];
			}
		//	p($eventModel);
			$eventRecord=$eventModel->save(false);	
			$albumCatData=  AlbumCategory::model()->find("album_cate_name NOT IN('".$_POST['albumName']."') AND user_id NOT IN('".$user_id."' OR '0')");
				if($albumCatData){
					$albumModel= new AlbumCategory();
					$albumModel->album_cate_name=$_POST['albumName'];
					$albumModel->user_id=$user_id;
					$albumRecord=$albumModel->save(false);
				}
				if($eventRecord || $albumRecord){
					echo 1;
				}else{
					echo 0;
				}
			}		
		 }else{
			 	$this->redirect(array('/Index/'));
			 }	
	}	
	public function actionEditEvent(){
		session_start();
	//	p($_POST);
		if(isset($_SESSION['uid'])  && isset($_SESSION['username'])){
			$user_id=$_SESSION['uid'];	
			// $eventModel=  Event::model()->find("event_name IN('".$_POST['eventName']."') AND user_id  IN('".$user_id."') AND event_id NOT IN('".$_POST['hiddenId']."')");
			// if($eventModel){
				// echo 2;
			// }else{
				$id = $_POST['hiddenId'];
			$eventModel= $this->loadModel($id,'Event');
			$dbevent_link_album_id=$eventModel['event_link_album_id'];
			if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
				$eventModel->user_id = $user_id;
			}				
			if(isset($_POST['eventName']) && !empty($_POST['eventName'])){
				$eventModel->event_name = $_POST['eventName'];
			}
			if(isset($_POST['txtEventTime']) && !empty($_POST['txtEventTime'])){
				$eventModel->event_datetime = date('Y-m-d h:m:s',strtotime($_POST['txtEventTime']));
			}
			if(isset($_POST['txtEventLocation']) && !empty($_POST['txtEventLocation'])){
				$eventModel->event_location = $_POST['txtEventLocation'];
			}
			if(isset($_POST['txtEventAddress']) && !empty($_POST['txtEventAddress'])){
				$eventModel->event_address = $_POST['txtEventAddress'];
			}
			if(isset($_POST['txtEventDescription']) && !empty($_POST['txtEventDescription'])){
				$eventModel->event_description = $_POST['txtEventDescription'];
			}
			if(isset($_POST['albumId']) && !empty($_POST['albumId'])){
				$eventModel->event_link_album_id = $_POST['albumId'];
			}
			$eventRecord=$eventModel->save(false);	
			// Case-1 new Custom entry
			$albumCheckData=  AlbumCategory::model()->find("album_cate_id ='".$_POST['albumId']."'");
			if(empty($albumCheckData)){
				$albumCatData=  AlbumCategory::model()->find("album_cate_id='".$dbevent_link_album_id."' AND user_id IN ('".$user_id."')");
				if($albumCatData){
					$albumid = $albumCatData['album_cate_id'];
					$albumModel= $this->loadModel($albumid,'AlbumCategory');
					$albumModel->album_cate_name=$_POST['albumName'];
					$albumModel->user_id=$user_id;
					$albumRecord=$albumModel->save(false);
				}else{
					$albumModel= new AlbumCategory();
					$albumModel->album_cate_name=$_POST['albumName'];
					$albumModel->user_id=$user_id;
					$albumRecord=$albumModel->save(false);					
					}
				
			}else{
				$albumCheckDefaultData=  AlbumCategory::model()->find("album_cate_id ='".$_POST['albumId']."' AND user_id ='0'");
				if($albumCheckDefaultData){
					$albumCatData=  AlbumCategory::model()->find("album_cate_id='".$dbevent_link_album_id."' AND user_id ='".$user_id."'");
					if($albumCatData){
						
						$albumRecord=$albumCatData->delete();
					}
				}
			}
				
				if($eventRecord || $albumRecord){
					echo 1;
				}else{
					echo 0;
				}
			//}		
		 }else{
			 	$this->redirect(array('/Index/'));
			 }	
	}
	
	public function actionDeleteEvent()
	{
	    $id=$_POST['id'];
		   $model=new Accomodation();
		   $model=Event::model()->find("event_id=$id");
					
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
