<?php

use Florian\GymManager\Controller\GymManagerController;
use \Florian\GymManager\Controller\EventController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

(static function() {
    ExtensionUtility::configurePlugin(
        'GymManager',
        'GymManager',
        [
            // 'list' ist die erste gerenderte View im FE da an erster Stelle
            \Florian\GymManager\Controller\GymManagerController::class => 'list, show, new, edit, delete, back, calendarShow, calendarPrevWeek, calendarNextWeek, aboutUs, trainers, media',
            \Florian\GymManager\Controller\CourseController::class => 'list, show, new, edit, assignMember, update',
            \Florian\GymManager\Controller\EventController::class => 'list, show, new, edit, update'
        ],
        // non-cacheable actions
        [
            GymManagerController::class => 'delete',
            \Florian\GymManager\Controller\CourseController::class => 'new, edit, assign, update',
            \Florian\GymManager\Controller\EventController::class => 'new, edit, update'
        ]
    );
    ExtensionUtility::configurePlugin(
        'GymManager',
        'CourseFinder',
        [
            // 'list' ist die erste gerenderte View im FE da an erster Stelle
            \Florian\GymManager\Controller\CourseController::class => 'list, show, assignMember, update',
            \Florian\GymManager\Controller\GymManagerController::class => 'list, show, back',
        ],
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    GymManager {
                        iconIdentifier = Extension.png
                        title = LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym
                        description = LLL:EXT:gym_manager/Resources/Private/Language/local-lang_db.xlf:tx_gymmanager_domain_model_gym.gym_description
                        tt_content_defValues {
                            CType = list
                            list_type = categorisation_categorisation
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
