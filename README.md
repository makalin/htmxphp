# htmx.php – Advanced HTMX Helper for PHP

A lightweight PHP utility to simplify [HTMX](https://htmx.org/) integration into PHP projects.

This helper provides clean, expressive functions for HTMX-specific headers and server-side logic — perfect for building modern interactive web applications without writing JavaScript.

🧪 Project repo: [github.com/makalin/htmxphp](https://github.com/makalin/htmxphp)

---

## 🚀 Features

✅ Detect HTMX requests  
✅ Trigger client-side events  
✅ Redirects, URL push/replace  
✅ JSON, HTML, No-content responses  
✅ DOM swapping helpers  
✅ Client-side navigation & refresh  
✅ Simple function-based API

---

## 📦 Installation

### 1. Download

```bash
wget https://raw.githubusercontent.com/makalin/htmxphp/main/htmx.php
```

or

### 2. Clone the repo

```bash
git clone https://github.com/makalin/htmxphp.git
```

Then require the file in your PHP code:

```php
require_once 'htmx.php';
```

---

## 🧠 API Reference

### 🔍 Request Detection

```php
is_htmx_request(): bool
is_htmx_boosted(): bool
get_htmx_trigger(): ?string
```

### 🎯 Header & Event Helpers

```php
htmx_trigger(string $eventName, array $data = [])
htmx_trigger_multiple(array $events)
htmx_push_url(string $url)
htmx_replace_url(string $url)
htmx_redirect(string $url)
htmx_location(string $url, string $target = "body", string $swap = "innerHTML")
htmx_refresh()
htmx_header(string $key, string $value)
htmx_status(int $code)
```

### 📤 Response Output

```php
htmx_html(string $html)
htmx_json(array $data)
htmx_nocontent()
htmx_replace(string $html)
htmx_raw(string $data)
```

---

## ✅ Example

```php
require_once 'htmx.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');
    if ($msg) {
        file_put_contents("log.txt", $msg . PHP_EOL, FILE_APPEND);
        htmx_trigger('messageReceived', ['text' => $msg]);
        htmx_nocontent();
    } else {
        htmx_status(400);
        htmx_html("<div class='error'>Message is required.</div>");
    }
}
```

---

## 🧪 Use Cases

- Modern form submissions
- Realtime content updates
- Dashboards & activity feeds
- Interactive UIs without JavaScript frameworks

---

## ✅ Requirements

- PHP 7.2+
- HTMX frontend library

---

## 📜 License

MIT License © 2025 [Mehmet Turgay Akalın](https://github.com/makalin)

---

## ⭐️ Star the repo

If this helped you, consider starring the project on GitHub:  
👉 [https://github.com/makalin/htmxphp](https://github.com/makalin/htmxphp)
