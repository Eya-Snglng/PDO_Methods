<?php 
// Include the database configuration file
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Count</title>
</head>
<body>
  <?php 
    // Check if the database connection is successful
    if ($pdo) {
        // Prepare and execute the SQL query to retrieve the member with the most belt tests
        $sql = "
        SELECT 
            m.MemberID, 
            m.FirstName, 
            m.LastName, 
            COUNT(bt.TestID) AS TestCount 
        FROM Members m
        LEFT JOIN BeltTests bt ON m.MemberID = bt.MemberID
        GROUP BY m.MemberID, m.FirstName, m.LastName
        ORDER BY TestCount DESC
        LIMIT 1
        ";
        $stmt = $pdo->query($sql);

        // Print the results in a readable format
        echo "<pre>";
        // Fetch the result
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
        }
        echo "</pre>";
    } else {
        // Display an error message if the database connection failed
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
