<?php

class University extends Zend_Db_Table_Abstract
{
	protected $_name = 'university';
	
	///search functions.....
	
	public function getUni($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('university_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function getTopUni()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('university_id','uni_name'))
					->order('uni_rank DESC')
					->limit(5);
		$stmt = $db->query($select);
		$unis = $stmt->fetchAll();
		return $unis;
	}
	
	public function getUnis()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('university_id','uni_name','uni_country','uni_rank'))
					->order('uni_name');
		return $select;
	}
	
	public function getAlluniversity()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('uni_name'))
					->order('uni_name');
				
		$stmt = $db->query($select);
		$unis = $stmt->fetchAll();
		return $unis;
	}
	
	public function getUniByName($name)
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
					->from('university',array('university_id','uni_name','uni_country','uni_rank'))
					->where('uni_name REGEXP ?',$expression);
		return $select;
	}
	
	public function UpdateRank($uniname,$point)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('university_id','uni_rank','total_voted'))
					->where('uni_name = ?',$uniname);
		$stmt = $db->query($select);
		$unis = $stmt->fetchAll();
		foreach($unis as $uni)
		{
			$total_point = $uni['uni_rank']*$uni['total_voted']+$point;
			$voted = $uni['total_voted'] + 1;
			$rank = $total_point / $voted;
			$id = $uni['university_id'];
		}
		$data = array(
		
		'uni_rank' => $rank,
		'total_voted' => $voted
		);
		$this->update($data, 'university_id = '. (int)$id);
		
	}
	
	public function advancedSearch($testtype,$testscore,$cgpa)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$query = "select u.university_id,u.uni_name,u.uni_country,u.uni_rank from university as u JOIN faculty as f ON u.university_id = f.uni_id JOIN department as d ON f.faculty_id = d.faculty_id where (d.testtype = '".$testtype."')". " AND (d.testscore <=".$testscore. ")"." AND (d.cgpa_wanted <=".$cgpa.")";
		$result = $db->fetchAll($query);
		return $result;
	}
	
	public function getUniByCountry($country)
	{
		$token = strtok($country," \n\t");
		
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
			$expression .= $country;
			$expression .= ")";
			
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('university_id','uni_name','uni_country','uni_rank'))
					->where('uni_country REGEXP ?',$expression)
					->order('uni_name');
		return $select;
	}
	
	public function getUniByRank()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('university_id','uni_name','uni_country','uni_rank'))
					->order('uni_rank DESC');
	
		return $select;
	}
	
	public function getUniCountry()
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		$select = $db->select()
					->from('university',array('uni_country'))
					->group('uni_country')
					->order('uni_country');
		$stmt = $db->query($select);
		$country = $stmt->fetchAll();
		return $country;
	}

	
	
	public function addUni($name, $shortdes, $link, $country, $state,$rank)
	{
		$data = array(
		'uni_name' => $name,
		'shortdes' => $shortdes,
		'uni_link' => $link,
		'uni_country' => $country,
		'uni_state' => $state,
		'uni_rank' => $rank
		);
		$this->insert($data);
	}
	
	public function updateUni($id,$name, $shortdes, $link, $country, $state,$rank)
	{
		$data = array(
		'uni_name' => $name,
		'shortdes' => $shortdes,
		'uni_link' => $link,
		'uni_country' => $country,
		'uni_state' => $state,
		'uni_rank' => $rank
		);
		$this->update($data, 'university_id = '. (int)$id);
	}
	
	public function deleteUni($id) 
	{
		$this->delete('university_id =' . (int)$id);
	}
}