<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/VideoProcessor.php';

$body = json_decode(file_get_contents('php://input'), true) ?? [];
$missing = validateFields($body, ['topic', 'duration']);

if ($missing) {
    responseJson(['error' => 'Missing fields: ' . implode(', ', $missing)], 422);
}

$video = [
    'topic' => $body['topic'],
    'duration' => (int) $body['duration'],
    'language' => $body['language'] ?? 'tr',
    'style' => $body['style'] ?? 'cinematic',
    'aspect_ratio' => $body['aspect_ratio'] ?? '9:16',
    'script' => $body['script'] ?? '',
    'title' => $body['title'] ?? '',
];

$processor = new VideoProcessor();
$result = $processor->process($video);

responseJson([
    'status' => $result['status'],
    'script' => $result['script'],
    'title' => $result['title'],
    'hashtags' => $result['hashtags'],
    'video_uri' => $result['video_uri'],
    'prompt' => $result['prompt'],
]);
