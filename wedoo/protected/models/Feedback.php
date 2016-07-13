<?php

Yii::import('application.models._base.BaseFeedback');

class Feedback extends BaseFeedback
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}