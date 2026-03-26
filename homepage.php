<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

$anime_titles = [
    "Demon Slayer: Infinity Castle Arc",
    "One Piece: Egghead Arc",
    "Chainsaw Man Season 2",
    "Blue Lock Season 2",
    "Solo Leveling Season 2",
    "Spy x Family Season 3",
    "Vinland Saga Season 3",
    "Re:Zero Season 3",
];

$anime_images = [
    "demonslayer.jpg",
    "onepiece.png",
    "ovf.jpg",
    "bluelock.jpg",
    "sololeveling.jpg",
    "spyfamily.jpg",
    "vinland.jpg",
    "rezero.jpg",
];

$anime_eps = [12, 15, 13, 13, 12, 13, 12, 13];

$anime_desc = [
    "Tanjiro and his allies face their ultimate test as they storm the Infinity Castle to take down Muzan Kibutsuji and his most powerful demons once and for all.",
    "Luffy and the Straw Hats arrive on Egghead Island, a futuristic lab ruled by Dr. Vegapunk, only to find themselves caught in a deadly world government conspiracy.",
    "Brother, are we really taking a bath together? And so began a forbidden bathing experience. My sister, a childhood friend, a man and two women, share a bathroom. After unintentionally overflowing, her sister's secret love comes out! This is a young romantic comedy that won't make you say it's over!",
    "Isagi Yoichi pushes beyond his limits in the Blue Lock program, competing against the world's best young strikers to claim the title of Japan's ultimate ego striker.",
    "Sung Jinwoo, now one of the world's strongest hunters, faces a new global threat as shadows from another dimension threaten to consume mankind.",
    "The Forger family takes on a new mission that tests the limits of their cover identities, while Anya navigates bigger challenges at Eden Academy.",
    "Thorfinn continues his quest to build a land of peace in the new world, facing political unrest and old enemies threatening to reignite the flames of war.",
    "Subaru Natsuki faces his most grueling trial yet as new threats emerge in the Kingdom of Lugnica, forcing him to make sacrifices beyond what he ever imagined.",
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="video-bg-wrapper">
        <video class="video-bg" src="jdm.mp4" autoplay muted loop playsinline></video>
        <div class="video-overlay"></div>

        <!-- Navbar -->
        <nav class="navbar">
            <a href="index.php" class="navbar-brand">
                <img
                    class="navbar-logo"
                    src="divine.png"
                    onerror="this.style.background='#e87c1e';this.src='';"
                    alt="Logo" />
                <span class="navbar-title">DIvine Anime Hub
                </span>
            </a>
            <div class="navbar-actions">
                <span style="color:#aaa;font-size:.9rem;margin-right:8px;">
                    Welcome, <?= htmlspecialchars($_SESSION['registered_name'] ?? 'User') ?>
                </span>
                
                <!-- Logout button -->
                <a href="logout.php" class="btn-outline btn-logout">Logout</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="homepage-main">
            <h2>Latest Episodes</h2>

            <!-- For loop -->
            <div class="anime-grid">
                <?php for ($i = 0; $i < count($anime_titles); $i++): ?>
                    <div class="anime-card">
                        <img
                            src="<?= htmlspecialchars($anime_images[$i]) ?>"
                            alt="<?= htmlspecialchars($anime_titles[$i]) ?>"
                            onerror="this.src='https://via.placeholder.com/300x220?text=No+Image';" />
                        <div class="anime-card-body">
                            <h3><?= htmlspecialchars($anime_titles[$i]) ?></h3>
                            <p><?= htmlspecialchars($anime_desc[$i]) ?></p>
                        </div>
                        <div class="anime-card-footer">
                            <span class="anime-ep">Ep. <?= $anime_eps[$i] ?></span>
                            <a href="#" class="btn-watch">Watch &#9654;</a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div>Copyright &copy; 2026. All rights reserved.</div>
            <div>Programmer - Nathan <span class="yappers">&#9829;</span> | Computer Programming - D</div>
        </footer>
    </div>
</body>
</html>
