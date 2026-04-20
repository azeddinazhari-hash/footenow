<?php
$ville   = $_POST['ville'];
$date    = $_POST['date_match'];
$heure   = $_POST['heure_match'];
$lieu    = $_POST['lieu'];
$joueurs = $_POST['joueurs'];

// Connexion DB
$db_host = getenv('DB_HOST') ?: "localhost";
$db_user = getenv('DB_USER') ?: "root";
$db_pass = getenv('DB_PASS') ?: "";
$db_name = getenv('DB_NAME') ?: "koranow_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Vérifier connexion
if ($conn->connect_error) {
    die("Erreur connexion DB: " . $conn->connect_error);
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
    <link rel="stylesheet" href="../style.css">
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
