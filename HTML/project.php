<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['customer_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.html';</script>";
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "online_banking";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {

    $customer_id = $_SESSION['customer_id'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $branchAddress = $_POST['branchAddress'];
    $date = $_POST['date'];
    $yourName = $_POST['yourName'];
    $accountNumber = $_POST['accountNumber'];
    $dob = $_POST['dob'];
    $ifsc = $_POST['ifsc'];
    $yourName2 = $_POST['yourName2'];
    $accountNumber2 = $_POST['accountNumber2']; // ✅ Fixed variable name
    $branchAddress2 = $_POST['branchAddress2'];

    $uploadDir = dirname(__DIR__) . "/uploads/";
    $viewPath = "../uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $photoName = uniqid("photo_") . "_" . basename($_FILES["photo"]["name"]);
    $panName = uniqid("pan_") . "_" . basename($_FILES["pan"]["name"]);
    $aadharName = uniqid("aadhar_") . "_" . basename($_FILES["aadhar"]["name"]);

    move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadDir . $photoName);
    move_uploaded_file($_FILES["pan"]["tmp_name"], $uploadDir . $panName);
    move_uploaded_file($_FILES["aadhar"]["tmp_name"], $uploadDir . $aadharName);

    $photoPath = $viewPath . $photoName;
    $panPath = $viewPath . $panName;
    $aadharPath = $viewPath . $aadharName;


    // Insert into database
    $stmt = $conn->prepare("INSERT INTO minor_to_major_requests 
        (customer_id, bank_name, branch_name, branch_address, date, applicant_name, account_number, dob, ifsc_code, your_name2, account_number2, branch_address2, photo_path, pan_path, aadhar_path)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "issssssssssssss",
        $customer_id,
        $bankName,
        $branchName,
        $branchAddress,
        $date,
        $yourName,
        $accountNumber,
        $dob,
        $ifsc,
        $yourName2,
        $accountNumber2,
        $branchAddress2,
        $photoPath,
        $panPath,
        $aadharPath
    );

    if ($stmt->execute()) {
        echo "<script>
            alert('✅ Your Minor to Major application has been submitted successfully! It will be verified in 3–4 working days.');
            window.location.href = 'MTM.html';
        </script>";
    } else {
        echo "<script>alert('❌ Error submitting form: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
