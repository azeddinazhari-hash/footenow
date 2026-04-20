<?php
// ============================================
// KoraNow — Internationalization (i18n)
// Supported: fr (Français), en (English), ar (العربية)
// ============================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle language switch
if (isset($_GET['lang']) && in_array($_GET['lang'], ['fr', 'en', 'ar'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang'] ?? 'fr';

// Is RTL language?
$is_rtl = ($lang === 'ar');

$translations = [
    'fr' => [
        // Meta
        'page_title' => 'KoraNow — Organise tes matchs de foot',
        'meta_desc' => 'KoraNow est la plateforme n°1 pour organiser des matchs de football amateurs au Maroc.',
        
        // Nav
        'nav_home' => 'Accueil',
        'nav_matches' => 'Matchs',
        'nav_create' => 'Créer un match',
        'nav_login' => 'Connexion',
        'nav_cta' => '+ Nouveau match',
        
        // Hero
        'welcome' => 'Mrhba bik,',
        'welcome_end' => '👋 — Prêt pour un match ?',
        'hero_badge' => '🇲🇦 La plateforme foot n°1 au Maroc',
        'hero_title_1' => 'Trouve ton match.',
        'hero_title_2' => 'Joue maintenant.',
        'hero_desc' => 'Organise des matchs de foot amateurs dans ta ville. Rejoins des joueurs, choisis ton terrain et joue en quelques clics.',
        'btn_see_matches' => '🔍 Voir les matchs',
        'btn_create_match' => '➕ Créer un match',
        
        // Stats
        'stat_matches' => 'Matchs joués',
        'stat_players' => 'Joueurs actifs',
        'stat_cities' => 'Villes',
        'stat_rating' => 'Satisfaction',
        
        // Features
        'features_title' => 'Comment ça marche ?',
        'features_subtitle' => 'En 3 étapes simples, t\'es sur le terrain.',
        'feature_1_title' => 'Trouve un match',
        'feature_1_desc' => 'Parcours les matchs disponibles près de chez toi et rejoins une équipe en quelques clics.',
        'feature_2_title' => 'Crée ton match',
        'feature_2_desc' => 'Choisis la ville, le terrain, la date et le nombre de joueurs dont tu as besoin.',
        'feature_3_title' => 'Joue & progresse',
        'feature_3_desc' => 'Retrouve tes amis ou de nouveaux joueurs, et profite d\'un football organisé et fun.',
        
        // Matches Preview
        'upcoming_title' => 'Matchs à venir',
        'upcoming_subtitle' => 'Découvre les matchs créés par la communauté.',
        'see_all' => 'Voir tous →',
        'match_1_title' => 'Match urbain du soir',
        'match_1_loc' => '📍 Casablanca',
        'match_1_time' => '🕐 Ce soir 20h',
        'match_1_badge' => '5 joueurs',
        'match_2_title' => '5 vs 5 du week‑end',
        'match_2_loc' => '📍 Rabat',
        'match_2_time' => '🕐 Samedi 18h',
        'match_2_badge' => '3 joueurs',
        'match_3_title' => 'Pickup game rapide',
        'match_3_loc' => '📍 Marrakech',
        'match_3_time' => '🕐 Demain 19h',
        'match_3_badge' => '2 joueurs',
        
        // AI
        'ai_title' => 'Parle avec l\'assistant',
        'ai_subtitle' => 'Pose-lui tes questions sur les matchs en darija.',
        'ai_text_1' => 'Ma t3rafch fin tel3ab, ch7al mn joueur t7taj, ola kifach t7arez match mzyan ?',
        'ai_text_2' => 'Sewel l\'assistant, howa mwjoud bach y3awnk t3ref a7san options.',
        'ai_btn' => '🤖 Tchate m3a l\'IA',
        
        // Footer
        'footer_rights' => '© 2026 KoraNow — Tous droits réservés',
        'footer_about' => 'À propos',
        'footer_contact' => 'Contact',
        
        // Matchs Page
        'matchs_title' => 'KoraNow — Matchs disponibles',
        'matchs_heading' => '⚽ Matchs disponibles',
        'matchs_subtitle' => 'Choisi match li 3jbek w rejoins la communauté',
        'th_city' => '📍 Ville',
        'th_date' => '📅 Date',
        'th_time' => '🕐 Heure',
        'th_place' => '🏟️ Lieu',
        'th_players' => '👥 Joueurs',
        'players_suffix' => 'joueurs',
        'no_match_title' => 'Makayn ta match daba',
        'no_match_desc' => 'Kon nta lowel li ycréer match f la communauté !',
        
        // Create Match Page
        'create_title' => 'KoraNow — Créer un match',
        'create_heading' => 'Créer un match',
        'create_subtitle' => 'Organise un match w n3elno l communauté',
        'label_city' => '📍 Ville',
        'placeholder_city' => 'Ex: Casablanca, Rabat, Marrakech...',
        'label_date' => '📅 Date',
        'label_time' => '🕐 Heure',
        'label_place' => '🏟️ Lieu (Terrain)',
        'placeholder_place' => 'Ex: Terrain Al Amal, Stade Municipal...',
        'label_players' => '👥 Nombre de joueurs requis',
        'select_players' => '-- Akhtar l3dad --',
        'player_word' => 'joueur',
        'players_word' => 'joueurs',
        'btn_create' => '⚡ Créer le match',
        
        // Login Page
        'login_title' => 'KoraNow — Connexion',
        'login_heading' => 'Connexion',
        'login_subtitle' => 'Dkhol l7sabek bach tel3ab',
        'login_error' => '❌ Email ola mot de passe ghalet !',
        'label_email' => 'Email',
        'label_password' => 'Mot de passe',
        'btn_login' => '⚡ Se connecter',
        'no_account' => 'Ma 3ndkch compte ?',
        'register_link' => 'Inscris-toi ici',
        
        // Register Page
        'register_title' => 'KoraNow — Inscription',
        'register_heading' => 'Créer un compte',
        'register_subtitle' => 'Wjed rassek bach tel3ab m3a la communauté',
        'label_name' => 'Nom complet',
        'placeholder_name' => 'Ex: Ahmed Benali',
        'placeholder_password' => 'Minimum 6 caractères',
        'btn_register' => '🚀 Créer mon compte',
        'has_account' => 'Déjà inscrit ?',
        'login_link' => 'Connecte-toi ici',
    ],
    
    'en' => [
        // Meta
        'page_title' => 'KoraNow — Organize your football matches',
        'meta_desc' => 'KoraNow is the #1 platform for organizing amateur football matches in Morocco.',
        
        // Nav
        'nav_home' => 'Home',
        'nav_matches' => 'Matches',
        'nav_create' => 'Create a match',
        'nav_login' => 'Login',
        'nav_cta' => '+ New match',
        
        // Hero
        'welcome' => 'Welcome,',
        'welcome_end' => '👋 — Ready for a match?',
        'hero_badge' => '🇲🇦 Morocco\'s #1 football platform',
        'hero_title_1' => 'Find your match.',
        'hero_title_2' => 'Play now.',
        'hero_desc' => 'Organize amateur football matches in your city. Join players, pick your field, and play in just a few clicks.',
        'btn_see_matches' => '🔍 See matches',
        'btn_create_match' => '➕ Create a match',
        
        // Stats
        'stat_matches' => 'Matches played',
        'stat_players' => 'Active players',
        'stat_cities' => 'Cities',
        'stat_rating' => 'Satisfaction',
        
        // Features
        'features_title' => 'How does it work?',
        'features_subtitle' => 'In 3 simple steps, you\'re on the field.',
        'feature_1_title' => 'Find a match',
        'feature_1_desc' => 'Browse available matches near you and join a team in just a few clicks.',
        'feature_2_title' => 'Create your match',
        'feature_2_desc' => 'Choose the city, the field, the date, and the number of players you need.',
        'feature_3_title' => 'Play & improve',
        'feature_3_desc' => 'Meet your friends or new players, and enjoy organized, fun football.',
        
        // Matches Preview
        'upcoming_title' => 'Upcoming matches',
        'upcoming_subtitle' => 'Discover matches created by the community.',
        'see_all' => 'See all →',
        'match_1_title' => 'Evening urban match',
        'match_1_loc' => '📍 Casablanca',
        'match_1_time' => '🕐 Tonight 8pm',
        'match_1_badge' => '5 players',
        'match_2_title' => '5 vs 5 weekend game',
        'match_2_loc' => '📍 Rabat',
        'match_2_time' => '🕐 Saturday 6pm',
        'match_2_badge' => '3 players',
        'match_3_title' => 'Quick pickup game',
        'match_3_loc' => '📍 Marrakech',
        'match_3_time' => '🕐 Tomorrow 7pm',
        'match_3_badge' => '2 players',
        
        // AI
        'ai_title' => 'Talk to the assistant',
        'ai_subtitle' => 'Ask your questions about matches in darija.',
        'ai_text_1' => 'Don\'t know where to play, how many players you need, or how to organize a great match?',
        'ai_text_2' => 'Ask the assistant, it\'s here to help you find the best options.',
        'ai_btn' => '🤖 Chat with AI',
        
        // Footer
        'footer_rights' => '© 2026 KoraNow — All rights reserved',
        'footer_about' => 'About',
        'footer_contact' => 'Contact',
        
        // Matchs Page
        'matchs_title' => 'KoraNow — Available matches',
        'matchs_heading' => '⚽ Available matches',
        'matchs_subtitle' => 'Pick a match you like and join the community',
        'th_city' => '📍 City',
        'th_date' => '📅 Date',
        'th_time' => '🕐 Time',
        'th_place' => '🏟️ Location',
        'th_players' => '👥 Players',
        'players_suffix' => 'players',
        'no_match_title' => 'No matches right now',
        'no_match_desc' => 'Be the first to create a match in the community!',
        
        // Create Match Page
        'create_title' => 'KoraNow — Create a match',
        'create_heading' => 'Create a match',
        'create_subtitle' => 'Organize a match and announce it to the community',
        'label_city' => '📍 City',
        'placeholder_city' => 'E.g.: Casablanca, Rabat, Marrakech...',
        'label_date' => '📅 Date',
        'label_time' => '🕐 Time',
        'label_place' => '🏟️ Location (Field)',
        'placeholder_place' => 'E.g.: Al Amal Field, Municipal Stadium...',
        'label_players' => '👥 Number of players needed',
        'select_players' => '-- Select number --',
        'player_word' => 'player',
        'players_word' => 'players',
        'btn_create' => '⚡ Create the match',
        
        // Login Page
        'login_title' => 'KoraNow — Login',
        'login_heading' => 'Login',
        'login_subtitle' => 'Sign in to start playing',
        'login_error' => '❌ Wrong email or password!',
        'label_email' => 'Email',
        'label_password' => 'Password',
        'btn_login' => '⚡ Sign in',
        'no_account' => 'Don\'t have an account?',
        'register_link' => 'Register here',
        
        // Register Page
        'register_title' => 'KoraNow — Register',
        'register_heading' => 'Create an account',
        'register_subtitle' => 'Get ready to play with the community',
        'label_name' => 'Full name',
        'placeholder_name' => 'E.g.: Ahmed Benali',
        'placeholder_password' => 'Minimum 6 characters',
        'btn_register' => '🚀 Create my account',
        'has_account' => 'Already registered?',
        'login_link' => 'Sign in here',
    ],
    
    'ar' => [
        // Meta
        'page_title' => 'KoraNow — نظّم مبارياتك في كرة القدم',
        'meta_desc' => 'KoraNow هي المنصة رقم 1 لتنظيم مباريات كرة القدم للهواة في المغرب.',
        
        // Nav
        'nav_home' => 'الرئيسية',
        'nav_matches' => 'المباريات',
        'nav_create' => 'إنشاء مباراة',
        'nav_login' => 'تسجيل الدخول',
        'nav_cta' => '+ مباراة جديدة',
        
        // Hero
        'welcome' => 'مرحبا بيك،',
        'welcome_end' => '👋 — واجد لماتش؟',
        'hero_badge' => '🇲🇦 المنصة رقم 1 ديال الكرة في المغرب',
        'hero_title_1' => 'لقا الماتش ديالك.',
        'hero_title_2' => 'لعب دابا.',
        'hero_desc' => 'نظّم مباريات كرة القدم للهواة فمدينتك. لقا لاعبين، ختار الملعب، والعب بنقرات قليلة.',
        'btn_see_matches' => '🔍 شوف المباريات',
        'btn_create_match' => '➕ دير مباراة',
        
        // Stats
        'stat_matches' => 'مباريات تلعبات',
        'stat_players' => 'لاعبين نشطين',
        'stat_cities' => 'مدن',
        'stat_rating' => 'رضا',
        
        // Features
        'features_title' => 'كيفاش خدّام؟',
        'features_subtitle' => 'ب 3 خطوات بسيطة، راك فالتيران.',
        'feature_1_title' => 'لقا مباراة',
        'feature_1_desc' => 'تصفّح المباريات القريبة ليك وانضم لفريق بنقرات قليلة.',
        'feature_2_title' => 'دير الماتش ديالك',
        'feature_2_desc' => 'ختار المدينة، الملعب، التاريخ، وعدد اللاعبين لي خصّك.',
        'feature_3_title' => 'لعب وتطوّر',
        'feature_3_desc' => 'لقا صحابك ولا لاعبين جداد، واستمتع بكرة قدم منظمة وممتعة.',
        
        // Matches Preview
        'upcoming_title' => 'المباريات الجاية',
        'upcoming_subtitle' => 'اكتشف المباريات لي دارها المجتمع.',
        'see_all' => '← شوف الكل',
        'match_1_title' => 'ماتش المسا فالمدينة',
        'match_1_loc' => '📍 الدار البيضاء',
        'match_1_time' => '🕐 هاد الليلة 20h',
        'match_1_badge' => '5 لاعبين',
        'match_2_title' => '5 ضد 5 فويكاند',
        'match_2_loc' => '📍 الرباط',
        'match_2_time' => '🕐 السبت 18h',
        'match_2_badge' => '3 لاعبين',
        'match_3_title' => 'ماتش سريع',
        'match_3_loc' => '📍 مراكش',
        'match_3_time' => '🕐 غدا 19h',
        'match_3_badge' => '2 لاعبين',
        
        // AI
        'ai_title' => 'هضر مع المساعد',
        'ai_subtitle' => 'سوّلو أسئلتك على المباريات بالدارجة.',
        'ai_text_1' => 'ما عارفش فين تلعب، شحال من جوّر خصّك، ولا كيفاش تحارز ماتش مزيان؟',
        'ai_text_2' => 'سوّل المساعد، هو موجود باش يعاونك تعرف أحسن الخيارات.',
        'ai_btn' => '🤖 تهضر مع الذكاء الاصطناعي',
        
        // Footer
        'footer_rights' => '© 2026 KoraNow — جميع الحقوق محفوظة',
        'footer_about' => 'من نحن',
        'footer_contact' => 'اتصل بنا',
        
        // Matchs Page
        'matchs_title' => 'KoraNow — المباريات المتاحة',
        'matchs_heading' => '⚽ المباريات المتاحة',
        'matchs_subtitle' => 'ختار الماتش لي عجبك وانضم للمجتمع',
        'th_city' => '📍 المدينة',
        'th_date' => '📅 التاريخ',
        'th_time' => '🕐 الوقت',
        'th_place' => '🏟️ المكان',
        'th_players' => '👥 اللاعبين',
        'players_suffix' => 'لاعبين',
        'no_match_title' => 'ما كاين تا ماتش دابا',
        'no_match_desc' => 'كون نتا اللول لي يدير ماتش فالمجتمع!',
        
        // Create Match Page
        'create_title' => 'KoraNow — إنشاء مباراة',
        'create_heading' => 'إنشاء مباراة',
        'create_subtitle' => 'نظّم ماتش وعلن عليه للمجتمع',
        'label_city' => '📍 المدينة',
        'placeholder_city' => 'مثال: الدار البيضاء، الرباط، مراكش...',
        'label_date' => '📅 التاريخ',
        'label_time' => '🕐 الوقت',
        'label_place' => '🏟️ المكان (الملعب)',
        'placeholder_place' => 'مثال: ملعب الأمل، الملعب البلدي...',
        'label_players' => '👥 عدد اللاعبين المطلوبين',
        'select_players' => '-- ختار العدد --',
        'player_word' => 'لاعب',
        'players_word' => 'لاعبين',
        'btn_create' => '⚡ دير الماتش',
        
        // Login Page
        'login_title' => 'KoraNow — تسجيل الدخول',
        'login_heading' => 'تسجيل الدخول',
        'login_subtitle' => 'دخل لحسابك باش تلعب',
        'login_error' => '❌ الإيميل ولا كلمة السر غالطة!',
        'label_email' => 'الإيميل',
        'label_password' => 'كلمة السر',
        'btn_login' => '⚡ دخول',
        'no_account' => 'ما عندكش حساب؟',
        'register_link' => 'سجّل هنا',
        
        // Register Page
        'register_title' => 'KoraNow — التسجيل',
        'register_heading' => 'إنشاء حساب',
        'register_subtitle' => 'وجّد راسك باش تلعب مع المجتمع',
        'label_name' => 'الاسم الكامل',
        'placeholder_name' => 'مثال: أحمد بنعلي',
        'placeholder_password' => '6 حروف على الأقل',
        'btn_register' => '🚀 دير الحساب ديالي',
        'has_account' => 'عندك حساب؟',
        'login_link' => 'دخل من هنا',
    ],
];

$t = $translations[$lang];

// Helper function to get translation
function __($key) {
    global $t;
    return $t[$key] ?? $key;
}
?>
