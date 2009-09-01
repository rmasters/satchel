<?php
/**
 * Web journal access
 * Sets a session variable if the user enters the required password.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

require 'bootstrap.php';

if (!PASSWORD) {
    // no need to auth
    header('Location: index.php');
}

if (!isset($_POST['password'])) {
    header('Location: index.php?message=' . urlencode('Missing password'));
}

if ($_POST['password'] == PASSWORD) {
    $_SESSION['access'] = true;
    header('Location: index.php');
} else {
    header('Location: index.php?message=' . urlencode('Incorrect password'));
}