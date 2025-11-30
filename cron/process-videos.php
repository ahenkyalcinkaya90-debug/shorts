<?php
require_once __DIR__ . '/../includes/VideoProcessor.php';
require_once __DIR__ . '/../includes/functions.php';

$pending = [
    [
        'topic' => 'Demo processing job',
        'duration' => 30,
        'language' => 'tr',
        'style' => 'energetic',
        'aspect_ratio' => '9:16',
        'script' => '',
        'title' => '',
    ],
];

$processor = new VideoProcessor();
foreach ($pending as $video) {
    $result = $processor->process($video);
    echo sprintf("Processed video '%s' -> %s\n", $video['topic'], $result['video_uri']);
}
