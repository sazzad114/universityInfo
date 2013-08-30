<?php
class AdvancedSrch extends Zend_Form
{
	public function init()
	{
		$this->setName('advancedsrch');
		
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('Enter your test type here:')
				 ->setMultiOptions(array('GRE','GMAT','IELTS','TOEFL','SAT'));
		$this->addElement($dropdown);
		
				$max = 0;
				$min = 0;
				if($_POST['dropdown'] == 0)
				{
					$min = 400;
					$max = 1600;
				}
				else if($_POST['dropdown'] == 1)
				{
					$min = 200;
					$max = 800;
				}
				else if($_POST['dropdown'] == 2)
				{
					$min = 1;
					$max = 9;
				}
				else if($_POST['dropdown'] == 3)
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
        $score->setLabel('Enter your test Score here:')
                  ->setRequired(true)
				  ->addValidator('Float')
				  ->addValidator(new Zend_Validate_Between($min,$max))
                  ->addValidator('NotEmpty');
	  
		$this->addElement($score);
		
		$cgpa = new Zend_Form_Element_Text('cgpa');
        $cgpa->setLabel('Enter Cgpa:')
                  ->setRequired(true)
				  ->addValidator('Float')
				  ->addValidator(new Zend_Validate_Between(2,4))
                  ->addValidator('NotEmpty');
	  
		$this->addElement($cgpa);
		  
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Search');
    
      $this->addElement($submit);
	  
	}
}