<?php 
// Include the database configuration file
require_once 'dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment AVG Amount</title>
</head>
<body>
  <?php 
    // Check if the database connection is successful
    if ($pdo) {
        // Prepare and execute the SQL query to retrieve the average payment amount by payment method
        $sql = "
        SELECT PaymentMethod, AVG(Amount) as AvgAmount
          FROM Payments
          GROUP BY PaymentMethod
          ORDER BY AvgAmount DESC
        ";
        $stmt = $pdo->query($sql);

        // Fetch the results as an associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Print the results in a readable format
        echo "<pre>";
        print_r($rows);
        echo "</pre>";
    } else {
        // Display an error message if the database connection failed
        echo "Database connection failed.";
    }
  ?>
</body>
</html>
