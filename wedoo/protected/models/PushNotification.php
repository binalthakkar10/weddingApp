<?php

Yii::import('application.models._base.BasePushNotification');

class PushNotification extends BasePushNotification
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}