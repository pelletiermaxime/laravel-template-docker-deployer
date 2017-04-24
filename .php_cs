<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                              => true,
        '@Symfony'                           => true,
        'array_syntax'                       => [
            'syntax' => 'short',
        ],
        'concat_space'                       => [
            'spacing' => 'one',
        ],
        'ordered_imports'                    => true,
        'binary_operator_spaces'             => [
            'align_double_arrow' => true,
            'align_equals'       => true,
        ],
    ])
    ->setFinder($finder)
    ->setUsingCache(true);
