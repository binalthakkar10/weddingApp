<?php

class AccomodationController extends GxController {

     public $layout='admin';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Accomodation'),
		));
	}

	// public function actionCreate() {
		// $model = new Accomodation;


		// if (isset($_POST['Accomodation'])) {
			// $model->setAttributes($_POST['Accomodation']);

			// if ($model->save()) {
				// if (Yii::app()->getRequest()->getIsAjaxRequest())
					// Yii::app()->end();
				// else
					// $this->redirect(array('view', 'id' => $model->accomodation_id));
			// }
		// }

		// $this->render('create', array( 'model' => $model));
	// }

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Accomodation');


		if (isset($_POST['Accomodation'])) {
			$model->setAttributes($_POST['Accomodation']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->accomodation_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Accomodation')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	// public function actionIndex() {
		// $dataProvider = new CActiveDataProvider('Accomodation');
		// $this->render('index', array(
			// 'dataProvider' => $dataProvider,
		// ));
	// }

	public function actionAdmin() {
		$model = new Accomodation('search');
		$model->unsetAttributes();

		if (isset($_GET['Accomodation']))
			$model->setAttributes($_GET['Accomodation']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionstatusUpdate(){
		$accomodationID = $_REQUEST['accomodation_id'];
		$accomodationData = Accomodation::model()->find("accomodation_id = '".$accomodationID."'");
		if ($accomodationData['status'] == '0'){
			$id = $accomodationData['accomodation_id'];
			$accomodationImage = $this->loadModel($id,'Accomodation');
			$accomodationImage->status = '1';
			$accomodationImage->save(false);
		}else{
			$id = $accomodationData['accomodation_id'];
			$accomodationImage = $this->loadModel($id,'Accomodation');
			$accomodationImage->status = '0';
			$accomodationImage->save(false);
		}
	}

}