<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_trainer',
        'label' => 'firstname',
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
    'types' => [
        1 => [
            'showitem' => 'firstname, lastname, age, image, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,sys_language_uid,l10n_parent,l10n_diffsource,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,--palette--;;access',
        ],
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
        'firstname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_trainer.firstname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
                'default' => ''
            ],
        ],
        'lastname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_trainer.lastname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
                'default' => ''
            ],
        ],
        'age' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gym_manager/Resources/Private/Language/locallang_db.xlf:tx_gymmanager_domain_model_trainer.age',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'image' => [
            'exclude' => 1,
            'label' => 'Trainer Picture',
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
