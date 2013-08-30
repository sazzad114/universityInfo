<?php

class FacultyMember extends Zend_Db_Table_Abstract
{
	protected $_name = 'facultymembers';
	public function getFacultymember($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('FacultyMemberID = ' . $id);
		if (!$row)
		{
			return null;
		}
		return $row->toArray();
	}
	
	public function getTopFacultymembers()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('facultymembers',array('FacultyMemberID','Name'))
					->order('profRate DESC')
					->limit(5);
					
		$stmt = $db->query($select);
		$facultymems = $stmt->fetchAll();
		return $facultymems;
	}
	
	public function getAllFacultymembers()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('facultymembers',array('FacultyMemberID','Name','uniname','profRate'))
					->order('profRate DESC');
					
		$stmt = $db->query($select);
		$facultymems = $stmt->fetchAll();
		return $facultymems;
	}
	
	public function _getFacultymembers()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('facultymembers',array('FacultyMemberID','Name','uniname','profRate'))
					->order('profRate DESC');
					
		return $select;
	}
	
	public function getFacultymemberbyDepartment($id)
	{
		$id = (int)$id;
		$db = Zend_Db_Table::getDefaultAdapter();
		$row = $db->select()
				  ->from('facultymembers',array('FacultyMemberID','department_id','Name'))
				  ->where('department_id = ?', $id);
		$stmt = $db->query($row);
		$facultymem = $stmt->fetchAll();
		if (!$row)
		{
			return null;
		}
		return $facultymem;
	}
	
	public function getTeachersByName($name)
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
					->from('facultymembers',array('FacultyMemberID','Name','uniname','profRate'))
					->where('Name REGEXP ? ',$expression)
					->order('Name DESC');
		return $select;
	}
	
	public function UpdateRating($name,$point)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('facultymembers',array('FacultyMemberID','profRate','total_voted'))
					->where('Name = ?',$name);
		$stmt = $db->query($select);
		$members = $stmt->fetchAll();
		foreach($members as $member)
		{
			$total_point = $member['profRate']*$member['total_voted']+$point;
			$voted = $member['total_voted'] + 1;
			$rate = $total_point / $voted;
			$id = $member['FacultyMemberID'];
		}
		$data = array(
		
		'profRate' => $rate,
		'total_voted' => $voted
		);
		$this->update($data, 'FacultyMemberID = '. (int)$id);
	
	}

	public function deleteDepartment($id) //
	{
		$this->delete('department_id =' . (int)$id);
	}
}