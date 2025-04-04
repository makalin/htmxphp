<?php require_once 'htmx.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HTMX To-Do List</title>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <style>
    body { font-family: sans-serif; max-width: 600px; margin: 3rem auto; }
    form, ul { margin-bottom: 1rem; }
    input[type="text"] { padding: 0.5rem; width: 80%; }
    button { padding: 0.5rem; }
    li { display: flex; justify-content: space-between; margin: 0.25rem 0; }
  </style>
</head>
<body>

  <h2>📋 HTMX To-Do List</h2>

  <form hx-post="add.php" hx-target="#todo-list" hx-swap="outerHTML">
    <input type="text" name="task" placeholder="Add a new task..." required>
    <button type="submit">Add</button>
  </form>

  <div id="todo-list" hx-get="list.php" hx-trigger="load" hx-swap="outerHTML">
    Loading tasks...
  </div>

</body>
</html>