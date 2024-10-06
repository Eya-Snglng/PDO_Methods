<?php 
// Include the database configuration file
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
  <?php 
    // Check if the database connection is successful
    if ($pdo) {
        // SQL query to update a member's contact number and email by MemberID
        $sql = "
        UPDATE Members 
        SET 
            ContactNumber = '09086528527', 
            Email = 'updated@example.com'
        WHERE 
            MemberID = '1'
        ";

    // Execute the update
    if ($pdo->exec($sql)) {
            echo "Data has been updated successfully.";
        } else {
            echo "Failed to update the data.";
        }
    } else {
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
