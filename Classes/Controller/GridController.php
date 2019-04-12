<?php

namespace SchmidtWebmedia\GridForGridElements\Controller;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

class GridController
{

    private static $GridConfiguration;


    /**
     * @param $config
     *
     * @return mixed
     */
    public function getTwoColumnOptions($config) {
        return $this->getColumnRatio($config);
    }

    private static function readJSON() {
        if(self::$GridConfiguration === null) {
            $path = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('grid_for_gridelements', 'gridConfig');
            $jsonInput = file_get_contents(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($path));
            self::$GridConfiguration = json_decode($jsonInput, true);
        }
    }


    private function getColumnRatio($config) {
        self::readJSON();
        $fieldName = $config['field'];
        $columnRatioList = [];

        foreach (self::$GridConfiguration['cols'][0][$fieldName] as $key => $value) {
            $columnRatioList[] = [$value['label'], $key];
        }

        $config['items'] = array_merge($config['items'], $columnRatioList);
        return $config;
    }
}

