<?php
require_once('boot.php');

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Database connection
    try {
        // Delete records from the equipment_record table
        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();

        // Delete record from the usar table
        $stmt2 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();

        // Display success message
        echo "<div class='alert alert-success' role='alert'>Record with ID $id has been deleted successfully</div>";
    } catch (PDOException $e) {
        // Display error message
        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . $e->getMessage() . "</div>";
    }
} else {
    // If ID parameter is not provided, send bad request response
    http_response_code(400);
}
