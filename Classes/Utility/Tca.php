<?php
namespace N1coode\NjTutorials\Utility;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class Tca
{
	public function getL18nParent($config)
	{	
		$optionList = array();
		
		if($config['row']['l18n_parent'] > 0)
		{
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'uid,title',
				$config['table'],
				'pid IN ('.$config['row']['pid'].') AND uid IN ('.$config['row']['l18n_parent'].')',
				'',
				'',
				''
			);
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))
			{
				$optionList[] = array(0 => $row['title'], 1 => $row['uid']);
			}
		}

		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'uid,title',
				$config['table'],
				'pid IN ('.$config['row']['pid'].') AND sys_language_uid IN (0,-1)',
				'',
				'',
				''
		);
		
		$items = array();
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) 
		{
			$items[] = array('title' => $row['title'], 'uid' => $row['uid']);
		}
		
		foreach($items as $item)
		{
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'uid',
				$config['table'],
				'pid IN ('.$config['row']['pid'].') AND l18n_parent IN ('.$item['uid'].')',
				'',
				'',
				''
			);
			
			if($GLOBALS['TYPO3_DB']->sql_num_rows($res) < 1)
			{
				$optionList[] = array(0 => $item['title'], 1 => $item['uid']);
			}
		}
		$config['items'] = array_merge($config['items'], $optionList);
        return $config;
	
	} //end of function getL18nParent
	
	 public function infoText($PA, $fObj)
	 {
	 	$formField  =	'<div class="typo3-message message-information">';
	 	$formField .= 	\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($PA['parameters']['text'], 'nj_travelsolutions');
	 	$formField .=	'</div>';
	 	
	 	return $formField;
	 	
	 } //end of function infoText
	 
	 
	 public function isMultiLingual($PA, $fObj) 
	 {
	 	$tmp = 0;
	 	
	 	$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
	 			'uid',
	 			'sys_language',
	 			'hidden IN (0)',
	 			'',
	 			'',
	 			''
	 	);
        
	 	if($GLOBALS['TYPO3_DB']->sql_num_rows($res) > 0) $tmp = 1;
	 	
        return $tmp;
	}
	
	
	public function getCodeLanguages($config)
	{
		$enabledLangStr = '';
		$enabledLangArr = array();
		$rejectLanguages = FALSE;
		
		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['nj_tutorials']);
		
		if(isset($extConf['codeLangEnabled']))
		{
			$enabledLangStr = $extConf['codeLangEnabled'];
			
			if($enabledLangStr !== '')
			{
				if(strpos($enabledLangStr, '*') === FALSE)
				{
					$rejectLanguages = TRUE;
					$enabledLangArr = explode(',',$enabledLangStr);
				}
			}
		}
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($enabledLangArr);
		$langTmp = array();
		 
		try 
		{
			$geshi = new \N1coode\NjTutorials\Lib\GeSHi\GeSHi();
			$langList = $geshi->get_supported_languages(TRUE);
	
			foreach($langList as $langKey => $langName) 
			{
				$add = FALSE;
				if($rejectLanguages === TRUE)
				{
					if(in_array(strtolower($langKey), $enabledLangArr))
					{
						$add = TRUE;
					}
				}
				else 
				{
					$add = TRUE;
				}
				if($add) $langTmp[ucfirst($langName)] = array(0 => $langName, 1 => $langKey);
			}
		}
		catch(Exception $e)
		{
			$config['items'] = array(0 => 'Error Itemproc', 1 => 'Error');
		}
		
		//array_multisort($jahrgang, SORT_DESC, $nachname, SORT_ASC, SORT_STRING, $config);
		
		ksort($langTmp);
		foreach($langTmp as $key => $value)
		{
			$config['items'][] = $value;
		}
		
		//$config['items']
		
		return ksort($config);
	}
	 
} //end of class Tca

?>