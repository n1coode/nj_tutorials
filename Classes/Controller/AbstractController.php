<?php
namespace N1coode\NjTutorials\Controller;
use N1coode\NjTutorials\Utility\Configuration;

/**
 * Abstract base controller for the extension Tx_NjTutorials
 * @author n1coode
 * @package nj_tutorials
 */
class AbstractController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * @var Integer
	 */
	protected $storagePid;

	
	/**
	 * @var string
	 */
	protected $nj_ext_key = \N1coode\NjTutorials\Utility\Constants::NJ_EXT_KEY;
	
	/**
	 * @var string
	 */
	protected $nj_ext_path = \N1coode\NjTutorials\Utility\Constants::NJ_EXT_PATH;
	
	/**
	 * @var string
	 */
	protected $nj_ext_namespace = \N1coode\NjTutorials\Utility\Constants::NJ_EXT_NAMESPACE;
	
	/**
	 * @var string
	 */
	protected $nj_domain_model = '';
	
	/**
	 * @var string
	 */
	protected  $nj_domain = '';
	
	/**
	 * @var array
	 */
	protected $nj_settings = array();
	
	
	/**
	 * @var \N1coode\NjTutorials\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository;
	
	
	/**
	 * @var \N1coode\NjTutorials\Domain\Repository\CommentRepository
	 * @inject
	 */
	protected $commentRepository;
	
	
	/**
	 * @var \N1coode\NjTutorials\Domain\Repository\TutorialRepository
	 * @inject
	 */
	protected $tutorialRepository;
	
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;
	
	/**
	 * Holds an instance of persistence manager
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;
	
	
	protected $exceptions = array();
	
	/**
	 * 
	 * @param string $model
	 */
	protected function init($model)
	{	
		if($model !== null)
		{
			$this->nj_domain_model = $model;
			$this->nj_domain = strtolower($this->nj_domain_model);
			
			$this->configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
			
			Configuration::settings($this->configurationManager);
			
			$configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
			
			$this->settings = $configuration['settings'];
			
			if(isset($this->settings['flexform'])) unset($this->settings['flexform']);
			
		} //end of if model
		else
		{
			$this->response->setContent( 'Es ist ein Fehler aufgetreten!dfg');
			throw new \N1coode\NjCollection\Exception\MissingSettingsException
				('Given method name is not a correct action name', 1283351947);
			//$this->exceptions['nomodel'] = '1';
			//throw Exception('Please include typoscript to enable the extension.', 48246892768209576 );
			//$this->response->appendContent( 'Es ist ein Fehler aufgetreten!');
			//throw new \TYPO3\CMS\Extbase\Configuration\Exception('Please include typoscript to enable the extension.', 48246892768209576 );
		}
		
		//if(!isset($this->settings))
		//	throw new \TYPO3\CMS\Extbase\Configuration\Exception('Please include typoscript to enable the extension.', 48246892768209576 );
		
		
		//$this->storagePid = intval($configuration['persistence']['storagePid']);
		
		$this->includeJavaScript();
	}

	
	protected function callActionMethod() 
	{
  		try 
  		{
			parent::callActionMethod();
		} 
		catch(\TYPO3\CMS\Fluid\Core\ViewHelper\Exception $exception) 
		{
			throw new
			\TYPO3\CMS\Fluid\Core\ViewHelper\Exception($exception->getMessage());
		}
	}
	
// 	/**
// 	 * @return void
// 	 * @override \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
// 	 * @throws \N1coode\NjCollection\Exception\MissingSettingsException
// 	 */
// 	protected function callActionMethod() {
// 		try 
// 		{
// 			parent::callActionMethod();
// 		}
// 		catch(\Exception $exception) {
// 			// This enables you to trigger the call of TYPO3s page-not-found handler by throwing \TYPO3\CMS\Core\Error\Http\PageNotFoundException
// 			if ($exception instanceof \TYPO3\CMS\Core\Error\Http\PageNotFoundException) {
// 				$GLOBALS['TSFE']->pageNotFoundAndExit($this->entityNotFoundMessage);
// 			}
	
// 			// $GLOBALS['TSFE']->pageNotFoundAndExit has not been called, so the exception is of unknown type.
// 			//\VendorName\ExtensionName\Logger\ExceptionLogger::log($exception, $this->request->getControllerExtensionKey(), \VendorName\ExtensionName\Logger\ExceptionLogger::SEVERITY_FATAL_ERROR);
// 			// If the plugin is configured to do so, we call the page-unavailable handler.
// 			if (isset($this->settings['usePageUnavailableHandler']) && $this->settings['usePageUnavailableHandler']) {
// 				$GLOBALS['TSFE']->pageUnavailableAndExit($this->unknownErrorMessage, 'HTTP/1.1 500 Internal Server Error');
// 			}
// 			// Else we append the error message to the response. This causes the error message to be displayed inside the normal page layout. WARNING: the plugins output may gets cached.
// 			if ($this->response instanceof \TYPO3\CMS\Extbase\Mvc\Web\Response) {
// 				$this->response->setStatus(500);
// 			}
// 			$this->response->appendContent($this->unknownErrorMessage);
// 		}
// 	}
	/**
	 * @param \String $controller
	 * @param \String $action
	 * @param \String $format
	 * @return \TYPO3\CMS\Fluid\View\StandaloneView
	 */
	protected function initViewAjax($controller, $action, $format)
	{
		$view = $this->objectManager->create('TYPO3\CMS\Fluid\View\StandaloneView');
		$view->setFormat($format);
		$view->setTemplatePathAndFilename(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:'.$this->nj_ext_path.'/Resources/Private/Templates/'.$controller.'/'.ucfirst($action).'.'.$format));
		$view->setPartialRootPath(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:'.$this->nj_ext_path.'/Resources/Private/Partials/'));
		$view->setLayoutRootPath(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:'.$this->nj_ext_path.'/Resources/Private/Layouts/'));
		
		return $view;
	}
	
	
	private function includeJavaScript()
	{
		if($this->settings['general']['includeJQuery'])
		{
			//$GLOBALS['TSFE']->getPageRenderer()
			//	->addJsLibrary(
			//		'jQuery_'.$nj_ext_namespace,
			//		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Javascript/jquery-1.11.2.min.js');
		}
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TSFE']);
		//$GLOBALS['TSFE']->getTmpl();
		//$this->getPageRenderer()
		//	->addJsFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->nj_ext_path) . 'Resources/Public/Javascript/frontend.js');
	
	}
	
	private function includeCss()
	{
		//TODO
	}
	
	private function setNjSettings()
	{
	
	}
	
	protected function getConfiguration()
	{
		$this->configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		return  $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
	}

	protected function getCaller() 
	{
		$trace = debug_backtrace();
		$name = $trace[2]['function'];
		return empty($name) ? 'global' : $name;
	}
	
	
	protected function setExtSettings()
	{
		$extSettings = [];
		$extSettings['action']						= explode('Action',self::getCaller())[0];
		$extSettings['typeNum']						= $this->settings['general']['ajax']['typeNum'];
		//$extSettings['ajax']['path']['partial']		= $this->settings['view']['partialRootPath'];
		//$extSettings['ajax']['path']['template']	= $this->settings['view']['templateRootPath'];
		$extSettings['controller']					= $this->nj_domain_model;		
		$extSettings['domain']						= $this->nj_domain;
		$extSettings['key']							= $this->nj_ext_key;
		$extSettings['langFile']					= 'LLL:EXT:'.$this->nj_ext_path.'/Resources/Private/Language/locallang.xlf:';
		$extSettings['language']					= $GLOBALS['TSFE']->sys_language_uid;
		$extSettings['name']						= strtolower($this->nj_ext_namespace);
		$extSettings['pageId']						= $GLOBALS['TSFE']->page['uid'];

		
		return $extSettings;
	}
	
	
	/**
	 * Provides a shared (singleton) instance of PageRenderer
	 *
	 * @return \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected function getPageRenderer() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
	}
	
	
	protected function getExtSettings()
	{
		$extSettings = [];
		$extSettings['key']			= $this->nj_ext_key;
		$extSettings['name']		= strtolower($this->nj_ext_namespace);
		$extSettings['controller']	= $this->nj_domain_model;		
		$extSettings['domain']		= $this->nj_domain;
		$extSettings['action']		= explode('Action',self::getCaller())[0];
		$extSettings['langFile']	= 'LLL:EXT:'.$this->nj_ext_path.'/Resources/Private/Language/locallang.xlf:';
		$extSettings['language']	= $GLOBALS['TSFE']->sys_language_uid;
		
		return $extSettings;
	}
	
	
} //end of class N1coode\NjTutorials\Controller\AbstractController
?>