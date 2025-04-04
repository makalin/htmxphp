<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HTMX Realtime Chat</title>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <style>
    body { font-family: Arial; max-width: 600px; margin: 2rem auto; }
    #chat-box { border: 1px solid #ccc; padding: 1rem; height: 200px; overflow-y: auto; margin-bottom: 1rem; }
  </style>
</head>
<body>

  <h2>Realtime Chat with HTMX + PHP</h2>

  <div id="chat-box" hx-get="submit.php" hx-trigger="every 2s" hx-swap="innerHTML">
    Loading messages...
  </div>

  <form id="chat-form" hx-post="submit.php" hx-target="#chat-box" hx-swap="innerHTML">
    <input type="text" name="message" placeholder="Type your message..." required>
    <button type="submit">Send</button>
  </form>

</body>
</html>