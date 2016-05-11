<?php
namespace N1coode\NjTutorials\Controller;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class CategoryController extends \N1coode\NjTutorials\Controller\AbstractController
{	
	/**
	 * Initializes the controller before invoking an action method.
	 * @return void
	 */
	protected function initializeAction()
	{
		parent::init('Category');
	}
	
	
	/**
	 * @return void
	 */
	function randomAction()
	{
		$quantity = isset($this->settings["model"]["category"]["quantity"]) ? intval($this->settings["model"]["category"]["quantity"]) : 5;
		$categories = $this->categoryRepository->findRandom($quantity);
		$this->view->assign("categories",$categories);
	}
	
	
} //end of class \N1coode\NjTutorials\Controller\CategoryController
?>