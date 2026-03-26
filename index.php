<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>INDEX PAGE</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .video-bg-wrapper {
      position: relative;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .video-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .video-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.45);
      z-index: -1;
    }
  </style>
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
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
          <a href="homepage.php" class="btn-outline">Home</a>
          <a href="logout.php" class="btn-outline btn-logout">Logout</a>
        <?php else: ?>
          <a href="register.php" class="btn-outline">Sign up</a>
          <a href="login.php" class="btn-outline">Login</a>
        <?php endif; ?>
      </div>
    </nav>

    <!-- Hero -->
    <div class="hero-content">
      <h1>DIVINE HUB</h1>
      <p>Divine Anime - More Latest Episodes: Just Sign up</p>
      <div class="hero-buttons">
        <a href="register.php" class="btn-hero-outline">Get Started</a>
        <a href="login.php" class="btn-hero-primary">Create An Account</a>
      </div>
    </div>
    
    <!-- Footer -->
    <footer>
      <div>Copyright &copy; 2026. All rights reserved.</div>
      <div>Programmer - Nathan <span class="yappers">&#9829;</span> | Computer Programming - D</div>
    </footer>

  </div>
</body>

</html>
