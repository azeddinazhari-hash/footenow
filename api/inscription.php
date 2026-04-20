<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoraNow — Inscription</title>
    <meta name="description" content="Crée ton compte KoraNow et commence à organiser des matchs de football amateurs.">
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

<!-- Registration Form -->
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <div style="font-size: 3rem; margin-bottom: 16px;">🎯</div>
            <h2>Créer un compte</h2>
            <p>Wjed rassek bach tel3ab m3a la communauté</p>
        </div>

        <form action="traiter_inscription.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Ahmed Benali" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Minimum 6 caractères" required>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top: 8px;">
                🚀 Créer mon compte
            </button>
        </form>

        <div class="form-footer">
            Déjà inscrit ? <a href="connexion.php">Connecte-toi ici</a>
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
