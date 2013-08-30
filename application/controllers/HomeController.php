<?php

class HomeController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('registration/unregistered');
        }
			
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
    {
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
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
				$this->_redirect('home/index');
			}	
		}
		
		/* paginations and fetching news */
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		
		$news = new News();
					
		$paginator = Zend_Paginator::factory($news->getShortNews());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(4);
		$this->view->newsinfo = $paginator;
    }
}