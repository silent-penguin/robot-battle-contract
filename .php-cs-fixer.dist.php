<?php

declare(strict_types=1);

use PhpCsFixer\Config;

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->in([
        __DIR__.'/src',
    ])
;

return (new Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setFinder($finder)
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP8x3Migration' => true,
        '@PHP8x2Migration:risky' => true,
        'final_class' => true,
        'yoda_style' => false,
        'trailing_comma_in_multiline' => [
            'after_heredoc' => true,
            'elements' => ['arguments', 'arrays', 'match', 'parameters'],
        ],
        'phpdoc_line_span' => ['const' => 'single', 'method' => 'multi', 'property' => 'single'],
    ])
    ->setRiskyAllowed(true)
;
