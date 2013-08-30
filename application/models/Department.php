<?php

class Department extends Zend_Db_Table_Abstract
{
	protected $_name = 'department';
	public function getDepartment($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('department_id = ' . $id);
		if (!$row)
		{
			return null;
		}
		return $row->toArray();
	}
	
	public function getDepartmentbyFaculty($id)
	{
		$id = (int)$id;
		$db = Zend_Db_Table::getDefaultAdapter();
		$row = $db->select()
				  ->from('department',array('department_id','faculty_id','departmentname'))
				  ->where('faculty_id = ?', $id);
		$stmt = $db->query($row);
		$dept = $stmt->fetchAll();
		if (!$row)
		{
			return null;
		}
		return $dept;
	}
	
	/*public function addComment($news_id, $commenter_id, $commenttext)
	{
		$data = array(
		'news_id' => $news_id,
		'commenter_id' => $commenter_id,
		'commenttext' => $commenttext
		);
		$this->insert($data);
	}*/

	public function deleteDepartment($id) //
	{
		$this->delete('department_id =' . (int)$id);
	}
}