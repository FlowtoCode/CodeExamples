<?php

if (!defined('TYPO3')) {
    die();
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'iconfile' => 'EXT:gym_manager/Resources/Public/Icons/Extension.png',
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2_038),
                ],
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'name' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_label',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'street' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_street',
            'config' => [
                'type' => 'text',
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_city',
            'config' => [
                'type' => 'text',
                'eval' => 'trim'
            ],
        ],
        'zipcode' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_zipcode',
            'config' => [
                'type' => 'text',
                'size' => '5',
                'eval' => 'trim'
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_email',
            'config' => [
                'type' => 'text',
                'eval' => 'trim,require'
            ],
        ],
        'available_categories' => [
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.gym_availableCategories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gymmanager_domain_model_category',
                'sortItems' => [
                    'label' => 'asc',
                ],
                'default' => 4,
                'minitems' => 1,
                'maxitems' => 10,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ]
        ],
        'courses' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.course',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gymmanager_domain_model_course',
                'foreign_table_where' => ' AND tx_gymmanager_domain_model_course.hidden=0',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'trainers' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.trainers',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gymmanager_domain_model_trainer',
                'foreign_table_where' => ' AND tx_gymmanager_domain_model_trainer.hidden=0',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'events' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_gym.event',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gymmanager_domain_model_event',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'users' => [
            'exclude' => true,
            'label' => 'Users',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_users',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'image' => [
            'exclude' => 1,
            'label' => 'Gym Preview Picture',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image', array(
                    'appearance' => array(
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
                    ),
                    'foreign_types' => array(
                        '0' => array(
                            'showitem' => '--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                            'showitem' => '--palette--;;filePalette'
                        )
                    ),
                    'maxitems' => 1,
                )
            )
        ],
        'owner_pic' => [
            'exclude' => 1,
            'label' => 'Picture of Owner',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'owner_pic', array(
                    'appearance' => array(
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
                    ),
                    'foreign_types' => array(
                        '0' => array(
                            'showitem' => '--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                            'showitem' => '--palette--;;filePalette'
                        )
                    ),
                    'maxitems' => 1,
                )
            )
        ],
        'staff_pic' => [
            'exclude' => 1,
            'label' => 'Picture of Staff',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'staff_pic', array(
                    'appearance' => array(
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference'
                    ),
                    'foreign_types' => array(
                        '0' => array(
                            'showitem' => '--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                            'showitem' => '--palette--;;filePalette'
                        )
                    ),
                    'maxitems' => 1,
                )
            )
        ],
    ],

    'types' => [
        1 => [
            'showitem' => 'name, street, city, zipcode, description, email, available_categories, courses, events, users, trainers, image, owner_pic, staff_pic, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,sys_language_uid,l10n_parent,l10n_diffsource,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;;access',
        ],
    ],
];
