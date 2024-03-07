<?php
require_once('boot.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        $imagePaths = array();

        // Selecting image filenames associated with the ID
        $stmt4 = $pdo->prepare("SELECT images FROM usar WHERE id = :id");
        $stmt4->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt4->execute();

        // Fetching and constructing image paths
        while ($imageFilename = $stmt4->fetchColumn()) {
            $imagePath = "resources/gallery/" . $imageFilename;

            if (!empty($imageFilename) && file_exists($imagePath)) {
                $imagePaths[] = $imagePath;
            }
        }

        // Deleting the files
        foreach ($imagePaths as $imagePath) {
            if (unlink($imagePath)) {
                // File deleted successfully
            } else {
                // Error occurred
                $error = error_get_last();
                echo "Error deleting file: " . $error['message'];
            }
        }


        // Fetch equip_ids from equipment_record
        $stmt = $pdo->prepare("SELECT equip_id FROM equipment_record WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $equipIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Delete records from the equipment_record table
        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();
        $deletedEquipmentRecordRows = $stmt1->rowCount();

        // Delete records from the equipments table for each equip_id
        $deletedEquipmentRows = 0;
        foreach ($equipIds as $equipId) {
            $stmt2 = $pdo->prepare("DELETE FROM equipments WHERE equip_id = :equip_id");
            $stmt2->bindParam(':equip_id', $equipId, PDO::PARAM_INT);
            $stmt2->execute();
            $deletedEquipmentRows += $stmt2->rowCount();
        }

        // Delete records from the usar table
        $stmt3 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt3->execute();
        $deletedUsarRows = $stmt3->rowCount();

        $pdo->commit();

        // Reset AUTO_INCREMENT values
        $pdo->exec("ALTER TABLE equipments AUTO_INCREMENT = 1");
        $pdo->exec("ALTER TABLE usar AUTO_INCREMENT = 1");
    } catch (PDOException $e) {
        $pdo->rollBack();
    }
} else {
    http_response_code(400);
}
