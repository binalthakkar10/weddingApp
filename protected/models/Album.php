<?php

Yii::import('application.models._base.BaseAlbum');

class Album extends BaseAlbum
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
		public function attributeLabels() {
		return array(
			'album_id' => Yii::t('app', 'Album Id'),
			'user_id' => null,
			'wedding_id' => null,
			'album_category_id' => null,
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			'position' => Yii::t('app', 'Position'),
			'is_delete' => Yii::t('app', 'Is Delete'),
			'albumCategory' => Yii::t('app', 'Album Category'),
			'user' => Yii::t('app', 'User Name'),
			'wedding' => null,
			'albumPhotoGalleries' => null,
			'comments' => null,
		);
	}
	
	public function albumsearch() {
		$criteria = new CDbCriteria;
        $weddingID = $_REQUEST['id'];
		$criteria->compare('album_id', $this->album_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('wedding_id', $this->wedding_id);
		$criteria->compare('album_category_id', $this->album_category_id);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('position', $this->position);
		$criteria->compare('is_delete', $this->is_delete, true);
		$criteria->addCondition("wedding_id = '".$weddingID."'");

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}