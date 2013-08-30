<?php

class ProfileController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('registration/unregistered');
        }	
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('Users',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('EditProfile',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Password',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Profile',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
    }
	
	public function indexAction()
    {
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
				$this->_redirect('profile/index');
			}	
		}
		
		$user = new Users();
		$profile = new Profile();
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity())
		{
			$userinfo = $auth->getIdentity();
			$this->view->userInfo = $user->getUser($userinfo->user_id);
			$this->view->profileInfo = $profile->getProfile($userinfo->user_id);
			
		}
		else
		{
			echo "not logged in";
		}	
    }
	
	public function updateAction()
	{
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity())
		{
			$userInfo = $auth->getIdentity();
		}
		$form = new EditProfile();
		$this->view->form = $form;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$firstname = $form->getValue('firstName');
				$lastname = $form->getValue('lastName');
				$birth = $form->getValue('Dateofbirth');
				$age = $form->getValue('age');
				$religion = $form->getValue('religion');
				$country = $form->getValue('country');
				$state = $form->getValue('state');
				$city = $form->getValue('city');
				$ugu = $form->getValue('undergradeUni');
				$ugs = $form->getValue('undergradeSub');
				$ugc= $form->getValue('ugcgpa');
				$ugy = $form->getValue('ugpassyear');
				$gu = $form->getValue('gradeUni');
				$gs = $form->getValue('gradeSub');
				$gy = $form->getValue('gpassyear');
				$tst = $form->getValue('test');
				$tsty = $form->getValue('testpassdate');
				$tsts = $form->getValue('testscore');
				$profile = new Profile();
				if($gy==0)
				{
					$gy = null;
				}

				$profile->updateProfile($userInfo->user_id, $birth ,$age,$religion,$country,$state,$city,$ugu,$ugs,$ugc,$ugy,$gu,$gs,$gy,$tst,$tsty,$tsts);
				$user = new Users();
				$user->updateName($userInfo->user_id,$firstname,$lastname);
				
				$this->_redirect('profile/index');
			}
			else
			{
				$form->populate($formData);
			}
		}
		else
		{
			$data = $this->getData();
			$form->populate($data);
		}	
	}
	
	public function changepasswordAction()
	{
		$form = new Password();
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity())
		{
			$userInfo = $auth->getIdentity();
		}
		$this->view->form = $form;
		$this->view->error = "";
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				$currpass = $form->getValue('currpassword');
				$newpass = $form->getValue('password');
				if($currpass == $userInfo->password)
				{
					$user = new Users();
					$user->updatePassword($userInfo->user_id,$newpass);
					$this->_redirect('profile/index');
				}
				else
				{
					$form->populate($formData);
					$this->view->error = "You entered wrong current password.<br>Please check Your Caps lock key.";
				}
				
			}
			else
			{
				$form->populate($formData);
			}
			
		}
		
	}
	
	public function userdetailsAction()
	{
		
		$user = new Users();
		$profile = new Profile();
		$user_id = $this->_getParam('user_id', 0);
		if ($user_id > 0)
		{
			$auth = Zend_Auth::getInstance();
			if ($auth->hasIdentity())
			{
				$userinfo = $auth->getIdentity();
				if($user_id == $userinfo->user_id)
				{
					$this->_redirect('profile/index');
				}	
			}
			$this->view->userInfo = $user->getUser($user_id);
			$this->view->profileInfo = $profile->getProfile($user_id);	
		}
	
	
	}
	
	
	public function getData()
	{
		$users = new Users();
		$profileinfo = new Profile();
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity())
		{
			$userInfo = $auth->getIdentity();
		}
		$profile = $profileinfo->getProfile($userInfo->user_id);
		$user = $users->getUser($userInfo->user_id);
		$data = array(
		'firstName' => $user['FirstName'],
		'lastName' => $user['LastName'],
		'Dateofbirth' => $profile['Dateofbirth'],
		'age' => $profile['age'],
		'religion' => $profile['religion'],
		'country' => $profile['country'],
		'state' => $profile['state'],
		'city' => $profile['city'],
		'undergradeUni' => $profile['undergradeUni'],
		'undergradeSub' => $profile['undergradeSub'],
		'ugcgpa' => $profile['ugcgpa'],
		'ugpassyear' => $profile['ugpassyear'],
		'gradeUni' => $profile['gradeUni'],
		'gradeSub' => $profile['gradeSub'],
		'gpassyear' => $profile['gpassyear'],
		'test' => $profile['test'],
		'testpassdate' => $profile['testpassdate'],
		'testscore' => $profile['testscore'],
		);
		
		return $data;
	}
}