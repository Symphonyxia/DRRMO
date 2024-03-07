<?php
require_once('boot.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("SELECT equip_id FROM equipment_record WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $equipIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $stmt1 = $pdo->prepare("DELETE FROM equipment_record WHERE id = :id");
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();
        $deletedEquipmentRecordRows = $stmt1->rowCount();

        $deletedEquipmentRows = 0;
        foreach ($equipIds as $equipId) {
            $stmt2 = $pdo->prepare("DELETE FROM equipments WHERE equip_id = :equip_id");
            $stmt2->bindParam(':equip_id', $equipId, PDO::PARAM_INT);
            $stmt2->execute();
            $deletedEquipmentRows += $stmt2->rowCount();
        }

        $stmt3 = $pdo->prepare("DELETE FROM usar WHERE id = :id");
        $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt3->execute();
        $deletedUsarRows = $stmt3->rowCount();

        $pdo->commit();

        $pdo->exec("ALTER TABLE equipments AUTO_INCREMENT = 1");
        $pdo->exec("ALTER TABLE usar AUTO_INCREMENT = 1");
    } catch (PDOException $e) {
        $pdo->rollBack();
    }
} else {
    http_response_code(400);
}
