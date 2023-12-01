<?php

namespace Florian\GymManager\ViewHelpers;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class CalendarTimeFormatViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'hour',
            'int',
            'array key used as hour_number for calendar array, converted to am/pm time format',
            true
        );

    }

    public function render(): string
    {
        $hour = (int)$this->arguments['hour'];
        if ($hour > 12) {
            $hour -= 12;
            $hour = (string)$hour . " pm";
        }else{
            $hour = (string)$hour . " am";
        }

        return (string)$hour;
    }
}
