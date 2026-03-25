<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    header('Location: homepage.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Simple check against registered session data (demo purposes)
    if (isset($_SESSION['registered_user']) && isset($_SESSION['registered_pass']) &&
        $email === $_SESSION['registered_user'] && $password === $_SESSION['registered_pass']) {
        $_SESSION['logged_in'] = true;
        header('Location: homepage.php');
        exit;
    } else {
        $error = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN PAGE</title>
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
                <span class="navbar-title">DIvine Anime Hub</span>
            </a>
            <div class="navbar-actions">
                <a href="index.php" class="btn-outline">Home</a>
                <a href="register.php" class="btn-outline">Sign up</a>
            </div>
        </nav>

        <!-- Card -->
        <div class="auth-wrapper">
            <div class="auth-card">
                <h2>Sign in</h2>
                <p class="subtitle">Welcome back! Please sign in to your account</p>

                <?php if ($error): ?>
                    <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Your password" required />
                    </div>

                    <button type="submit" class="btn-primary">Sign in</button>
                </form>

                <div class="auth-footer">
                    Don't have an account? <a href="register.php">Sign up.</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div>Copyright &copy; 2026. All rights reserved.</div>
            <div>Designed with <span class="heart">&#9829;</span> | Computer Programming - D</div>
        </footer>
    </div>
</body>

</html>
