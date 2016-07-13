<?php

class FeedbackController extends GxController {

    public $layout='admin';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Feedback'),
		));
	}

	public function actionCreate() {
		$model = new Feedback;


		if (isset($_POST['Feedback'])) {
			$model->setAttributes($_POST['Feedback']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->feedback_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Feedback');


		if (isset($_POST['Feedback'])) {
			$model->setAttributes($_POST['Feedback']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->feedback_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Feedback')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Feedback');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() { 
		$model = new Feedback('search');
		$model->unsetAttributes();

		if (isset($_GET['Feedback']))
			$model->setAttributes($_GET['Feedback']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}