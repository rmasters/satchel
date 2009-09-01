<?php
/**
 * Web journal
 * A small script to record one-liners (similar to Backpack's Journal)
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

require 'bootstrap.php';

if (ACCESS) {
    $entries = $db->query('SELECT entry, posted FROM entries ORDER BY posted DESC');

    $posts = array();
    while ($entry = $entries->fetchArray(SQLITE3_ASSOC)) {
        $posted = strtotime($entry['posted']);
        $date = date('Y-m-d', $posted);
        if (!array_key_exists($date, $posts)) {
            $posts[$date] = array();
        }
        $posts[$date][] = array(
            'entry' => $entry['entry'],
            'posted' => $posted
        );
    }

    $db->close();
}

require 'view.php';