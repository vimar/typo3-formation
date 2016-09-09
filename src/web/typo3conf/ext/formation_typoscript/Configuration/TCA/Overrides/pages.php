<?php
defined('TYPO3_MODE') or die();


// we want to set another configuration
$GLOBALS['TCA']['pages']['columns']['title']['config']['type'] = 'text';

// full reference: https://docs.typo3.org/typo3cms/TCAReference/Index.html#start
$fields = array(
    'no_share' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:formation_typoscript/Resources/Private/Language/locallang.xlf:pages.no_share',
        'config' => array(
            'type' => 'check',
            'items' => array(
                '1' => array(
                    '0' => 'LLL:EXT:formation_typoscript/Resources/Private/Language/locallang.xlf:pages.no_share.disable'
                ),
            )
        )
    ),

  //  ''
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $fields);

// add new field subtitle after title
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("pages", 'no_share', '1', 'before:no_search');
