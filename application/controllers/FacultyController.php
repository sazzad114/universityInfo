<?php

class FacultyController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('registration/unregistered');
        }
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('Faculty',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Department',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
    {
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
		$faculty_id = $this->_getParam('faculty_id', 0);
		if ($faculty_id > 0 )
		{
			$faculty = new Faculty();
			$faculty = $faculty->getFaculty($faculty_id);
			$this->view->faculty = $faculty;
			
			$department = new Department();
			$depts = $department->getDepartmentbyFaculty($faculty_id);
			$this->view->depts = $depts;
		}
    }
}