<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $dob      = trim($_POST['dob'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name && $dob && $email && $password) {
        $_SESSION['registered_name']  = $name;
        $_SESSION['registered_dob']   = $dob;
        $_SESSION['registered_user']  = $email;
        $_SESSION['registered_pass']  = $password;

        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTER PAGE</title>
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
                <a href="index.php" class="btn-outline">Home</a>
                <a href="register.php" class="btn-outline">Sign up</a>
                <a href="login.php" class="btn-outline">Login</a>
            </div>
        </nav>

        <!-- Card -->
        <div class="auth-wrapper">
            <div class="auth-card">
                <h2>Sign up</h2>
                <p class="subtitle">Fill up the details to create your account</p>

                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required />
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" id="dob" name="dob" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email" required />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Your password" required />
                    </div>

                    <button type="submit" class="btn-primary">Let's go!</button>
                </form>

                <div class="auth-footer">
                    Already have an account? <a href="login.php">Sign in.</a>
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