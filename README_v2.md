# htmx_class.php - HTMX PHP Helper v2

A lightweight PHP utility class for working seamlessly with [HTMX](https://htmx.org), making it easier to handle dynamic, AJAX-style interactions using server-side logic.

---

## 📦 Files

- `htmx_class.php` — Class containing HTMX utility methods.
- `demo.php` — A working example showcasing HTMX and PHP integration.
- `README.md` — This documentation file.

---

## 🚀 Features

- 🔍 Detect HTMX requests
- 🎯 Handle `HX-*` headers easily
- 📡 Send client instructions (redirect, refresh, replace URL)
- 🧠 Support for custom events, target swapping, polling, location updates
- ✅ Clean OOP interface

---

## 🧰 API Reference

### 🧾 Request Identification

| Method | Description |
|--------|-------------|
| `HTMX::isRequest()` | Returns true if the request came from HTMX |
| `HTMX::isBoosted()` | True if it's from a boosted link |
| `HTMX::isHistoryRestore()` | True if back/forward button triggered it |

---

### 📥 Request Meta

| Method | Description |
|--------|-------------|
| `HTMX::getTrigger()` | ID or name of the element that triggered the request |
| `HTMX::getTriggerName()` | The `name` of the triggering element |
| `HTMX::getTarget()` | ID of the element being updated |
| `HTMX::getCurrentUrl()` | URL of the page making the request |
| `HTMX::getPrompt()` | Value returned from `prompt()` if used |
| `HTMX::getRequestMethod()` | Returns 'GET', 'POST', etc. |

---

### 📤 Response Headers

| Method | Description |
|--------|-------------|
| `HTMX::trigger(name, data)` | Triggers a client-side event |
| `HTMX::triggerMultiple(events)` | Triggers multiple events |
| `HTMX::pushUrl(url)` | Pushes a new URL into browser history |
| `HTMX::replaceUrl(url)` | Replaces current browser URL |
| `HTMX::redirect(url)` | Redirects the client to a new page |
| `HTMX::refresh()` | Refreshes the current page |
| `HTMX::reswap(type)` | Sets swap behavior (`outerHTML`, `innerHTML`, etc.) |
| `HTMX::retarget(selector)` | Changes the swap target |
| `HTMX::location(data)` | Programmatic client-side navigation |
| `HTMX::reselect(selector)` | Re-applies selection post-swap |
| `HTMX::stopPolling()` | Stops polling on the client |
| `HTMX::noContent()` | Sends HTTP 204 No Content |
| `HTMX::setHeader(name, value)` | Manually set any header |

---

### 📤 Request Type Helpers

```php
HTMX::isGet()
HTMX::isPost()
HTMX::isPut()
HTMX::isDelete()
```

---

## 🌐 Demo Instructions

Run `demo.php` in a PHP environment (e.g. Apache, Nginx or PHP built-in server).

```bash
php -S localhost:8000
```

Visit: [http://localhost:8000/demo.php](http://localhost:8000/demo.php)

Try clicking:
- **Load Message** → Triggers `HX-Push-Url` + `HX-Trigger`
- **Refresh Page** → Sends `HX-Refresh`

---

## 💡 HTMX Headers Reference

| Header | Description |
|--------|-------------|
| `HX-Request` | Set on all HTMX requests |
| `HX-Boosted` | Indicates request came from a boosted link |
| `HX-Trigger` | The ID of the element that triggered the request |
| `HX-Trigger-Name` | The name of the triggering element |
| `HX-Target` | ID of the element being updated |
| `HX-Current-URL` | URL of the page where request originated |
| `HX-History-Restore-Request` | Indicates navigation through history |
| `HX-Prompt` | Value entered by the user from a `prompt()` |

---

## ✅ Example

```php
require 'htmx_class.php';

if (HTMX::isRequest()) {
    if (HTMX::getTrigger() === 'submitBtn') {
        HTMX::replaceUrl('/thanks');
        HTMX::trigger('formSubmitted', ['time' => time()]);
        echo "<p>Thanks for your submission!</p>";
        exit;
    }
}
```

---

## 🧩 Integrate with Any Framework

You can use `HTMX` inside:
- Laravel (in controllers or middleware)
- Slim / Lumen / Symfony
- WordPress plugins or themes

---

## 📄 License

MIT License. Free to use, modify, and distribute.

Made with ❤️ to bridge PHP and HTMX more seamlessly.
