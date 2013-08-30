<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
		if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('home/index');
        }
		
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
    }
	
	public function indexAction()
    {
		$menu = new Menu();
		$this->view->menu = $menu->menuList('public');
		
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
				$this->_redirect('index/index');
			}	
		}
		
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		$news = new News();
		$this->view->newsinfo = $news->getTopnews();
    }
}

