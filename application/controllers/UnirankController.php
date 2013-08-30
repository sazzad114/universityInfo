<?php

class UnirankController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
			
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('RankingForm',APPLICATION_PATH.'/forms');
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
				$this->_redirect('unirank/index');
			}	
		}
		
		
    }
	
	public function ranklistAction()
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
		$uni = new University();
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$paginator = Zend_Paginator::factory($uni->getUniByRank());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(20);
		$this->view->unis = $paginator;
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
	
	public function assignrankAction()
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
		$form = new RankingForm();
		$this->view->form = $form;
		
		
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$uniname = $form->getValue('dropdown');
				$student = (int)$form->getValue('student');
				$facilities = (int)$form->getValue('facilities');
				$finance = (int)$form->getValue('finance');
				$faculty = (int)$form->getValue('faculty');
				$research = (int)$form->getValue('research');
				$total_point = $student + $facilities + $finance + $faculty + $research;
				$unis = new University();
				$unis->UpdateRank($uniname,$total_point);
				$this->_redirect('unirank/index');
	
			}
			else
			{
				$form->populate($formData);
			}
		}
		
	}
	
	
}