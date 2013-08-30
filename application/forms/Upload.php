<?php
class Upload extends Zend_Form
{
	public function init()
	{
		$this->setName('upload');
	
		$element = new Zend_Form_Element_File('image');
		$element->setLabel('Upload an image:')
				->setValueDisabled(true)
				->addValidator('NotEmpty')
				->setRequired(true)
				->addValidator('Extension', false, 'jpg,png,gif')
				->setMaxFileSize(4938486)
				->setDescription('you can upload only JPG,PNG,GIF files');
	
		$this->addElement($element);
		
		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Upload');
		$this->addElement($submit);
	}
}