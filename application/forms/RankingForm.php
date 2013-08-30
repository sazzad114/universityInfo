<?php
class RankingForm extends Zend_Form
{
	public function init()
	{
		$this->setName('rankingform');
		
        Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
		$uni = new University();
		$unis = $uni->getAlluniversity();
		$array = array(''=>"");
		
		foreach ($unis as $univ)
		{
			$array[$univ['uni_name']] = $univ['uni_name'];	
        }
		
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('Enter Uni name here:')
				 ->setMultiOptions($array);
			 
		$this->addElement($dropdown);
		
		$student = new Zend_Form_Element_Text('student');
		$student->setLabel('*Enter score for student category:')
                ->setRequired(true)
                ->addValidator('NotEmpty')
				->addValidator(new Zend_Validate_Between(1,17))
				->addValidator('Digits');
		
		$this->addElement($student);
		
		$facilities = new Zend_Form_Element_Text('facilities');
		$facilities->setLabel('*Enter score for Facilities category:')
				   ->setRequired(true)
                   ->addValidator('NotEmpty')
				   ->addValidator(new Zend_Validate_Between(1,15))
				   ->addValidator('Digits');
		
		$this->addElement($facilities);
		
		$finance = new Zend_Form_Element_Text('finance');
		$finance->setLabel('*Enter score for Finance category:')
				->setRequired(true)
                ->addValidator('NotEmpty')
				->addValidator(new Zend_Validate_Between(1,15))
				->addValidator('Digits');
		
		$this->addElement($finance);
		
		$faculty = new Zend_Form_Element_Text('faculty');
		$faculty->setLabel('*Enter score for Faculty category:')
				->setRequired(true)
                ->addValidator('NotEmpty')
				->addValidator(new Zend_Validate_Between(1,21))
				->addValidator('Digits');
		
		$this->addElement($faculty);
		
		$research = new Zend_Form_Element_Text('research');
		$research->setLabel('*Enter score for Research category:')
				->setRequired(true)
                ->addValidator('NotEmpty')
				->addValidator(new Zend_Validate_Between(1,32))
				->addValidator('Digits');
		
		$this->addElement($research);
			
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
    
		$this->addElement($submit);  


	}
}