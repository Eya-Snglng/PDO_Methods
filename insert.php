<?php 
// Include the database configuration fil
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Member</title>
</head>
<body>
  <?php 
    // Check if the database connection is successful
    if ($pdo) {
        // Define the SQL INSERT statement
        $sql = "
        INSERT INTO Members (
        RankID, 
        FirstName, 
        LastName, 
        DateOfBirth, 
        Gender, 
        ContactNumber, 
        EmergencyContactNumber, 
        Email, 
        Address, 
        EnrollmentDate, 
        Status
        )
        VALUES (
        '1', 
        'Kat', 
        'Stratford', 
        '1985-01-15', 
        'Female', 
        '123456789', 
        '987654321', 
        'kat.strat@example.com', 
        '123 Elm Street', 
        '2024-10-06', 
        'Active')
        ";

    // Execute the query
    if ($pdo->exec($sql)) {
            echo "New member has been added successfully.";
        } else {
            echo "Failed to insert the member.";
        }
    } else {
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
