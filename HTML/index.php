<!DOCTYPE html>
<html>

<head>
    <title>Online Banking Website mini project</title>
    <link href="../CSS/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "header.php" ?>
    <nav id="navbar">
        <section id="Home">
            <a href="index.php?page=home"
                class="nav-head active">
                Home
            </a>
        </section>
        <section id="services">
            <a id="service" class="nav-head" tabindex="0" href="#">Services</a>
            <?php if (isset($_SESSION['customer_id'])): ?>
                <div class="content">
                    <a href="index.php?page=perIntBank">Personal Internet Banking</a>
                    <a href="index.php?page=mtm" id="e_service">Minor to Major</a>
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
                    <a href="index.php?page=natTransfer">National Transfer</a>
                    <a href="index.php?page=billPay">Bill Payment</a>
                </div>
            <?php else: ?>
                <div class="content">
                    <p style="color: black;">Login to check details!!</p>
                </div>
            <?php endif; ?>
        </section>

        <section id="fixed_deposite">
            <?php if (isset($_SESSION['customer_id'])): ?>
                <a class="nav-head" href="index.php?page=deposit">
                    Fixed Deposit
                </a>
            <?php else: ?>
                <a href="#" class="basic" onclick="alert('Please login to access Deposit section!')">Fixed Deposit</a>
            <?php endif; ?>
        </section>

        <section id="acc">
            <div>
                <?php if (isset($_SESSION['customer_id'])): ?>
                    <a class="nav-head" href="index.php?page=account">
                        My Account
                    </a>
                <?php else: ?>
                    <a href="#" class="basic" onclick="alert('Please login to access My Account section!')">My Account</a>
                <?php endif; ?>
            </div>
        </section>
    </nav>

    <main class="main-content">
        <section class="hero">
            <h1>Welcome to Online Banking</h1>
            <p>Secure • Fast • Reliable Banking at Your Fingertips</p>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3>💸 Money Transfer</h3>
                <p>Send money instantly across accounts with secure transactions.</p>
            </div>

            <div class="feature-card">
                <h3>💳 Bill Payments</h3>
                <p>Pay electricity, water, and gas bills easily.</p>
            </div>

            <div class="feature-card">
                <h3>📈 Fixed Deposit</h3>
                <p>Grow your savings with high interest FD plans.</p>
            </div>

            <div class="feature-card">
                <h3>🔐 Secure Banking</h3>
                <p>Your data is protected with advanced security systems.</p>
            </div>
        </section>


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

        <section class="info">
            <h2>Why Choose Our Bank?</h2>

            <div class="info-points">
                <div>
                    <h4>🔐 Secure Transactions</h4>
                    <p>Advanced encryption ensures your money and data are always safe.</p>
                </div>

                <div>
                    <h4>⚡ Fast Banking</h4>
                    <p>Instant transfers and quick access to all banking services.</p>
                </div>

                <div>
                    <h4>📱 Easy to Use</h4>
                    <p>Simple and clean interface designed for all users.</p>
                </div>

                <div>
                    <h4>🕒 24/7 Access</h4>
                    <p>Access your account anytime, anywhere.</p>
                </div>
            </div>
        </section>



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
            }
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove("active");
            }
            slideIndex++;
            if (slideIndex > slides.length)
                slideIndex = 1;
            slides[slideIndex - 1].style.display = "block";
            if (dots[slideIndex - 1]) {
                dots[slideIndex - 1].classList.add("active");
            }
            setTimeout(showSlides, 2000);
        }
    </script>
</body>

</html>