<?php
include 'conection.php';

// Check if ID is set in URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request!");
}

$id = $_GET['id'];

// Delete the user
$sql = "DELETE FROM crudi WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Member deleted successfully!'); window.location.href='index.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
