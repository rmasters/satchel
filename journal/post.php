<?php
/**
 * Web journal access
 * Sets a session variable if the user enters the required password.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */

require 'bootstrap.php';

if (!isset($_POST['entry'])) {
    header('Location: index.php?message=' . urlencode('Missing entry.'));
}

if (!isset($_SESSION['access']) && PASSWORD) {
    header('Location: index.php?message=' . urlencode('Posting access denied.'));
}

$sql = "INSERT INTO entries (entry, posted) VALUES (:entry, datetime('now'))";
$stmt = $db->prepare($sql);
$stmt->bindValue(':entry', $_POST['entry']);
$stmt->execute();
$stmt->close();

$db->close();

header('Location: index.php');