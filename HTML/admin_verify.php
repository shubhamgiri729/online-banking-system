<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "online_banking";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all pending requests
$sql = "SELECT * FROM minor_to_major_requests WHERE status='Pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Verification | Online Banking</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f7f7f7; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        img { width: 100px; border-radius: 6px; }
        .btn { padding: 6px 10px; border: none; border-radius: 5px; cursor: pointer; }
        .approve { background-color: #28a745; color: white; }
        .reject { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <h2>Minor to Major Account Verification</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Applicant Name</th>
            <th>Account Number</th>
            <th>Photo</th>
            <th>PAN</th>
            <th>Aadhaar</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['applicant_name'] ?></td>
            <td><?= $row['account_number'] ?></td>
            <td><img src="<?= $row['photo_path'] ?>" alt="photo"></td>
            <td><img src="<?= $row['pan_path'] ?>" alt="pan"></td>
            <td><img src="<?= $row['aadhar_path'] ?>" alt="aadhar"></td>
            <td><?= $row['status'] ?></td>
            <td>
                <form action="update_status.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="status" value="Approved">
                    <button type="submit" class="btn approve">Approve</button>
                </form>
                <form action="update_status.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="status" value="Rejected">
                    <button type="submit" class="btn reject">Reject</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
