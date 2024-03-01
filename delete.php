<?php
require_once('boot.php');

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Database connection
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Delete records from the equipment_record table
        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE usar_id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();

        // Delete record from the usar table
        $stmt2 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();

        // Close connection
        $pdo = null;

        // Send success response
        http_response_code(200);
        echo "Record deleted successfully.";
    } catch (PDOException $e) {
        // Handle database errors
        http_response_code(500);
        echo "Error: " . $e->getMessage();
    }
} else {
    // If ID parameter is not provided, send bad request response
    http_response_code(400);
    echo "ID parameter is required.";
}
