<?php
defined('TELEGRAM_BOT_TOKEN') || define('TELEGRAM_BOT_TOKEN', '7721750928:AAHLm-Ma7DclGTxrUJ_Q2hYMGnYCtAhNajM');
defined('TELEGRAM_CHAT_ID')   || define('TELEGRAM_CHAT_ID',   '5683352272');

function telegram_notify(string $message): void {
    if (empty(TELEGRAM_CHAT_ID) || TELEGRAM_CHAT_ID === 'REPLACE_WITH_YOUR_CHAT_ID') return;
    $ch = curl_init("https://api.telegram.org/bot" . TELEGRAM_BOT_TOKEN . "/sendMessage");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_POSTFIELDS     => http_build_query([
            'chat_id'    => TELEGRAM_CHAT_ID,
            'text'       => $message,
            'parse_mode' => 'HTML',
        ]),
    ]);
    curl_exec($ch);
    curl_close($ch);
}
