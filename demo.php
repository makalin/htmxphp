<?php
// demo.php
require 'htmx_class.php';

if (HTMX::isRequest()) {
    // Example: if a specific button triggered the request
    $trigger = HTMX::getTrigger();

    if ($trigger === 'loadMessageButton') {
        HTMX::pushUrl('/message');
        HTMX::trigger('messageLoaded', ['status' => 'ok']);
        echo "<div class='message'>Hello from HTMX response!</div>";
        exit;
    }

    if ($trigger === 'refreshSection') {
        HTMX::refresh();
        exit;
    }

    // Default HTMX response
    echo "<p>HTMX request received. Trigger: " . htmlspecialchars($trigger) . "</p>";
    exit;
}

// Non-HTMX: render full page
?>
<!DOCTYPE html>
<html>
<head>
    <title>HTMX PHP Demo</title>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>
<body>
    <h1>HTMX PHP Integration Demo</h1>

    <button id="loadMessageButton"
            hx-post="demo.php"
            hx-trigger="click"
            hx-target="#response"
            hx-vals='{}'>
        Load Message
    </button>

    <button id="refreshSection"
            hx-post="demo.php"
            hx-trigger="click"
            hx-target="#response"
            hx-vals='{}'>
        Refresh Page
    </button>

    <div id="response" style="margin-top:20px;"></div>
</body>
</html>
