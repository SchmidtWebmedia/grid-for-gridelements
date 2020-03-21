<?php

namespace SchmidtWebmedia\GridForGridElements\TypoScript;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class ConditionFunctionsProvider
{
    public function isLoaded($extKey) : bool {
        return ExtensionManagementUtility::isLoaded($extKey);
    }
}
