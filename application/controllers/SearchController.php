<?php

class SearchController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('UserSearch',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('TechSearch',APPLICATION_PATH.'/forms');
		
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Users',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('FacultyMember',APPLICATION_PATH.'/models');
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
		
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$themename = $form->getValue('dropdown');
				Themes::setLayoutName($themename);
				$this->_redirect('search/index');
			}	
		}
    }
	
	public function srchuserAction()
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
		
		$form = new UserSearch();
		$this->view->form = $form;
		$this->view->posted = 0;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$name = $form->getValue('Name');
				$user = new Users();
				Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
				$paginator = Zend_Paginator::factory($user->getUserByName($name));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				if($paginator->getTotalItemCount()==0)
				{
					$this->view->error = "Sorry there is no User of this name exists";
				}
				$this->view->users = $paginator;
				
				$this->view->posted = 1;
			}
			else
			{
				$this->view->posted = 0;
				$form->populate($formData);
			}
			
		}
		
	}
	
	public function srchteacherAction()
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
		
		$form = new TechSearch();
		$this->view->form = $form;
		$this->view->posted = 0;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$name = $form->getValue('Name');
				$members = new FacultyMember();
				Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
				$paginator = Zend_Paginator::factory($members->getTeachersByName($name));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				if($paginator->getTotalItemCount()==0)
				{
					$this->view->error = "Sorry there is no Teacher of this name exists";
				}
				$this->view->members = $paginator;
				$this->view->posted = 1;
			}
			else
			{
				$this->view->posted = 0;
				$form->populate($formData);
			}
			
		}
		
	}
}