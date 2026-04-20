<?php
require_once 'auth.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['image'])) {
    echo json_encode(['error' => 'No file received.']);
    exit;
}

$file    = $_FILES['image'];
$allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$mime    = mime_content_type($file['tmp_name']);

if (!in_array($mime, $allowed)) {
    echo json_encode(['error' => 'Only JPEG, PNG, WebP, or GIF allowed.']);
    exit;
}

if ($file['size'] > 5 * 1024 * 1024) {
    echo json_encode(['error' => 'Image must be under 5 MB.']);
    exit;
}

$upload_dir = __DIR__ . '/../uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

$ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$filename = 'content-' . uniqid('', true) . '.' . $ext;

if (!move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
    echo json_encode(['error' => 'Failed to save image. Check folder permissions.']);
    exit;
}

echo json_encode(['url' => '../uploads/' . $filename]);
