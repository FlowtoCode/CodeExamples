<?php

namespace F7\F7base\ViewHelpers;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class FileDumpUrlViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments.
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('fileUid', 'int', 'The sys_file uid of the file to download', true);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $queryParameterArray = ['eID' => 'dumpFile', 't' => 'f'];
        $queryParameterArray['f'] = $this->arguments['fileUid'];
        $queryParameterArray['token'] = GeneralUtility::hmac(implode('|', $queryParameterArray), 'resourceStorageDumpFile');
        $publicUrl = GeneralUtility::locationHeaderUrl(PathUtility::getAbsoluteWebPath(Environment::getPublicPath() . '/index.php'));
        return $publicUrl . ('?' . http_build_query($queryParameterArray, '', '&', PHP_QUERY_RFC3986));
    }
}
