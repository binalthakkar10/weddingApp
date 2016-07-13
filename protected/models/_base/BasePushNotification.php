<?php

/**
 * This is the model base class for the table "push_notification".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PushNotification".
 *
 * Columns in table "push_notification" available as properties of the model,
 * followed by relations of table "push_notification" available as properties of the model.
 *
 * @property integer $push_id
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $album_id
 * @property integer $wedding_id
 * @property string $push_type
 * @property string $push_message
 * @property string $push_flag
 * @property integer $issent
 * @property integer $isread
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $field1
 * @property string $field2
 *
 * @property UserDetail $user
 */
abstract class BasePushNotification extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'push_notification';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PushNotification|PushNotifications', $n);
	}

	public static function representingColumn() {
		return 'push_type';
	}

	public function rules() {
		return array(
			array('user_id, event_id, album_id, wedding_id, push_type, push_message, created_at, field1, field2', 'required'),
			array('user_id, event_id, album_id, wedding_id, issent, isread', 'numerical', 'integerOnly'=>true),
			array('push_type', 'length', 'max'=>50),
			array('push_flag', 'length', 'max'=>3),
			array('status', 'length', 'max'=>1),
			array('field1, field2', 'length', 'max'=>100),
			array('updated_at', 'safe'),
			array('push_flag, issent, isread, updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('push_id, user_id, event_id, album_id, wedding_id, push_type, push_message, push_flag, issent, isread, created_at, updated_at, status, field1, field2', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'UserDetail', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'push_id' => Yii::t('app', 'Push Id'),
			'user_id' => null,
			'event_id' => Yii::t('app', 'Event Id'),
			'album_id' => Yii::t('app', 'Album Id'),
			'wedding_id' => Yii::t('app', 'Wedding Id'),
			'push_type' => Yii::t('app', 'Push Type'),
			'push_message' => Yii::t('app', 'Push Message'),
			'push_flag' => Yii::t('app', 'Push Flag'),
			'issent' => Yii::t('app', 'Issent'),
			'isread' => Yii::t('app', 'Isread'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			//'field1' => Yii::t('app', 'Field1'),
			//'field2' => Yii::t('app', 'Field2'),
			'user' => Yii::t('app', 'User Name'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('push_id', $this->push_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('event_id', $this->event_id);
		$criteria->compare('album_id', $this->album_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('push_type', $this->push_type, true);
		$criteria->compare('push_message', $this->push_message, true);
		$criteria->compare('push_flag', $this->push_flag, true);
		$criteria->compare('issent', $this->issent);
		$criteria->compare('isread', $this->isread);
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