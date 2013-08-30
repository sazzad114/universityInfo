<?php
class Menu extends Zend_View_Helper_Abstract
{
	const PUBLIC_MENU = 'public';
	const CUST_MENU = 'custom';
	
	public function Menu()
	{
	}
	public function menuList($type) {
        switch ($type) {
            case self::PUBLIC_MENU:
                return $this->pubMenu();
            case self::CUST_MENU:
                return $this->customMenu();
            default:
                return null;
		}
    }
	
		
 function pubMenu()
	 {
		$resultBuffer = '<ul>';
        $menus = array(
					array(
							'text' => 'Home',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'index','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Search',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'search','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Uni rank',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'unirank','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Teacher\'s rating',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'teachrating','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'About us',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'aboutus','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Register',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'registration','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Login',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'login','action'=>'index'), 'default', true)
					),
				);
			$i = 0;
			foreach($menus as $menu)
			{
				if($i==0)
				{
					$resultBuffer .= '<li class="current_page_item">';
					
				}
				else
				{
					$resultBuffer .= '<li>';
				}
				//$resultBuffer .= '<li>';
				$i++;
				$resultBuffer .= '<a href="'. $menu['link'].'" accesskey="'. $i.'">'. $menu['text'] . '</a></li>';
				$resultBuffer .='<li>|</li>';
			}
			$resultBuffer .= '</ul>';
			return $resultBuffer;
		 
	 }
	 
	   function customMenu()
	 {
		 $resultBuffer = '<ul>';
        $menus = array(
					array(
							'text' => 'Home',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'home','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Profile',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'profile','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'News',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'news','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Search',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'search','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Uni rank',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'unirank','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Teacher\'s rating',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'teachrating','action'=>'index'), 'default', true)
					),
					array(
							'text' => 'Log out',
							'link' => Zend_View_Helper_Url::url( array ('controller' => 'login','action'=>'logout'), 'default', true)
					)
				);
			
			$i = 0;
			foreach($menus as $menu)
			{
				
				if($i==0)
				{
					$resultBuffer .= '<li class="current_page_item">';
				}
				else
				{
					$resultBuffer .= '<li>';
				}
				//$resultBuffer .= '<li>';
				$i++;
				$resultBuffer .= '<a href="'. $menu['link'].'" accesskey="'. $i.'">'. $menu['text'] . '</a></li>';
				$resultBuffer .='<li>|</li>';
			}
			$resultBuffer .= '</ul>';
			return $resultBuffer;
	 }
	
}
 
