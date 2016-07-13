<?php

/**
 * This is the model base class for the table "admin_user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AdminUser".
 *
 * Columns in table "admin_user" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $user_type
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property string $logdate
 * @property string $lognum
 * @property string $is_active
 * @property string $user_roles
 * @property string $extra
 * @property string $username
 *
 */
abstract class BaseAdminUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'admin_user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AdminUser|AdminUsers', $n);
	}

	public static function representingColumn() {
		return 'user_type';
	}

	public function rules() {
		return array(
			array('created_at, user_roles', 'required'),
			array('firstname, lastname, email', 'length', 'max'=>30),
			array('user_type', 'length', 'max'=>10),
			array('password', 'length', 'max'=>150),
			array('lognum', 'length', 'max'=>5),
			array('is_active', 'length', 'max'=>1),
			array('user_roles', 'length', 'max'=>255),
			array('username', 'length', 'max'=>250),
			array('updated_at, logdate, extra', 'safe'),
			array('firstname, lastname, user_type, email, password, updated_at, logdate, lognum, is_active, extra, username', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, firstname, lastname, user_type, email, password, created_at, updated_at, logdate, lognum, is_active, user_roles, extra, username', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'firstname' => Yii::t('app', 'Firstname'),
			'lastname' => Yii::t('app', 'Lastname'),
			'user_type' => Yii::t('app', 'User Type'),
			'email' => Yii::t('app', 'Email'),
			'password' => Yii::t('app', 'Password'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'logdate' => Yii::t('app', 'Logdate'),
			'lognum' => Yii::t('app', 'Lognum'),
			'is_active' => Yii::t('app', 'Is Active'),
			'user_roles' => Yii::t('app', 'User Roles'),
			'extra' => Yii::t('app', 'Extra'),
			'username' => Yii::t('app', 'Username'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('firstname', $this->firstname, true);
		$criteria->compare('lastname', $this->lastname, true);
		$criteria->compare('user_type', $this->user_type, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('logdate', $this->logdate, true);
		$criteria->compare('lognum', $this->lognum, true);
		$criteria->compare('is_active', $this->is_active, true);
		$criteria->compare('user_roles', $this->user_roles, true);
		$criteria->compare('extra', $this->extra, true);
		$criteria->compare('username', $this->username, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}