<?php

class NewsarcController extends Zend_Controller_Action
{
 
	

    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('registration/unregistered');
        }
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('Srchnews',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		
    }
	
	public function indexAction()
    {
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$form = new Srchnews();
		$this->view->form = $form;
		$this->view->posted = 0;
		
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$year = $form->getValue('year');
				$news = new News();
				$paginator = Zend_Paginator::factory($news->getNewsbyYear($year));
				$paginator->setCurrentPageNumber($this->_getParam('page', 1));
				$paginator->setDefaultItemCountPerPage(40);
				$this->view->newslist = $paginator;
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