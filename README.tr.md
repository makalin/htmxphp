# htmx.php – PHP için Gelişmiş HTMX Yardımcısı

[HTMX](https://htmx.org/) entegrasyonunu PHP projelerine dahil etmeyi kolaylaştıran hafif bir PHP yardımcı aracı.

Bu yardımcı sınıf, HTMX'e özgü başlıklar ve sunucu tarafı mantığı için temiz, ifade gücü yüksek fonksiyonlar sağlar — JavaScript yazmadan modern, etkileşimli web uygulamaları oluşturmak için idealdir.

🧪 Proje deposu: [github.com/makalin/htmxphp](https://github.com/makalin/htmxphp)

---

## 🚀 Özellikler

✅ HTMX isteklerini algıla  
✅ İstemci tarafında olay tetikleme  
✅ Yönlendirmeler, URL push/değiştirme  
✅ JSON, HTML, içeriksiz (no-content) yanıtlar  
✅ DOM değiştirme yardımcıları  
✅ İstemci tarafı gezinme ve yenileme  
✅ Basit fonksiyon tabanlı API

---

## 📦 Kurulum

### 1. İndir

```bash
wget https://raw.githubusercontent.com/makalin/htmxphp/main/htmx.php
```

veya

### 2. Depoyu klonla

```bash
git clone https://github.com/makalin/htmxphp.git
```

Daha sonra PHP dosyanıza dahil edin:

```php
require_once 'htmx.php';
```

---

## 🧠 API Referansı

### 🔍 İstek Algılama

```php
is_htmx_request(): bool
is_htmx_boosted(): bool
get_htmx_trigger(): ?string
```

### 🎯 Başlık & Olay Yardımcıları

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

### 📤 Yanıt Gönderme

```php
htmx_html(string $html)
htmx_json(array $data)
htmx_nocontent()
htmx_replace(string $html)
htmx_raw(string $data)
```

---

## ✅ Örnek

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
        htmx_html("<div class='error'>Mesaj gereklidir.</div>");
    }
}
```

---

## 🧪 Kullanım Alanları

- Modern form gönderimleri  
- Gerçek zamanlı içerik güncellemeleri  
- Panolar & etkinlik akışları  
- JavaScript framework’leri olmadan etkileşimli arayüzler

---

## ✅ Gereksinimler

- PHP 7.2+  
- HTMX frontend kütüphanesi

---

## 📜 Lisans

MIT Lisansı © 2025 [Mehmet Turgay Akalın](https://github.com/makalin)

---

## ⭐️ Repoyu yıldızla

Eğer bu proje işinize yaradıysa, GitHub'da repoya yıldız vererek destek olabilirsiniz:  
👉 [https://github.com/makalin/htmxphp](https://github.com/makalin/htmxphp)
