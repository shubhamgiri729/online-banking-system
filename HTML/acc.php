<!-- <?php
        session_start();
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | Online Banking Website Mini Project</title>
    <link href="../CSS/acc.css" rel="stylesheet">
</head>

<body>
    <?php include "header.php" ?>
    <main class="user-account">

        <h1 class="account-title">My Account</h1>

        <div class="account-container">

            <!-- Profile Section -->
            <div class="profile-card">
                <img src="../Images/man.png" alt="Profile Picture">
                <h2><?php echo $_SESSION['name']; ?></h2>
                <p>Customer</p>
            </div>

            <!-- Info Section -->
            <div class="info-card">
                <?php if (isset($_SESSION['customer_id'])): ?>

                    <div class="info-row">
                        <label>Name:</label>
                        <input type="text" readonly value="<?php echo $_SESSION['name']; ?>">
                    </div>

                    <div class="info-row">
                        <label>Account No:</label>
                        <input type="text" readonly value="<?php echo $_SESSION['account_number']; ?>">
                    </div>

                    <div class="info-row">
                        <label>Branch:</label>
                        <input type="text" readonly value="<?php echo $_SESSION['branch_name']; ?>">
                    </div>

                    <div class="info-row">
                        <label>IFSC Code:</label>
                        <input type="text" readonly value="<?php echo $_SESSION['ifsc_code']; ?>">
                    </div>

                    <div class="info-row">
                        <label>Balance:</label>
                        <input type="text" readonly value="₹ <?php echo $_SESSION['balance']; ?>">
                    </div>

                <?php else: ?>
                    <script>
                        alert("Please login to view your account details!");
                        window.location.href = "login.html";
                    </script>
                <?php endif; ?>
            </div>

        </div>
    </main>
</body>

</html>