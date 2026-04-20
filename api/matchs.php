<?php
require_once 'i18n.php';

// Connexion à la base de données
$db_host = getenv('DB_HOST') ?: "localhost";
$db_user = getenv('DB_USER') ?: "root";
$db_pass = getenv('DB_PASS') ?: "";
$db_name = getenv('DB_NAME') ?: "koranow_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur connexion DB: " . $conn->connect_error);
}

// Récupérer les matchs
$sql = "SELECT * FROM matches ORDER BY id DESC";
$result = $conn->query($sql);

// Vérifier la requête
if (!$result) {
    die("Erreur requête SQL: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('matchs_title') ?></title>
    <meta name="description" content="<?= __('matchs_subtitle') ?>">
    <link rel="stylesheet" href="/style.css">
    <?php if ($is_rtl): ?>
    <style>
        body { direction: rtl; text-align: right; }
        .data-table thead th { text-align: right; }
        .data-table tbody td:first-child { border-radius: 0 var(--radius-md) var(--radius-md) 0; }
        .data-table tbody td:last-child { border-radius: var(--radius-md) 0 0 var(--radius-md); }
    </style>
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
            <a href="matchs.php" class="active"><?= __('nav_matches') ?></a>
            <a href="creer_match.php"><?= __('nav_create') ?></a>
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

<!-- Page Content -->
<div class="page-container">
    <div class="page-header">
        <h2><?= __('matchs_heading') ?></h2>
        <p><?= __('matchs_subtitle') ?></p>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <div class="glass-card" style="padding: 0; overflow: hidden;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th><?= __('th_city') ?></th>
                        <th><?= __('th_date') ?></th>
                        <th><?= __('th_time') ?></th>
                        <th><?= __('th_place') ?></th>
                        <th><?= __('th_players') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr class="animate-in">
                            <td><?= htmlspecialchars($row['ville']) ?></td>
                            <td><?= htmlspecialchars($row['date_match']) ?></td>
                            <td><?= htmlspecialchars($row['heure_match']) ?></td>
                            <td><?= htmlspecialchars($row['lieu']) ?></td>
                            <td>
                                <span class="match-badge"><?= htmlspecialchars($row['joueurs']) ?> <?= __('players_suffix') ?></span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="glass-card" style="text-align: center; padding: 60px 30px;">
            <div style="font-size: 4rem; margin-bottom: 20px;">🏟️</div>
            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.4rem; margin-bottom: 10px;">
                <?= __('no_match_title') ?>
            </h3>
            <p style="color: var(--text-muted); margin-bottom: 24px;">
                <?= __('no_match_desc') ?>
            </p>
            <a href="creer_match.php" class="btn btn-primary">
                <?= __('btn_create_match') ?>
            </a>
        </div>
    <?php endif; ?>
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

    // Animate table rows
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-in').forEach((el, i) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(15px)';
        el.style.transition = `all 0.5s cubic-bezier(0.4, 0, 0.2, 1) ${i * 0.08}s`;
        observer.observe(el);
    });
</script>

</body>
</html>
