<?php
function responseJson(array $data, int $statusCode = 200): void
{
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function validateFields(array $body, array $required): array
{
    $missing = [];
    foreach ($required as $field) {
        if (!array_key_exists($field, $body) || $body[$field] === '') {
            $missing[] = $field;
        }
    }
    return $missing;
}

function clean(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
