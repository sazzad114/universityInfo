<?php
class ThemeForm extends Zend_Form
{
	public function init()
	{
		$this->setName('ThemeForm');
	
		$_array = array('sunset'=>'sunset','forest'=>'forest','bluesky'=>'bluesky');
		
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setMultiOptions($_array)
				 ->addValidator(new Zend_Validate_Alpha(true));
				
		$this->addElement($dropdown);
		
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Change');
    
      $this->addElement($submit);
	  
	}
}