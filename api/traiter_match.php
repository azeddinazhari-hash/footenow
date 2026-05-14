<?php
require_once 'i18n.php';

$ville   = $_POST['ville'] ?? '';
$date    = $_POST['date_match'] ?? '';
$heure   = $_POST['heure_match'] ?? '';
$lieu    = $_POST['lieu'] ?? '';
$joueurs = $_POST['joueurs'] ?? '';

// Connexion DB
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "koranow_db";
$db_port = 3306;

mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
} catch (mysqli_sql_exception $e) {
    die("<div style='font-family:sans-serif; padding: 20px; background: #fff0f0; border-radius: 8px; border: 1px solid #ffcaca; color: #d00;'>
        <h3 style='margin-top:0;'>❌ Erreur de connexion MySQL</h3>
        <p>Impossible de se connecter à la base de données. <b>Assurez-vous que MySQL est démarré dans le Control Panel XAMPP.</b></p>
        <p><i>Détail: " . $e->getMessage() . "</i></p>
        <a href='index.php' style='color: #d00; font-weight: bold;'>Retour à l'accueil</a>
    </div>");
}

// Insert
$stmt = $conn->prepare("INSERT INTO matches (ville, date_match, heure_match, lieu, joueurs) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $ville, $date, $heure, $lieu, $joueurs);

$success = $stmt->execute();
$error_msg = $stmt->error;

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoraNow — Match enregistré</title>
    <link rel="stylesheet" href="<?= $base_path ?>style.css">
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
            <a href="index.php">Accueil</a>
            <a href="matchs.php">Matchs</a>
            <a href="creer_match.php">Créer un match</a>
            <a href="connexion.php">Connexion</a>
            <a href="creer_match.php" class="nav-cta">+ Nouveau match</a>
        </nav>
    </div>
</header>

<!-- Result -->
<div class="page-container">
    <div class="result-card glass-card" style="padding: 50px 40px;">
        <?php if ($success): ?>
            <div class="result-icon">✅</div>
            <h2>Match créé avec succès !</h2>
            <p style="color: var(--text-secondary); margin-bottom: 10px;">
                L match dyalk t'ajouta, daba la communauté tqder tchoufou w trejoini.
            </p>
        <?php else: ?>
            <div class="result-icon error">❌</div>
            <h2>Erreur lors de la création</h2>
            <p style="color: var(--danger);"><?= htmlspecialchars($error_msg) ?></p>
        <?php endif; ?>

        <div class="result-details">
            <p><b>📍 Ville</b> <?= htmlspecialchars($ville) ?></p>
            <p><b>📅 Date</b> <?= htmlspecialchars($date) ?></p>
            <p><b>🕐 Heure</b> <?= htmlspecialchars($heure) ?></p>
            <p><b>🏟️ Lieu</b> <?= htmlspecialchars($lieu) ?></p>
            <p><b>👥 Joueurs</b> <?= htmlspecialchars($joueurs) ?> joueurs requis</p>
        </div>

        <div class="result-actions">
            <a href="creer_match.php" class="btn btn-secondary">
                ➕ Ajouter un autre
            </a>
            <a href="matchs.php" class="btn btn-primary">
                ⚽ Voir les matchs
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="site-footer">
    <p>© 2026 KoraNow — Tous droits réservés · 
        <a href="#">À propos</a> · 
        <a href="#">Contact</a>
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
