<?php

namespace SchmidtWebmedia\GridForGridElements\Controller;

class GridController
{

    /**
     * @param $config
     *
     * @return mixed
     */
    public function getTwoColumnOptions($config) {
        return $this->getColumnRatio($config);
    }


    private function getColumnRatio($config) {
        $fieldName = $config['field'];
        switch($fieldName) {
            case 'twocol':
                $columnRatioList = [
                  ['auto', 0],
                  ['25/75', 1],
                  ['50/50', 2],
                  ['75/25', 3],
                  ['33/66', 4],
                  ['66/33', 5],
                  ['66/33', 6],
                ];
                break;
            default:
                $columnRatioList = [];
                break;
        }

        $config['items'] = array_merge($config['items'], $columnRatioList);
        return $config;
    }
}

