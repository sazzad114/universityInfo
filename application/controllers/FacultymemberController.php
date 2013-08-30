<?php

class FacultymemberController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		
		
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('FacultyMember',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
    {
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
			$this->_redirect('registration/unregistered');
        }
		$menu = new Menu();
		$this->view->menu = $menu->menuList("custom");
		$department_id = $this->_getParam('department_id', 0);
		if ($department_id > 0 )
		{
			$mems = new FacultyMember();
			$this->view->mems = $mems->getFacultymemberbyDepartment($department_id);
		}
    }
	
	public function detailsAction()
	{
		$menu = new Menu();
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
			$this->view->menu = $menu->menuList("public");
        }
		else
		{
			$this->view->menu = $menu->menuList("custom");
		}
		$facultymember_id = $this->_getParam('facultymember_id', 0);
		if ($facultymember_id > 0 )
		{
			$mem = new FacultyMember();
			$this->view->mem = $mem->getFacultymember($facultymember_id);
		}
	}
}