<?php

class RegistrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Users',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Profile',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Register',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('SimpleImage',APPLICATION_PATH.'/views/helpers');
		if(Zend_Auth::getInstance()->hasIdentity())
        {
			$this->_redirect('home/index');
        }	
    }

    public function indexAction()
    {
        // action body
		
		$menu = new Menu();
		$this->view->menu = $menu->menuList("public");
		
		$form = new Register();
		$this->view->RegistrationForm = $form;
		$this->view->error = "";
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$firstname = $form->getValue('firstName');
				$lastname = $form->getValue('lastName');
				$sex = $form->getValue('dropdown');
				
				$email = $form->getValue('email');
				$password = $form->getValue('password');
				$user = new Users();
				$userinfo = $user->getUserID($email);
				if($userinfo['user_id']==null)
				{
					$profile = new Profile();
					$user->addUser($firstname, $lastname, $sex, $email, $password);
					$userinfo = $user->getUserID($email);
					$profile->addProfile($userinfo['user_id']);
					$image = new SimpleImage();
					if($sex == 0)
					{
						$image->load('C:\xampp\htdocs\sdproject\application\picture\Default\male.gif');
					}
					else
					{
						$image->load('C:\xampp\htdocs\sdproject\application\picture\default\female.gif');
					}
					$image->resize(280,250);
					$image->save('C:\xampp\htdocs\sdproject\application\picture\upload\_'.$email.'.png');
					$image->resize(50,50); //280,250
					$image->save('C:\xampp\htdocs\sdproject\application\picture\thumbnails\_'.$email.'.png');
					$this->_redirect('login/index');
				}
				else
				{
					$form->populate($formData);
					$this->view->error = "This email id is already in use";
				}
			}
			else
			{
				$form->populate($formData);
			}
		}

    }
	public function unregisteredAction()
	{
		$menu = new Menu();
		$this->view->menu = $menu->menuList("public");
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
				$this->_redirect('registration/unregistered');
			}	
		}
	}
}