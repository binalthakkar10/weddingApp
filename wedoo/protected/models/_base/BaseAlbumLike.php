<?php

/**
 * This is the model base class for the table "album_like".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AlbumLike".
 *
 * Columns in table "album_like" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $album_like_id
 * @property integer $album_photo_id
 * @property integer $user_id
 *
 */
abstract class BaseAlbumLike extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'album_like';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AlbumLike|AlbumLikes', $n);
	}

	public static function representingColumn() {
		return 'album_like_id';
	}

	public function rules() {
		return array(
			array('album_photo_id, user_id', 'required'),
			array('album_photo_id, user_id', 'numerical', 'integerOnly'=>true),
			array('album_like_id, album_photo_id, user_id', 'safe', 'on'=>'search'),
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
			'album_like_id' => Yii::t('app', 'Album Like'),
			'album_photo_id' => Yii::t('app', 'Album Photo'),
			'user_id' => Yii::t('app', 'User'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('album_like_id', $this->album_like_id);
		$criteria->compare('album_photo_id', $this->album_photo_id);
		$criteria->compare('user_id', $this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}