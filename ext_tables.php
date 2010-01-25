<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Project', 'Hype Showcase, Projects');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Client', 'Hype Showcase, Clients');
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Award', 'Hype Showcase, Award');


# add default setup & constants
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype Showcase');


$TCA['tx_hypeshowcase_domain_model_client'] = array (
	'ctrl' => array (
		'title'	 => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client',		
		'label'	 => 'title',	
		'tstamp'	=> 'tstamp',
		'crdate'	=> 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'		  => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/Icons/client.icon.png',
	),
);

$TCA['tx_hypeshowcase_domain_model_project'] = array (
	'ctrl' => array (
		'title'	 => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project',		
		'label'	 => 'title',	
		'tstamp'	=> 'tstamp',
		'crdate'	=> 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'		  => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/Icons/project.icon.png',
	),
);

$TCA['tx_hypeshowcase_domain_model_feature'] = array (
	'ctrl' => array (
		'title'	 => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature',		
		'label'	 => 'title',	
		'tstamp'	=> 'tstamp',
		'crdate'	=> 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'		  => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/Icons/feature.icon.png',
	),
);

$TCA['tx_hypeshowcase_domain_model_service'] = array (
	'ctrl' => array (
		'title'	 => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service',		
		'label'	 => 'title',	
		'tstamp'	=> 'tstamp',
		'crdate'	=> 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'		  => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/Icons/service.icon.png',
	),
);

$TCA['tx_hypeshowcase_domain_model_award'] = array (
	'ctrl' => array (
		'title'	 => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award',		
		'label'	 => 'title',
		'tstamp'	=> 'tstamp',
		'crdate'	=> 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (	
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'		  => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/Icons/award.icon.png',
	),
);

?>