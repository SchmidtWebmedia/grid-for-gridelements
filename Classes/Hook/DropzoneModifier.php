<?php
declare(strict_types=1);

namespace SchmidtWebmedia\GridForGridElements\Hook;

use function GuzzleHttp\default_ca_bundle;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\FrontendEditing\EditingPanel\FrontendEditingDropzoneModifier;
use TYPO3\CMS\FrontendEditing\Service\ContentEditableWrapperService;

/**
 * Class DropzoneModifier
 * @package SchmidtWebmedia\GridForGridElements\Hook
 */
class DropzoneModifier implements FrontendEditingDropzoneModifier
{
    /**
     * Keep list of grid container that has first dropzone
     *
     * @var string
     */
    protected static $containersWithContent = '';
    /**
     * @param string $table
     * @param int $editUid
     * @param array $dataArr
     * @param string $content
     * @return bool
     */
    public function wrapWithDropzone(
        string $table,
        int $editUid,
        array $dataArr,
        string &$content
    ): bool {
        // CE in gridelement
        if ($dataArr['tx_gridelements_container']) {

            /** @var ContentEditableWrapperService $wrapperService */
            $wrapperService = GeneralUtility::makeInstance(ContentEditableWrapperService::class);
            $params = [
                'tx_gridelements_container' => $dataArr['tx_gridelements_container'],
                'tx_gridelements_columns' => $dataArr['tx_gridelements_columns']
            ];
            $content = $wrapperService->wrapContentWithDropzone(
                $table,
                (int)$editUid,
                $content,
                -1,
                $params
            );


            $containerIdentifier = $dataArr['tx_gridelements_container'] . '-' . $dataArr['tx_gridelements_columns'];

            if (!GeneralUtility::inList(self::$containersWithContent, $containerIdentifier)) {
                $content = $wrapperService->wrapContentWithDropzone(
                    $table,
                    0,
                    $content,
                    -1,
                    $params,
                    true
                );
                self::$containersWithContent .= ',' . $containerIdentifier;
            }
            $content = str_replace(
                [
                    'ondragstart="window.parent.F.dragCeStart(event)"',
                    '###GRID_DATA###'
                ],
                [
                    'ondragstart="window.parent.F.dragCeInsideGridStart(event)"',
                    sprintf('data-params="%s"', GeneralUtility::implodeArrayForUrl('', $params))
                ],
                $content
            );
            return true;
        }

        // Gridelement parent

        if ($dataArr['CType'] == 'gridelements_pi1') {

            /** @var ContentEditableWrapperService $wrapperService */
            $wrapperService = GeneralUtility::makeInstance(ContentEditableWrapperService::class);

            // Find empty columns
            switch ($dataArr['tx_gridelements_backend_layout']) {
                case 'twocol':
                    $cols = 2;
                    break;
                case 'threecol':
                    $cols = 3;
                    break;
                case 'fourthcol':
                    $cols = 4;
                    break;
                default:
                    $cols = 0;
                    break;
            }

            for($i = 1; $i <= $cols; $i++) {
                $key = '10'.$i;
                $params = [
                    'tx_gridelements_container' => $dataArr['uid'],
                    'tx_gridelements_columns' => $key
                ];

                $dropzoneOnly = $wrapperService->wrapContentWithDropzone(
                    $table,
                    0,
                    '',
                    -1,
                    $params,
                    true
                );
                $dropzoneOnly = str_replace(
                    [
                        'ondragstart="window.parent.F.dragCeStart(event)"',
                        '###GRID_DATA###'
                    ],
                    [
                        'ondragstart="window.parent.F.dragCeInsideGridStart(event)"',
                        sprintf('data-params="%s"', GeneralUtility::implodeArrayForUrl('', $params))
                    ],
                    $dropzoneOnly
                );

                $content = str_replace(
                    [
                        '<!--###DATA_EMPTY_GRID_DROPZONE_' . $key . '###-->'
                    ],
                    [
                        $dropzoneOnly
                    ],
                    $content
                );
            }
        }
        return false;
    }
}
