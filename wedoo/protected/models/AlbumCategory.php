<?php

Yii::import('application.models._base.BaseAlbumCategory');

class AlbumCategory extends BaseAlbumCategory
{
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
}