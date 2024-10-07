<?php 
// Include the database configuration file
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablet</title>
</head>
<body>
  <?php 
    // Check if the database connection is successful
    if ($pdo) {
        // Prepare and execute the SQL query to fetch all instructors
        $sql = "SELECT InstructorID, FirstName, LastName, Qualification, Experience, ContactNumber, Email FROM Instructors";
        $stmt = $pdo->query($sql);

       // Check if there are any instructors
        if ($stmt->rowCount() > 0) {
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "
            <tr>
            <th>Instructor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Qualification</th>
            <th>Experience (Years)</th>
            <th>Contact Number</th>
            <th>Email</th>
            </tr>";

            // Display all INSTRUCTORS in the table
            foreach ($stmt as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['InstructorID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Qualification']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Experience']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ContactNumber']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                echo "</tr>";
            }

            // Close the HTML table
            echo "</table>";
        } else {
            // Display a message if no instructors are found
            echo "No instructors found.";
        }
    } else {
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
