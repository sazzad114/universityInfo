<?php

class Comment extends Zend_Db_Table_Abstract
{
	protected $_name = 'comment';
	public function getComment($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('comment_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function getNewsID($id)
	{
		$id = (int)$id;
		$db = Zend_Db_Table::getDefaultAdapter();
		$row = $db->select()
				  ->from('comment',array('news_id'))
				  ->where('comment_id = ?', $id);
		$stmt = $db->query($row);
		$comments = $stmt->fetchAll();
		if (!$row)
		{
			return null;
		}
		return $comments;
	}
	
	public function getComments($id)
	{
		$id = (int)$id;
		$db = Zend_Db_Table::getDefaultAdapter();
		$row = $db->select()
				  ->from('comment')
				  ->where('news_id = ?', $id);
		$stmt = $db->query($row);
		$comments = $stmt->fetchAll();
		if (!$row)
		{
			return null;
		}
		return $comments;
	}
	
	public function addComment($news_id, $commenter_id, $commenttext)
	{
		$data = array(
		'news_id' => $news_id,
		'commenter_id' => $commenter_id,
		'commenttext' => $commenttext
		);
		$this->insert($data);
	}

	public function deleteComment($id) //
	{
		$this->delete('comment_id =' . (int)$id);
	}
}