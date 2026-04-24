<?php
/**
 * Spam protection — invisible honeypot only.
 * No visible challenge for users. Bots that fill the hidden field are rejected.
 */

function captcha_html(bool $compact = false): string {
    return '<input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;width:0;pointer-events:none;">';
}

function captcha_check(): bool {
    return empty($_POST['website']);
}
