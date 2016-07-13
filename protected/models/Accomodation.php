<?php

Yii::import('application.models._base.BaseAccomodation');

class Accomodation extends BaseAccomodation
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave() {
	     
	    if ($this->isNewRecord)
		{
	        $this->created_at = new CDbExpression('NOW()');
		}
		else
	    $this->updated_at = new CDbExpression('NOW()');
	 
	    return parent::beforeSave();
	}
	// public static function representingColumn() {
		// return 'username';
	// }
	
	public function accomsearch() {
		$criteria = new CDbCriteria;
        $weddingID = $_REQUEST['id'];
		$criteria->compare('accomodation_id', $this->accomodation_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('accom_name', $this->accom_name, true);
		$criteria->compare('accom_address', $this->accom_address, true);
		$criteria->compare('accom_web_url', $this->accom_web_url, true);
		$criteria->compare('accom_desc', $this->accom_desc, true);
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