<!DOCTYPE html>
<html>
<head>
    <title>Add Admin</title>
    <!-- Add any necessary CSS or styling here -->
</head>
<body>
    <h1>Add Admin</h1>
    <form action="add_admin_process.php" method="post">
        <label for="username">Admin Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Admin Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Add Admin">
    </form>
</body>
</html>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "n_parkdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert admin credentials into the database
    $sql = "INSERT INTO admin_table (username, password) VALUES ('$username', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin added successfully";
    } else {
        echo "Error adding admin: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
