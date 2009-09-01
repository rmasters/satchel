<?php
/**
 * Web journal config
 * Configuration variables used in the setup and the journal script.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

(defined('APP')) ? null : exit(0);

/**
 * Application configuration
 */
// Password (if none the journal is publically accessible AND anyone
// can post entries!).
define('PASSWORD', 'password');

// Path to the SQLite database file. This is recommended to be above
// the web root, unless the webserver is configured to prevent this
// file being downloaded.
define('DATABASE', './journal.db');