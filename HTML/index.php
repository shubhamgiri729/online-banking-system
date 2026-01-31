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
    <header id="header" class="head">
        <!-- <h1>Online Banking System</h1> -->
        <a href="admin_verify.php" target="_blank">
            <img src="../Images/onlinebank.jpg" alt="Online Banking System" title="Online Banking Website">
        </a>
        <div id="log_sign">
            <?php if (isset($_SESSION['name'])): ?>
            <p>Welcome, <b>
                    <?php echo htmlspecialchars($_SESSION['name']); ?>
                </b> 👋</p>
            <p><a href="logout.php">Logout</a></p>
            <?php else: ?>
            <p>Welcome, user</li>
            <p><a href="login.html">Login</a></p>
            <?php endif; ?>
        </div>
    </header>

    <nav id="navbar">
        <section id="services">
            <a id="service" class="nav-head" href="#">Services</a>
            <?php if (isset($_SESSION['customer_id'])): ?>
            <div class="content">
                <a href="perIntBank.html">Personal Internet Banking</a>
                <a href="MTM.html" id="e_service">Minor to Major</a>
            </div>
            <?php else: ?>
            <div class="content">
                <p style="color: black;">Login to check details!!</p>
            </div>
            <?php endif; ?>
        </section>

        <section id="payment_transfer">
            <a href="#" class="nav-head">Payment Transfer</a>
            <?php if (isset($_SESSION['customer_id'])): ?>
            <div class="content">
                <a href="natTransfer.php">National Transfer</a>
                <a href="billPay.html">Bill Payment</a>
            </div>
            <?php else: ?>
            <div class="content">
                <p style="color: black;">Login to check details!!</p>
            </div>
            <?php endif; ?>
        </section>

        <section id="fixed_deposite">
                <?php if (isset($_SESSION['customer_id'])): ?>
                <a class="nav-head" href="fixDep.html">Fixed Deposit</a>
                <?php else: ?>
                <a href="#" onclick="alert('Please login to access Deposit section!')">Deposit</a>
                <?php endif; ?>
        </section>

        <section id="acc">
            <div>
                <?php if (isset($_SESSION['customer_id'])): ?>
                <a class="nav-head" href="acc.php">My Account</a>
                <?php else: ?>
                <a href="#" onclick="alert('Please login to access My Account section!')">My Account</a>
                <?php endif; ?>
            </div>
        </section>
    </nav>

    <main class="main-content">



        <section class="slideshow-container">
            <div class="mySlides fade">
                <img src="../Images/online banking-1.png">
            </div>
            <div class="mySlides fade">
                <img src="../Images/online banking-2.png">
            </div>
            <div class="mySlides fade">
                <img src="../Images/online banking-3.png">
            </div>
        </section>


        <div id="disp">
            <!-- <p>Login to see your Details here:</p> -->

            <!-- <div>
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
        </div> -->
        </div>

    </main>

    <footer>
        <nav id="foot">
            <a href="aboutUs.html">About Us</a>
        </nav>
    </footer>


    <script>
        let slideIndex = 0;
        showSlides();
        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("fade");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            } for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove("active");
            } slideIndex++;
            if (slideIndex > slides.length)
                slideIndex = 1; slides[slideIndex - 1].style.display = "block";
            if (dots[slideIndex - 1]) {
                dots[slideIndex - 1].classList.add("active");
            } setTimeout(showSlides, 2000);
        } 
    </script>
</body>

</html>