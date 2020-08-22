<?php

/**
 * Helper file for debugging purpose.
 * 
 * @since       1.0.0
 * @package     Theme404_Once_Click_Demo_Import
 * @subpackage  Theme404_Once_Click_Demo_Import/Inc/Helpers
 */

if (!defined('WPINC')) {
    exit;    // Exit if accessed directly.
}

/**
 * Dump & Die.
 * @param  mixed $var
 * @return void.
 */
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

/**
 * Prints and die.
 * @param  mixed $var
 * @return void
 */
function pd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die;
}

/**
 * Pretty prints the passed variable.
 *
 * @param  mixed $var
 * @return void
 */
function pp($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Echo and die.
 * @param  string $var
 * @return void.
 */
function ed($var)
{
    echo $var;
    die;
}
