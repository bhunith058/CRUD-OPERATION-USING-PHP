<?php
include 'conection.php';

// Check if ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request!");
}

$id = $_GET['id'];

// Fetch user data
$sql = "SELECT * FROM crudi WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("User not found!");
}

$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $join_date = $_POST['join_date'];

    $update_sql = "UPDATE crudi SET name='$name', phone='$phone', email='$email', join_date='$join_date' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Member updated successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="style2.css">
   
</head>
<body>
    <header>
        <div class="navbar">
            <h1>PHP CRUD OPER</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h2>Edit Member</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="join_date">Joining Date:</label>
            <input type="date" id="join_date" name="join_date" value="<?php echo $row['join_date']; ?>" required>

            <button type="submit">Update Member</button>
        </form>
    </main>
</body>
</html>
