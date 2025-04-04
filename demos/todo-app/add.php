<?php
require_once 'htmx.php';

$task = trim($_POST['task'] ?? '');
if ($task) {
    $task = htmlspecialchars($task);
    file_put_contents("tasks.txt", $task . PHP_EOL, FILE_APPEND);
}
include 'list.php';