<?php
class CommentForm extends Zend_Form
{
	public function init()
	{
		$this->setName('comment');
		

		$comment = $this->createElement('textarea','comment', array('label' => 'Comment', 'rows' => '3'));
        $comment->setLabel('*Enter your comment here:')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('register_submit');
        $submit->setLabel('submit');
    
      $this->addElements(array($comment, $submit));  
	}
}