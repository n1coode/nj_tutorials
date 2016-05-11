<?php
namespace N1coode\NjTutorials\Utility;
use N1coode\NjTutorials\Utility\Constants;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class Configuration
{
	/**
	 * @var string
	 */
	protected $nj_ext_namespace = Constants::NJ_EXT_NAMESPACE;

	/**
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public static function settings(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager)
	{
		$flexformSettingsExists = false;
		$useTypoScript = false;
		
		$frameworkConfiguration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		
		if(array_key_exists('flexform', $frameworkConfiguration['settings']))
		{
			$flexformSettingsExists = true;
		}
		
		if($flexformSettingsExists)
		{
			$flexform = $frameworkConfiguration['settings']['flexform'];

			if($flexform['settings']['general']['typoScript'] == 1)
			{
				$useTypoScript = true;
			}
			else 
			{
				if(isset($flexform['settings']['general']))
				{
					foreach($flexform['settings']['general'] as $key=>$value)
					{
						$frameworkConfiguration['settings']['general'][$key] = $value;
					}
				}
				
				if(isset($flexform['settings']['model']))
				{
					foreach($flexform['settings']['model'] as $key=>$value)
					{
						$frameworkConfiguration['settings']['model'][$key] = $value;
					}
				}
				
				if(isset($flexform['persistence']))
				{
					foreach($flexform['persistence'] as $key=>$value)
					{
						$frameworkConfiguration['persistence'][$key] = $value;
					}
				}
			}
		} //end of if 
		else
		{
			$useTypoScript = true;
		}
		
		if($useTypoScript)
		{
			//nothing todo
		}
		
		$configurationManager->setConfiguration($frameworkConfiguration);
		
	} //end of function getSetup
	
	
} //end of N1coode\NjTutorials\Utility\Configuration