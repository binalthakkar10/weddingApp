<?php

Yii::import('application.models._base.BaseOrder');

class Order extends BaseOrder
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function ordersearch1() {
		$criteria = new CDbCriteria;
        
		$weddingID = $_REQUEST['id'];
		$criteria->compare('order_id', $this->order_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('pattern_id', $this->pattern_id);
		$criteria->compare('fullname', $this->fullname, true);
		$criteria->compare('location_name', $this->location_name, true);
		$criteria->compare('street_address', $this->street_address, true);
		$criteria->compare('address2', $this->address2, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('zipcode', $this->zipcode, true);
		$criteria->compare('color_type', $this->color_type, true);
		$criteria->compare('no_of_quantity', $this->no_of_quantity);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('field1', $this->field1, true);
		$criteria->compare('field2', $this->field2, true);
		$criteria->addCondition("wedding_id = '".$weddingID."'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}