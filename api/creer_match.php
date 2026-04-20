<?php
require_once 'i18n.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('create_title') ?></title>
    <meta name="description" content="<?= __('create_subtitle') ?>">
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
            <a href="creer_match.php" class="active"><?= __('nav_create') ?></a>
            <a href="connexion.php"><?= __('nav_login') ?></a>
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

<!-- Create Match Form -->
<div class="form-container" style="max-width: 580px;">
    <div class="form-card">
        <div class="form-header">
            <div style="font-size: 3rem; margin-bottom: 16px;">🏟️</div>
            <h2><?= __('create_heading') ?></h2>
            <p><?= __('create_subtitle') ?></p>
        </div>

        <form action="traiter_match.php" method="POST">
            <div class="form-group">
                <label for="ville"><?= __('label_city') ?></label>
                <input type="text" id="ville" name="ville" placeholder="<?= __('placeholder_city') ?>" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label for="date_match"><?= __('label_date') ?></label>
                    <input type="date" id="date_match" name="date_match" required>
                </div>

                <div class="form-group">
                    <label for="heure_match"><?= __('label_time') ?></label>
                    <input type="time" id="heure_match" name="heure_match" required>
                </div>
            </div>

            <div class="form-group">
                <label for="lieu"><?= __('label_place') ?></label>
                <input type="text" id="lieu" name="lieu" placeholder="<?= __('placeholder_place') ?>" required>
            </div>

            <div class="form-group">
                <label for="joueurs"><?= __('label_players') ?></label>
                <select id="joueurs" name="joueurs" required>
                    <option value=""><?= __('select_players') ?></option>
                    <option value="1">1 <?= __('player_word') ?></option>
                    <option value="2">2 <?= __('players_word') ?></option>
                    <option value="3">3 <?= __('players_word') ?></option>
                    <option value="4">4 <?= __('players_word') ?></option>
                    <option value="5">5 <?= __('players_word') ?></option>
                    <option value="6">6 <?= __('players_word') ?></option>
                    <option value="7">7 <?= __('players_word') ?></option>
                    <option value="8">8 <?= __('players_word') ?></option>
                    <option value="9">9 <?= __('players_word') ?></option>
                    <option value="10">10 <?= __('players_word') ?></option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top: 12px;">
                <?= __('btn_create') ?>
            </button>
        </form>
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
