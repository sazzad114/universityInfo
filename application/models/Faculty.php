<?php

class Faculty extends Zend_Db_Table_Abstract
{
	protected $_name = 'faculty';
	public function getFaculty($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('faculty_id = ' . $id);
		if (!$row)
		{
			return null;
		}
		return $row->toArray();
	}
	
	public function getFacultybyUni($id)
	{
		$id = (int)$id;
		$db = Zend_Db_Table::getDefaultAdapter();
		$row = $db->select()
				  ->from('faculty',array('faculty_id','uni_id','faculty_name'))
				  ->where('uni_id = ?', $id);
		$stmt = $db->query($row);
		$faculties = $stmt->fetchAll();
		if (!$row)
		{
			return null;
		}
		return $faculties;
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

	public function deleteFaculty($id) //
	{
		$this->delete('faculty_id =' . (int)$id);
	}
}