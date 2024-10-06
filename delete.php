<?php 
// Database connection 
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Member</title>
</head>
<body>
  <?php 
    if ($pdo) {
        // Member ID to be deleted stored in a variable 
        $memberID = 10;

        // SQL query to delete a member by MemberID
        $sql = "DELETE FROM Members WHERE MemberID = $memberID";

        // Execute the SQL query
        if ($pdo->exec($sql)) {
            echo "Member $memberID has been deleted successfully.";
        } else {
            echo "Failed to remove the member.";
        }
    } else {
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
