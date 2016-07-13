<?php

class UserDetailController extends AdminCoreController {

	public function filters() {
		return array(
			'accessControl', 
		);
	}

	public function defaultAccessRules()
	{
		return array(
			array('deny',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','create'),
					'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('update','admin','delete'),
					'users'=>array('admin'),
			),
		);
	}
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserDetail'),
		));
	}

	public function actionCreate() {
		$model = new UserDetail;


		if (isset($_POST['UserDetail'])) {
			$model->setAttributes($_POST['UserDetail']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('admin'));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UserDetail');


		if (isset($_POST['UserDetail'])) {
			$model->setAttributes($_POST['UserDetail']);
			//image update code 
			if(($_FILES['UserDetail']['name']['image']=='')){
					$model->image = $_POST['UserDetail']['image']; 
			}else{
					$width = "320";
					$height = "436";
					$path	= 	YiiBase::getPathOfAlias('webroot');
					$url ='http://'.$_SERVER['HTTP_HOST']. Yii::app()->baseUrl;
					$model->image=$_FILES['UserDetail']['name']['image'];
					$model->image = CUploadedFile::getInstance($model, 'image');
					$model->image->saveAs($path.'/upload/user_image/'.$model->image);
					$image = Yii::app()->image->load($path.'/upload/user_image/'.$model->image);
					$image->resize($width, $height);
					$image->save();
					$image_path=$url.'/upload/user_image/'.$model->image;
					$model->image= $model->image;
			}
			
			if ($model->save()) {
				$this->redirect(array('admin'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){	
				$this->loadModel($_REQUEST['id'], 'UserDetail')->delete();
				if(!isset($_GET['ajax']))
   					 $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}else{
				if (Yii::app()->getRequest()->getIsPostRequest()) {
				$this->loadModel($id, 'UserDetail')->delete();
	
				if (!Yii::app()->getRequest()->getIsAjaxRequest())
					$this->redirect(array('admin'));
				} else
					throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserDetail');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
	
		$model = new UserDetail('search');
		$model->unsetAttributes();

		if (isset($_GET['UserDetail']))
			$model->setAttributes($_GET['UserDetail']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionGuestAdmin() {
	     
	
		$model = new UserDetail('guestsearch');
		//$model=UserDetail::model()->findAll("user_type='guest'");
		$model->unsetAttributes();
        
		//p($model);
		 if (isset($_GET['UserDetail']))
			 $model->setAttributes($_GET['UserDetail']);

		$this->render('guestadmin', array(
			'model' => $model,
		));
	}
	
	public function actionTypeAdmin() {
	     
	   
		$model = new UserDetail('typeadminsearch');
		//$model=UserDetail::model()->findAll("user_type='guest'");
		$model->unsetAttributes();
        
		//p($model);
		 if (isset($_GET['UserDetail']))
			 $model->setAttributes($_GET['UserDetail']);

		$this->render('typeadmin', array(
			'model' => $model,
		));
	}
	
	public function actionstatusUpdate(){
		$userID = $_REQUEST['user_id'];
		$userData = UserDetail::model()->find("user_id = '".$userID."'");
		if ($userData['status'] == '0'){
			$id = $userData['user_id'];
			$userImage = $this->loadModel($id,'UserDetail');
			$userImage->status = '1';
			$userImage->save(false);
		}else{
			$id = $userData['user_id'];
			$userImage = $this->loadModel($id,'UserDetail');
			$userImage->status = '0';
			$userImage->save(false);
		}
	}

}