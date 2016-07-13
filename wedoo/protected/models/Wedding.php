<?php

Yii::import('application.models._base.BaseWedding');

class Wedding extends BaseWedding
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public $theme="";
	public $guest_share="";
	public $private="";
	
	public function rules() {
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('to_bride_name, to_groom_name, to_partner_name, from_bride_name, from_groom_name, from_partner_name, wedding_uniq_id', 'length', 'max'=>50),
			array('status', 'length', 'max'=>1),
			array('image, field2, wedding_location', 'length', 'max'=>100),
			array('updated_at', 'safe'),
			array('updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('wedding_id, user_id, to_bride_name, to_groom_name, to_partner_name, from_bride_name, from_groom_name, from_partner_name, wedding_date, wedding_location, street_address, wedding_uniq_id, created_at, updated_at, status, image, field2', 'safe', 'on'=>'search'),
		);
	}
	
	public function weddingsearch() {
		$criteria = new CDbCriteria;

		$weddingID = $_REQUEST['id']; 
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('to_bride_name', $this->to_bride_name, true);
		$criteria->compare('to_groom_name', $this->to_groom_name, true);
		$criteria->compare('to_partner_name', $this->to_partner_name, true);
		$criteria->compare('from_bride_name', $this->from_bride_name, true);
		$criteria->compare('from_groom_name', $this->from_groom_name, true);
		$criteria->compare('from_partner_name', $this->from_partner_name, true);
		$criteria->compare('wedding_date', $this->wedding_date, true);
		$criteria->compare('wedding_location', $this->wedding_location, true);
		$criteria->compare('street_address', $this->street_address, true);
		$criteria->compare('wedding_uniq_id', $this->wedding_uniq_id, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('field2', $this->field2, true);
		$criteria->addCondition("wedding_id = '".$weddingID."'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}