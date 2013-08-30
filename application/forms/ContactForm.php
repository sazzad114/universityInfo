<?php
class ContactForm extends Zend_Form
{
	public function init()
	{
		$this->setName('comments');
		
		$firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('*First name:')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');
		
		$this->addElement($firstName);
			  
        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('*Last name:')
                 ->setRequired(true)
                 ->addValidator('NotEmpty');
		
		$this->addElement($lastName);
			 
		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('*Email:')
              ->addFilter('StringToLower')
              ->setRequired(true)
              ->addValidator('NotEmpty', true)
              ->addValidator('EmailAddress'); 
		
		$this->addElement($email);
		  
		$comment = $this->createElement('textarea','contact', array('label' => 'Comment', 'rows' => '3'));
        $comment->setLabel('*Write to us here:')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');
		
		$this->addElement($comment); 

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
		$submit->setLabel('submit');
		$this->addElement($submit);  
	}
}