<?php
class SrchbyName extends Zend_Form
{
	public function init()
	{
		$this->setName('SrchbyName');
		
        $Name = new Zend_Form_Element_Text('Name');
        $Name->setLabel('Enter university name here:')
                  ->setRequired(true)
				  ->addValidator('Alpha')
                  ->addValidator('NotEmpty');
	  
		$this->addElement($Name);
		  
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search');
    
      $this->addElement($submit);
	  
	}
}