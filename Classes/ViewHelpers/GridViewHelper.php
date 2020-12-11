<?php

namespace SchmidtWebmedia\GridForGridElements\ViewHelpers;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GridViewHelper extends AbstractViewHelper
{

    private static $GridConfiguration;


    public function initializeArguments()
    {
        $this->registerArgument('type', 'string', 'col or row', true);
        $this->registerArgument('layout', 'string', 'Name of Flexform Layout');
        $this->registerArgument('colIndex', 'int', 'Index of Column');
        $this->registerArgument('colFlexform', 'string', 'Flexform XML from GridElements');
    }

    /**
     * @param $key string
     * @return string
     */
    public function render() {
        self::readJSON();
        switch($this->arguments['type']) {
            case 'row':
				if(isset(self::$GridConfiguration['row'][0]['class'])) {
					return self::$GridConfiguration['row'][0]['class'];
				} else {
					return 'row';
				}
            case 'col':
                $layout = $this->arguments['layout'];
                $ratio = self::readXML($this->arguments['colFlexform'], $layout);
                $index = $this->arguments['colIndex'];
				if(isset(self::$GridConfiguration['cols'][0][$layout][$ratio]['class'][$index])) {
					return self::$GridConfiguration['cols'][0][$layout][$ratio]['class'][$index];
				} else {
						return 'col';
                }
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

    /**
     * @param $xmlString
     * @param $layout
     *
     * @return string|null
     */
    private static function readXML($xmlString, $layout) {
        if($xmlString !== null) {
            $xml = GeneralUtility::xml2array($xmlString);
            return $xml['data']['col']['lDEF'][$layout]['vDEF'];
        }
        return null;
    }
}
