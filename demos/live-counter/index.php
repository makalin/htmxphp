<?php require_once 'htmx.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live Counter with HTMX</title>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <style>
    body { font-family: sans-serif; text-align: center; margin-top: 5rem; }
    #counter { font-size: 4rem; margin-bottom: 1rem; }
    button { font-size: 1.5rem; padding: 1rem 2rem; }
  </style>
</head>
<body>

  <div id="counter" hx-get="counter.php" hx-trigger="load, every 2s" hx-swap="outerHTML">
    Loading...
  </div>

  <button hx-post="increment.php" hx-swap="none">
    🔼 Increment
  </button>

</body>
</html>