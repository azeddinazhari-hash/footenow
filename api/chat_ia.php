<?php
require_once 'i18n.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize chat history if not exists
if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = [
        ['role' => 'ai', 'content' => __('ai_welcome_msg', 'Hello! I am your KoraNow assistant. How can I help you today?')]
    ];
}

// Translation helpers for chat
$chat_langs = [
    'fr' => [
        'placeholder' => 'Pose-moi une question...',
        'send' => 'Envoyer',
        'welcome' => 'Salut ! Je suis ton assistant KoraNow. Comment puis-je t\'aider ?',
        'not_found' => 'Désolé, je n\'ai pas compris. Tu peux demander sur les matchs, terrains ou comment créer un match.',
        'matches' => 'Tu peux voir tous les matchs disponibles sur la page "Matchs". Il y a souvent des parties à Casablanca et Rabat !',
        'create' => 'Pour créer un match, va sur la page "Créer un match", remplis le formulaire et il sera visible par tout le monde.',
        'fields' => 'On a des terrains partenaires dans plusieurs villes. Quel est ton secteur ?',
    ],
    'en' => [
        'placeholder' => 'Ask me anything...',
        'send' => 'Send',
        'welcome' => 'Hello! I am your KoraNow assistant. How can I help you today?',
        'not_found' => 'Sorry, I didn\'t catch that. You can ask about matches, fields, or how to create a match.',
        'matches' => 'You can see all available matches on the "Matches" page. There are often games in Casablanca and Rabat!',
        'create' => 'To create a match, go to the "Create a match" page, fill out the form, and it will be visible to everyone.',
        'fields' => 'We have partner fields in several cities. Which area are you in?',
    ],
    'ar' => [
        'placeholder' => 'كتب سؤالك هنا...',
        'send' => 'إرسال',
        'welcome' => 'مرحبا! أنا مساعد KoraNow. كيفاش نقدر نعاونك اليوم؟',
        'not_found' => 'سمح ليا، ما فهمتش السؤال. تقدر تسول على الماتشات، التيرانات، ولا كيفاش تكريه ماتش.',
        'matches' => 'تقدر تشوف كاع الماتشات لي كاينين فباج "المباريات". كاينين ماتشات بزاف فكازا والرباط!',
        'create' => 'باش تكريه ماتش، تمشي لباج "إنشاء مباراة"، عمر الفورم وغادي يبان لكاع الناس.',
        'fields' => 'عندنا تيرانات فبزاف ديال المدن. نتا فين كاين؟',
    ]
];

$cl = $chat_langs[$lang];

// Process new message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message']) && !empty(trim($_POST['message']))) {
    $user_msg = trim($_POST['message']);
    $_SESSION['chat_history'][] = ['role' => 'user', 'content' => $user_msg];

    // Simple AI logic
    $response = $cl['not_found'];
    $msg_lower = mb_strtolower($user_msg);

    if (strpos($msg_lower, 'match') !== false || strpos($msg_lower, 'لعب') !== false || strpos($msg_lower, 'ماتش') !== false) {
        $response = $cl['matches'];
    } elseif (strpos($msg_lower, 'créer') !== false || strpos($msg_lower, 'nouveau') !== false || strpos($msg_lower, 'create') !== false || strpos($msg_lower, 'دير') !== false) {
        $response = $cl['create'];
    } elseif (strpos($msg_lower, 'terrain') !== false || strpos($msg_lower, 'field') !== false || strpos($msg_lower, 'تيران') !== false) {
        $response = $cl['fields'];
    } elseif (strpos($msg_lower, 'سلام') !== false || strpos($msg_lower, 'مرحبا') !== false || strpos($msg_lower, 'hello') !== false || strpos($msg_lower, 'salut') !== false) {
        $response = $cl['welcome'];
    }

    $_SESSION['chat_history'][] = ['role' => 'ai', 'content' => $response];
    
    // Redirect to prevent form resubmission
    header("Location: chat_ia.php");
    exit();
}

// Clear chat
if (isset($_GET['clear'])) {
    unset($_SESSION['chat_history']);
    header("Location: chat_ia.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" <?= $is_rtl ? 'dir="rtl"' : '' ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Assistant — KoraNow</title>
    <link rel="stylesheet" href="../style.css">
    <?php if ($is_rtl): ?>
    <style>body { direction: rtl; text-align: right; }</style>
    <?php endif; ?>
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a href="index.php" class="logo">
            <span class="logo-icon">⚽</span>
            KoraNow
        </a>
        <button class="menu-toggle" id="menuToggle">☰</button>
        <nav class="main-nav" id="mainNav">
            <a href="index.php"><?= __('nav_home') ?></a>
            <a href="matchs.php"><?= __('nav_matches') ?></a>
            <a href="creer_match.php"><?= __('nav_create') ?></a>
            <a href="connexion.php"><?= __('nav_login') ?></a>
            
            <div class="lang-bar">
                <a href="?lang=fr" class="lang-flag-btn <?= $lang === 'fr' ? 'active' : '' ?>">🇫🇷</a>
                <a href="?lang=en" class="lang-flag-btn <?= $lang === 'en' ? 'active' : '' ?>">🇬🇧</a>
                <a href="?lang=ar" class="lang-flag-btn <?= $lang === 'ar' ? 'active' : '' ?>">🇸🇦</a>
            </div>
        </nav>
    </div>
</header>

<div class="page-container">
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2>🤖 <?= __('ai_title') ?></h2>
            <p><?= __('ai_subtitle') ?></p>
        </div>
        <a href="?clear=1" style="font-size: 0.8rem; opacity: 0.6; text-decoration: underline;">Effacer la discussion</a>
    </div>

    <div class="chat-container">
        <div class="chat-messages" id="chatMessages">
            <?php foreach ($_SESSION['chat_history'] as $msg): ?>
                <div class="message message-<?= $msg['role'] ?>">
                    <?= htmlspecialchars($msg['content']) ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="chat-input-area">
            <form action="" method="POST" class="chat-form">
                <input type="text" name="message" class="chat-input" placeholder="<?= $cl['placeholder'] ?>" autocomplete="off" required autofocus>
                <button type="submit" class="chat-send-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </form>
        </div>
    </div>
</div>

<footer class="site-footer">
    <p><?= __('footer_rights') ?></p>
</footer>

<script>
    // Scroll to bottom
    const chatMessages = document.getElementById('chatMessages');
    chatMessages.scrollTop = chatMessages.scrollHeight;

    // Mobile menu
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('mainNav').classList.toggle('open');
    });
</script>

</body>
</html>