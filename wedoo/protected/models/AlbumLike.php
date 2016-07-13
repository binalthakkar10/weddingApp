<?php

Yii::import('application.models._base.BaseAlbumLike');

class AlbumLike extends BaseAlbumLike
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}