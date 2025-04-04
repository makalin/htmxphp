<?php
require_once 'htmx.php';

$filename = "counter.txt";
$count = file_exists($filename) ? (int) file_get_contents($filename) : 0;
$count++;
file_put_contents($filename, $count);

// Trigger an event (optional for future extensions)
htmx_trigger("counterUpdated", ["count" => $count]);
htmx_nocontent();