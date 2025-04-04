<?php
$tasks = file_exists("tasks.txt") ? file("tasks.txt", FILE_IGNORE_NEW_LINES) : [];
echo '<ul>';
foreach ($tasks as $i => $task) {
    echo "<li>" . $task . 
         "<form hx-post='delete.php' hx-target='#todo-list' hx-swap='outerHTML' style='display:inline'>
             <input type='hidden' name='id' value='{$i}'>
             <button type='submit'>❌</button>
          </form></li>";
}
echo '</ul>';