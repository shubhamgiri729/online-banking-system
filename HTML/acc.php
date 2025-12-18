<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | Online Banking Website Mini Project</title>
    <link href="../CSS/acc.css" rel="stylesheet">
</head>

<body>
    <div id="header">
        <h1>Online Banking System</h1>
        <a href="index.php"><img src="../Images/onlinebank.jpg" alt="Online Banking System"
                title="Online Banking Website"></a>
    </div>

    <div>
        <h1>My Account</h1>
    </div>

    <div id="pic">
        <img src="../Images/man.png" alt="Profile Picture">
        <p>Profile Picture</p>
    </div>

    <div id="info">
        <?php if (isset($_SESSION['customer_id'])): ?>
            <label>Name:</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['name']); ?>"><br/>

            <label>Account No:</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['account_number']); ?>"><br/>

            <label>Branch:</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['branch_name']); ?>"><br/>

            <label>IFSC Code:</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['ifsc_code']); ?>"><br/>

            <label>Account Balance:</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['balance']); ?>"><br/>
        <?php else: ?>
            <script>
                alert("Please login to view your account details!");
                window.location.href = "login.html";
            </script>
        <?php endif; ?>
    </div>
</body>

</html>
