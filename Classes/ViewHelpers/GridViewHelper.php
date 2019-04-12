<?php

namespace SchmidtWebmedia\GridForGridElements\ViewHelpers;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GridViewHelper extends AbstractViewHelper
{

    private static $GridConfiguration;


    public function initializeArguments()
    {
        $this->registerArgument('type', 'string', 'col or row', true);
        $this->registerArgument('layout', 'string', 'Name of Flexform Layout');
        $this->registerArgument('colType', 'string', 'Which Ratio would be choosed');
        $this->registerArgument('colIndex', 'int', 'Index of Column');
    }

    /**
     * @param $key string
     * @return string
     */
    public function render() {
        self::readJSON();
        switch($this->arguments['type']) {
            case 'row':
                return self::$GridConfiguration['row'][0]['class'];
                break;
            case 'col':
                $layout = $this->arguments['layout'];
                $ratio = $this->arguments['colType'];
                $index = $this->arguments['colIndex'];
                return self::$GridConfiguration['cols'][0][$layout][$ratio]['class'][$index];
                break;
        }

        return $this->arguments['type'];
    }

    private static function readJSON() {
        if(self::$GridConfiguration === null) {
            $path = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('grid_for_gridelements', 'gridConfig');
            $jsonInput = file_get_contents(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($path));
            self::$GridConfiguration = json_decode($jsonInput, true);
        }
    }
}
