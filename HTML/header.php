<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../CSS/header.css">
</head>

<body>
    <header id="header" class="head">
        <!-- <h1>Online Banking System</h1> -->
        <a href="admin_verify.php" target="_blank">
            <img src="../Images/onlinebank.jpg" alt="Online Banking System" title="Online Banking Website">
        </a>
        <div id="log_sign">
            <?php if (isset($_SESSION['name'])): ?>
                <div class="greet">
                    <p>Welcome, <b>
                            <?php echo htmlspecialchars($_SESSION['name']); ?>
                        </b> 👋</p>
                    <p class="tagline">Access and manage your account and transaction efficiently</p>
                </div>
                <p id="logout"><a href="logout.php">Logout</a></p>
            <?php else: ?>
                <div class="greet">
                    <p>Welcome, user</li>
                    <p id="login"><a href="login.html">Login</a></p>
                </div>
            <?php endif; ?>
        </div>
    </header>
</body>

</html>