<?php
require_once('boot.php');

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Database connection
    try {
        // Begin transaction
        $pdo->beginTransaction();

        // Retrieve the equip_id from equipment_record
        $stmt = $pdo->prepare("SELECT equip_id FROM equipment_record WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $equipId = $stmt->fetchColumn();

        // Delete records from the equipment_record table
        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();

        // Delete records from the equipments table based on equip_id
        $stmt2 = $pdo->prepare("DELETE FROM equipments WHERE equip_id = :equip_id");
        $stmt2->bindParam(':equip_id', $equipId, PDO::PARAM_INT);
        $stmt2->execute();


        // Delete record from the usar table
        $stmt3 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt3->execute();



        // Reset auto-increment value for equipments table
        $pdo->exec("ALTER TABLE equipments AUTO_INCREMENT = 1");

        // Reset auto-increment value for usar table
        $pdo->exec("ALTER TABLE usar AUTO_INCREMENT = 1");

        // Commit transaction
        $pdo->commit();

        // Display success message
        echo "<div class='alert alert-success' role='alert'>Record with ID $id has been deleted successfully</div>";
    } catch (PDOException $e) {
        // Rollback transaction
        $pdo->rollBack();

        // Display error message
        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . $e->getMessage() . "</div>";
    }
} else {
    // If ID parameter is not provided, send bad request response
    http_response_code(400);
}
