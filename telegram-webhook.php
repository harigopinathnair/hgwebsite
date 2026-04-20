<?php
// Receive input from Telegram Webhook
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update || !isset($update['message'])) {
    http_response_code(200);
    exit;
}

$message = $update['message'];
$text = trim($message['text'] ?? '');
$chat_id = $message['chat']['id'] ?? '';

// Only respond if it matches our configuration
require_once __DIR__ . '/chat-api.php'; // gets TELEGRAM_CHAT_ID config

// Only process messages from the authorized admin chat ID
if ((string)$chat_id !== (string)TELEGRAM_CHAT_ID) {
    http_response_code(200);
    exit;
}

// Check for reply command: "/r [session_id] [message]"
if (preg_match('/^\/r\s+(\d+)\s+(.+)$/s', $text, $matches)) {
    $session_id = (int)$matches[1];
    $reply_text = trim($matches[2]);

    require_once __DIR__ . '/db.php';
    
    // Validate session exists
    $stmt = $pdo->prepare("SELECT status FROM chat_sessions WHERE id = ?");
    $stmt->execute([$session_id]);
    $sess = $stmt->fetch();
    
    if ($sess) {
        if ($sess['status'] === 'closed') {
            telegram_notify("⚠️ Session #$session_id is closed. Your message was not sent.");
        } else {
            // Insert admin reply
            $pdo->prepare("UPDATE chat_sessions SET updated_at = NOW() WHERE id = ?")->execute([$session_id]);
            $pdo->prepare("INSERT INTO chat_messages (session_id, sender, message) VALUES (?, 'admin', ?)")->execute([$session_id, $reply_text]);
            telegram_notify("✅ Sent to Session #$session_id");
        }
    } else {
        telegram_notify("❌ Invalid session ID: #$session_id");
    }
}

// Acknowledge receipt
http_response_code(200);
exit;
