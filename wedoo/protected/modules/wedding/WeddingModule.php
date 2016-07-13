<?php

class WeddingModule extends CWebModule
{
	public $returnUrl 	= "/Wedding/index";
	//public $returnUrl 	= "/Wedding/cpanel";
	//public $homeUrl 	= "/Wedding/index";
	public $homeUrl 	= "";
	public $loginUrl 	= "/index/signup";
	public $logoutUrl 	= "/Wedding/logout";
	public $settingsUrl	= "/Wedding/index/settings";
	public $accountsUrl	= "/Wedding/index/accountsettings";
	/**
	 * @var string
	 * @desc hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
	 */
	public $hash='md5';

	/**
	 * @var boolean
	 * @desc use email for activation Wedding account
	 */
	public $sendActivationMail=true;


	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'application.models.*',
			'application.models.User.*',
			'wedding.components.*',
		));
	}

	public static function getUrl($type='home')
	{
		switch($type) {
			case 'home':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->homeUrl);
				break;
			case 'return':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->returnUrl);
				break;
			case 'login':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->loginUrl);
				break;
			case 'logout':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->logoutUrl);
				break;
			case 'settings':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->settingsUrl);
				break;
			case 'accounts':
				return WeddingCoreController::createUrl(Yii::app()->getModule('wedding')->accountsUrl);
				break;
		}
	}
	public static function getUserData()
	{
		return self::getWedding()->attributes; // Yii::app()->Wedding->getState('Wedding');
	}

	public static function getUserRoles()
	{
		// return self::getUserDataByKey('user_roles');
		$role = UserRole::model()->find('role_type = \''.WeddingModule::getUserDataByKey('user_type').'\'');
		if($role) {
			if($role->parent_id!=0) return implode(',', array($role->id,$role->parent_id));
			else return $role->id;
		}
		else return -1;
	}
	public static function getUserDataByKey()
	{
		$array = func_get_args(); //explode('.', $path);
		$WeddingData = self::getWedding()->attributes; //Yii::app()->Wedding->getState('Wedding');
		$str ='';
		$val = $WeddingData;
		foreach($array as $data) {
			$str .= '[\''.$data.'\']';
			if(!isset($val[$data])) return false;
			$val = $val[$data];
		}
		return $val;
	}

	public static function encrypting($string="") {

		$hash = Yii::app()->getModule('Wedding')->hash;
		if ($hash=="md5") 	return md5($string);
		if ($hash=="sha1") 	return sha1($string);
		else 				return hash($hash,$string);
	}


	public static function getLoginUrl()
	{
		if(!Yii::app()->Wedding->id) {
			return Controller::createUrl('/Wedding/login');
		}else {
			return Controller::createUrl('/Wedding/logout');
		}
	}
	public static function getLoginText()
	{
		if(!Yii::app()->Wedding->id) {
			return 'Login';
		}else {
			return 'Logout';
		}
	}

	public static function getFullname()
	{
		if(Yii::app()->Wedding->id) {
			$Wedding = self::getWedding();
			return ucwords($Wedding->fullname);
		}else {
			return false;
		}
	}

	public static function getWelcomeText()
	{
		if(Yii::app()->wedding->id) {
			$Wedding = self::getWedding();
			switch ($Wedding->user_type) {
				case 'venue':
					return ucwords($Wedding->fullname);
					break;
				default:
					return 'Hello, '.ucwords($Wedding->fullname);
					break;
			}
		}else {
			return false;
		}
	}
	public static function getWedding()
	{
		if(Yii::app()->Wedding->id) {
			$criteria = new CDbCriteria();
			$criteria->select = 't.*, TIMESTAMPDIFF(YEAR, t.birthdate, CURDATE()) AS age';
			$criteria->addCondition("id=".Yii::app()->Wedding->id);
			return $Wedding = Wedding::model()->find($criteria);
		}else {
			return false;
		}
	}
	
	
	
	public static function getPhoto($type='icon')
	{
		switch ($type) {
			case 'icon':
				return CHtml::image(Yii::app()->request->baseUrl."/uploads/Wedding/welcome_user.jpg", self::getFullname());
				break;
			default:
				return CHtml::image(Yii::app()->request->baseUrl."/images/welcome_user.jpg", self::getFullname());
				break;
		}
	}
	public static function getAge()
	{
		if(Yii::app()->Wedding->id) {
			$Wedding = self::getWedding();
			return $Wedding->age;

		}else {
			return false;
		}
	}

	public function getProfilePhoto()
	{
		if(Yii::app()->Wedding->id){
			$Wedding = self::getWedding();
			if(isset($Wedding->photo)){
				return $Wedding->photo;
			}else{
				return false;
			}
		}
	}
	 
	public function getLocation()
	{
		if(Yii::app()->Wedding->id){
			$Wedding = self::getWedding();
			$locationStr	=	"";
			if(isset($Wedding->attributes)){
				if(isset($Wedding->country)){
					$locationStr	=	$Wedding->country;	
				}
				if(isset($Wedding->state)){
					$locationStr.=",".$Wedding->state;
				}
				if(isset($Wedding->city)){
					$locationStr.=",".$Wedding->city;
				}
				return $locationStr;
			}else{
				return false;
			}
		}
	}
	
}
