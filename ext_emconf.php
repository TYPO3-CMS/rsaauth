<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'RSA authentication for TYPO3',
    'description' => 'Contains a service to authenticate TYPO3 BE and FE users using private/public key encryption of passwords',
    'category' => 'services',
    'author' => 'TYPO3 Core Team',
    'author_email' => 'typo3cms@typo3.org',
    'author_company' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '8.7.33',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.33',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
