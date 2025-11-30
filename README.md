# AI Shorts Pro

AI Shorts Pro is an AI-powered SaaS platform that automates short-form video creation and publishing for YouTube, TikTok, and Instagram. Users provide a topic, and the system generates a script, voiceover, and video before automatically uploading it to connected channels.

## Core Flow

1. Enter a topic.
2. Generate a script with Gemini.
3. Create voiceover (ElevenLabs or Edge TTS).
4. Produce video with Veo.
5. Upload to social channels with scheduling.

## Technical Stack
- **Language:** PHP 7.4+ (OOP), MVC-style structure
- **Database:** MySQL 5.7+ (InnoDB)
- **Security:** CSRF protection, prepared statements, password hashing (bcrypt)
- **Media:** FFmpeg for merging, thumbnails, and conversions
- **Frontend:** Bootstrap 5.3, Font Awesome 6, Google Fonts (Inter)

### AI Integrations
- **Gemini 2.5 Flash:** Script generation, prompts, titles, descriptions, hashtags (models: gemini-2.0-flash-exp, gemini-1.5-flash, gemini-1.5-pro)
- **Veo 3.1:** 5–8 second videos (aspect ratios: 9:16, 16:9, 1:1) with fallback via Generative Language + Vertex AI
- **ElevenLabs / Edge TTS:** Multilingual voices (TR/EN), MP3 output

### External Services
- **YouTube Data API v3:** OAuth 2.0 upload automation (multi-channel support)
- **SMTP:** Email notifications
- **Cron jobs:** Background video processing and uploads

## User Roles
- **Users:** Video creation, YouTube linking, profile/subscription management
- **Admins:** System settings, user management, API config, moderation (roles: Super Admin, Admin, Moderator)

## Feature Modules

### Video Generation Engine
- **Script creation:** Topic-to-script with niche-specific prompts (12 niches) and length-aware tuning (30–60 seconds)
- **Audio:** Premium (ElevenLabs) and free (Edge TTS) voice options
- **Video:** Prompted Veo renders with style presets (cinematic, modern, documentary, energetic, calm, tech) and automatic fallbacks
- **Post-processing:** FFmpeg merge, thumbnail from first frame, MP4 output, size optimization
- **State tracking:** `pending → processing → generating_audio → generating_video → merging → ready → published`, retries (max 3), detailed logs, real-time progress

### YouTube Integration
- OAuth connect with token refresh
- Auto title/description/hashtag suggestions (Gemini)
- Privacy options, categories, scheduling
- Channel stats and connection status

### Subscription & Packages
- **Defaults:** Free (10/mo), Starter (50/mo), Professional (200/mo), Enterprise (unlimited)
- **Limits:** Monthly/daily video caps, storage, credits, auto-renew, upgrade/downgrade

### Payments
- Bank transfer/EFT, credit card (iyzico, PayTR, Stripe ready), crypto (optional)
- Coupons (percentage/fixed), limits, validity windows; default codes: `HOSGELDIN`, `WELCOME20`, `LAUNCH50`
- Invoicing, payment history, status tracking

### Referrals
- Unique referral codes (`register.php?ref=CODE`), multi-level affiliate (optional), earnings view

### Support & Communication
- Contact form with status tracking and IP logging
- Ticketing (Technical, Billing, General, Feature Request, Bug Report) with priorities and statuses; user-admin messaging

### Security Highlights
- CSRF tokens, prepared statements, XSS sanitization, bcrypt password hashing, email verification, suggested rate limiting

### Admin Panel
Dashboards for users, packages, payments, videos, coupons, niches, API settings, messages, tickets, site settings, logs, and bulk actions.

### User Panel
Dashboard with credits, package details, recent videos; video creation wizard; video list with filters, YouTube upload, downloads, stats; scheduling; script ideas; subscription and payment history; affiliate info; profile and notification settings.

### Automation (Cron)
- `cron/process-videos.php` (minutely): queue processing with retries
- `cron/upload-scheduled.php` (every 5 min): scheduled YouTube uploads with token refresh
- `cron/check-subscriptions.php` (daily): expiry handling and notifications
- `cron/cleanup.php` (daily): temp cleanup and log pruning

## Database Overview
17 primary tables including `users`, `packages`, `subscriptions`, `payments`, `niches`, `videos`, `video_queue`, `video_logs`, `youtube_channels`, `video_schedules`, `upload_queue`, `coupons`, `contact_messages`, and `support_tickets`. Relationships enforce user/package/video/channel links.

## Folder Structure
```
ai-shorts-saas/
├── config/                    # config.php
├── includes/                  # core classes (Auth, Database, GoogleAI, ElevenLabs, YouTubeAPI, VideoProcessor, SMTP, helpers)
├── admin/                     # admin screens + includes
├── panel/                     # user screens + includes
├── api/                       # API endpoints
├── cron/                      # cron scripts
├── database/                  # schema & migrations
├── uploads/                   # videos, thumbnails, temp
├── assets/                    # css/js
├── templates/                 # public templates
└── public pages               # index, pricing, blog, auth, legal
```

## Installation
1. Upload files (cPanel/FTP).
2. Create MySQL DB and import `database/database.sql`.
3. Update `config/config.php` with DB credentials.
4. Set `uploads/` permissions to `755`.
5. Create first admin manually or run `setup/setup-admin.php`.
6. Configure AI/YouTube/ElevenLabs keys in the admin panel.
7. Add cron: `cron/process-videos.php` every minute.
8. Test connections via `api/test-connections.php`.

### Local Quickstart (demo stubs)
- Serve the project with PHP's built-in server: `php -S 0.0.0.0:8000`.
- Generate a script: `curl -X POST http://localhost:8000/api/generate-script.php -d '{"topic":"Başarılı olmanın 5 kuralı"}' -H "Content-Type: application/json"`.
- Create a demo video payload: `curl -X POST http://localhost:8000/api/create-video.php -d '{"topic":"Başarılı olmanın 5 kuralı","duration":45}' -H "Content-Type: application/json"`.
- Check status: `curl http://localhost:8000/api/check-status.php`.

## Roadmap Highlights
- TikTok & Instagram Reels integrations (priority)
- Voice cloning, video templates, URL-to-video, multilingual support, brand kit, AI avatar, analytics dashboard, bulk creation (CSV), Zapier/Make, public API, mobile apps, white label.

## Support & Docs
- User how-tos (video creation, YouTube linking, upgrades, referrals)
- Admin guides (API setup, package/payment handling, cron setup)
- Developer references (API endpoints, DB schema, class reference, webhooks)

## Performance Notes
- DB indexing on frequent queries (`users.email`, `videos.status`, `video_queue.status`)
- Caching site settings and package data
- CDN for assets, lazy-loaded thumbnails, pagination (~20 per page)

## Target Audience
YouTubers, social media managers, agencies, e-commerce teams, educators, affiliate marketers, and entrepreneurs seeking a white-labelable short-form video automation platform.
