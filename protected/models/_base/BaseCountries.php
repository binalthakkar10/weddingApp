<?php

/**
 * This is the model base class for the table "countries".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Countries".
 *
 * Columns in table "countries" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $countryID
 * @property string $countryName
 *
 */
abstract class BaseCountries extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'countries';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Countries|Countries', $n);
	}

	public static function representingColumn() {
		return 'countryName';
	}

	public function rules() {
		return array(
			array('countryName', 'length', 'max'=>52),
			array('countryName', 'default', 'setOnEmpty' => true, 'value' => null),
			array('countryID, countryName', 'safe', 'on'=>'search'),
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
			'countryID' => Yii::t('app', 'Country'),
			'countryName' => Yii::t('app', 'Country Name'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('countryID', $this->countryID);
		$criteria->compare('countryName', $this->countryName, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}