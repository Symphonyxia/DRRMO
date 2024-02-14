<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addform'])) {
    try {
 
        include '../../boot.php';

        $stmt = $pdo->prepare("INSERT INTO usar (unit, irf_no, date, incident_loc, incident_comm, agency, position, address, contact_no, incident, recommendation, narrative, map_loc, latitude, longitude, dist_ratio, images, defib, response_type, no_cas, amb_spec, time_start, time_end, cycle, cr, enr, atscn, descn, insvc, optm, end, begin, total, cpr, casualty, ambulance_req) 
        VALUES (:unit, :irf_no, :date, :incident_loc, :incident_comm, :agency, :position, :address, :contact_no, :incident, :recommendation, :narrative, :map_loc, :latitude, :longitude, :dist_ratio, :images, :defib,  :no_cas, :amb_spec, :time_start, :time_end, :cycle, :cr, :enr, :atscn, :descn, :insvc, :optm, :end, :begin, :total, :cpr, :casualty, :ambulance_req)");

        $stmt->bindParam(':unit', $_POST['unit']);
        $stmt->bindParam(':irf_no', $_POST['irf_no']);
        $stmt->bindParam(':date', $_POST['date']);
        $stmt->bindParam(':incident_loc', $_POST['incident_loc']);
        $stmt->bindParam(':incident_comm', $_POST['incident_comm']);
        $stmt->bindParam(':agency', $_POST['agency']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':contact_no', $_POST['contact_no']);
        $stmt->bindParam(':incident', $_POST['incident']);
        $stmt->bindParam(':recommendation', $_POST['recommendation']);
        $stmt->bindParam(':narrative', $_POST['narrative']);
        $stmt->bindParam(':map_loc', $_POST['map_loc']);
        $stmt->bindParam(':latitude', $_POST['latitude']);
        $stmt->bindParam(':longitude', $_POST['longitude']);
        $stmt->bindParam(':dist_ratio', $_POST['dist_ratio']);
        $stmt->bindParam(':images', $_POST['images']);
        $stmt->bindParam(':defib', $_POST['defib']);

        $stmt->bindParam(':no_cas', $_POST['no_cas']);
        $stmt->bindParam(':amb_spec', $_POST['amb_spec']);
        $stmt->bindParam(':time_start', $_POST['time_start']);
        $stmt->bindParam(':time_end', $_POST['time_end']);
        $stmt->bindParam(':cycle', $_POST['cycle']);
        $stmt->bindParam(':cr', $_POST['cr']);
        $stmt->bindParam(':enr', $_POST['enr']);
        $stmt->bindParam(':atscn', $_POST['atscn']);
        $stmt->bindParam(':descn', $_POST['descn']);
        $stmt->bindParam(':insvc', $_POST['insvc']);
        $stmt->bindParam(':optm', $_POST['optm']);
        $stmt->bindParam(':end', $_POST['end']);
        $stmt->bindParam(':begin', $_POST['begin']);
        $stmt->bindParam(':total', $_POST['total']);

        $stmt->bindParam(':cpr', $_POST['cpr']);
        $stmt->bindParam(':ambulance_req', $_POST['ambulance_req']);
        $stmt->bindParam(':casualty', $_POST['casualty']);





        $stmt->execute();

        $_SESSION['success'] = "Record inserted successfully";
        header("Location: ../../index.php");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
