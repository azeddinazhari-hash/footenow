<?php
require_once 'i18n.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('login_title') ?></title>
    <meta name="description" content="<?= __('login_subtitle') ?>">
    <link rel="stylesheet" href="/style.css">
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
            <a href="connexion.php" class="active"><?= __('nav_login') ?></a>
            <a href="creer_match.php" class="nav-cta"><?= __('nav_cta') ?></a>

            <!-- Language Switcher -->
            <div class="lang-bar">
                <a href="?lang=fr" class="lang-flag-btn <?= $lang === 'fr' ? 'active' : '' ?>" title="Français">
                    <span class="lang-flag-icon">🇫🇷</span>
                </a>
                <a href="?lang=en" class="lang-flag-btn <?= $lang === 'en' ? 'active' : '' ?>" title="English">
                    <span class="lang-flag-icon">🇬🇧</span>
                </a>
                <a href="?lang=ar" class="lang-flag-btn <?= $lang === 'ar' ? 'active' : '' ?>" title="العربية">
                    <span class="lang-flag-icon">🇸🇦</span>
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- Login Form -->
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <div style="font-size: 3rem; margin-bottom: 16px;">🔐</div>
            <h2><?= __('login_heading') ?></h2>
            <p><?= __('login_subtitle') ?></p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="form-error">
                <?= __('login_error') ?>
            </div>
        <?php endif; ?>

        <form action="traiter_connexion.php" method="POST">
            <div class="form-group">
                <label for="email"><?= __('label_email') ?></label>
                <input type="email" id="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="password"><?= __('label_password') ?></label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top: 8px;">
                <?= __('btn_login') ?>
            </button>
        </form>

        <div class="form-footer">
            <?= __('no_account') ?> <a href="inscription.php"><?= __('register_link') ?></a>
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
