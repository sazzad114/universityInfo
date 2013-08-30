<?php
class SrchbyCountry extends Zend_Form
{
	public function init()
	{
		$this->setName('SrchbyCountry');
	
		Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
		$uni = new University();
		$countries = $uni->getUniCountry();
		$array = array('-----'=>"-----");
		foreach ($countries as $country)
		{
			//array_push($array,$country['uni_country']);
			$array[$country['uni_country']] = $country['uni_country'];
        }

		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('Enter country name here:')
				 ->setMultiOptions($array)
				 ->addValidator(new Zend_Validate_Alpha(true));
				
		$this->addElement($dropdown);
		
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search');
    
      $this->addElement($submit);
	  
	}
}