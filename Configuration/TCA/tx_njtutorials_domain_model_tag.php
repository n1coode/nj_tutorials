<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
use N1coode\NjTutorials\Utility\Constants as Constants;

$nj_ext_key			= Constants::NJ_EXT_KEY;
$nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
$nj_ext_path		= Constants::NJ_EXT_PATH;
$nj_ext_title		= Constants::NJ_EXT_TITLE;

$nj_ext_lang_file			= Constants::NJ_EXT_LANG_FILE_BACKEND;
$nj_collection_lang_file	= 'LLL:EXT:nj_collection/Resources/Private/Language/locallang_db.xlf:';


$nj_domain_model = 'Tag';
$nj_domain = strtolower($nj_domain_model);

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title ASC',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($nj_ext_path) . 'Resources/Public/Icons/' . $nj_ext_key . '_domain_model_' . $nj_domain . '.svg',
		'label' => 'title',
		'languageField' => 'sys_language_uid',
		'origUid' => 't3_origuid',
		'requestUpdate' => 'sys_language_uid,is_subcat',
		//'sortby' => 'sorting',
		'title'	=> $nj_ext_lang_file.'model.'.$nj_domain,
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'transOrigPointerField' => 'l18n_parent',
		'tstamp' => 'tstamp',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'title',
	),
	'interface' => array(
		'always_description' => 1,
		'maxDBListItems' => 100,
		'maxSingleDBListItems' => 500,
		'showRecordFieldList' => 'title, description',
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'l18n_diffsource' => Array(
			'config'=>array(
				'type'=>'passthrough'
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'multiple' => '1',
				'itemsProcFunc' => 'N1coode\\NjCollection\\Utility\\Tca->getL18nParent',
				'items' => Array (
 					Array('', 0),
 				),
				'maxitems' => '1',
				'minitems' => '0'
			),
		),
		'sys_language_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'change' => 'reload',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => Array(
					Array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					Array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,unique,required',
				'max'  => 256
			)
		),
		'tstamp' => Array (
			'exclude' => 1,
			'label' => 'Creation date',
			'config' => Array (
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date',
			)
		),
	),
	'types' => array(
		'0' => array('showitem' =>
			'title'
		)
	),
	'palettes' => array(
		'1' => array('showitem' => 'l18n_parent'),
	),
);