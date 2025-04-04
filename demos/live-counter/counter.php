<?php
require_once 'htmx.php';

$count = file_exists("counter.txt") ? (int) file_get_contents("counter.txt") : 0;
echo "<div id='counter'>$count</div>";