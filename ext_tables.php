<?php 
if(!defined('TYPO3_MODE')) die ('Access denied.');

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';
		
/**
 * Add extension key here
 */

$nj_ext_key			= 'tx_njtutorials';
$nj_ext_namespace	= 'NjTutorials';
$nj_ext_path		= 'nj_tutorials';
$nj_ext_title		= 'njs Tutorials';

$nj_ext_lang_file	= 'LLL:EXT:nj_tutorials/Resources/Private/Language/locallang_db.xlf:';

/**
 * Registers a Plugin to be listed in the Backend. You also have to configure the Dispatcher in ext_localconf.php.
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	$nj_ext_lang_file.'plugin.title'
);


/**
 * TypoScript
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', $nj_ext_title.' setup');


/**
 * Flexform
 */
// Clean up the Flexform fields in the backend a bit
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,splash_layout';
// Add own flexform stuff.
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_'.$nj_ext_key.'.xml');


/**
 * Tables
 */
$nj_domain_model = 'Tutorial';
$nj_domain = strtolower($nj_domain_model);

$GLOBALS['TCA'][$nj_ext_key.'_domain_model_'.$nj_domain]['ctrl']['hideTable'] = FALSE;


/**
 * Tutorial
 */
$nj_domain_model = 'Tutorial';
$nj_domain = strtolower($nj_domain_model);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr($nj_ext_key.'_domain_model_'.$nj_domain, 'EXT:'.$nj_ext_path.'/Resources/Private/Language/locallang_csh_'.$nj_ext_key.'_domain_model_'.$nj_domain.'.xml');
$GLOBALS['TCA'][$nj_ext_key.'_domain_model_'.$nj_domain]['ctrl']['hideTable'] = FALSE;

//$extensionUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('N1coode\\NjCollection\\Utility\\Comments');
//$extensionUtility->addTab($nj_ext_key.'_domain_model_'.$nj_domain);


/**
 * include pageTSconfig
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$nj_ext_path.'/Configuration/TypoScript/pageTsConfig.ts">');
?>