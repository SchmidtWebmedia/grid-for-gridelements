<?php
if (!defined('TYPO3_MODE')) { die('Access denied.'); }

// register icons
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'grid-for-gridelements-twocol',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:grid_for_gridelements/Resources/Public/Icons/twocol.png']
);


// Add pageTS config
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:grid_for_gridelements/Configuration/TsConfig/Page/page.tsconfig">');
