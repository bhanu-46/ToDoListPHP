<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (isset($_GET['id'])) {
    markComplete($conn, $_GET['id']);
}

header("Location: index.php");
exit;
