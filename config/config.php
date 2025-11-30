<?php
// Basic configuration for database and external services.

// Database connection settings. Override via environment variables.
define('DB_DSN', getenv('DB_DSN') ?: 'mysql:host=localhost;dbname=ai_shorts;charset=utf8mb4');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

define('APP_URL', getenv('APP_URL') ?: 'http://localhost');
define('APP_NAME', 'AI Shorts Pro');

// API credentials placeholders. Replace with real values in production.
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: '');
define('GEMINI_MODEL', getenv('GEMINI_MODEL') ?: 'gemini-1.5-flash');

define('VEO_SERVICE_ACCOUNT', getenv('VEO_SERVICE_ACCOUNT') ?: '');
define('VEO_PROJECT', getenv('VEO_PROJECT') ?: '');
define('VEO_LOCATION', getenv('VEO_LOCATION') ?: '');

define('ELEVENLABS_API_KEY', getenv('ELEVENLABS_API_KEY') ?: '');

define('YOUTUBE_CLIENT_ID', getenv('YOUTUBE_CLIENT_ID') ?: '');
define('YOUTUBE_CLIENT_SECRET', getenv('YOUTUBE_CLIENT_SECRET') ?: '');

define('SMTP_HOST', getenv('SMTP_HOST') ?: 'localhost');
define('SMTP_PORT', getenv('SMTP_PORT') ?: 587);
define('SMTP_USER', getenv('SMTP_USER') ?: '');
define('SMTP_PASS', getenv('SMTP_PASS') ?: '');

define('DEFAULT_TIMEZONE', getenv('DEFAULT_TIMEZONE') ?: 'UTC');

date_default_timezone_set(DEFAULT_TIMEZONE);
