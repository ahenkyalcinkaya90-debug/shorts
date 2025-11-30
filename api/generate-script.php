<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/GoogleAI.php';

$body = json_decode(file_get_contents('php://input'), true) ?? [];
$missing = validateFields($body, ['topic']);

if ($missing) {
    responseJson(['error' => 'Missing fields: ' . implode(', ', $missing)], 422);
}

$gemini = new GeminiAI();
$script = $gemini->generateScript($body['topic'], $body['language'] ?? 'tr');
$title = $gemini->generateTitle($body['topic']);
$hashtags = $gemini->suggestHashtags($body['topic']);

responseJson([
    'script' => $script,
    'title' => $title,
    'hashtags' => $hashtags,
]);
