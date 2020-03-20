<?php
namespace SchmidtWebmedia\GridForGridElements\ExpressionLanguage;

use SchmidtWebmedia\GridForGridElements\TypoScript\ConditionFunctionsProvider;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;

class GridTypoScriptConditionProvider extends AbstractProvider
{

    /**
     * ConditionProvider constructor.
     */
    public function __construct()
    {
        $this->expressionLanguageProviders = [
            ConditionFunctionsProvider::class
        ];
    }
}
