<?php

class LoginController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
			Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
			Zend_Loader::loadClass('Login',APPLICATION_PATH.'/forms');
		
			
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
		
    }
	
	public function indexAction()
    {
		if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('home/index');
        }
	
		$menu = new Menu();
		$this->view->menu = $menu->menuList('public');
		$loginForm = new Login();
		$this->view->loginform = $loginForm;
		$this->view->errorMessage = "";
		$request = $this->getRequest();
		 if($request->isPost())
        {
            if($loginForm->isValid($request->getPost()))
            {

                $authAdapter = $this->getAuthAdapter();

                # get the username and password from the form
                $username = $loginForm->getValue('email');
                $password = $loginForm->getValue('password');
				
                # pass to the adapter the submitted username and password
                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
				
                # is the user a valid one?
                if($result->isValid())
                {
                    # all info about this user from the login table
                    $userInfo = $authAdapter->getResultRowObject();
                    # the default storage is a session with namespace Zend_Auth
                    $authStorage = $auth->getStorage();
                    $authStorage->write($userInfo);
					if($loginForm->getValue('checkbox'))
					{
						require_once('Zend/Session.php');
						$seconds = 60 * 60 * 24 * 2; // 2 days
						Zend_Session::rememberMe($seconds);
					}
                   $this->_redirect('home/index');
                }
                else
                {
					
                    $this->view->errorMessage = "Wrong username or password provided. Please try again.";
					
                }
            }
        }
    }
	
	 public function logoutAction()
    {
        # clear everything - session is cleared also!
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('login/index');
    }

    /**
     * Gets the adapter for authentication against a database table
     *
     * @return object
     */
    protected function getAuthAdapter()
    {
		
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter ->setTableName('users')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('password');
                    
        return $authAdapter;
    }
}