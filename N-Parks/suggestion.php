<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
    exit();
}
?>
<?php
if (isset($_SESSION['u_data'])) {
    $user = $_SESSION['u_data'];
}
?>
<?php
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
}
?>
<?php
if(isset($_SESSION['srno'])){
    $srno=$_SESSION['srno'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Suggestions Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input[type="text"],
input[type="email"],
textarea {
    padding: 8px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<?php include'include/header.php';  ?>
<div class="container">
    <h2>Suggestions Form</h2>
    <form action="suggestion.php" method="post">
        <label for="park_name">Park Name:</label>
        <input type="text" name="park_name" required><br><br>

        <label for="suggestion_text">Suggestion:</label>
        <textarea name="suggestion_text" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include'_dbconnect.php';
    $email=$id;
    $sno=$srno;
    
    // $srno = $_POST['srno'];
    // $email = $_POST['email'];
    $park_name = $_POST['park_name'];
    $suggestion_text = $_POST['suggestion_text'];

    // SQL query to insert data into suggestions table
    $sql = "INSERT INTO suggestions (srno,email, park_name, suggestion_text, date_time) 
            VALUES ($srno,'$email', '$park_name', '$suggestion_text', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Suggestion Successfully Send !');</script>";
        header("location:index.php");


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>
</html>

