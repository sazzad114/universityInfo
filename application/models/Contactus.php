<?php

class Contactus extends Zend_Db_Table_Abstract
{
	protected $_name = 'contactus';
	public function getMsg($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('contact_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function getMessages()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
				  ->from('contactus')
				  ->order('contact_id DESC');
		
		return $select;
	}
	
	public function addMsg($FirstName, $LastName, $email, $msg)
	{
		$data = array(
		'FirstName' => $FirstName,
		'LastName' => $LastName,
		'email' => $email,
		'contacttext' => $msg
		);
		$this->insert($data);
	}

	public function deleteMsg($id) //
	{
		$this->delete('contact_id =' . (int)$id);
	}
}