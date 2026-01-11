<?php
require_once "includes/db.php";
require_once "includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["task"])) {
        addTask($conn, $_POST["task"]);
    }
}

header("Location: index.php");
exit;
