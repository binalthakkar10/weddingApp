<?php

Yii::import('application.models._base.BaseAlbumPhotoGallery');

class AlbumPhotoGallery extends BaseAlbumPhotoGallery
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
	public function rules() {
		return array(
			array('photo_image', 'required'),
			array('photo_image', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>1),
			array('field1, field2', 'length', 'max'=>100),
			array('updated_at', 'safe'),
			array('photo_image, updated_at, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('album_photo_id, photo_image, created_at, updated_at, status, field1, field2', 'safe', 'on'=>'search'),
		);
	}
}