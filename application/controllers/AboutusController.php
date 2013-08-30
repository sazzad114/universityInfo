<?php

class AboutusController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
			
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('ContactForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Contactus',APPLICATION_PATH.'/models');
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
		
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$themename = $form->getValue('dropdown');
				Themes::setLayoutName($themename);
				$this->_redirect('aboutus/index');
			}	
		}
    }
	
	public function contactusAction()
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
		
		$cons = new Contactus();
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$paginator = Zend_Paginator::factory($cons->getMessages());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(6);
		$this->view->contacts = $paginator;
		
		
		
		$form = New ContactForm();
		$this->view->form = $form;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$firstName = $form->getValue('firstName');
				$lastName = $form->getValue('lastName');
				$email = $form->getValue('email');
				$msg = $form->getValue('contact');
				$contact = new Contactus();
				$contact->addMsg($firstName, $lastName, $email, $msg);
				$this->_redirect('aboutus/contactus');
			}	
		}
	}
}