<?php

class Profile extends Zend_Db_Table_Abstract
{
	protected $_name = 'profile';
	public function getProfile($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('profile_id = ' . $id);
		if (!$row)
		{
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}
	
	public function addProfile($id)
	{
		$data = array(
		'profile_id' => $id,
		'Dateofbirth' => null,
		'age' => null,
		'religion' => null,
		'country' => null,
		'state' => null,
		'city' => null,
		'undergradeUni' => null,
		'undergradeSub' => null,
		'ugcgpa' => null,
		'ugpassyear' => null,
		'gradeUni' => null,
		'gradeSub' => null,
		'gpassyear' =>null,
		'test' => null,
		'testpassdate' => null,
		'testscore' => null,
		);
		$this->insert($data);
	}
	
	public function updateProfile($id,$birth,$age,$religion,$country,$state,$city,$ugu,$ugs,$ugc,$ugy,$gu,$gs,$gy,$tst,$tsty,$tsts)
	{
		$data = array(
		'Dateofbirth' => $birth,
		'age' => $age,
		'religion' => $religion,
		'country' => $country,
		'state' => $state,
		'city' => $city,
		'undergradeUni' => $ugu,
		'undergradeSub' => $ugs,
		'ugcgpa' => $ugc,
		'ugpassyear' => $ugy,
		'gradeUni' => $gu,
		'gradeSub' => $gs,
		'gpassyear' => $gy,
		'test' => $tst,
		'testpassdate' => $tsty,
		'testscore' => $tsts
		);
		$this->update($data, 'profile_id = '. (int)$id);
	}
	
	public function deleteProfile($id) //
	{
		$this->delete('profile_id ='.(int)$id);
	}
}