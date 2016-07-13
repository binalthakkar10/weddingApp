<?php
/**
 * WeddingIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class WeddingIdentity extends UserIdentity
{
	private $_id;
	const ERROR_NONE=0;
	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
	const ERROR_PASSWORD_INVALID=6;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the email and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $email;

	public function __construct($username,$password)
	{
		$this->username=$username;
		$this->email=$username;
		$this->password=$password;
	}

	public function authenticate()
	{
		$email = $this->username;
		$password=md5($this->password);
		
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->addCondition(' (t.`email` = \''.$email.'\' AND t.`password`=\''.$password.'\')');
		$Wedding = Users::model()->find($criteria);
		
		 
		//$Wedding=Users::model()->findByAttributes(array('email'=>$email),$criteria);
		
		
		if($Wedding===null) {
			$this->errorCode=self::ERROR_EMAIL_INVALID;
		} else if(Yii::app()->getModule('wedding')->encrypting($this->password)!==$Wedding->password) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else if($Wedding->is_active>1&&Yii::app()->getModule('wedding')->activation!='') {
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		} else if($Wedding->is_active==2) {
			$this->errorCode=self::ERROR_STATUS_BAN;
		} else {
			$this->_id		= $Wedding->id;
			$this->email	= $Wedding->email;
			$this->username	= $Wedding->email;
			$this->errorCode= self::ERROR_NONE;
			
			Yii::app()->wedding->setId($this->_id);
			//Yii::app()->Wedding->email = $Wedding->email;
			Yii::app()->wedding->guestName = $Wedding->email;
			Yii::app()->wedding->fullname = $Wedding->firstname.' '.$Wedding->lastname;
			
			Yii::app()->wedding->name = strtolower($Wedding->user_type);
			/*Yii::app()->getModule('Wedding')->setId($this->_id);
			Yii::app()->Wedding->name = strtolower($Wedding->user_type);*/	
			$WeddingData = $Wedding->attributes;
			$WeddingData['display_name'] = $Wedding->display_name;
			//Yii::app()->user->setState('email','asdfgh'); 
			Yii::app()->Wedding->setState('wedding',$WeddingData);
		 
			
		}
		return !$this->errorCode;
	}

	public function authenticatesignup()
	{
		$email = $this->username;
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->addCondition(' (t.`email` = \''.$email.'\')');
		$Wedding = Users::model()->find($criteria);
		 
		//$Wedding=Wedding::model()->findByAttributes(array('email'=>$email),$criteria);
		
			$this->_id		= $Wedding->id;
			$this->email	= $Wedding->email;
			$this->username	= $Wedding->email;
			$this->errorCode= self::ERROR_NONE;
			
			Yii::app()->wedding->setId($this->_id);
			//Yii::app()->Wedding->email = $Wedding->email;
			Yii::app()->wedding->guestName = $Wedding->email;
			Yii::app()->wedding->fullname = $Wedding->firstname.' '.$Wedding->lastname;
			Yii::app()->wedding->name = strtolower($Wedding->user_type);	
			/*Yii::app()->getModule('Wedding')->setId($this->_id);
			Yii::app()->Wedding->name = strtolower($Wedding->user_type);*/	
			$WeddingData = $Wedding->attributes;
			$WeddingData['display_name'] = $Wedding->display_name;
			//Yii::app()->user->setState('email','asdfgh'); 
			Yii::app()->wedding->setState('wedding',$WeddingData);
		
		return !$this->errorCode;
	}
	
	
	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}