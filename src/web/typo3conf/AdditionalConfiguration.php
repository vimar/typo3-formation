<?php

switch ((string) \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()) {
    case 'Development/Mac':
        //MySQL
        $GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = 'typo3-formation';
        $GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = '127.0.0.1';
        $GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = 'root';
        $GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = 'root';
        $GLOBALS['TYPO3_CONF_VARS']['DB']['socket'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['DB']['port'] = '';
        
}