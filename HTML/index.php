<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Online Banking Website mini project</title>
    <link href="../CSS/home.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
</head>

<body>
    <div id="header" class="head">
        <h1>Online Banking System</h1>
        <a href="admin_verify.php" target="_blank"><img src="../Images/onlinebank.jpg" alt="Online Banking System" title="Online Banking Website"></a>
    </div>

    <div id="log_sign">
        <?php if (isset($_SESSION['name'])): ?>
            <li>Welcome, <b><?php echo htmlspecialchars($_SESSION['name']); ?></b> 👋</li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li>Welcome, user</li>
            <li><a href="login.html">Login</a></li>
            <!-- <li><a href="signup.html">Sign Up</a></li> -->
        <?php endif; ?>
    </div>

    <div id="navbar">
        <div id="nav">
            <div id="services">
                <li><a id="service" href="#">Services</a></li>
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <ul class="content">
                        <li><a href="perIntBank.html">Personal Internet Banking</a></li>
                        <li><a href="MTM.html" id="e_service" >Minor to Major</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="content">
                        <li style="color: black;">Login to check details!!</li>
                    </ul>
                <?php endif; ?>
            </div>

            <div id="payment_transfer">
                <li><a href="#">Payment Transfer</a> </li>
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <ul class="content">
                        <li><a href="natTransfer.php">National Transfer</a></li>
                        <li><a href="billPay.html">Bill Payment</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="content">
                        <li style="color: black;">Login to check details!!</li>
                    </ul>
                <?php endif; ?>
            </div>

            <div id="fixed_deposite">
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <li><a href="fixDep.html">Fixed Deposit</a></li>
                <?php else: ?>
                    <li><a href="#" onclick="alert('Please login to access Deposit section!')">Deposit</a></li>
                <?php endif; ?>
            </div>

            <div id="acc">
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <li><a href="acc.php">My Account</a></li>
                <?php else: ?>
                    <li><a href="#" onclick="alert('Please login to access My Account section!')">My Account</a></li>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="../Images/online banking-1.png">
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="../Images/online banking-2.png">
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="../Images/online banking-3.png">
        </div>
    </div>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000);
        }
    </script>

    <div id="disp">
        <p>Login to see your Details here:</p>

        <div>
            <?php
           
            $isLoggedIn = isset($_SESSION['customer_id']);
            ?>

            <input type="text" name="name" id="name" readonly
                value="<?php echo $isLoggedIn ? htmlspecialchars($_SESSION['name']) : ''; ?>"
                placeholder="Beneficiary Name">

            <input type="number" name="accno" id="accno" readonly
                value="<?php echo $isLoggedIn ? htmlspecialchars($_SESSION['account_number']) : ''; ?>"
                placeholder="Account No.">

            <input type="text" name="branch" id="branch" readonly
                value="<?php echo $isLoggedIn ? htmlspecialchars($_SESSION['branch_name']) : ''; ?>"
                placeholder="Branch Name">

            <input type="text" name="ifsc" id="ifsc" readonly
                value="<?php echo $isLoggedIn ? htmlspecialchars($_SESSION['ifsc_code']) : ''; ?>"
                placeholder="IFSC Code">

            <input type="text" name="balance" id="balance" readonly
                value="<?php echo $isLoggedIn ? htmlspecialchars($_SESSION['balance']) : ''; ?>"
                placeholder="Account Balance">

            <?php if (!$isLoggedIn): ?>
                <p style="color: red;">You are not logged in.</p>
            <?php endif; ?>
        </div>
    </div>


    <footer>
        <div id="foot">
            <a href="aboutUs.html">About Us</a>
        </div>
    </footer>
</body>

</html>