<?php

class Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	public function getUser($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('user_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
public function getUserID($email)
	{
		
		$row = $this->fetchRow('email = ' ."'" .$email."'");
		if (!$row)
		{
			return null;
		}
		return $row->toArray();
	}
	
	public function getUserByName($name)
	{
		$token = strtok($name," \n\t");
		
		while ($token)
		{
			$expression .= "(";
			$expression .= "%";
			$expression .= $token;
			$expression .= "%";
			$expression .= ")";
			$expression .= "|";
			$token = strtok(" \n\t");
		}
			$expression .= "(";
			$expression .= $name;
			$expression .= ")";

		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('users',array('user_id','FirstName','LastName','email'))
					->where('FirstName REGEXP ? ',$expression)
					->orWhere('LastName REGEXP ?', $expression);
		return $select;
	}
	
	public function addUser($Fname, $Lname, $sex, $email, $password)
	{
		$data = array(
		'FirstName' => $Fname,
		'LastName' => $Lname,
		'sex' => $sex,
		'email' => $email,
		'password' => $password,
		
		);
		$this->insert($data);
	}
	public function updateName($id,$firstName,$lastName)
	{
		$data = array(
		'FirstName' => $firstName,
		'LastName' => $lastName
		);
		$this->update($data, 'user_id = '. (int)$id);
	}
	public function updatePassword($id,$password)
	{
		$data = array(
		'password' => $password,
		);
		$this->update($data, 'user_id = '. (int)$id);
	}
	
	public function deleteUser($id) //
	{
		$this->delete('user_id =' . (int)$id);
	}
}