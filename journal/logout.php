<?php
/**
 * Web journal logout
 * Remove the session variable.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

require 'bootstrap.php';

if (isset($_SESSION['access'])) {
    unset($_SESSION['access']);
    header('Location: index.php?message=' . urlencode('Logged out'));
} else {
    header('Location: index.php');
}