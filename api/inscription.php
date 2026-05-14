<?php
require_once 'i18n.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('register_title') ?></title>
    <meta name="description" content="<?= __('register_subtitle') ?>">
    <link rel="stylesheet" href="<?= $base_path ?>style.css">
    <?php if ($is_rtl): ?>
    <style>body { direction: rtl; text-align: right; }</style>
    <?php endif; ?>
</head>
<body>

<!-- Header -->
<header class="site-header">
    <div class="header-inner">
        <a href="index.php" class="logo">
            <span class="logo-icon">⚽</span>
            KoraNow
        </a>
        <button class="menu-toggle" id="menuToggle" aria-label="Menu">☰</button>
        <nav class="main-nav" id="mainNav">
            <a href="index.php"><?= __('nav_home') ?></a>
            <a href="matchs.php"><?= __('nav_matches') ?></a>
            <a href="creer_match.php"><?= __('nav_create') ?></a>
            <a href="connexion.php"><?= __('nav_login') ?></a>
            <a href="creer_match.php" class="nav-cta"><?= __('nav_cta') ?></a>
        </nav>
    </div>
</header>

<!-- Registration Form -->
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <div style="font-size: 3rem; margin-bottom: 16px;">🎯</div>
            <h2><?= __('register_heading') ?></h2>
            <p><?= __('register_subtitle') ?></p>
        </div>

        <form action="traiter_inscription.php" method="POST">
            <div class="form-group">
                <label for="nom"><?= __('label_name') ?></label>
                <input type="text" id="nom" name="nom" placeholder="<?= __('placeholder_name') ?>" required>
            </div>

            <div class="form-group">
                <label for="email"><?= __('label_email') ?></label>
                <input type="email" id="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="password"><?= __('label_password') ?></label>
                <input type="password" id="password" name="password" placeholder="<?= __('placeholder_password') ?>" required>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top: 8px;">
                <?= __('btn_register') ?>
            </button>
        </form>

        <div class="form-footer">
            <?= __('has_account') ?> <a href="connexion.php"><?= __('login_link') ?></a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="site-footer">
    <p><?= __('footer_rights') ?> · 
        <a href="#"><?= __('footer_about') ?></a> · 
        <a href="#"><?= __('footer_contact') ?></a>
    </p>
</footer>

<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('mainNav').classList.toggle('open');
        this.textContent = this.textContent === '☰' ? '✕' : '☰';
    });
</script>

</body>
</html>
