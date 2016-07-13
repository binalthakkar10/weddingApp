<?php

Yii::import('application.models._base.BaseInviteFriend');

class InviteFriend extends BaseInviteFriend
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function guestsearch() {
		$criteria = new CDbCriteria;

		$weddingID = $_REQUEST['id'];
		$criteria->compare('invite_id', $this->invite_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('invite_type', $this->invite_type, true);
		$criteria->compare('invite_email', $this->invite_email, true);
		$criteria->compare('register_email_flag', $this->register_email_flag, true);
		$criteria->compare('make_admin', $this->make_admin, true);
		$criteria->compare('remove_user', $this->remove_user, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		// $criteria->compare('field1', $this->field1, true);
		 $criteria->compare('field2', $this->field2, true);
		$criteria->addCondition("wedding_id = '".$weddingID."'");
		$criteria->addCondition("make_admin = 'No'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function adminsearch() {
		$criteria = new CDbCriteria;

		$weddingID = $_REQUEST['id'];
		$criteria->compare('invite_id', $this->invite_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('invite_type', $this->invite_type, true);
		$criteria->compare('invite_email', $this->invite_email, true);
		$criteria->compare('register_email_flag', $this->register_email_flag, true);
		$criteria->compare('make_admin', $this->make_admin, true);
		$criteria->compare('remove_user', $this->remove_user, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		// $criteria->compare('field1', $this->field1, true);
		 $criteria->compare('field2', $this->field2, true);
		$criteria->addCondition("wedding_id = '".$weddingID."'");
		$criteria->addCondition("make_admin = 'Yes'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}