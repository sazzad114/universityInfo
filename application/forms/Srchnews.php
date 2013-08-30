<?php
class Srchnews extends Zend_Form
{
	public function init()
	{
		$this->setName('Srchnews');
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		$news = new News();
		$years = $news->getNewsYear();
		
		$array = array('-----'=>"-----");
		foreach ($years as $year)
		{
			$array[$year['year']] = $year['year'];	
        }

		$dropdown= new Zend_Form_Element_Select('year');
		$dropdown->setLabel('Search the top news of year:')
				 ->setMultiOptions($array)
				 ->addValidator('Digits');
				
		$this->addElement($dropdown);
		
        /*$Name = new Zend_Form_Element_Text('year');
        $Name->setLabel('Search the top news of year:')
                  ->setRequired(true)
				  ->addValidator('Digits')
                  ->addValidator('NotEmpty');
	  
		$this->addElement($Name);*/
		  
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search');
    
      $this->addElement($submit);
	  
	}
}