<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'RSA authentication for TYPO3',
    'description' => 'Contains a service to authenticate TYPO3 BE and FE users using private/public key encryption of passwords',
    'category' => 'services',
    'author' => 'Dmitry Dulepov',
    'author_email' => 'dmitry@typo3.org',
    'author_company' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '8.7.3',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.3',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
