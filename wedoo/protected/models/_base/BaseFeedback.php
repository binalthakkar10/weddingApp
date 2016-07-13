<?php

/**
 * This is the model base class for the table "feedback".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Feedback".
 *
 * Columns in table "feedback" available as properties of the model,
 * followed by relations of table "feedback" available as properties of the model.
 *
 * @property integer $feedback_id
 * @property integer $user_id
 * @property integer $wedding_id
 * @property string $rating
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $feedback
 * @property string $field2
 *
 * @property UserDetail $user
 * @property Wedding $wedding
 */
abstract class BaseFeedback extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'feedback';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Feedback|Feedbacks', $n);
	}

	public static function representingColumn() {
		return 'rating';
	}

	public function rules() {
		return array(
			array('user_id, wedding_id, rating, created_at, feedback, field2', 'required'),
			array('user_id, wedding_id', 'numerical', 'integerOnly'=>true),
			array('rating', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			array('feedback', 'length', 'max'=>500),
			array('field2', 'length', 'max'=>100),
			array('updated_at', 'safe'),
			array('updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('feedback_id, user_id, wedding_id, rating, created_at, updated_at, status, feedback, field2', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'UserDetail', 'user_id'),
			'wedding' => array(self::BELONGS_TO, 'Wedding', 'wedding_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'feedback_id' => Yii::t('app', 'Feedback Id'),
			'user_id' => null,
			'wedding_id' => null,
			'rating' => Yii::t('app', 'Rating'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			'feedback' => Yii::t('app', 'Feedback'),
			'field2' => Yii::t('app', 'Field2'),
			'user' => Yii::t('app', 'User Name'),
			'wedding' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('feedback_id', $this->feedback_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('rating', $this->rating, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('feedback', $this->feedback, true);
		$criteria->compare('field2', $this->field2, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}