<?php

class ImageController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('login/unregistered');
        }
		
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('SimpleImage',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('Upload',APPLICATION_PATH.'/forms');
    }
	
	public function indexAction()
    {
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
		
		$form = new Upload();
		$this->view->form = $form;
      if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				if ($form->image->receive())
				{
					$auth = Zend_Auth::getInstance();
					$userInfo = $auth->getIdentity();
					$email = $userInfo->email;
					$image = new SimpleImage();
					$fullname = $form->image->getFileName();
					$image->load($fullname);
					$image->resize(280,250);
					$image->save('C:\xampp\htdocs\sdproject\application\picture\upload\_'.$email.'.png');
					$image->resize(50,50); //280,250
					$image->save('C:\xampp\htdocs\sdproject\application\picture\thumbnails\_'.$email.'.png');
					$this->_redirect('profile/index');
				}
			}	
		}
    }
	public function policyAction()
	{
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
	
	}
}

