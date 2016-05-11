<?php
namespace N1coode\NjTutorials\Utility;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class Service
{
	
	/**
	 * Gets the TS-Setup
	 *
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 * @param string $model
	 * @return array
	 */
	public static function getTsSetup(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager, $model)
	{
		$settings = array();
		
		$flexformSettingsExists = false;
		$useTypoScript = false;
		
		$frameworkConfiguration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		
		$settings = $frameworkConfiguration['settings'];
		
		if(array_key_exists('flexform', $settings))
		{
			$flexformSettingsExists = true;
		}
		
		if($flexformSettingsExists)
		{
			if($settings['flexform']['general']['typoScript'] == 1)
			{
				$useTypoScript = true;
			}
			else
			{
				$settings = $settings['flexform'];
			}
		}
		else
		{
			$useTypoScript = true;
		}
		
		return $settings;
	}
	
} //end of class N1coode\NjTutorials\Utility\Service
?>