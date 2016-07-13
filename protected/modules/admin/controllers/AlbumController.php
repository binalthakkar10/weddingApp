<?php

class AlbumController extends GxController {

    public $layout='admin';
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Album'),
		));
	}

	public function action 	() {
		$model = new Album;


		if (isset($_POST['Album'])) {
			$model->setAttributes($_POST['Album']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->album_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Album');


		if (isset($_POST['Album'])) {
			$model->setAttributes($_POST['Album']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->album_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Album')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Album');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Album('search');
		$model->unsetAttributes();

		if (isset($_GET['Album']))
			$model->setAttributes($_GET['Album']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionstatusUpdate(){
		$albumID = $_REQUEST['album_id'];
		$albumData = Album::model()->find("album_id = '".$albumID."'");
		if ($albumData['status'] == '0'){
			$id = $albumData['album_id'];
			$albumImage = $this->loadModel($id,'Album');
			$albumImage->status = '1';
			$albumImage->save(false);
		}else{
			$id = $albumData['album_id'];
			$albumImage = $this->loadModel($id,'Album');
			$albumImage->status = '0';
			$albumImage->save(false);
		}
	}

}