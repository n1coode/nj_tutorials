<?php
/***************************************************************
 * Extension Manager/Repository config file for ext: "nj_travelsolutions"
***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'njs Tutorials',
	'description' => 'Tutorial plugin.',
	'category' => 'plugin',
	'author' => 'Nico Jatzkowski',
	'author_email' => 'nj@n1coo.de',
	'author_company' => 'n1coo.de',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '1',
	'createDirs' => 
	   'uploads/tx_njtutorials,
		uploads/tx_njtutorials/image',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'version' => '8.0.0',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'extbase' => '8.0.0-0.0.0',
			'fluid' => '8.0.0-0.0.0',
			'typo3' => '8.0.0-0.0.0',
			'nj_collection' => '8.0.0-0.0.0'
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
);
?>