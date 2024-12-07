<?php 
use PhpCsFixer\Finder;


$finder = Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/tests',
        __DIR__ . '/config',
    ]);

 $config = new PhpCsFixer\Config();
 
 
$rules = [
    '@Symfony' => true,
    'array_indentation' => true,
    'no_unused_imports' => true,
];

return $config
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/www/cache/.php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules($rules);