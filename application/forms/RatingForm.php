<?php
class RatingForm extends Zend_Form
{
	public function init()
	{
		$this->setName('ratingform');
		
        Zend_Loader::loadClass('FacultyMember',APPLICATION_PATH.'/models');
		$faculties = new FacultyMember();
		$members = $faculties->getAllFacultymembers();
		$array = array(''=>"");
		
		foreach ($members as $member)
		{
			$array[$member['Name']] = $member['Name'];
			
        }
		
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('Enter Teacher\'s name here:')
				 ->setMultiOptions($array);
			 
		$this->addElement($dropdown);
		
		$_post = array('12'=>'12','18'=>'18','24'=>'24','30'=>'30');
		$post= new Zend_Form_Element_Select('post');
		$post->setMultiOptions($_post)
				 ->setLabel('*Enter score for \'Post\' category:')
				 ->addValidator('NotEmpty')
				 ->setRequired(true)
				 ->addValidator('Digits');
				
		$this->addElement($post);
		
		$_experience = array('2'=>'2','4'=>'4','6'=>'6','8'=>'8','10'=>'10');
		$experience= new Zend_Form_Element_Select('experience');
		$experience->setMultiOptions($_experience)
				   ->setLabel('*Enter score for \'Teaching Experience\' category:')
				   ->addValidator('NotEmpty')
				   ->setRequired(true)
				   ->addValidator('Digits');
				
		$this->addElement($experience);
		
		$_research = array('6'=>'6','12'=>'12','18'=>'18','24'=>'24','30'=>'30');
		$research= new Zend_Form_Element_Select('research');
		$research->setMultiOptions($_research)
				   ->setLabel('*Enter score for \'Research and Publications\' category:')
				   ->addValidator('NotEmpty')
				   ->setRequired(true)
				   ->addValidator('Digits');
				
		$this->addElement($research);
		
		$_communication = array('12'=>'12','18'=>'18','24'=>'24','30'=>'30');
		$communication= new Zend_Form_Element_Select('communication');
		$communication->setMultiOptions($_communication)
				   ->setLabel('*Enter score for \'Communication with Students\' category:')
				   ->addValidator('NotEmpty')
				   ->setRequired(true)
				   ->addValidator('Digits');
				
		$this->addElement($communication);
			
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
    
		$this->addElement($submit);  


	}
}