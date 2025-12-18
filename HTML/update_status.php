<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "online_banking";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE minor_to_major_requests SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo "<script>alert('Application status updated successfully!');
    window.location.href='admin_verify.php';</script>";
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
