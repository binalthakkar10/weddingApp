<?php

Yii::import('application.models._base.BasePayment');

class Payment extends BasePayment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function paymentsearch() {
		$criteria = new CDbCriteria;
        $weddingID = $_REQUEST['id'];
		$criteria->compare('payment_id', $this->payment_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('order_id', $this->order_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('album_id', $this->album_id);
		$criteria->compare('transaction_id', $this->transaction_id, true);
		$criteria->compare('payment_amount', $this->payment_amount, true);
		$criteria->compare('currency_type', $this->currency_type, true);
		$criteria->compare('payment_mode', $this->payment_mode, true);
		$criteria->compare('payment_status', $this->payment_status, true);
		$criteria->compare('payment_message', $this->payment_message, true);
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