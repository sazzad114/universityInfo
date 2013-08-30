<?php

class NewsController extends Zend_Controller_Action
{
	

    public function init()
    {
        /* Initialize action controller here */
		
			
			
		Zend_Loader::loadClass('Menu',APPLICATION_PATH.'/views/helpers');
		Zend_Loader::loadClass('News',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('Comment',APPLICATION_PATH.'/models');
		Zend_Loader::loadClass('CommentForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('ThemeForm',APPLICATION_PATH.'/forms');
		Zend_Loader::loadClass('Themes',APPLICATION_PATH.'/models');
		$this->view->title = "Universtiyifo";
		$this->view->headTitle($this->view->title);
    }
	
	public function indexAction()
    {
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('registration/unregistered');
        }
		
		$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
		
		/*changing themes*/
		$form = new ThemeForm();
		$this->view->themeform = $form;
		
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();

			if ($form->isValid($formData))
			{
				$themename = $form->getValue('dropdown');
				Themes::setLayoutName($themename);
				$this->_redirect('news/index/page/'.$this->_getParam('page', 1));
			}	
		}
		
		$news = new News();
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
		$paginator = Zend_Paginator::factory($news->getAllnews());
		$paginator->setCurrentPageNumber($this->_getParam('page', 1));
		$paginator->setDefaultItemCountPerPage(4);
		$this->view->newsinfo = $paginator;
    }
	
	public function detailsAction()
    {
		$menu = new Menu();
		if(!Zend_Auth::getInstance()->hasIdentity())
        {
			$this->view->menu = $menu->menuList("public");
        }
		else
		{
			$this->view->menu = $menu->menuList("custom");
		}
		
		$news_id = $this->_getParam('news_id', 0);
			if ($news_id > 0)
			{
				$news = new News();
				$comment = new Comment();
				$this->view->newsinfo = $news->getNews($news_id);
				$tempcom = $comment->getComments($news_id);
				$auth = Zend_Auth::getInstance();
				$userInfo = $auth->getIdentity();
				$commenter_id = $userInfo->user_id;
				$this->view->commenter = $commenter_id; //for identifying the commenter
				$this->view->comments = $tempcom;
		
			}
		$form = new CommentForm();
		$this->view->commentform = $form;
		if ($this->getRequest()->isPost())
		{
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData))
			{
				if(!Zend_Auth::getInstance()->hasIdentity())
				{
					 $this->_redirect('registration/unregistered');
				}
				
				$comment = $form->getValue('comment');
				$auth = Zend_Auth::getInstance();
				$userInfo = $auth->getIdentity();
				$commenter_id = $userInfo->user_id;
				$commnt = new Comment();
				$commnt->addComment($news_id, $commenter_id, $comment);
		
				$this->_redirect('news/details/news_id/'.$news_id);
	
			}
		}
				
    }
	
	public function deleteAction()
	{	$menu = new Menu();
		$this->view->menu = $menu->menuList('custom');
		
		$news_id = $this->_getParam('news_id', 0);
		$comment_id = $this->_getParam('comment_id', 0);
		if($news_id > 0 && $comment_id > 0)
		{
			$comment = new Comment();
			$tempcom = $comment->deleteComment($comment_id);
			$this->_redirect('news/details/news_id/'.$news_id);	
		}
		else
		{
			$this->view->errormessage = "Error occured while deleting the comment...";
		}
	}
}