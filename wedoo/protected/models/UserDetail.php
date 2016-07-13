<?php

Yii::import('application.models._base.BaseUserDetail');

class UserDetail extends BaseUserDetail
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function label($n = 1) {
		return Yii::t('app', 'User|Users', $n);
	}
	public static function representingColumn() {
		return 'username';
	}
	public function rules() {
		return array(
			array('username, phone, mobile, address', 'required'),
			array('cityID, stateID, countryID, device_type', 'numerical', 'integerOnly'=>true),
			array('auth_id, auth_provider, fullname, username, password, phone, mobile', 'length', 'max'=>50),
			array('user_type', 'length', 'max'=>5),
			array('email', 'length', 'max'=>100),
			array('image', 'length', 'max'=>255),
			array('device_token', 'length', 'max'=>500),
			array('status, is_verify', 'length', 'max'=>1),
			array('updated_date', 'safe'),
			array('user_type, device_type, updated_date, status, is_verify', 'default', 'setOnEmpty' => true, 'value' => null),
			array('user_id, cityID, stateID, countryID, auth_id, auth_provider, user_type, fullname, username, password, email, image, phone, mobile, address, address1, device_type, device_token, created_date, updated_date, status, verification_key, is_verify', 'safe', 'on'=>'search'),
		);
	}
	
	public function guestsearch() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('cityID', $this->cityID);
		$criteria->compare('stateID', $this->stateID);
		$criteria->compare('countryID', $this->countryID);
		$criteria->compare('auth_id', $this->auth_id, true);
		$criteria->compare('auth_provider', $this->auth_provider, true);
		$criteria->compare('user_type', $this->user_type, true);
		$criteria->compare('fullname', $this->fullname, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('mobile', $this->mobile, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('address1', $this->address1, true);
		$criteria->compare('device_type', $this->device_type);
		$criteria->compare('device_token', $this->device_token, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('updated_date', $this->updated_date, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('verification_key', $this->verification_key, true);
		$criteria->compare('is_verify', $this->is_verify, true);
		$criteria->addCondition("user_type='guest'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function typeadminsearch() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('cityID', $this->cityID);
		$criteria->compare('stateID', $this->stateID);
		$criteria->compare('countryID', $this->countryID);
		$criteria->compare('auth_id', $this->auth_id, true);
		$criteria->compare('auth_provider', $this->auth_provider, true);
		$criteria->compare('user_type', $this->user_type, true);
		$criteria->compare('fullname', $this->fullname, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('mobile', $this->mobile, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('address1', $this->address1, true);
		$criteria->compare('device_type', $this->device_type);
		$criteria->compare('device_token', $this->device_token, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('updated_date', $this->updated_date, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('verification_key', $this->verification_key, true);
		$criteria->compare('is_verify', $this->is_verify, true);
		$criteria->addCondition("user_type='admin'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	public function getUsername($userID){
		$userData = UserDetail::model()->find("user_id = '".$userID."'");
		if($userData['username']){
			return $userData['username'];
		}else{
			return '';
		}
	}
}