<?php

Yii::import('application.models._base.BaseEvent');

class Event extends BaseEvent
{
	public $username;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave() {
	    if ($this->isNewRecord)
	        $this->created_at = new CDbExpression('NOW()');
		else
	    $this->updated_at = new CDbExpression('NOW()');
	 
	    return parent::beforeSave();
	}
	public function rules() {
		return array(
			array('user_id, event_name, event_datetime, event_location, event_address, event_latitute, event_longitude, event_description, event_link_album_id, created_at, field1, field2', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('event_name, event_location, field1, field2', 'length', 'max'=>100),
			array('event_latitute, event_longitude', 'length', 'max'=>50),
			array('event_link_album_id', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('updated_at', 'safe'),
			array('updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('event_id, user_id, event_name, event_datetime, event_location, event_address, event_latitute, event_longitude, event_description, event_link_album_id, created_at, updated_at, status, field1, field2 , username', 'safe', 'on'=>'search'),
		);
	}
	public function search() {
		$criteria = new CDbCriteria;
		/* Custom searching for filter */
		$criteria->select = 't.event_id,t.user_id,t.event_name,t.event_datetime,t.event_location,t.event_address,t.event_latitute,t.event_longitude,
							t.event_description,t.event_link_album_id,t.created_at,t.updated_at,t.status,t.field1,t.field2,
							u.user_id,u.username';
		$criteria->join = 'LEFT JOIN user_detail u ON u.user_id = t.user_id';
		/* end of custom filter */
		$criteria->compare('t.event_id', $this->event_id);
		$criteria->compare('t.user_id', $this->user_id);
		$criteria->compare('t.event_name', $this->event_name, true);
		$criteria->compare('t.event_datetime', $this->event_datetime, true);
		$criteria->compare('t.event_location', $this->event_location, true);
		$criteria->compare('t.event_address', $this->event_address, true);
		$criteria->compare('t.event_latitute', $this->event_latitute, true);
		$criteria->compare('t.event_longitude', $this->event_longitude, true);
		$criteria->compare('t.event_description', $this->event_description, true);
		$criteria->compare('t.event_link_album_id', $this->event_link_album_id, true);
		$criteria->compare('t.created_at', $this->created_at, true);
		$criteria->compare('t.updated_at', $this->updated_at, true);
		$criteria->compare('t.status', $this->status, true);
		$criteria->compare('t.field1', $this->field1, true);
		$criteria->compare('t.field2', $this->field2, true);
		if(isset($_REQUEST['Event']['username']) && !empty($_REQUEST['Event']['username'])){
			$criteria->addCondition("username LIKE '%".$_REQUEST['Event']['username']."%'",true);
		}
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
		public function eventsearch() {
		$criteria = new CDbCriteria;
        $weddingID = $_REQUEST['id'];
		$criteria->compare('event_id', $this->event_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('event_name', $this->event_name, true);
		$criteria->compare('event_datetime', $this->event_datetime, true);
		$criteria->compare('event_location', $this->event_location, true);
		$criteria->compare('event_address', $this->event_address, true);
		$criteria->compare('event_latitute', $this->event_latitute, true);
		$criteria->compare('event_longitude', $this->event_longitude, true);
		$criteria->compare('event_description', $this->event_description, true);
		$criteria->compare('event_link_album_id', $this->event_link_album_id, true);
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