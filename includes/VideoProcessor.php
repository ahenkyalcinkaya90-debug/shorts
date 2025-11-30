<?php
require_once __DIR__ . '/GoogleAI.php';
require_once __DIR__ . '/functions.php';

class VideoProcessor
{
    public function process(array $video): array
    {
        $gemini = new GeminiAI();
        $veo = new Veo3API();

        $script = $video['script'] ?: $gemini->generateScript($video['topic'], $video['language']);
        $title = $video['title'] ?: $gemini->generateTitle($video['topic']);
        $hashtags = $gemini->suggestHashtags($video['topic']);

        $prompt = sprintf('%s | style: %s | duration: %s seconds', $script, $video['style'], $video['duration']);
        $veoResult = $veo->generateVideo($prompt, $video['aspect_ratio']);

        return [
            'status' => 'ready',
            'script' => $script,
            'title' => $title,
            'hashtags' => $hashtags,
            'video_uri' => $veoResult['uri'],
            'prompt' => $prompt,
        ];
    }
}
