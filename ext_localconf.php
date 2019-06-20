<?php
if (!defined('TYPO3_MODE')) { die('Access denied.'); }


// register icons
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'grid-for-gridelements-twocol',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:grid_for_gridelements/Resources/Public/Icons/twocol.png']
);
$iconRegistry->registerIcon(
    'grid-for-gridelements-threecol',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:grid_for_gridelements/Resources/Public/Icons/threecol.png']
);
$iconRegistry->registerIcon(
    'grid-for-gridelements-fourthcol',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:grid_for_gridelements/Resources/Public/Icons/fourcol.png']
);

// Add pageTS config
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:grid_for_gridelements/Configuration/TsConfig/Page/page.tsconfig">');

if(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('frontend_editing')) {
    /***************
     * Hook for frontend editing
     */
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['frontend_editing']['FrontendEditingPanel']['dropzoneModifiers'][] = \SchmidtWebmedia\GridForGridElements\Hook\DropzoneModifier::class;
}

