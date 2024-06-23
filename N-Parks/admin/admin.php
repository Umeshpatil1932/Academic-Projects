<?php
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
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f4; /* Set a light background color */
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff; /* Set a white background color for the table */
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

thead {
    background-color: #3498db; /* Set a blue background color for the header row */
    color: #fff; /* Set text color for header row */
}

tr:hover {
    background-color: #e0e0e0; /* Set a light gray background color on hover for table rows */
}

    </style>
</head>
<body>
    <center>
    <h1>Suggestions Given By User's</h1>
    </center>
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
