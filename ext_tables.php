<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('grid_for_gridelements', 'Configuration/TypoScript', 'Grid for GridElements');

    }
);
