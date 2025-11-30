<?php
require_once __DIR__ . '/../includes/functions.php';

$response = [
    'status' => 'ready',
    'progress' => 100,
    'message' => 'Demo environment returns completed immediately.',
];

responseJson($response);
