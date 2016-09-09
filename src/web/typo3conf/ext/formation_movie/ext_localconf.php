<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Universcience.' . $_EXTKEY,
	'Movies',
	array(
		'Movie' => 'list, show, new, create, edit, update',
	),
	// non-cacheable actions
	array(
		'Movie' => 'create, update, delete',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Universcience.' . $_EXTKEY,
	'Carrousel',
	array(
		'Movie' => 'carrousel',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Universcience.' . $_EXTKEY,
	'Movie_admin',
	array(
		'Movie_admin' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Movie_admin' => 'create, update, delete',
		
	)
);
