<?php

Yii::import('application.models._base.BaseUserSetting');

class UserSetting extends BaseUserSetting
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}