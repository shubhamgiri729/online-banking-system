<?php
session_start();

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

// Get form data safely
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
if (($email || $username) && $password) {

    // Find user by email or username
    $stmt = $conn->prepare("
        SELECT id, customer_id, username, email, password 
        FROM users 
        WHERE email = ? OR username = ?
    ");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {

            // Store base user session info
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // ✅ Fetch linked customer info
            $custStmt = $conn->prepare("
                SELECT customer_id, name, account_number, ifsc_code, branch_name, balance 
                FROM customers 
                WHERE customer_id = ?
            ");
            $custStmt->bind_param("i", $user['customer_id']);
            $custStmt->execute();
            $custResult = $custStmt->get_result();

            if ($custResult->num_rows > 0) {
                $customer = $custResult->fetch_assoc();

                // Store customer data in session
                $_SESSION['customer_id'] = $customer['customer_id'];
                $_SESSION['name'] = $customer['name'];
                $_SESSION['account_number'] = $customer['account_number'];
                $_SESSION['ifsc_code'] = $customer['ifsc_code'];
                $_SESSION['branch_name'] = $customer['branch_name'];
                $_SESSION['balance'] = $customer['balance'];
            }

            echo "<script>
                alert('✅ Login Successful! Welcome, {$customer['name']}');
                window.location.href = '/Online-Banking-Website/HTML/index.php';
            </script>";
        } else {
            echo "<script>
                alert('❌ Invalid password. Please try again.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('⚠️ No account found with that Email or Username.');
            window.history.back();
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('⚠️ Please fill all required fields.');
        window.history.back();
    </script>";
}

$conn->close();
?>
