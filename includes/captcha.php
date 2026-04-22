<?php
/**
 * Custom CAPTCHA — signed math token (stateless, no sessions needed).
 * Works for both regular form POST and AJAX endpoints.
 *
 * Adds a math question + honeypot field to any form.
 * Call captcha_html() to render, captcha_check() to validate POST.
 */

define('CAPTCHA_SECRET', 'hG7!mK2#nR9@wLsT4jF6dY3bE5zA_pQ8');

function captcha_generate(): array {
    $pairs = [[2,12],[1,9],[2,9]];
    [$min, $max] = $pairs[array_rand($pairs)];
    $a  = rand($min, $max);
    $b  = rand(1, min($a, 9));
    $op = ['+', '-', '×'][rand(0, 2)];
    if ($op === '-' && $b > $a) [$a, $b] = [$b, $a];

    $answer = match($op) {
        '+'  => $a + $b,
        '-'  => $a - $b,
        '×'  => $a * $b,
    };

    $ts    = time();
    $sig   = hash_hmac('sha256', "$answer:$ts", CAPTCHA_SECRET);
    $token = base64_encode(json_encode(['a' => $answer, 't' => $ts, 's' => $sig]));

    return ['question' => "$a $op $b", 'answer' => $answer, 'token' => $token];
}

function captcha_verify(string $token, string|int $user_answer): bool {
    $data = json_decode(base64_decode($token), true);
    if (!is_array($data) || !isset($data['a'], $data['t'], $data['s'])) return false;
    if (time() - (int)$data['t'] > 7200) return false;
    $expected = hash_hmac('sha256', "{$data['a']}:{$data['t']}", CAPTCHA_SECRET);
    if (!hash_equals($expected, $data['s'])) return false;
    return (int)$user_answer === (int)$data['a'];
}

/**
 * Render the captcha block.
 * $compact = true renders a smaller inline version (for newsletter-style forms).
 */
function captcha_html(bool $compact = false): string {
    $c = captcha_generate();
    $q = htmlspecialchars($c['question']);
    $t = htmlspecialchars($c['token']);
    $cls = $compact ? 'captcha-row captcha-compact' : 'captcha-row';
    return <<<HTML
        <div class="{$cls}">
          <span class="captcha-label">What is <strong>{$q}</strong>?</span>
          <input type="number" name="captcha_answer" class="captcha-input" placeholder="Answer" required autocomplete="off" inputmode="numeric">
          <input type="hidden" name="captcha_token" value="{$t}">
          <input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;width:0;pointer-events:none;">
        </div>
        HTML;
}

/**
 * Validate captcha from $_POST. Returns true if valid.
 * Call at the top of any form handler before processing.
 */
function captcha_check(): bool {
    // Honeypot: filled = bot
    if (!empty($_POST['website'])) return false;

    $token  = trim($_POST['captcha_token']  ?? '');
    $answer = trim($_POST['captcha_answer'] ?? '');
    if ($token === '' || $answer === '') return false;

    return captcha_verify($token, $answer);
}
