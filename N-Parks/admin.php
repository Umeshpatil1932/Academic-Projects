<?php

include('include/header.php');
// Include your database connection file
include('_dbconnect.php'); // Replace 'db_connection.php' with your actual file name

// Query to retrieve data from the 'suggestion' table
$query = "SELECT * FROM suggestions";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page - Retrieve Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

    </style>
</head>
<body>
    <h1>Suggestions</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Email</th>
                <th>Park Name</th>
                <th>Suggestion Text</th>
                <th>Date/Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the retrieved data and display it in the table
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['srno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['park_name']; ?></td>
                    <td><?php echo $row['suggestion_text']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
