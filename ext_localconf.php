<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY] = unserialize($_EXTCONF);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'N1coode.'.$_EXTKEY,
	'Pi1',
		array(
			'Category' => 'random',
			'Tutorial' => 'focus, index, latest, list, listAjax,teaser'
		),
		// non-cacheable actions
		array(
			'Category' => 'random',
			'Tutorial' => 'focus, index, latest, list, listAjax,teaser'
		)
);
?>