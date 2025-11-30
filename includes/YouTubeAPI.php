<?php
require_once __DIR__ . '/Database.php';

class YouTubeAPI
{
    public function getAuthUrl(): string
    {
        return APP_URL . '/youtube-callback.php';
    }

    public function uploadVideo(string $filePath, string $title, string $description): array
    {
        return [
            'status' => 'uploaded',
            'title' => $title,
            'description' => $description,
            'file' => $filePath,
            'youtube_id' => uniqid('yt_', true),
        ];
    }
}
