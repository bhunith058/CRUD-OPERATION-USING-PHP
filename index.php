<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1>PHP CRUD OPER</h1>
            <nav><ul>
                <li><a href="">Home</a></li>
                <li><a href="create.php"><span>Add Member</span></a></li>

            </ul></nav>
        </div>
    </header>
    <main>
    <table>
        <thead>
            <tr>
                <th>User id</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Joinning date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conection.php';
            $sql = "select * from crudi";
            $result =$conn->query($sql);
            if(!$result){
                die("invalid query");
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['join_date'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                    </td>
                </tr>";
            }
            
            
            ?>
            </tbody>
            </table>
    </main>
</body>
</html>