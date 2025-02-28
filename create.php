<?php
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $join_date = $_POST['join_date'];

    $sql = "INSERT INTO crudi (name, phone, email, join_date) VALUES ('$name', '$phone', '$email', '$join_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New member added successfully!'); window.location.href='index.php';</script>";
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
    <title>Add New Member</title>
    <link rel="stylesheet" href="style1.css">
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

    <div class="container">
        <h2>Add New Member</h2>
        <form action="create.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="join_date">Joining Date:</label>
            <input type="date" id="join_date" name="join_date" required>

            <button type="submit">Add Member</button>
        </form>
    </div>

</body>
</html>
