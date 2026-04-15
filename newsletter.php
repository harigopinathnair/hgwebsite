<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php#newsletter');
    exit;
}

try {
    require_once __DIR__ . '/db.php';

    // Auto-create subscribers table
    $pdo->exec("CREATE TABLE IF NOT EXISTS subscribers (
        id         INT(11)      AUTO_INCREMENT PRIMARY KEY,
        email      VARCHAR(255) NOT NULL UNIQUE,
        status     VARCHAR(20)  NOT NULL DEFAULT 'active',
        source     VARCHAR(100) NOT NULL DEFAULT 'website',
        created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // Insert — ignore duplicates
    $stmt = $pdo->prepare("INSERT IGNORE INTO subscribers (email, source) VALUES (?, 'newsletter_form')");
    $stmt->execute([$email]);

} catch (Exception $e) {
    error_log('Newsletter error: ' . $e->getMessage());
}

// Redirect back with success flag
header('Location: index.php?subscribed=1#newsletter');
exit;
