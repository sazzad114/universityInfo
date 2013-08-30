<?php
class TechSearch extends Zend_Form
{
	public function init()
	{
		$this->setName('Srchteacher');
		
        $Name = new Zend_Form_Element_Text('Name');
        $Name->setLabel('Enter Teacher\'s name here:')
                  ->setRequired(true)
				  ->addValidator('Alpha')
                  ->addValidator('NotEmpty');
	  
		$this->addElement($Name);
		  
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search');
    
      $this->addElement($submit);
	  
	}
}