<?php
class ImageController extends FrontCoreController
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
	public function actionImage_editor()
	{
		$this->render('image_editor');
	}
	public function actionImageEdit(){
		$this->render('imageedit');
	}
		public function actionImageUpload(){
		$data = substr($_POST['imgBase64'], strpos($_POST['imgBase64'], ",") + 1);
		$decodedData = base64_decode($data);
		
		$filename = md5(uniqid()) . '.png';
		$path	= 	YiiBase::getPathOfAlias('webroot');
		$file=$path.'/upload/savedImage/'.$filename;
		$fp = fopen($file, 'wb');
		fwrite($fp, $decodedData);
		fclose();
		echo $filename;
		  	// $rawData = $_POST['imgBase64'];
			// $filteredData = explode(',', $rawData);
			// $unencoded = base64_decode($filteredData[1]);
			// $path	= 	YiiBase::getPathOfAlias('webroot');
			// move_uploaded_file($unencoded, $path."/upload/".$unencoded);
			// //$filePath = $path.'/upload/myImage.png';
			// $randomName = rand(0, 99999);;
			// //Create the image 
			// $fp = fopen($randomName.'.png', 'w');
// 			
			// fwrite($fp, $unencoded);
			// fclose($fp);
	}
}