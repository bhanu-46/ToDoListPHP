<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    deleteTask($conn, $id);
}

header("Location: index.php");
exit;
