<?php

class DeptController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
			$this->_redirect('registration/unregistered');
        }
		
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('Department',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
    {
		$menu = new Menu();
		$this->view->menu = $menu->menuList("custom");
		$department_id = $this->_getParam('department_id', 0);
		if ($department_id > 0 )
		{
			$dept = new Department();
			$this->view->dept = $dept->getDepartment($department_id);
		}
    }
}