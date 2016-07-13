<?php

class EventController extends GxController {

    public $layout='admin';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Event'),
		));
	}

	// public function actionCreate() {
		// $model = new Event;


		// if (isset($_POST['Event'])) {
			// $model->setAttributes($_POST['Event']);

			// if ($model->save()) {
				// if (Yii::app()->getRequest()->getIsAjaxRequest())
					// Yii::app()->end();
				// else
					// $this->redirect(array('view', 'id' => $model->event_id));
			// }
		// }

		// $this->render('create', array( 'model' => $model));
	// }

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Event');


		if (isset($_POST['Event'])) {
			$model->setAttributes($_POST['Event']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->event_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		// if (Yii::app()->getRequest()->getIsPostRequest()) {
			// $this->loadModel($id, 'Event')->delete();

			// if (!Yii::app()->getRequest()->getIsAjaxRequest())
				// $this->redirect(array('admin'));
		// }
        if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){	
				$this->loadModel($_REQUEST['id'], 'Event')->delete();
				if(!isset($_GET['ajax']))
   					 $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}		
		else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	// public function actionIndex() {
		// $dataProvider = new CActiveDataProvider('Event');
		// $this->render('index', array(
			// 'dataProvider' => $dataProvider,
		// ));
	// }

	public function actionAdmin() {
		$model = new Event('search');
		$model->unsetAttributes();

		if (isset($_GET['Event']))
			$model->setAttributes($_GET['Event']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	public function actionstatusUpdate(){
		$eventID = $_REQUEST['event_id'];
		$eventData = Event::model()->find("event_id = '".$eventID."'");
		if ($eventData['status'] == '0'){
			$id = $eventData['event_id'];
			$eventImage = $this->loadModel($id,'Event');
			$eventImage->status = '1';
			$eventImage->save(false);
		}else{
			$id = $eventData['event_id'];
			$eventImage = $this->loadModel($id,'Event');
			$eventImage->status = '0';
			$eventImage->save(false);
		}
	}
}