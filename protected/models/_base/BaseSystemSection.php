<?php

/**
 * This is the model base class for the table "system_section".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SystemSection".
 *
 * Columns in table "system_section" available as properties of the model,
 * followed by relations of table "system_section" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 * @property integer $status
 *
 * @property SystemConfig[] $systemConfigs
 */
abstract class BaseSystemSection extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'system_section';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SystemSection|SystemSections', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('position, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('name, position, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, position, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'systemConfigs' => array(self::HAS_MANY, 'SystemConfig', 'system_section_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'position' => Yii::t('app', 'Position'),
			'status' => Yii::t('app', 'Status'),
			'systemConfigs' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('position', $this->position);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}