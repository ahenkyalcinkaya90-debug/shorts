<?php include __DIR__ . '/templates/header.php'; ?>
<div class="card">
    <h2>Tek Tıkla Kısa Video</h2>
    <p>Gemini ile script, Veo ile video, ElevenLabs ile ses ve YouTube ile otomatik yükleme akışını tek sayfada deneyin.</p>
</div>
<div class="card">
    <h3>API Uçları</h3>
    <ul>
        <li><strong>POST</strong> /api/generate-script.php</li>
        <li><strong>POST</strong> /api/create-video.php</li>
        <li><strong>GET</strong> /api/check-status.php</li>
    </ul>
    <p>Örnek istek gövdesi:</p>
    <pre>{
  "topic": "Başarılı olmanın 5 kuralı",
  "duration": 45,
  "language": "tr",
  "style": "cinematic"
}</pre>
</div>
<div class="card">
    <h3>CLI İşlemleri</h3>
    <p><code>php cron/process-videos.php</code> komutu bekleyen işleri işler.</p>
</div>
<?php include __DIR__ . '/templates/footer.php'; ?>
