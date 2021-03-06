<?php
class JVAccessControlFilter extends CAccessControlFilter
{
	protected $_rules=array();
	/**
	 * @param array $rules list of access rules.
	 */
	public function setRules($rules)
	{
		foreach($rules as $rule)
		{
			if(is_array($rule) && isset($rule[0]))
			{
				$r=new JVAccessRule;
				$r->allow=$rule[0]==='allow';
				foreach(array_slice($rule,1) as $name=>$value)
				{
					if($name==='expression' || $name==='roles' || $name==='message' || $name=='desc') {
						$r->$name=$value;
					} else{
						$r->$name= array_map('strtolower',$value);
					}
				}
				$this->_rules[]=$r;
			}
		}
	}
	public function getRules()
	{
		return $this->_rules;
	}


	public function getAdminMenuItems()
	{
		$menuModel = new UserRulesMenu();
		$menuData = $menuModel->getMenuItems('admin');
		return $menuData;
	}



	public function getCustomerMenuItems()
	{
		$menuModel = new UserRulesMenu();
		$menuData = $menuModel->getMenuItems('customer');
		return $menuData;
	}

	public function getFrontMenuItems()
	{
		//$menuModel = new UserRulesMenu();
		//$menuData = $menuModel->getMenuItems('front');
		//$this->menuList[] =  array('label'=>$row->label, 'url'=> array($row->url), 'level'=>$level, 'id'=>$row->id, 'parent_id'=>$row->parent_id);
		//p($menuData);
		$menuData[0] = array('label'=>Yii::t('inx', 'Show'), 'url'=> Videos::getShowMenuUrl(), 'level'=>0);
		$menuData[1] = array('label'=>Yii::t('inx', 'Was Interessiert Dich?'), 'url'=> Videos::getPopularKeywordUrl(), 'level'=>0);
		$menuData[2] = array('label'=>Yii::t('inx', 'Most Popular'), 'url'=> Videos::getMostPopularUrl(), 'level'=>0);
		$menuData[3] = array('label'=>Yii::t('inx', 'Hosts'), 'url'=> Videos::getHostMenuUrl() , 'level'=>0);
		$menuData[0]['items'] = Tvshows::getMenu();
		$menuData[1]['items'] = Keywords::getMenu();
		$menuData[2]['items'] = Videos::getPopularMenu();
		$menuData[3]['items'] = Hosts::getMenu();
		return array('items' => $menuData);
	}
}
class JVAccessRule extends CAccessRule
{
	public $desc;
	public function isUserAllowed($user,$controller,$action,$ip,$verb)
	{
		//p(debug_print_backtrace());
		/*
		if($this->isActionMatched($action)) {
		p($action,0);
		p($this->actions,0);
		p('1'.$this->isActionMatched($action),0);
		p('2'.$this->isUserMatched($user),0);
		p('3'.$this->isRoleMatched($user),0);
		p('4'.$this->isIpMatched($ip),0);
		p('5'.$this->isVerbMatched($verb),0);
		p('6'.$this->isControllerMatched($controller),0);
		p('7'.$this->isExpressionMatched($user));
		}
		*/
		//p($user);
		if($this->isActionMatched($action)
		&& $this->isUserMatched($user)
		&& $this->isRoleMatched($user)
		&& $this->isIpMatched($ip)
		&& $this->isVerbMatched($verb)
		&& $this->isControllerMatched($controller)
		&& $this->isExpressionMatched($user))
		return $this->allow ? 1 : -1;
		else
		return 0;
	}
}