<?php
Yii::import('application.modules.wedding.*');
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class WeddingCoreController extends FrontCoreController
{
	public $layout 		= 'main';
	//public $layout 		= '//layouts/column1';
	public $accessRule  = '';
	public $userType 	= 'wedding';
	
 
 	public function __construct($id,$module=null)
	{
		parent::__construct($id,$module);

		//set usertype
		$Wedding = Yii::app()->wedding->getState('wedding');
		if(isset($Wedding['user_type']) && $Wedding['user_type'] !='') {
			$this->userType=$Wedding['user_type'];
		}
		$this->accessRule = new UserAccessControll();
		$this->loadDefaultJS();
		$this->loadDefaultCSS();
		
		 
	
	}	 
	 
	public function loadDefaultJS()
	{
		$baseUrl = Yii::app()->baseUrl;
		$cs = Yii::app()->getClientScript();
		if(!$cs->isScriptFileRegistered('jquery')){
			Yii::app()->clientScript->registerCoreScript('jquery');
		}

	}
	public function loadDefaultCSS()
	{

	}

	/**
	 * The filter method for 'accessControl' filter.
	 * This filter is a wrapper of {@link CAccessControlFilter}.
	 * To use this filter, you must override {@link accessRules} method.
	 * @param CFilterChain $filterChain the filter chain that the filter is on.
	 */
	public function filterAccessControl($filterChain)
	{
		//$filter=new CAccessControlFilter;
		$filter=new JVAccessControlFilter;

		$filter->setRules($this->accessRules());
		$filter->filter($filterChain);
	}

	public function getControllerName()
	{	
		return get_class($this);
	}


	public function getModuleId()
	{
		return $this->accessRule->getModule($this->getModule()->id, 'id');
	}
	public function defaultAccessRules()
	{
		return array(
		array('allow',
			'actions'=>array('index','view'),
			'roles'=>array('*'),
			'desc'=>'List / Details Data',
		),
		array('allow',
			'actions'=>array('minicreate', 'create','update'),
			'roles'=>array('UserCreator'),
			'desc'=>'Add / Update Data',
		),
		array('allow',
			'actions'=>array('admin','delete'),
			'users'=>array($this->userType),
			'desc'=>'Delete and Manage Operation',
		),
		array('deny',
			'users'=>array('*'),
		),
		);
	}


	public function getRole()
	{
		return WeddingModule::getUserRoles();
	}
	public function accessRules($userType = 'wedding', $isDefault=false)
	{
		$user_roles = $this->getRole();
		//$user_roles = ((WeddingModule::getUserDataByKey('user_roles')!='')?WeddingModule::getUserDataByKey('user_roles'):"''");
		$models = UserRules::model()->findAll("privileges_controller = '".$this->getControllerName()."'
		AND module_id = '".$this->getModuleId()."' AND role_id IN (".$user_roles.")");
		foreach($models as $model) {
			$array[] = array(
			$model->permission,
				'actions'=>explode(',',$model->privileges_actions),
				'users'=>explode(',',$model->permission_type),
				'desc'=>$model->role_desc,
			);
		}

		if(isset($array)) {
			return $array;
		}else {
			return $this->defaultAccessRules();
		}
	}
	
	
	
}