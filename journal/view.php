<?php
/**
 * Web journal view
 * All the views for the application.
 * @author  Ross Masters <ross@php.net>
 * @license GPL 3.0 http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <title>Journal</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <style type="text/css">
        body {
            font: 0.85em Arial;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        a, a:visited {
            color: #3185C5;
            text-decoration: none;
        }
        
        #container {
            margin: 0.50em auto;
            text-align: left;
            width: 40%;
        }
        
        #header {
        }
        
        h1 {
            float: left;
            margin: 0;
            padding: 0.50em;
        }
        
        #header p {
            float: right;
            margin: 0;
            padding: 1.50em;
        }
        
        .message {
            background: #EFEF88;
            border: 1px solid #DEDE88;
            margin: 0;
            padding: 0.25em;
        }
        
        h2, h3 {
            margin: 0;
            padding: 0.25em 0;
        }
        
       form {
            background: #F5F5F5;
            border: 3px solid #E5E5E5;
            margin: 0.50em 0;
            padding: 0.50em;
        }
        
        label:after {
            content: ':';
        }
        
        .entry {
            margin: 0;
            padding: 0.50em;
        }
        
        .entry:nth-child(2n) {
            background: #F5F5F5;
        }
        
        .entry q {
            font-size: 1.25em;
            quotes: none;
        }
        
        .entry .timestamp {
            color: #888;
            cursor: help;
        }
        
        .entry .timestamp:before {
            content: '- ';
        }
        
        .clear {
            clear: both;
            height: 0;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>Journal</h1>
            <?php if (ACCESS && PASSWORD): ?>
            <p><a href="logout.php">Logout</a></p>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
        
        <?php if (isset($_GET['message'])): ?>
        <p class="message"><?= urldecode($_GET['message']) ?></p>
        <?php endif; ?>
        
    <?php if (ACCESS): ?>
        <form action="post.php" method="post">
            <h2>Post an entry</h2>
            <p><label for="entry">Entry</label>
                <input type="text" name="entry" id="entry">
                <input type="submit" value="Post"></p>
        </form>
    
        <?php if (isset($posts) && count($posts) != 0): ?>
        <h2>Journal entries</h2>
            <?php foreach ($posts as $day => $postList): ?>
            <h3><?= dateToHuman($day) ?></h3>
                <?php foreach ($postList as $post): ?>
                <p class="entry"><q><?= $post['entry'] ?></q> <a title="<?= date('r', $post['posted']) ?>" class="timestamp"><?= date('H:i', $post['posted']) ?></a></p>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php elseif (isset($posts)): ?>
            <p>No entries posted yet.</p>
        <?php else: ?>
            <p>Failed to load entries.</p>
        <?php endif; ?>
    <?php else: ?>
        <form action="access.php" method="post">
            <h2>Access denied</h2>
            <p>Access to this journal is protected by a password.</p>
            <p><label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Access" /></p>
        </form>
    <?php endif; ?>
    </div>
</body>
</html>
