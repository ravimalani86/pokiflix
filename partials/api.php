<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/content-filter.php';

/**
 * POST to the catalog API. Always returns an array with 'ok', 'data',
 * 'total', 'total_pages' - callers never need to guard against exceptions.
 */
function api_post(string $endpoint, array $payload): array
{
    $url = rtrim(API_BASE_URL, '/') . '/' . ltrim($endpoint, '/');
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'X-API-Key: ' . API_KEY,
        ],
        CURLOPT_TIMEOUT => 12,
        CURLOPT_CONNECTTIMEOUT => 6,
    ]);
    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    $fallback = ['ok' => false, 'error' => null, 'data' => [], 'total' => 0, 'total_pages' => 0];

    if ($response === false || $curlError) {
        $fallback['error'] = $curlError ?: 'Request failed';
        return $fallback;
    }

    $json = json_decode($response, true);
    if ($status !== 200 || !is_array($json)) {
        $fallback['error'] = 'API error (HTTP ' . $status . ')';
        return $fallback;
    }

    $json['ok'] = true;
    $json['data'] = $json['data'] ?? [];
    $json['total'] = $json['total'] ?? count($json['data']);
    $json['total_pages'] = $json['total_pages'] ?? 1;
    return $json;
}

function fetch_movies(array $params = []): array
{
    $result = api_post('movies', array_merge([
        'page' => 1,
        'limit' => 20,
        'sort' => 'popularity',
        'order' => 'desc',
        'released_only' => true,
        'include_total' => false,
    ], $params));
    $result['data'] = filter_adult_items($result['data'], 'movie');
    return $result;
}

function fetch_tv(array $params = []): array
{
    $result = api_post('tv', array_merge([
        'page' => 1,
        'limit' => 20,
        'sort' => 'popularity',
        'order' => 'desc',
        'released_only' => true,
        'include_total' => false,
    ], $params));
    $result['data'] = filter_adult_items($result['data'], 'tv');
    return $result;
}
