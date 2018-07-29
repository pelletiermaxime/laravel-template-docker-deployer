<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app')
    ->in(__DIR__ . '/resources/lang');

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                           => true,
        '@Symfony'                        => true,
        '@PHP71Migration'                 => true,
        'array_syntax'                    => [
            'syntax' => 'short',
        ],
        'binary_operator_spaces'          => [
            'default' => 'align_single_space',
        ],
        'cast_spaces'                     => true,
        'concat_space'                    => [
            'spacing' => 'one',
        ],
        'declare_strict_types'            => true,
        'no_unused_imports'               => true,
        'ordered_class_elements'          => [
            'use_trait',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'destruct',
            'magic',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
        ],
        'ordered_imports'                 => true,
        'phpdoc_align'                    => true,
        'phpdoc_single_line_var_spacing'  => true,
        'return_type_declaration'         => [
            'space_before' => 'none',
        ],
        'self_accessor'                   => true,
        'short_scalar_cast'               => true,
        'single_quote'                    => true,
        'standardize_not_equals'          => true,
        'trailing_comma_in_multiline_array' => true,
        'trim_array_spaces'               => true,
        'whitespace_after_comma_in_array' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setRiskyAllowed(true);
