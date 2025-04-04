<?php
// htmx.php

/**
 * Check if the request is made via HTMX
 */
function is_htmx_request(): bool {
    return isset($_SERVER['HTTP_HX_REQUEST']) && $_SERVER['HTTP_HX_REQUEST'] === 'true';
}

/**
 * Check if the request is from a boosted link
 */
function is_htmx_boosted(): bool {
    return isset($_SERVER['HTTP_HX_BOOSTED']) && $_SERVER['HTTP_HX_BOOSTED'] === 'true';
}

/**
 * Check if the current request is via HX-Trigger
 */
function get_htmx_trigger(): ?string {
    return $_SERVER['HTTP_HX_TRIGGER'] ?? null;
}

/**
 * Trigger a client-side custom event
 */
function htmx_trigger(string $eventName, array $data = []): void {
    header('HX-Trigger: ' . json_encode([$eventName => $data]));
}

/**
 * Trigger multiple client-side events
 */
function htmx_trigger_multiple(array $events): void {
    header('HX-Trigger: ' . json_encode($events));
}

/**
 * Push URL to the browser history without full reload
 */
function htmx_push_url(string $url): void {
    header('HX-Push-Url: ' . $url);
}

/**
 * Replace browser URL
 */
function htmx_replace_url(string $url): void {
    header('HX-Replace-Url: ' . $url);
}

/**
 * Redirect the browser to a new location
 */
function htmx_redirect(string $url): void {
    header('HX-Redirect: ' . $url);
    exit;
}

/**
 * Client-side location change with swap options
 */
function htmx_location(string $url, string $target = "body", string $swap = "innerHTML"): void {
    header('HX-Location: ' . json_encode([
        "path" => $url,
        "target" => $target,
        "swap" => $swap
    ]));
    exit;
}

/**
 * Refresh the page via client-side
 */
function htmx_refresh(): void {
    header("HX-Refresh: true");
    exit;
}

/**
 * Set a custom response header
 */
function htmx_header(string $key, string $value): void {
    header($key . ': ' . $value);
}

/**
 * Send an HTML response and exit
 */
function htmx_html(string $html): void {
    header('Content-Type: text/html; charset=utf-8');
    echo $html;
    exit;
}

/**
 * Send a JSON response and exit
 */
function htmx_json(array $data): void {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * Respond with a 204 No Content (no change to DOM)
 */
function htmx_nocontent(): void {
    http_response_code(204);
    exit;
}

/**
 * Automatically swap content with provided HTML
 */
function htmx_replace(string $html): void {
    htmx_html($html);
}

/**
 * Echo raw data and stop execution
 */
function htmx_raw(string $data): void {
    echo $data;
    exit;
}

/**
 * Set response code
 */
function htmx_status(int $code): void {
    http_response_code($code);
}
