<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



/*

+++ STRUCTURE

# CLIENT
	- title
	- subtitle
	- introduction
	- description
	- images
	- branch
	- website
	- projects [<1:n>inline:PROJECT]
	
	# PROJECT
		- title
		- subtitle
		- introduction
		- description
		- images
		- client [<1:1>select:CLIENT]
		- tasks [<1:n>inline:TASK]
		- awards [<1:n>inline:AWARD]
		
		# TASK
			- title
			- subtitle
			- introduction
			- description
			- images
			- type [<1:1>select:TYPE]
			- service [<1:1>select:SERVICE]
			- features [<1:n>inline:FEATURE]
			- project [<1:1>select:PROJECT]
			
			# FEATURE
				- title
				- subtitle
				- introduction
				- description
				- images
				- task [<1:1>select:TASK]
		
		# AWARD
			- title
			- subtitle
			- introduction
			- description
			- images
			- website
			- project [<1:1>select:PROJECT]

# TYPE
	- title (Website, Microsite)
	- subtitle
	- projects
	
	# SERVICE
		- title (Design, Development, Marketing)
		- subtitle
		- introduction
		- description
		- images
	
	# TECHNOLOGY
		- title
		- subtitle
		- introduction
		- description
		- images
*/

$TCA['tx_hypeshowcase_domain_model_client'] = array(
	'ctrl' => $TCA['tx_hypeshowcase_domain_model_client']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,title,introduction,description,images,branch,website,projects'
	),
	'feInterface' => $TCA['tx_hypeshowcase_domain_model_client']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'	=> 'check',
				'default' => '0'
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'default'  => '0',
				'checkbox' => '0'
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'	=> array(
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.title',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
		),
		'introduction' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.introduction',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'description' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.description',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'	   => 1,
						'type'		  => 'script',
						'title'		 => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'		  => 'wizard_rte2.gif',
						'script'		=> 'wizard_rte.php',
					),
				),
			),
		),
		'images' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.images',	
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1024,
				'uploadfolder' => 'uploads/hype/showcase/clients',
				'size' => 1,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		'branch' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.branch',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			),
		),
		'website' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.website',	
			'config' => array(
				'type'	 => 'input',
				'size'	 => '15',
				'max'	  => '255',
				'checkbox' => '',
				'eval'	 => 'trim',
				'wizards'  => array(
					'_PADDING' => 2,
					'link'	 => array(
						'type'		 => 'popup',
						'title'		=> 'Link',
						'icon'		 => 'link_popup.gif',
						'script'	   => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=480,width=640,status=0,menubar=0,scrollbars=1'
					),
				),
			),
		),
		'projects' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_client.projects',	
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_hypeshowcase_domain_model_project',
				'foreign_field'	=> 'client',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'appearance' => array(
					'collapseAll' => FALSE,
					'expandSingle' => TRUE
				),
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, introduction;;;;3-3-3, description;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_hypeshowcase/rte/], images, branch, website, projects')
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime')
	),
);

$TCA['tx_hypeshowcase_domain_model_project'] = array(
	'ctrl' => $TCA['tx_hypeshowcase_domain_model_project']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,title,introduction,description,images,features,client,services,awards'
	),
	'feInterface' => $TCA['tx_hypeshowcase_domain_model_project']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'	=> 'check',
				'default' => '0'
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'default'  => '0',
				'checkbox' => '0'
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'	=> array(
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.title',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
		),
		'introduction' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.introduction',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'description' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.description',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'	   => 1,
						'type'		  => 'script',
						'title'		 => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'		  => 'wizard_rte2.gif',
						'script'		=> 'wizard_rte.php',
					),
				),
			),
		),
		'images' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.images',	
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1024,
				'uploadfolder' => 'uploads/hype/showcase/projects/',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		'features' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.features',	
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_hypeshowcase_domain_model_feature',
				'foreign_field'	=> 'project',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'appearance' => array(
					'collapseAll' => FALSE,
					'expandSingle' => TRUE
				),
			),
		),
		'client' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.client',	
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_hypeshowcase_domain_model_client',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'services' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.services',	
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_hypeshowcase_domain_model_service',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
			),
		),
		'awards' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_project.awards',	
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_hypeshowcase_domain_model_award',
				'foreign_field'	=> 'project',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'appearance' => array(
					'collapseAll' => FALSE,
					'expandSingle' => TRUE
				),
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, introduction;;;;3-3-3, description;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_hypeshowcase/rte/], images, features, client, services, awards')
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime')
	),
);

$TCA['tx_hypeshowcase_domain_model_feature'] = array(
	'ctrl' => $TCA['tx_hypeshowcase_domain_model_feature']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,title,introduction,description,images,project'
	),
	'feInterface' => $TCA['tx_hypeshowcase_domain_model_feature']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'	=> 'check',
				'default' => '0'
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'default'  => '0',
				'checkbox' => '0'
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'	=> array(
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature.title',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
		),
		'introduction' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature.introduction',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'description' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature.description',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'	   => 1,
						'type'		  => 'script',
						'title'		 => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'		  => 'wizard_rte2.gif',
						'script'		=> 'wizard_rte.php',
					),
				),
			),
		),
		'images' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature.images',	
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1024,
				'uploadfolder' => 'uploads/hype/showcase/features',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		'project' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_feature.project',	
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_hypeshowcase_domain_model_project',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, introduction;;;;3-3-3, description;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_hypeshowcase/rte/], images, project')
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime')
	),
);

$TCA['tx_hypeshowcase_domain_model_service'] = array(
	'ctrl' => $TCA['tx_hypeshowcase_domain_model_service']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,title,introduction,description,images,projects'
	),
	'feInterface' => $TCA['tx_hypeshowcase_domain_model_service']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'	=> 'check',
				'default' => '0'
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'default'  => '0',
				'checkbox' => '0'
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'	=> array(
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service.title',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
		),
		'introduction' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service.introduction',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'description' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service.description',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'	   => 1,
						'type'		  => 'script',
						'title'		 => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'		  => 'wizard_rte2.gif',
						'script'		=> 'wizard_rte.php',
					),
				),
			),
		),
		'images' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service.images',	
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1024,
				'uploadfolder' => 'uploads/hype/showcase/services',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		'projects' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_service.projects',	
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_hypeshowcase_domain_model_project',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, introduction;;;;3-3-3, description;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_hypeshowcase/rte/], images, projects')
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime')
	),
);

$TCA['tx_hypeshowcase_domain_model_award'] = array(
	'ctrl' => $TCA['tx_hypeshowcase_domain_model_award']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,title,introduction,description,images,projects'
	),
	'feInterface' => $TCA['tx_hypeshowcase_domain_model_award']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type'	=> 'check',
				'default' => '0'
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'default'  => '0',
				'checkbox' => '0'
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array(
				'type'	 => 'input',
				'size'	 => '8',
				'max'	  => '20',
				'eval'	 => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'	=> array(
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award.title',	
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
		),
		'introduction' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award.introduction',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			),
		),
		'description' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award.description',	
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'	   => 1,
						'type'		  => 'script',
						'title'		 => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'		  => 'wizard_rte2.gif',
						'script'		=> 'wizard_rte.php',
					),
				),
			),
		),
		'images' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award.images',	
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => 1024,
				'uploadfolder' => 'uploads/hype/showcase/awards',
				'size' => 3,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'show_thumbs' => TRUE,
			),
		),
		'project' => array(
			'exclude' => 0,	
			'label' => 'LLL:EXT:hype_showcase/Resources/Private/Language/locallang_db.xml:tx_hypeshowcase_domain_model_award.project',	
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_hypeshowcase_domain_model_project',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, introduction;;;;3-3-3, description;;;richtext[]:rte_transform[mode=ts_css|imgpath=uploads/tx_hypeshowcase/rte/], images, project')
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime')
	),
);

?>