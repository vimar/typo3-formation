<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Universcience.' . $_EXTKEY,
	'Movies',
	'Movies'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Universcience.' . $_EXTKEY,
	'Carrousel',
	'Carrousel'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Formation Movie');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_formationmovie_domain_model_movie', 'EXT:formation_movie/Resources/Private/Language/locallang_csh_tx_formationmovie_domain_model_movie.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_formationmovie_domain_model_movie');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_formationmovie_domain_model_genre', 'EXT:formation_movie/Resources/Private/Language/locallang_csh_tx_formationmovie_domain_model_genre.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_formationmovie_domain_model_genre');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_formationmovie_domain_model_actor', 'EXT:formation_movie/Resources/Private/Language/locallang_csh_tx_formationmovie_domain_model_actor.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_formationmovie_domain_model_actor');
