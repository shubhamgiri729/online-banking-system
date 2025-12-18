<?php
session_start();

// Connect to database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "online_banking";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Default balance (for when not logged in)
$balance = 0.00;

// If logged in, get the balance from DB
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];

    $stmt = $conn->prepare("SELECT balance FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row['balance'];
        $_SESSION['balance'] = $balance; // keep it updated in session too
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Money Transfer | Online Banking Website mini project</title>
    <link href="../CSS/natTransfer.css" rel="stylesheet">
    <script src="../Java Script/natTransfer.js"></script>
</head>

<body onload="load();">
    <div id="header">
        <h1>Online Banking System</h1>
        <a href="index.php">
            <img src="../Images/onlinebank.jpg" alt="Online Banking Website" title="Online Banking Website">
        </a>
    </div>

    <div id="menu">
        <h1>National Money Transfer</h1>

        <?php if (isset($_SESSION['customer_id'])): ?>
            <p id="balance">Available Balance: ₹<?php echo number_format($balance, 2); ?></p>
        <?php else: ?>
            <p id="balance" style="color: red;">Please log in to see your balance.</p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="accno" id="accno" size="11" placeholder="Enter the Account Number of the Receiver:" required><br />
            <input type="number" min="0" max="20000" name="amnt" id="amnt" placeholder="Enter the amount to send:" required><br />
            <p id="error"></p>
            <button type="button" id="submitbtn" onclick="goto();">Send</button>
        </form>
    </div>
</body>

</html>
