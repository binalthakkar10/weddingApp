<?php

class WeddingController extends AdminCoreController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Wedding'),
		));
	}
	
	public function actionAutocompleteTest() {
		$res =array();
		if (isset($_GET['term'])) {
		    $weddingData = Wedding::model()->findAll("wedding_uniq_id LIKE '%".$_GET['term']."%'");
			
			foreach($weddingData as $model) {
				$res[] = array(
					'label'=>$model->wedding_uniq_id,  // label for dropdown list          
					'value'=>$model->wedding_uniq_id,  // value for input field          
					'id'=>$model->wedding_id,            // return value from autocomplete
					);      
			}
			echo CJSON::encode($res);
			Yii::app()->end();
		}
		
	}


	public function actionCreate() {
		$model = new Wedding;


		if (isset($_POST['Wedding'])) {
			$model->setAttributes($_POST['Wedding']);

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
		$model = $this->loadModel($id, 'Wedding');


		if (isset($_POST['Wedding'])) {
			$model->setAttributes($_POST['Wedding']);

			if ($model->save()) {
				$this->redirect(array('admin'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Wedding')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Wedding');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Wedding('search');
		$model->unsetAttributes();

		if (isset($_GET['Wedding']))
			$model->setAttributes($_GET['Wedding']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionstatusUpdate(){
		$weddingID = $_REQUEST['wedding_id'];
		$weddingData = Wedding::model()->find("wedding_id = '".$weddingID."'");
		if ($weddingData['status'] == '0'){
			$id = $weddingData['wedding_id'];
			$weddingImage = $this->loadModel($id,'Wedding');
			$weddingImage->status = '1';
			$weddingImage->save(false);
		}else{
			$id = $weddingData['wedding_id'];
			$weddingImage = $this->loadModel($id,'Wedding');
			$weddingImage->status = '0';
			$weddingImage->save(false);
		}
	}

}