<?php
class Register extends Zend_Form
{
	public function init()
	{
		$this->setName('register');
		
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('*First name:')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');

        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('*Last name:')
                 ->setRequired(true)
                 ->addValidator('NotEmpty');
        
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('*Sex:')
				 ->setMultiOptions(array('Male','Female'));
		
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('*Email:')
              ->addFilter('StringToLower')
              ->setRequired(true)
              ->addValidator('NotEmpty', true)
              ->addValidator('EmailAddress'); 
	
		  
		$this->addElements(array($firstName, $lastName, $dropdown, $email));
		  
    $password = new Zend_Form_Element_Password('password');
	      $password->setLabel('*Password:')
	      ->setRequired(true)
		  ->setDescription('between 6 to 20 letters.')
	      ->addFilter('StripTags')
	      ->addFilter('StringTrim')
	      ->addValidator('NotEmpty')
	      ->addValidators(array('Alnum',array('StringLength', false, array(6, 20)),));
	    ;
	$this->addElement($password);
	
	    $conpassword = new Zend_Form_Element_Password('password_confirm');
	      $conpassword->setLabel('*Confirm Password:')
	      ->setRequired(true)
	      ->addFilter('StripTags')
	      ->addFilter('StringTrim')
	      ->addValidator('NotEmpty')
		  ->addValidator('Identical', false, array('token'=>$_POST['password']))
	    ;
	$this->addElement($conpassword);
	
$this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        $submit = new Zend_Form_Element_Submit('register_submit');
        $submit->setLabel('Register');
    
      $this->addElement($submit);  


	}
}