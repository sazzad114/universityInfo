<?php

class UniversityController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		
		
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Faculty',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
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
		$this->view->menu = $menu->menuList('custom');
		$uni = new University();
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$paginator = Zend_Paginator::factory($uni->getUnis());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(20);
		$this->view->unis = $paginator;	
		$this->view->page = $this->_getParam('page',1);
		$this->view->perpage = 20;
    }
	
	public function unidetailsAction()
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
		
		$uni_id = $this->_getParam('uni_id', 0);
		if ($uni_id > 0)
		{
			$uni = new University();
			$this->view->uni = $uni->getUni($uni_id);
			$faculty = new Faculty();
			$faculties = $faculty->getFacultybyUni($uni_id);
			$this->view->faculties = $faculties;
		}
	}
}