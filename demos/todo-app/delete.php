<?php
require_once 'htmx.php';

$id = (int) ($_POST['id'] ?? -1);
$tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES);
if (isset($tasks[$id])) {
    unset($tasks[$id]);
    file_put_contents("tasks.txt", implode(PHP_EOL, $tasks) . PHP_EOL);
}
include 'list.php';