<?php

$EM_CONF['gym_manager'] = [
    'title' => 'Gym Extension',
    'description' => 'Manage new and existing Locations, Courses and Events',
    'category' => 'plugin',
    'author' => 'Florian Herrmann',
    'author_company' => 'Vivid',
    'author_email' => 'flow.h@gmx.de',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'extbase' => '',
            'fluid' => '',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'MyVendor\\GymManager\\' => 'Classes'
        ],
    ],
];
