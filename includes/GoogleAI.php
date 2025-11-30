<?php
require_once __DIR__ . '/Database.php';

class GeminiAI
{
    public function generateScript(string $topic, string $language = 'tr'): string
    {
        $intro = $language === 'en' ? 'Here is a fast AI-generated script about' : 'İşte hızlıca üretilmiş bir script; konu';
        return sprintf('%s %s. Kullanılacak başlıkları, sahneleri ve kapanışı net tutun.', $intro, $topic);
    }

    public function generateTitle(string $topic): string
    {
        return 'AI Shorts: ' . ucfirst($topic);
    }

    public function suggestHashtags(string $topic): array
    {
        $base = strtolower(str_replace(' ', '', $topic));
        return ['#aishorts', '#automation', '#' . $base];
    }
}

class Veo3API
{
    public function generateVideo(string $prompt, string $aspectRatio = '9:16'): array
    {
        return [
            'status' => 'ready',
            'prompt' => $prompt,
            'aspect_ratio' => $aspectRatio,
            'uri' => '/uploads/videos/' . uniqid('video_', true) . '.mp4',
        ];
    }
}
