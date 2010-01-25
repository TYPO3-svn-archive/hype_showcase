<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Project',
	array('Project' => 'index, show'),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Client',
	array('Client' => 'index, show'),
	array()
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Award',
	array('Award' => 'index'),
	array()
);

?>