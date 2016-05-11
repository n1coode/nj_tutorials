<?php
namespace N1coode\NjTutorials\Domain\Repository;
use N1coode\NjTutorials\Utility\Service;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 * @inject
	 */
	protected $configurationManager;
	
	protected $defaultOrderings = array(
		'crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	);

	/**
	 *
	 * @param string $model
	 * @throws Exception
	 */
	protected function init($model)
	{
		$this->configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		
		$tsSettings = Service::getTsSetup($this->configurationManager, $model);
		$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
		$querySettings->setRespectStoragePage(TRUE);
		$querySettings->setStoragePageIds(array($tsSettings['persistence']['storagePid']));
		$querySettings->setRespectSysLanguage(TRUE);
		if($model == 'TutorialItem') 
		{
			$querySettings->setRespectSysLanguage(FALSE);
			$this->defaultOrderings = array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
		}
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($model . ',' . $querySettings->getRespectSysLanguage());
		$this->setDefaultQuerySettings($querySettings);
	}
	

} //end of class N1coode\NjTutorials\Domain\Repository\AbstractRepository
?>