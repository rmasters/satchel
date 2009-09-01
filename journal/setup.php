<?php
/**
 * Web journal setup
 * Create tables in a database for the journal script.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

(defined('APP')) ? null : exit(0);

$db = new SQLite3(DATABASE);

$create = <<<SQL
CREATE TABLE entries (
    id INTEGER PRIMARY KEY,
    entry TEXT,
    posted TEXT    
)
SQL;
$db->query($create);

$db->close();