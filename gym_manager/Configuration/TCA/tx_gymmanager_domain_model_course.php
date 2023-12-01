<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,street,city,zipcode',
        'iconfile' => 'EXT:gym_manager/Resources/Public/Icons/Extension.png',
    ],
    'types' => [
        '1' => ['showitem' => 'coursestart, courseend, name, location, street, city, zipcode, description, category, difficulty, price, min_group_size, max_group_size, users, trainers, --div--;image, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_gymmanager_domain_model_course',
                'foreign_table_where' => 'AND {#tx_gymmanager_domain_model_course}.{#pid}=###CURRENT_PID### AND {#tx_gymmanager_domain_model_course}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
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
                        'invertStateDisplay' => true
                    ]
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
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
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
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'coursestart' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.coursestart',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'courseend' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.courseend',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'duration' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.duration',
            'config' => [
                'type' => 'input',
                'eval' => 'int',
                'size' => 3,
                'default' => 0,
            ],
        ],
        'name' => [
            'exclude' => true,
            'label' => 'Course Name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
                'default' => ''
            ],
        ],
        'location' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang.db.xlf:tx_gymmanager_domain_model_course.location',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'Indoor',
                        0,
                    ],
                    [
                        'Outdoor',
                        1,
                    ],
                ],
            ],
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'zipcode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.zipcode',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.description',
            'config' => [
                'type' => 'input',
                'size' => 255,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'min_group_size' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.min_group_size',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'max_group_size' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.max_group_size',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'price' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.price',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim',
                'default' => ''
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
            'label' => 'Course Picture',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'document', array(
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
        'category' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.category',
            'config' => [
                'type' => 'select',
                'required' => true,
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_gymmanager_domain_model_category',
                'sortItems' => [
                    'label' => 'asc',
                ],
                'default' => 1
            ],
        ],
        'trainers' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.trainers',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Random', '0'],
                ],
                'foreign_table' => 'tx_gymmanager_domain_model_trainer',
                'sortItems' => [
                    'label' => 'asc',
                ],
            ],
        ],
        'difficulty' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_course.difficulty',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'eval' => 'required',
                'items' => [
                    [
                        'Free For All (FFA)',
                        1,
                    ],
                    [
                        'Beginner',
                        2,
                    ],
                    [
                        'Advanced',
                        3,
                    ],
                    [
                        'Professional',
                        4,
                    ],
                    [
                        'Special',
                        '--div--',
                    ],
                    [
                        'Kids only',
                        5,
                    ],
                    [
                        'Disabled',
                        6,
                    ],
                ],
                'default' => 1,
            ],
        ],
    ],
];
