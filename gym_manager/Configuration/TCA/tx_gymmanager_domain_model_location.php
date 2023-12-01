<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_location',
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
        '1' => ['showitem' => 'name, street, city, zipcode, description,--div--;image, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_gymmanager_domain_model_location',
                'foreign_table_where' => 'AND {#tx_gymmanager_domain_model_location}.{#pid}=###CURRENT_PID### AND {#tx_gymmanager_domain_model_location}.{#sys_language_uid} IN (-1,0)',
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
    ],
];
