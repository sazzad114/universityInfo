<?php

class News extends Zend_Db_Table_Abstract
{
	protected $_name = 'news';
	public function getNews($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('news_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function getAllnews()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('news_id','title'))
					->order('news_id DESC');
		return $select;
	}
	
	public function getTopnews()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('news_id','title','shortnews','publish_time','added_by'))
					->order('publish_time DESC')
					->limit(5);
		$stmt = $db->query($select);
		$news = $stmt->fetchAll();
		return $news;
	}
	
	public function getTopnewsSide()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('news_id','title'))
					->order('publish_time DESC')
					->limit(5);
		$stmt = $db->query($select);
		$news = $stmt->fetchAll();
		return $news;
	}
	
	public function getShortNews()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('news_id','title','shortnews','publish_time','added_by'))
					->where('news_id > ?','0')
					->order('publish_time DESC');
		
		return $select;
	}
	
	public function getNewsbyYear($year)
	{
		$lowerlimit = $year.'-01-01 00:00:00';
		$upperlimit = $year.'-12-31 00:00:00';
		
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('news_id','title'))
					->where('publish_time >= ?',$lowerlimit)
					->where('publish_time <= ?',$upperlimit)
					->order('publish_time');
	
		return $select;
	}
	
	public function getNewsYear()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('news',array('year'=>'YEAR(publish_time)'))
					->group('YEAR(publish_time)')
					->order('publish_time');
				
		$stmt = $db->query($select);
		$news = $stmt->fetchAll();
		return $news;
	}
	
	public function addNews($title,$shortnews,$detailnews,$publish_time,$added_by)
	{
		$data = array(
		'title' => $title,
		'shortnews' => $shortnews,
		'detailnews' => $detailnews,
		'publish_time' => $publish_time,
		'added_by' => $added_by,
		
		);
		$this->insert($data);
	}

	public function deleteNews($id)
	{
		$this->delete('news_id =' . (int)$id);
	}
}