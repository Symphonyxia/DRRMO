<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addform'])) {
    try {
        include '../../boot.php';

        $responseType = isset($_POST['response_type']) ? implode(',', $_POST['response_type']) : '';
        $responseTypeOther = isset($_POST['response_type_other']) ? $_POST['response_type_other'] : '';
        if (!empty($responseTypeOther)) {
            $responseType .= $responseTypeOther;
        }

        $locType = isset($_POST['loc_type']) && is_array($_POST['loc_type']) ? implode(',', $_POST['loc_type']) : '';
        $locTypeOther = isset($_POST['loc_type_other']) ? $_POST['loc_type_other'] : '';
        if (!empty($locTypeOther)) {
            $locType .=   $locTypeOther;
        }


        $callType = isset($_POST['call_type']) && is_array($_POST['call_type']) ? implode(',', $_POST['call_type']) : '';
        $callTypeOther = isset($_POST['call_type_other']) ? $_POST['call_type_other'] : '';
        if (!empty($callTypeOther)) {
            $callType .=  $callTypeOther;
        }


        $weather = isset($_POST['weather']) ? implode(',', $_POST['weather']) : '';
        $weatherOther = isset($_POST['weather']) ? $_POST['weather'] : '';

        $signal = isset($_POST['signal']) ? $_POST['signal'] : '';

        if (!empty($signal)) {
            $weather .=  $signal;
        }

        $terrain = isset($_POST['terrain']) ? implode(',', $_POST['terrain']) : '';
        $terrainOther = isset($_POST['terrain']) ? $_POST['terrain'] : '';


        $interventions = isset($_POST['interventions']) ? implode(',', $_POST['interventions']) : '';
        $interventionsOther = isset($_POST['interventions']) ? implode(',', $_POST['interventions']) : '';




        $srrServices = isset($_POST['srr_services']) ? $_POST['srr_services'] : '';
        $total = isset($_POST['total']) ? $_POST['total'] : 0;

        if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../../resources/gallery/';

            if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
                die("Error: Upload directory is not writable or does not exist.");
            }

            $uploadFile = $uploadDir . basename($_FILES['images']['name']);

            if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadFile)) {
                $imagePath = $uploadFile;

                $stmt = $pdo->prepare("SELECT COUNT(*) FROM usar WHERE images = :imagePath");
                $stmt->bindParam(':imagePath', $imagePath);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                if ($count == 0) {
                    $sql = "INSERT INTO usar (images) VALUES (:imagePath)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':imagePath', $imagePath);
                }
            }
        }


        $crew = isset($_POST['crew']) ? $_POST['crew'] : array();
        $designation = isset($_POST['designation']) ? $_POST['designation'] : array();
        $crewStr = implode(',', $crew);
        $designationStr = implode(',', $designation);
        $warning_signal = $_POST['warning'];

        $usarStmt = $pdo->prepare("INSERT INTO usar (unit, irf_no, date, incident_loc, incident_commander, agency, position, address, contact_no, incident, recommendation, narrative, map_loc, latitude, longitude, dist_ratio, defib, no_cas, amb_spec, time_start, time_end, cycle, call_received, enroute, at_scene, depart_scene, in_service, operation_team, end_mileage, begin_mileage, total, cpr, casualty, ambulance_req, response_type, loc_type, call_type, srr_services, weather, terrain, interventions, prep_by, endorsed_by, witnesses, images, crew, designation, warning) 
VALUES (:unit, :irf_no, :date, :incident_loc, :incident_commander, :agency, :position, :address, :contact_no, :incident, :recommendation, :narrative, :map_loc, :latitude, :longitude, :dist_ratio, :defib, :no_cas, :amb_spec, :time_start, :time_end, :cycle, :call_received, :enroute, :at_scene, :depart_scene, :in_service, :operation_team, :end_mileage, :begin_mileage, :total, :cpr, :casualty, :ambulance_req, :response_type, :loc_type, :call_type, :srr_services, :weather, :terrain, :interventions, :prep_by, :endorsed_by, :witnesses, :images, :crew, :designation, :warning)");

        $usarStmt->bindParam(':unit', $_POST['unit']);
        $usarStmt->bindParam(':irf_no', $_POST['irf_no']);
        $usarStmt->bindParam(':date', $_POST['date']);
        $usarStmt->bindParam(':incident_loc', $_POST['incident_loc']);
        $usarStmt->bindParam(':incident_commander', $_POST['incident_commander']);
        $usarStmt->bindParam(':agency', $_POST['agency']);
        $usarStmt->bindParam(':position', $_POST['position']);
        $usarStmt->bindParam(':address', $_POST['address']);
        $usarStmt->bindParam(':contact_no', $_POST['contact_no']);
        $usarStmt->bindParam(':incident', $_POST['incident']);
        $usarStmt->bindParam(':recommendation', $_POST['recommendation']);
        $usarStmt->bindParam(':narrative', $_POST['narrative']);
        $usarStmt->bindParam(':map_loc', $_POST['map_loc']);
        $usarStmt->bindParam(':latitude', $_POST['latitude']);
        $usarStmt->bindParam(':longitude', $_POST['longitude']);
        $usarStmt->bindParam(':dist_ratio', $_POST['dist_ratio']);
        $usarStmt->bindParam(':defib', $_POST['defib']);
        $usarStmt->bindParam(':no_cas', $_POST['no_cas']);
        $usarStmt->bindParam(':amb_spec', $_POST['amb_spec']);
        $usarStmt->bindParam(':time_start', $_POST['time_start']);
        $usarStmt->bindParam(':time_end', $_POST['time_end']);
        $usarStmt->bindParam(':cycle', $_POST['cycle']);
        $usarStmt->bindParam(':call_received', $_POST['call_received']);
        $usarStmt->bindParam(':enroute', $_POST['enroute']);
        $usarStmt->bindParam(':at_scene', $_POST['at_scene']);
        $usarStmt->bindParam(':depart_scene', $_POST['depart_scene']);
        $usarStmt->bindParam(':in_service', $_POST['in_service']);
        $usarStmt->bindParam(':operation_team', $_POST['operation_team']);
        $usarStmt->bindParam(':end_mileage', $_POST['end_mileage']);
        $usarStmt->bindParam(':begin_mileage', $_POST['begin_mileage']);
        $usarStmt->bindParam(':total', $total);
        $usarStmt->bindParam(':cpr', $_POST['cpr']);
        $usarStmt->bindParam(':casualty', $_POST['casualty']);
        $usarStmt->bindParam(':ambulance_req', $_POST['ambulance_req']);
        $usarStmt->bindParam(':response_type', $responseType);
        $usarStmt->bindParam(':loc_type', $locType);
        $usarStmt->bindParam(':call_type', $callType);
        $usarStmt->bindParam(':srr_services', $srrServices);
        $usarStmt->bindParam(':weather', $weather);
        $usarStmt->bindParam(':warning', $warning_signal);
        $usarStmt->bindParam(':terrain', $terrain);
        $usarStmt->bindParam(':interventions', $interventions);
        $usarStmt->bindParam(':prep_by', $_POST['prep_by']);
        $usarStmt->bindParam(':endorsed_by', $_POST['endorsed_by']);
        $usarStmt->bindParam(':witnesses', $_POST['witnesses']);
        $usarStmt->bindParam(':images', $imagePath);
        $usarStmt->bindParam(':crew', $crewStr);
        $usarStmt->bindParam(':designation', $designationStr);


        $usarStmt->execute();

        $usarId = $pdo->lastInsertId();

        $equipStmt = $pdo->prepare("INSERT INTO equipments (equip_name) VALUES (:equip_name)");

        $equipRecordStmt = $pdo->prepare("INSERT INTO equipment_record (id, equip_id, equip_status) VALUES (:id, :equip_id, :equip_status)");

        foreach ($_POST['equip_name'] as $key => $equip_name) {
            $equipStmt->bindParam(':equip_name', $equip_name);
            $equipStmt->execute();

            $equipId = $pdo->lastInsertId();

            $equipRecordStmt->bindParam(':id', $usarId);
            $equipRecordStmt->bindParam(':equip_id', $equipId);
            $equipRecordStmt->bindParam(':equip_status', $_POST['equip_status'][$key]);
            $equipRecordStmt->execute();
        }

        $_SESSION['success'] = "Record inserted successfully";
        header("Location: ../../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
