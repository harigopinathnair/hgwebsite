<?php
/**
 * Spam protection — invisible honeypot only.
 * No visible challenge for users. Bots that fill the hidden field are rejected.
 */

function captcha_html(bool $compact = false): string {
    $style = $compact ? 'margin-top: 0; margin-bottom: 0.5rem;' : 'margin-bottom: 1rem;';
    $label_margin = $compact ? '0.2rem' : '0.5rem';
    return '<div class="captcha-box" style="' . $style . '">
        <label style="display:block; font-size:0.9rem; font-weight: 500; margin-bottom:' . $label_margin . '; color:var(--text-dark);">Are you human? What is 3 + 4?</label>
        <input type="text" name="math_challenge" placeholder="Enter sum" required style="margin-bottom:0; width: 100%;">
    </div>';
}

function captcha_check(): bool {
    return isset($_POST['math_challenge']) && trim($_POST['math_challenge']) === '7';
}
