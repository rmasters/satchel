<?php
/**
 * Bootstrapper
 * Loads a database connection and 'global' variables.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

define('APP', true);

// Start sessions for authentication.
session_start();

// Load config
require 'config.php';

// Load database
try {
    $db = new SQLite3(DATABASE, SQLITE3_OPEN_READWRITE);
} catch (Exception $e) {
    // Database doesn't exist - load setup
    require 'setup.php';
    $db = new SQLite3(DATABASE, SQLITE3_OPEN_READWRITE);
}

// Check whether the user is 'logged in'
define('ACCESS', (isset($_SESSION['access']) || !PASSWORD));

/**
 * Returns a short identifer of the date
 * @param   string  $date   strtotime-friendly date string
 * @return  string  Identifier
 */
function dateToHuman($date) {
    $date = strtotime($date);
    $now = time();
    $diff = $now - $date;
    
    $future = false;
    if ($diff < 0) {
        $future = true;
        $diff *= -1;
    }
    
    if ($diff < 24*60*60) {
        if ($future) {
            return 'Tomorrow';
        } else {
            return 'Today';
        }
    } elseif ($diff < 24*60*60*7) {
        return date('l', $date);
    } else {
        return date('Y-m-d', $date);
    }
}