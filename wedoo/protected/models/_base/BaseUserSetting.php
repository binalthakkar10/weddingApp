<?php

/**
 * This is the model base class for the table "user_setting".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserSetting".
 *
 * Columns in table "user_setting" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $setting_id
 * @property integer $user_id
 * @property integer $wedding_id
 * @property string $push_notification
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $field1
 * @property string $field2
 *
 */
abstract class BaseUserSetting extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_setting';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserSetting|UserSettings', $n);
	}

	public static function representingColumn() {
		return 'push_notification';
	}

	public function rules() {
		return array(
			array('user_id, wedding_id, created_at, field1, field2', 'required'),
			array('user_id, wedding_id', 'numerical', 'integerOnly'=>true),
			array('push_notification', 'length', 'max'=>3),
			array('status', 'length', 'max'=>1),
			array('field1, field2', 'length', 'max'=>100),
			array('updated_at', 'safe'),
			array('push_notification, updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('setting_id, user_id, wedding_id, push_notification, created_at, updated_at, status, field1, field2', 'safe', 'on'=>'search'),
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
			'setting_id' => Yii::t('app', 'Setting Id'),
			'user_id' => Yii::t('app', 'User Id'),
			'wedding_id' => Yii::t('app', 'Wedding Id'),
			'push_notification' => Yii::t('app', 'Push Notification'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			'field1' => Yii::t('app', 'Field1'),
			'field2' => Yii::t('app', 'Field2'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('setting_id', $this->setting_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('push_notification', $this->push_notification, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('field1', $this->field1, true);
		$criteria->compare('field2', $this->field2, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}