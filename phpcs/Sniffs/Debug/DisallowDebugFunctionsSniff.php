<?php

/**
 * Disallow the use of debugging functions in the codebase.
 *
 * The purpose of this sniff is to avoid var_dump and print_r in production code.
 * During development, those functions can be temporarily used.
 *
 * @see http://confluence.jetbrains.com/display/PhpStorm/Zero-configuration+Web+Application+Debugging+with+Xdebug+and+PhpStorm
 * @package CodeSniffer\Standards\Bigbank\Sniffs\Debug
 */
class Bigbank_Sniffs_Debug_DisallowDebugFunctionsSniff extends Generic_Sniffs_PHP_ForbiddenFunctionsSniff {

    /**
     * A list of forbidden functions with their alternatives.
     *
     * The value is NULL if no alternative exists. IE, the
     * function should just not be used.
     *
     * @var array(string => string|null)
     */
    public $forbiddenFunctions = array(
        'print_r'  => null,
        'var_dump' => null,
    );


}
