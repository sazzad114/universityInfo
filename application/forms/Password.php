<?php
class Password extends Zend_Form
{
	public function init()
	{
		$this->setName('changepassword');
		
	$currpassword = new Zend_Form_Element_Password('currpassword');
	      $currpassword->setLabel('Your Current Password:')
	      ->setRequired(true)
		  ->setDescription('between 6 to 20 letters.')
	      ->addFilter('StripTags')
	      ->addFilter('StringTrim')
	      ->addValidator('NotEmpty')
	      ->addValidators(array('Alnum',array('StringLength', false, array(6, 20)),));
	    ;
	$this->addElement($currpassword);
		
    $password = new Zend_Form_Element_Password('password');
	      $password->setLabel('Your New Password:')
	      ->setRequired(true)
		  ->setDescription('between 6 to 20 letters.')
	      ->addFilter('StripTags')
	      ->addFilter('StringTrim')
	      ->addValidator('NotEmpty')
	      ->addValidators(array('Alnum',array('StringLength', false, array(6, 20)),));
	    ;
	$this->addElement($password);
	
	    $conpassword = new Zend_Form_Element_Password('password_confirm');
	      $conpassword->setLabel('Confirm Password:')
	      ->setRequired(true)
	      ->addFilter('StripTags')
	      ->addFilter('StringTrim')
	      ->addValidator('NotEmpty')
		  ->addValidator('Identical', false, array('token'=>$_POST['password']))
	    ;
	$this->addElement($conpassword);
	

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Save');
    
      $this->addElement($submit); 
	}
}