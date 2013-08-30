<?php
class Login extends Zend_Form
{
	public function init()
	{
		$this->setName('login');
		
		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email address:')
              ->addFilter('StringToLower')
              ->setRequired(true)
			  ->setDescription('must be \'email@host.com\'')
              ->addValidator('NotEmpty', true)
              ->addValidator('EmailAddress');
	
		
	   $password = new Zend_Form_Element_Password('password');
       $password->setLabel('password:')
              ->addFilter('StringTrim')
              ->setRequired(true)
			  ->setDescription('between 6 to 20 letters.')
              ->addValidator('NotEmpty', true)
		      ->addValidators(array('Alnum',array('StringLength', false, array(6, 20)),));
		
		$checkbox = new Zend_Form_Element_Checkbox("checkbox");
		$checkbox->setValue("checked")
				 ->setLabel('Remember me?');
	
		  
		$submit = new Zend_Form_Element_Submit('login_submit');
        $submit->setLabel('Login');
   
		$this->addElements(array($email,$password, $checkbox ,$submit));
	
	}
}