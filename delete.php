<?php
require_once('boot.php');


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {

        $pdo->beginTransaction();

        $stmt = $pdo->prepare("SELECT equip_id FROM equipment_record WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $equipId = $stmt->fetchColumn();

        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();

        if ($equipId !== false) {
            $stmt2 = $pdo->prepare("DELETE FROM equipments WHERE equip_id = :equip_id");
            $stmt2->bindParam(':equip_id', $equipId, PDO::PARAM_INT);
            $stmt2->execute();
        }

        $stmt3 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt3->execute();

        $pdo->commit();



        $pdo->exec("ALTER TABLE equipments AUTO_INCREMENT = 1");


        $pdo->exec("ALTER TABLE usar AUTO_INCREMENT = 1");


        $pdo->commit();


        echo "<div class='alert alert-success' role='alert'>Record with ID $id has been deleted successfully</div>";
    } catch (PDOException $e) {

        $pdo->rollBack();


        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . $e->getMessage() . "</div>";
    }
} else {

    http_response_code(400);
}
