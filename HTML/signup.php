<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "online_banking";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate fields
if ($name && $email && $username && $password) {

    // Step 1: Check if user already exists in USERS table
    $checkUser = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkUser->bind_param("s", $email);
    $checkUser->execute();
    $userResult = $checkUser->get_result();

    if ($userResult->num_rows > 0) {
        echo "<script>
            alert('⚠️ This email is already registered. Please login.');
            window.location.href = 'login.html';
        </script>";
        exit;
    }

    // Step 2: Check if email exists in CUSTOMERS table
    $checkCustomer = $conn->prepare("SELECT customer_id FROM customers WHERE email = ?");
    $checkCustomer->bind_param("s", $email);
    $checkCustomer->execute();
    $customerResult = $checkCustomer->get_result();

    if ($customerResult->num_rows === 0) {
        echo "<script>
            alert('❌ Email not found in Bank Records! Please visit the bank to create an account.');
            window.history.back();
        </script>";
        exit;
    }

    $customerData = $customerResult->fetch_assoc();
    $customer_id = $customerData['customer_id'];

    // Step 3: Insert into USERS table
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, username, password, customer_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $email, $username, $hashed_password, $customer_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('✅ Signup Successful! Account Linked to Customer ID: {$customer_id}');
            window.location.href = 'login.html';
        </script>";
    } else {
        echo "<script>
            alert('❌ Error in Signup! Please try again.');
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('⚠️ Please fill all required fields.');</script>";
}

$conn->close();
?>
