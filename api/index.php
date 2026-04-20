<?php
session_start();
require_once 'i18n.php';
$nom = $_SESSION['user_nom'] ?? null;
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('page_title') ?></title>
    <meta name="description" content="<?= __('meta_desc') ?>">
    <link rel="stylesheet" href="../style.css">
    <?php if ($is_rtl): ?>
    <style>
        body { direction: rtl; text-align: right; }
        .main-nav { direction: ltr; }
        .hero { direction: rtl; }
        .feature-step { left: 20px; right: auto; }
        .match-item:hover { transform: translateX(-4px); }
        .header-inner { direction: rtl; }
        .main-nav { direction: rtl; }
        .lang-dropdown { direction: ltr; }
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
            <a href="index.php" class="active"><?= __('nav_home') ?></a>
            <a href="matchs.php"><?= __('nav_matches') ?></a>
            <a href="creer_match.php"><?= __('nav_create') ?></a>
            <?php if ($nom): ?>
                <a href="connexion.php"><?= htmlspecialchars($nom) ?></a>
            <?php else: ?>
                <a href="connexion.php"><?= __('nav_login') ?></a>
            <?php endif; ?>
            <a href="creer_match.php" class="nav-cta"><?= __('nav_cta') ?></a>

            <!-- Language Switcher — Inline Bar -->
            <div class="lang-bar">
                <a href="?lang=fr" class="lang-flag-btn <?= $lang === 'fr' ? 'active' : '' ?>" title="Français" aria-label="Français">
                    <span class="lang-flag-icon">🇫🇷</span>
                </a>
                <a href="?lang=en" class="lang-flag-btn <?= $lang === 'en' ? 'active' : '' ?>" title="English" aria-label="English">
                    <span class="lang-flag-icon">🇬🇧</span>
                </a>
                <a href="?lang=ar" class="lang-flag-btn <?= $lang === 'ar' ? 'active' : '' ?>" title="العربية" aria-label="العربية">
                    <span class="lang-flag-icon">🇸🇦</span>
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero">
    <?php if ($nom): ?>
        <div class="welcome-banner">
            <?= __('welcome') ?> <b><?= htmlspecialchars($nom) ?></b> <?= __('welcome_end') ?>
        </div>
    <?php endif; ?>

    <div class="hero-badge">
        <?= __('hero_badge') ?>
    </div>

    <h1>
        <?= __('hero_title_1') ?><br>
        <span class="highlight"><?= __('hero_title_2') ?></span>
    </h1>

    <p>
        <?= __('hero_desc') ?>
    </p>

    <div class="hero-buttons">
        <a href="matchs.php" class="btn btn-primary">
            <?= __('btn_see_matches') ?>
        </a>
        <a href="creer_match.php" class="btn btn-secondary">
            <?= __('btn_create_match') ?>
        </a>
    </div>
</section>

<!-- Stats -->
<section class="section">
    <div class="stats-bar">
        <div class="stat-item animate-in">
            <div class="stat-number">500+</div>
            <div class="stat-label"><?= __('stat_matches') ?></div>
        </div>
        <div class="stat-item animate-in">
            <div class="stat-number">1.2K</div>
            <div class="stat-label"><?= __('stat_players') ?></div>
        </div>
        <div class="stat-item animate-in">
            <div class="stat-number">15+</div>
            <div class="stat-label"><?= __('stat_cities') ?></div>
        </div>
        <div class="stat-item animate-in">
            <div class="stat-number">4.8★</div>
            <div class="stat-label"><?= __('stat_rating') ?></div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="section">
    <h2 class="section-title"><?= __('features_title') ?></h2>
    <p class="section-subtitle"><?= __('features_subtitle') ?></p>

    <div class="features-grid">
        <div class="glass-card feature-card animate-in">
            <span class="feature-step">01</span>
            <div class="feature-icon">🔍</div>
            <h3><?= __('feature_1_title') ?></h3>
            <p><?= __('feature_1_desc') ?></p>
        </div>
        <div class="glass-card feature-card animate-in">
            <span class="feature-step">02</span>
            <div class="feature-icon">⚙️</div>
            <h3><?= __('feature_2_title') ?></h3>
            <p><?= __('feature_2_desc') ?></p>
        </div>
        <div class="glass-card feature-card animate-in">
            <span class="feature-step">03</span>
            <div class="feature-icon">⚽</div>
            <h3><?= __('feature_3_title') ?></h3>
            <p><?= __('feature_3_desc') ?></p>
        </div>
    </div>
</section>

<!-- Matches Preview -->
<section class="section matches-section">
    <div class="matches-header">
        <div>
            <h2 class="section-title"><?= __('upcoming_title') ?></h2>
            <p class="section-subtitle"><?= __('upcoming_subtitle') ?></p>
        </div>
        <a href="matchs.php" class="btn btn-secondary btn-sm"><?= __('see_all') ?></a>
    </div>

    <div class="match-item animate-in">
        <div class="match-info">
            <span class="match-title"><?= __('match_1_title') ?></span>
            <div class="match-meta">
                <span><?= __('match_1_loc') ?></span>
                <span><?= __('match_1_time') ?></span>
            </div>
        </div>
        <span class="match-badge"><?= __('match_1_badge') ?></span>
    </div>

    <div class="match-item animate-in">
        <div class="match-info">
            <span class="match-title"><?= __('match_2_title') ?></span>
            <div class="match-meta">
                <span><?= __('match_2_loc') ?></span>
                <span><?= __('match_2_time') ?></span>
            </div>
        </div>
        <span class="match-badge"><?= __('match_2_badge') ?></span>
    </div>

    <div class="match-item animate-in">
        <div class="match-info">
            <span class="match-title"><?= __('match_3_title') ?></span>
            <div class="match-meta">
                <span><?= __('match_3_loc') ?></span>
                <span><?= __('match_3_time') ?></span>
            </div>
        </div>
        <span class="match-badge"><?= __('match_3_badge') ?></span>
    </div>
</section>

<!-- AI Assistant -->
<section class="section">
    <div class="ai-card">
        <div class="ai-header">
            <div class="ai-avatar">IA</div>
            <div>
                <h3><?= __('ai_title') ?></h3>
                <p><?= __('ai_subtitle') ?></p>
            </div>
        </div>
        <p class="ai-text">
            <?= __('ai_text_1') ?><br>
            <?= __('ai_text_2') ?>
        </p>
       <a href="chat_ia.php" class="btn btn-primary">
            <?= __('ai_btn') ?>
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="site-footer">
    <p><?= __('footer_rights') ?> · 
        <a href="#"><?= __('footer_about') ?></a> · 
        <a href="#"><?= __('footer_contact') ?></a>
    </p>
</footer>

<script>
    // Mobile menu toggle
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('mainNav').classList.toggle('open');
        this.textContent = this.textContent === '☰' ? '✕' : '☰';
    });




    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.animate-in, .glass-card, .match-item, .ai-card, .stat-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(el);
    });
</script>

</body>
</html>
