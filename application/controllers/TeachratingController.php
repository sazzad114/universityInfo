<?php

class TeachratingController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		Zend_Loader::loadClass('FacultyMember',APPLICATION_PATH.'/models');	
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('RatingForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
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
		
		/*changing themes*/
		$form = new ThemeForm();
		$this->view->themeform = $form;
		
		if($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$themename = $form->getValue('dropdown');
				Themes::setLayoutName($themename);
				$this->_redirect('teachrating/index');
			}	
		}
    }
	
	
	public function proflistAction()
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
		$faculty = new FacultyMember();
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$paginator = Zend_Paginator::factory($faculty->_getFacultymembers());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(20);
		$this->view->members = $paginator;
		$this->view->page = $this->_getParam('page',1);
		$this->view->perpage = 20;
	}
	
	public function methodologyAction()
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
	}
	
	public function rateprofAction()
	{
		$menu = new Menu();
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
			$this->_redirect('registration/unregistered');
        }
		else
		{
			$this->view->menu = $menu->menuList("custom");
		}
		
		$form = new RatingForm();
		$this->view->form = $form;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$name = $form->getValue('dropdown');
				$post = (int)$form->getValue('post');
				$experience = (int)$form->getValue('experience');
				$research = (int)$form->getValue('research');
				$communication = (int)$form->getValue('communication');
				$total_point = $post + $experience + $communication + $research;
				$faculties = new FacultyMember();
				$faculties->UpdateRating($name,$total_point);
				$this->_redirect('teachrating/index');
	
			}
			else
			{
				$form->populate($formData);
			}
		}
	
	}
	
	

}