<?php

namespace SchmidtWebmedia\GridForGridElements\TypoScript;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class ConditionFunctionsProvider implements ExpressionFunctionProviderInterface
{
    public function getFunctions()
    {
        return [
          $this->getExtensionIsLoadedFunction()
        ];
    }

    protected function getExtensionIsLoadedFunction() : ExpressionFunction {
        return new ExpressionFunction('extensionLoaded', function() {
        }, function($extKey) {
            return ExtensionManagementUtility::isLoaded($extKey);
        });
    }
}
