<?php
class SideBar extends Zend_View_Helper_Abstract
{
	public static function TopNews()
	{
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		$newsclass = new News();
		$newslist = $newsclass->getTopnewsSide();
		$newsMenu = "";
		
		$links = array(null);
		foreach($newslist as $news)
		{	
			array_push($links, array('text' => $news['title'],'link' => Zend_View_Helper_Url::url( array ('controller' => 'news','action'=>'details','news_id'=>$news['news_id'])))); 
		}
		
		foreach($links as $link)
		{	
			if($link != null)
			{
				$newsMenu .= '<li><a href="'.$link['link'].'">'. $link['text'] . '</a></li>';
			}
		}
		
		return $newsMenu;
	}
	
	public static function TopUniversity()
	{
		Zend_Loader::loadClass('University',APPLICATION_PATH.'/models');
		$univ = new University();
		$unis = $univ->getTopUni();
		$uniMenu = "";
		
		$links = array(null);
		foreach($unis as $uni)
		{	
			array_push($links, array('text' => $uni['uni_name'],'link' => Zend_View_Helper_Url::url( array ('controller' => 'university','action'=>'unidetails','uni_id'=>$uni['university_id'])))); 
		}
		
		foreach($links as $link)
		{	
			if($link != null)
			{
				$uniMenu .= '<li><a href="'.$link['link'].'">'. $link['text'] . '</a></li>';
			}
		}
		
		return $uniMenu;
	}
	
	public static function TopProf()
	{
		Zend_Loader::loadClass('FacultyMember',APPLICATION_PATH.'/models');
		$faulties = new FacultyMember();
		$profs = $faulties->getTopFacultymembers();
		$profMenu = "";
		
		$links = array(null);
		foreach($profs as $prof)
		{	
			array_push($links, array('text' => $prof['Name'],'link' => Zend_View_Helper_Url::url( array ('controller' => 'facultymember','action'=>'details','facultymember_id'=>$prof['FacultyMemberID'])))); 
		}
		
		foreach($links as $link)
		{	
			if($link != null)
			{
				$profMenu .= '<li><a href="'.$link['link'].'">'. $link['text'] . '</a></li>';
			}
		}
		
		return $profMenu;
	}
	
	
}

?>


