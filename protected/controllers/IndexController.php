<?php
class IndexController extends FrontCoreController
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
	public function actionIndex(){
		session_start();
		if(($_SESSION['uid']!='') && isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
			// Own Wedding Fetch Code
			$getWeddingList = Wedding::model()->findAll("user_id = '".$_SESSION['uid']."'");
			$count=count($getWeddingList);
			$inviteData=InviteFriend::model()->findAll("invite_email = '".$_SESSION['email']."' AND is_block='0'");
			$invitecount=count($inviteData);
			if($invitecount<=0) {	
				if($count==1){
					$_SESSION['wedding_id']=$getWeddingList[0]->wedding_id;
					$this->redirect("wedding/Wedding/VisitPage");
				} 
			}
			if($count==0 && $invitecount==1){
					$_SESSION['wedding_id']=$inviteData[0]->wedding_id;
					$this->redirect("wedding/Wedding/VisitPage");
            }													 		
			if($getWeddingList){
				$weddnameArr = array();
    		foreach ($getWeddingList as $weddingList){ 
    			if(isset($weddingList['to_bride_name']) && !empty($weddingList['to_bride_name'])){
            				$name['fname'] = $weddingList['to_bride_name'];
            			}
        				if(isset($weddingList['to_groom_name']) && !empty($weddingList['to_groom_name'])){
            				$name['fname'] = $weddingList['to_groom_name'];
            			}
        				if(isset($weddingList['to_partner_name']) && !empty($weddingList['to_partner_name'])){
            				$name['fname'] = $weddingList['to_partner_name'];
            			}
        				if(isset($weddingList['from_bride_name']) && !empty($weddingList['from_bride_name'])){
            				$name['lname'] = $weddingList['from_bride_name'];
            			}
        				if(isset($weddingList['from_groom_name']) && !empty($weddingList['from_groom_name'])){
            				$name['lname'] = $weddingList['from_groom_name'];
            			}
        				if(isset($weddingList['from_partner_name']) && !empty($weddingList['from_partner_name'])){
            				$name['lname'] = $weddingList['from_partner_name'];
            			}
						if(isset($weddingList['wedding_id']) && !empty($weddingList['wedding_id'])){
            				$name['wedding_id'] = $weddingList['wedding_id'];
            			}
						if(isset($weddingList['wedding_uniq_id']) && !empty($weddingList['wedding_uniq_id'])){
            				$name['wedding_uniq_id'] = $weddingList['wedding_uniq_id'];
            			}
    					$weddnameArr[] = $name;
    			}
			}
			
		if($inviteData){
			$invitenameArr = array();
			foreach($inviteData as $key) {
					$weddingListData = Wedding::model()->find("wedding_uniq_id = '".$key['wedding_uniq_id']."'");
						if(isset($weddingListData['to_bride_name']) && !empty($weddingListData['to_bride_name'])){
                				$invitename['fname']  = $weddingListData['to_bride_name'];
                			}
            				if(isset($weddingListData['to_groom_name']) && !empty($weddingListData['to_groom_name'])){
                				$invitename['fname']  = $weddingListData['to_groom_name'];
                			}
            				if(isset($weddingListData['to_partner_name']) && !empty($weddingListData['to_partner_name'])){
                				$invitename['fname']  = $weddingListData['to_partner_name'];
                			}
            				if(isset($weddingListData['from_bride_name']) && !empty($weddingListData['from_bride_name'])){
                				$invitename['lname'] = $weddingListData['from_bride_name'];
                			}
            				if(isset($weddingListData['from_groom_name']) && !empty($weddingListData['from_groom_name'])){
                				$invitename['lname'] = $weddingListData['from_groom_name'];
                			}
            				if(isset($weddingListData['from_partner_name']) && !empty($weddingListData['from_partner_name'])){
                				$invitename['lname'] = $weddingListData['from_partner_name'];
                			} 
							if(isset($weddingListData['wedding_id']) && !empty($weddingListData['wedding_id'])){
                				$invitename['wedding_id'] = $weddingListData['wedding_id'];
                			}
							if(isset($weddingListData['wedding_uniq_id']) && !empty($weddingListData['wedding_uniq_id'])){
                				$invitename['wedding_uniq_id'] = $weddingListData['wedding_uniq_id'];
                			}
							$invitenameArr[] = $invitename;
					}
				}
			$weddnameArr = (is_array($weddnameArr))?$weddnameArr:array($weddnameArr);
			$invitenameArr = (is_array($invitenameArr))?$invitenameArr:array($invitenameArr);
			$finalWeddingList = array_merge($weddnameArr,$invitenameArr);
			$finalWeddingList = array_map('unserialize', array_unique(array_map('serialize', $finalWeddingList)));
			$this->render('index',array('finalWeddingList'=>$finalWeddingList));
		}else{
		$this->render('index');
		}
	}
	

	

}