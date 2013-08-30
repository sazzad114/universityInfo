<?php
class EditProfile extends Zend_Form
{
	public function init()
	{
		$this->setName('editprofile');
		
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('*First name:')
                  ->setRequired(true)
				  ->addValidator('Alnum')
                  ->addValidator('NotEmpty');
		
		$this->addElement($firstName);
		
        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('*Last name:')
                 ->setRequired(true)
				 ->addValidator('Alnum')
                 ->addValidator('NotEmpty');
        
		$this->addElement( $lastName);
				 
		$birthdate = new Zend_Form_Element_Text('Dateofbirth');
		$birthdate->setLabel('*Date of birth:')
				->setDescription('YYYY-MM-DD format')
                 ->setRequired(true)
                 ->addValidator('NotEmpty')
				 ->addValidator(new Zend_Validate_Between('1971-12-16','1994-12-16'))
				->addValidator('Date');
		
		$this->addElement($birthdate);
			
		$age = new Zend_Form_Element_Text('age');
		$age->setLabel('*Age:')
                 ->setRequired(true)
                 ->addValidator('NotEmpty')
				->addValidator(new Zend_Validate_Between(16,50))
				->addValidator('Digits');
		
		$this->addElement($age);
			
		$religion = new Zend_Form_Element_Text('religion');
		$religion->setLabel('*Religion:')
                 ->setRequired(true)
                 ->addValidator('NotEmpty')
				->addValidator('Alnum');
		
		$this->addElement($religion);
		
		$country = new Zend_Form_Element_Text('country');
		$country->setLabel('*Country:')
                 ->setRequired(true)
				  ->addValidator(new Zend_Validate_Alpha(true))
                 ->addValidator('NotEmpty');
			
		
		$this->addElement($country);
		
		$state = new Zend_Form_Element_Text('state');
		$state->setLabel('*State:')
                 ->setRequired(true)
				  ->addValidator(new Zend_Validate_Alpha(true))
                 ->addValidator('NotEmpty');
				
		
		$this->addElement($state);

		$city = new Zend_Form_Element_Text('city');
		$city->setLabel('*City:')
                 ->setRequired(true)
				  ->addValidator(new Zend_Validate_Alpha(true))
                 ->addValidator('NotEmpty');
				
		
		$this->addElement($city);
		
		$ugu = new Zend_Form_Element_Text('undergradeUni');
		$ugu->setLabel('*Under-graduation Institution:')
                 ->setRequired(true)
				  ->addValidator(new Zend_Validate_Alpha(true))
                 ->addValidator('NotEmpty');
			
		
		$this->addElement($ugu);
		
		$ugs = new Zend_Form_Element_Text('undergradeSub');
		$ugs->setLabel('*Under-graduation Subject:')
                 ->setRequired(true)
				  ->addValidator(new Zend_Validate_Alpha(true))
                 ->addValidator('NotEmpty');
				
		
		$this->addElement($ugs);
		
		$ugc = new Zend_Form_Element_Text('ugcgpa');
		$ugc->setLabel('*Under-graduation CGPA:')
                 ->setRequired(true)
				 ->addValidator(new Zend_Validate_Between(2,4))
                 ->addValidator('NotEmpty')
				->addValidator('Float');
		
		$this->addElement($ugc);
		
		$ugy = new Zend_Form_Element_Text('ugpassyear');
		$ugy->setLabel('*Under-graduation Passing Year:')
                 ->setRequired(true)
                 ->addValidator('NotEmpty')
				->addValidator('Digits');
		
		$this->addElement($ugy);
		
		$gu = new Zend_Form_Element_Text('gradeUni');
		$gu->setLabel('Graduation Institution:')
		   ->addValidator(new Zend_Validate_Alpha(true));
				
		
		$this->addElement($gu);
		
		$gs = new Zend_Form_Element_Text('gradeSub');
		$gs->setLabel('Graduation Subject:')
				->addValidator(new Zend_Validate_Alpha(true));
		
		$this->addElement($gs);
		
		$gy = new Zend_Form_Element_Text('gpassyear');
		$gy->setLabel('Graduation Passing Year:')
				->addValidator('Digits');
		
		$this->addElement($gy);
		
		$dropdown= new Zend_Form_Element_Select('test');
		$dropdown->setLabel('*Enter your test type here:')
				 ->setMultiOptions(array('GRE'=>'GRE','GMAT'=>'GMAT','IELTS'=>'IELTS','TOEFL'=>'TOEFL','SAT'=>'SAT'));
		$this->addElement($dropdown);
		
				$max = 0;
				$min = 0;
				if($_POST['test'] == 'GRE')
				{
					$min = 400;
					$max = 1600;
				}
				else if($_POST['test'] == 'GMAT')
				{
					$min = 200;
					$max = 800;
				}
				else if($_POST['test'] == 'IELTS')
				{
					$min = 1;
					$max = 9;
				}
				else if($_POST['test'] == 'TOEFL')
				{
					$min = 0;
					$max = 300;
				}
				else
				{
					$min = 600;
					$max = 2400;
				}
		
		$score = new Zend_Form_Element_Text('testscore');
        $score->setLabel('*Enter your test Score here:')
                  ->setRequired(true)
				  ->addValidator('Float')
				  ->addValidator(new Zend_Validate_Between($min,$max))
                  ->addValidator('NotEmpty');
			  
		$this->addElement($score);
		
		$tsty = new Zend_Form_Element_Text('testpassdate');
		$tsty->setLabel('*Test passing Date:')
			 ->setRequired(true)
			 ->setDescription('YYYY-MM-DD format')
			 ->addValidator(new Zend_Validate_Between('1971-12-16','2010-12-16'))
			 ->addValidator('Date');
		
		$this->addElement($tsty);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('update');
    
        $this->addElement($submit);  


	}
}