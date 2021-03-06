<?php
namespace SchmidtWebmedia\GridForGridElements\ExpressionLanguage;

use SchmidtWebmedia\GridForGridElements\TypoScript\ConditionFunctionsProvider;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GridTypoScriptConditionProvider extends AbstractProvider
{

    /**
     * ConditionProvider constructor.
     */
    public function __construct()
    {
        $this->expressionLanguageVariables = [
          'ext' => GeneralUtility::makeInstance(ConditionFunctionsProvider::class)
        ];
    }
}
