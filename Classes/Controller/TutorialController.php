<?php
namespace N1coode\NjTutorials\Controller;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class TutorialController extends \N1coode\NjTutorials\Controller\AbstractController
{	
	/**
	 * @var boolean
	 */
	protected $useCategory = false;
	
	
	/**
	 * @var int
	 */
	protected $category = 0;
	
	/**
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Tutorial>
	 */
	protected $tutorials;
	
	
	
	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction()
	{
		$this->nj_domain_model = "Tutorial";
		$this->nj_domain = strtolower($this->nj_domain_model);
		
		parent::init($this->nj_domain_model);
	}
	
	
	/**
	 * Displays a single tutorial, depending to a given uid.
	 *
	 * @param \N1coode\NjTutorials\Domain\Model\Tutorial $tutorial The tutorial to display
	 * @return void
	 */
	public function focusAction(\N1coode\NjTutorials\Domain\Model\Tutorial $tutorial = NULL)
	{
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->arguments->getArgument('tutorial'));
		$this->initialize();
		
		
		$assignedValues = array(
			'settings' => $this->settings,
			'tutorial' => $tutorial,
		);
		
		if($tutorial !== NULL)
		{
			if((integer)$tutorial->getCommentsEnable() > 0)
			{
				if((integer)$tutorial->getComments() > 0)
				{
					$assignedValues['comments'] = $this->commentRepository->findMatchingForeignTableAndForeignUid($this->nj_ext_key.'_domain_model_'.$this->nj_domain, (integer)$tutorial->getUid());
				}
			}
		}
		
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->nj_ext_key.'_domain_model_'.$this->nj_domain);
		
		$this->view->assignMultiple($assignedValues);
		
		
	} //end of function focusAction
	
	
	
	public function digestAction()
	{
		$assignValues = [];
		$assignValues['ext'] = parent::setExtSettings();
		
		$collection = $this->tutorialRepository->findLatest();
		
		$assignValues['latestTutorials'] = $collection;
		
		$this->view->assignMultiple($assignValues);
		
	}
	
	
	/**
	 * Index action for this controller.
	 *
	 * @return void
	 */
	public function indexAction()
	{
		$test = $this->tutorialRepository->findAllInLimit(5);
		$this->view->assign('test', $test);
		
		$tutorials = $this->tutorialRepository->findAll();
		
		//$tutorials = $this->tutorialRepository->findAll();
		//$this->view->assign('settings', $this->settings['model']['slider']);
		$this->view->assign('tutorials', $tutorials);
	}
	
	
	/**
	 * List action for this controller
	 * 
	 * @return void
	 */
	public function listAction()
	{
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

		if(isset($this->settings['model'][$this->nj_domain]['useCategory']))
		{
			if($this->settings['model'][$this->nj_domain]['useCategory'] > 0)
			{
				$this->useCategory = true;
				
				if(isset($this->settings['model'][$this->nj_domain]['category']))
				{
					$this->category = $this->settings['model'][$this->nj_domain]['category'];
				}
				else 
				{
					throw new \N1coode\NjCollection\Exception\MissingSettingsException
					('Given method name is not a correct action name', 1283351947);
				}
			}
		}
		
		if($this->useCategory)
		{
			$tutorials = $this->tutorialRepository->findAllByCategory($this->category);
		}
		else
		{
			$tutorials = $this->tutorialRepository->findAll();
		}

		if(count($tutorials) > 0)
		{
			$this->view->assign('tutorials',$tutorials);
		}
		else
		{
			$this->view->assign('message', 'Bisher keine Beitraege in dieser Kategorie vorhanden.');
		}		
		
		$ext = array();
		$ext['key'] 		= $this->nj_ext_key;
		$ext['name']		= strtolower($this->nj_ext_namespace);
		$ext['domain']		= $this->nj_domain;
		$ext['action']		= explode('Action',__FUNCTION__)[0];
		$ext['controller']	= $nj_domain_model;
		$this->view->assign('ext',$ext);
	}
	
	
	/**
	 * @return void
	 */
	public function latestAction()
	{
		$assignValues = [];
		$extSettings = $this->getExtSettings();
		$assignValues['ext'] = $extSettings;
		
		$tutorials = $this->tutorialRepository->findAllInLimit(5);
		$assignValues['tutorials'] = $tutorials;
		
		$this->view->assignMultiple($assignValues);
	}
	
	
	
	/**
	 * @return void
	 */
	public function teaserAction()
	{
		$assignValues = [];
		$extSettings = $this->getExtSettings();
		$assignValues['ext'] =$extSettings;
		
		$categoryId = $this->settings['model'][$this->nj_domain]['teaser']['category'];
		$subCategories = $this->categoryRepository->findByMainCategory($categoryId);
		
		if(count($subCategories) > 0)
		{
			$tutorials = [];
			foreach($subCategories as $subCategory)
			{
				$results = $this->tutorialRepository->findByCategory($subCategory);
				foreach($results as $result)
				{
					array_push($tutorials,$result);
				}
			}
		}
		else
		{
			$tutorials = $this->tutorialRepository->findByCategory($categoryId)->toArray();
		}
		
		
		$category = $this->categoryRepository->findByUid($categoryId);
		
		
			$assignValues['category'] = $category;
			$assignValues['tutorials'] = $tutorials;
		
		$this->view->assignMultiple($assignValues);
	}
	
	protected function initialize()
	{
		$ext = [];
		$ext['key']			= $this->nj_ext_key;
		$ext['name']		= strtolower($this->nj_ext_namespace);
		$ext['controller']	= $this->nj_domain_model;		
		$ext['domain']		= $this->nj_domain;
		$ext['action']		= explode('Action',parent::getCaller())[0];
		
		$this->settings['ext'] = $ext;
	}
	 
} //end of class N1coode\NjTutorials\Controller\TutorialController