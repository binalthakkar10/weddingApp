<?php

class ColorThemeController extends FrontCoreController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionGetColorTheme(){
	 	//$result = ColorTheme::model()->find("user_id ='".$_POST['userID']."'");
		$wedding_id = $_POST['weddingID'];
		$result = ColorTheme::model()->find("wedding_id ='".$wedding_id."'");
		$response['main_color'] = $result['main_color_code'];
		$response['accent_color'] = $result['accent_color_code'];
		echo json_encode($response);
		
	}
	
	public function actionSetColorTheme()
	{
		//print_r($_POST);exit;
		$code = $_POST['code'];
		$code_type = $_POST['code_type'];
		$wedding_id = $_POST['weddingID'];
		
		$ColorTheme = ColorTheme::model()->find("wedding_id ='".$wedding_id."'");
		if($ColorTheme)
		{
			if(isset($code_type) && $code_type == "main_color")
			{
				$ColorTheme->main_color_code = $code;
			}
			elseif(isset($code_type) && $code_type == "accent_color")
			{
				$ColorTheme->accent_color_code = $code;
			}
		}
		else
		{
			$ColorTheme = new ColorTheme();
			$ColorTheme['wedding_id'] = $wedding_id;
			if(isset($code_type) && $code_type == "main_color")
			{
				$ColorTheme->main_color_code = $code;
			}
			elseif(isset($code_type) && $code_type == "accent_color")
			{
				$ColorTheme->accent_color_code = $code;
			}
			$ColorTheme['updated_at'] = date("Y:m:d h:i:s");
			$ColorTheme['status'] = 1;
			
		}
		if($ColorTheme->save(false)) echo 1;
		else echo 0;
		
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}