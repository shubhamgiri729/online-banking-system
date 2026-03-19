<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Online Banking Website mini project</title>
    <link href="../CSS/home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "header.php" ?>
    <nav id="navbar">
        <section id="Home">
            <a href="home.php?page=home"
                class="nav-head <?php if ($page == 'home') echo 'active'; ?>">
                Home
            </a>
        </section>
        <section id="services">
            <a id="service" class="nav-head <?php if ($page == 'perIntBank' || $page == 'mtm') echo 'active'; ?>" tabindex="0" href="#">Services</a>
            <?php if (isset($_SESSION['customer_id'])): ?>
                <div class="content">
                    <a href="home.php?page=perIntBank">Personal Internet Banking</a>
                    <a href="home.php?page=mtm" id="e_service">Minor to Major</a>
                </div>
            <?php else: ?>
                <div class="content">
                    <p style="color: black;">Login to check details!!</p>
                </div>
            <?php endif; ?>
        </section>

        <section id="payment_transfer">
            <a href="#" class="nav-head <?php if ($page == 'natTransfer' || $page == 'billPay') echo 'active'; ?>">Payment Transfer</a>
            <?php if (isset($_SESSION['customer_id'])): ?>
                <div class="content">
                    <a href="home.php?page=natTransfer">National Transfer</a>
                    <a href="home.php?page=billPay">Bill Payment</a>
                </div>
            <?php else: ?>
                <div class="content">
                    <p style="color: black;">Login to check details!!</p>
                </div>
            <?php endif; ?>
        </section>

        <section id="fixed_deposite">
            <?php if (isset($_SESSION['customer_id'])): ?>
                <a class="nav-head <?php if ($page == 'deposit') echo 'active'; ?>" href="home.php?page=deposit">
                    Fixed Deposit
                </a>
            <?php else: ?>
                <a href="#" class="basic" onclick="alert('Please login to access Deposit section!')">Fixed Deposit</a>
            <?php endif; ?>
        </section>

        <section id="acc">
            <div>
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <a class="nav-head <?php if ($page == 'account') echo 'active'; ?>" href="home.php?page=account">
                        My Account
                    </a>
                <?php else: ?>
                    <a href="#" class="basic" onclick="alert('Please login to access My Account section!')">My Account</a>
                <?php endif; ?>
            </div>
        </section>
    </nav>

    <main class="main-content">

        <?php

        switch ($page) {
            case "perIntBank":
                include "perIntBank.html";
                break;

            case "mtm":
                include "MTM.html";
                break;

            case "natTransfer":
                include "natTransfer.php";
                break;

            case "billPay":
                include "billPay.html";
                break;

            case "deposit":
                include "fixDep.html";
                break;

            case "account":
                include "acc.php";
                break;

            default:
        ?>

        <?php
        }
        ?>

        <div id="disp">

            <?php
            $isLoggedIn = isset($_SESSION['customer_id']);
            $balance = $_SESSION['balance'];
            $maxLimit = 100000; // example limit
            $percentage = ($balance / $maxLimit) * 100;
            ?>

            <section id="limit-chart">
                <p class="max-limit">Max Limit: ₹<?php echo $maxLimit; ?></p>
                <div class="chart-container">

                    <div class="circle" style="background: conic-gradient(#03A9F4 <?php echo $percentage; ?>%, #e0e0e0 0%);">

                        <div class="inner-circle">
                            <span class="default-text">Balance</span>
                            <div class="hover-text">
                                <p><?php echo round($percentage); ?>%</p>
                            </div>
                        </div>

                    </div>

                    <p class="limit-text">Usage of Limit</p>
                </div>
            </section>

            <section id="Account-overview">
                <h1>Account Overview</h1>
                <p class="overview">Account Holder Name: <?php echo $_SESSION['name']; ?></p>

                <p class="overview">Account Number: <?php echo $_SESSION['account_number']; ?></p>

                <p class="overview">Current Balance: ₹ <?php echo $_SESSION['balance']; ?></p>
            </section>

        </div>
        </div>

    </main>
</body>

</html>