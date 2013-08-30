<?php

class UnisearchController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
			
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('SrchbyName',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('SrchbyCountry',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('AdvancedSrch',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
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
	
	public function uninameAction()
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
		
		$form = new SrchbyName();
		$this->view->form = $form;
		$this->view->posted = 0;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$uniname = $form->getValue('Name');
				$uni = new University();
				Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
				$paginator = Zend_Paginator::factory($uni->getUniByName($uniname));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				if($paginator->getTotalItemCount()==0)
				{
					$this->view->error = "Sorry there is no University of this name exists";
				}
				$this->view->unis = $paginator;
				$this->view->posted = 1;
			}
			else
			{
				$this->view->posted = 0;
				$form->populate($formData);
			}
			
		}
		
	}
	
	public function unicountryAction()
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
		
		$form = new SrchbyCountry();
		$this->view->form = $form;
		$this->view->posted = 0;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$country = $form->getValue('dropdown');
				$uni = new University();
				Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
				$paginator = Zend_Paginator::factory($uni->getUniByCountry($country));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				$this->view->unis = $paginator;
				$this->view->posted = 1;
			}
			else
			{
				$this->view->posted = 0;
				$form->populate($formData);
			}
			
		}
	}
	public function advancedsrchAction()
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
		
		$form = new AdvancedSrch();
		$this->view->form = $form;
		$this->view->posted = 0;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$type = (int)$form->getValue('dropdown');
				$test = null;
				if($type == 0)
				{
					$test = 'GRE';
				}
				else if($type == 1)
				{
					$test = 'GMAT';
				}
				else if($type == 2)
				{
					$test = 'IELTS';
				}
				else if($type == 3)
				{
					$test = 'TOEFL';
				}
				else
				{
					$test = 'SAT';
				}
				
				$score = $form->getValue('testscore');
				$cgpa= $form->getValue('cgpa');
				$db = Zend_Db_Table::getDefaultAdapter();
				$uni = new University();
				Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
				$paginator = Zend_Paginator::factory($uni->advancedSearch($test,$score,$cgpa));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				$this->view->unis = $paginator;
	
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