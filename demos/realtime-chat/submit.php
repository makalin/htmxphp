<?php
require_once 'htmx.php';

$filename = "messages.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');
    if ($msg !== '') {
        file_put_contents($filename, htmlspecialchars($msg) . "\n", FILE_APPEND);
        htmx_trigger('newMessage', ['text' => $msg]);
        htmx_nocontent();
    } else {
        htmx_status(400);
        htmx_html("<div style='color:red;'>Message cannot be empty.</div>");
    }
}

if (is_htmx_request()) {
    $lines = array_reverse(file($filename, FILE_IGNORE_NEW_LINES));
    $html = implode('', array_map(fn($l) => "<div>$l</div>", $lines));
    htmx_replace($html);
}