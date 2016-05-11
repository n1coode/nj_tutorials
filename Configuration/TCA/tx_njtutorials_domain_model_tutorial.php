<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
use N1coode\NjTutorials\Utility\Constants as Constants;

$nj_ext_key			= Constants::NJ_EXT_KEY;
$nj_ext_namespace	= Constants::NJ_EXT_NAMESPACE;
$nj_ext_path		= Constants::NJ_EXT_PATH;
$nj_ext_title		= Constants::NJ_EXT_TITLE;

$nj_ext_lang_file			= Constants::NJ_EXT_LANG_FILE_BACKEND;
$nj_collection_lang_file	= 'LLL:EXT:nj_collection/Resources/Private/Language/locallang_db.xlf:';


$nj_domain_model = 'Tutorial';
$nj_domain = strtolower($nj_domain_model);

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate ASC',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($nj_ext_path) . 'Resources/Public/Icons/' . $nj_ext_key . '_domain_model_' . $nj_domain . '.svg',
		'label' => 'title',
		'languageField' => 'sys_language_uid',	
		'origUid' => 't3_origuid',
		//'sortby' => 'sorting',
		'title'	=> $nj_ext_lang_file.'model.'.$nj_domain,
		'tstamp' => 'tstamp',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'transOrigPointerField' => 'l18n_parent',
		'requestUpdate' => 'sys_language_uid,comments_enable',
		'versioning_followPages' => TRUE,
		'versioningWS' => 2,		
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
		'crdate' => Array (
            'exclude' => 1,
            'label' => 'Creation date',
            'config' => Array (
                'type' => 'none',
                'format' => 'date',
                'eval' => 'date',
            )
        ),  
		'cruser_id' => array(
			'exclude' => 0,
			'label'   => 'cruser',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_class' => '\N1coode\NjCollection\Domain\Model\User',
				'maxitems' => 1
			)
		),
		
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'multiple' => '1',
				'itemsProcFunc' => 'N1coode\\'.$nj_ext_namespace.'\\Utility\\Tca->getL18nParent',
				'items' => Array (
					Array('', 0),
				),
				'maxitems' => '1',
				'minitems' => '0'
			),
		),
		'l18n_diffsource' => Array(
			'config'=>array(
				'type'=>'passthrough'
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'category' => Array (
			'displayCond' => 'FIELD:sys_language_uid:<=:0',
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.category',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => $nj_ext_key.'_domain_model_category',
				'foreign_table_where' => 'AND '.$nj_ext_key.'_domain_model_category.pid=###CURRENT_PID### AND '.$nj_ext_key.'_domain_model_category.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY '.$nj_ext_key.'_domain_model_category.title',
				'minitems' => 1,
				'maxitems' => 1,
			),
		),
		'comments_enable' => array(
			'exclude' => 0,
			'label' => $nj_collection_lang_file . 'label.general.commentsEnable',
			'config' => array(
				'type' => 'check',
				'default' => 0,
			),
		),
		'comments' => array(
			'displayCond' => 'FIELD:comments_enable:>:0',
			'exclude' => 0,
			'label' => $nj_collection_lang_file . 'label.general.comments',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_njcollection_domain_model_comment',
				'foreign_field' => 'foreign_uid',
			),
		),
		'conclusion' => array(
			'exclude' => 1,
			'label'   => $nj_ext_lang_file.'label.model.'.$nj_domain.'.conclusion',
			'config'  => array(
				'type' => 'text',
				'cols' => 60,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[]',
		),
		'content' => Array(
			'exclude' => 0,
			'label' => $nj_collection_lang_file . 'label.general.contentElements',
			'config' => Array(
				'type' => 'inline',
				'foreign_table' => 'tx_njcollection_domain_model_content',
				'foreign_field' => 'foreign_uid',
				'foreign_sortby' => 'sorting',
				'maxitems' => 99,
				'appearance' => Array(
					'collapseAll' => 1,
					'expandSingle' => 1,
					'useSortable' => 1,
					'enabledControls' => array(
						'sort' => true,
					)
				),
			),
		),
		'description' => array(
			'exclude' => 1,
			'label'   => $nj_collection_lang_file.'label.general.description',
			'config'  => array(
				'type' => 'text',
				'cols' => 60,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[]',
		),
		'motivation' => array(
			'exclude' => 0,
			'label'   => $nj_ext_lang_file.'label.model.'.$nj_domain.'.motivation',
			'config'  => array(
				'type' => 'text',
				'cols' => 60,
				'rows' => 6,
			),
			'defaultExtras' => 'richtext[]',
		),
		'rating' => array(
			'exclude'	=> 0,
			'label'		=> $nj_ext_lang_file.'label.model.rating.rating',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> $nj_ext_key . '_domain_model_tag',
				'foreign_table_where' 	=> 'ORDER BY ' . $nj_ext_key . '_domain_model_tag.title',
				'size'					=> 10,
				'maxitems' 				=> 9999,
			)
		),
		'related_tutorials' => array(
			'exclude'	=> 0,
			'label'		=> $nj_ext_lang_file.'label.model.'.$nj_domain.'.relatedTutorials',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> 'tx_njtutorials_domain_model_tutorial',
				'foreign_table_where' 	=> 'AND tx_njtutorials_domain_model_tutorial.uid != ###THIS_UID### ORDER BY tx_njtutorials_domain_model_tutorial.title',
				'size'					=> 10,
				'maxitems' 				=> 15,
			)
		),
		'sys_language_uid' => Array (
			'displayCond' => 'USER:N1coode\\NjCollection\\Utility\\Tca->isMultiLingual',
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
		'tags' => array(
			'exclude'	=> 0,
			'label'		=> $nj_ext_lang_file.'label.model.'.$nj_domain.'.tags',
			'config'	=> array(
				'type' 					=> 'select',
				'foreign_table' 		=> $nj_ext_key . '_domain_model_tag',
				'foreign_table_where' 	=> 'ORDER BY ' . $nj_ext_key . '_domain_model_tag.title',
				'size'					=> 10,
				'maxitems' 				=> 15,
			)
		),
		'teaser_image' => array(
			'displayCond' => 'FIELD:sys_language_uid:<=:0',
			'exclude' => 0,
			'label' => $nj_collection_lang_file. 'label.general.teaserImage',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				),
				'minitems' => 0,
				'maxitems' => 1,
			),
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']),
		),
		'title' => array(
			'exclude' => 0,
			'label'   => $nj_collection_lang_file.'label.general.title',
			'config'  => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim',
				'max'  => 256
			),
		),
		'tstamp' => Array (
			'exclude' => 1,
			'label' => 'Creation date',
			'config' => Array (
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date',
			),
		),
	),
	'types' => array(
		'0' => array('showitem' =>
			'--div--;'.$nj_collection_lang_file.'tab.general.generalSettings,
			 hidden,sys_language_uid;;1,title,category,tags,related_tutorials,
			 --div--;'.$nj_ext_lang_file.'tab.model.'.$nj_domain.'.abstract,
			 teaser_image,description,motivation,conclusion,
			 --div--;'.$nj_collection_lang_file.'tab.general.content,
			 content,
			 --div--;'.$nj_collection_lang_file.'tab.general.comments,
			 comments_enable,comments'
		)
	),
	'palettes' => array(
		'1' => array('showitem' => 'l18n_parent'),
	),
);