<?php
// Secure global settings fetch fallback for git-tracked deployment
function get_tracking_setting(string $key, string $default = ''): string {
    global $pdo;
    try {
        if (!$pdo) return $default;
        $stmt = $pdo->prepare("SELECT value FROM settings WHERE `key` = ? LIMIT 1");
        $stmt->execute([$key]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (string)$row['value'] : $default;
    } catch (Exception $e) {
        return $default;
    }
}

$default_head = <<<EOD
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T276VJZ8');</script>
<!-- End Google Tag Manager -->
EOD;

$default_body = <<<EOD
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T276VJZ8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
EOD;

$custom_code_head   = get_tracking_setting('custom_code_head', $default_head);
$custom_code_body   = get_tracking_setting('custom_code_body', $default_body);
$custom_code_footer = get_tracking_setting('custom_code_footer');
?>
