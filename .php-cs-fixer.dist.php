<?php

// $finder = (new PhpCsFixer\Finder())
//     ->in(__DIR__)
//     ->exclude('var')
// ;

// return (new PhpCsFixer\Config())
//     ->setRules([
//         '@Symfony' => true,
//     ])
//     ->setFinder($finder)
// ;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'strict_param' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    );
