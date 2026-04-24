<?php
// $nav_prefix, set to '' for homepage, 'index.php' for sub-pages (blog, single-post, etc.)
// defaults to 'index.php' so it works safely on all pages
$nav_prefix ??= 'index.php';
?>
<?= $custom_code_body ?? '' ?>
<!-- NAV -->
<nav class="main-nav">
  <div class="container nav-content">
    <a href="index.php" class="logo-img"><img src="uploads/hari-dark-logo.png" alt="Hari Gopinath" width="200" style="height:auto;"></a>
    <div class="nav-links">
      <a href="<?= $nav_prefix ?>#services">Services</a>
      <a href="<?= $nav_prefix ?>#about">About</a>
      <a href="<?= $nav_prefix ?>#pricing">Packages</a>
      <a href="blog.php" <?= basename($_SERVER['PHP_SELF']) === 'blog.php' ? 'class="nav-link-strong" style="color:var(--orange);"' : '' ?>>Blog</a>
      <a href="tools.php" <?= basename($_SERVER['PHP_SELF']) === 'tools.php' ? 'style="color:var(--orange);"' : '' ?>>Tools</a>
    </div>
    <div class="nav-actions">
      <a href="<?= $nav_prefix ?>#contact" class="nav-link-strong">Call Now</a>
      <a href="<?= $nav_prefix ?>#contact" class="btn btn-primary">Get in Touch</a>
    </div>
  </div>
</nav>