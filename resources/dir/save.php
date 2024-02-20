<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addform'])) {
    try {
        include '../../boot.php';

        // Handle response_type
        $responseType = isset($_POST['response_type']) ? implode(', ', $_POST['response_type']) : '';
        $responseTypeOther = isset($_POST['response_type_other']) ? $_POST['response_type_other'] : '';
        if (!empty($responseTypeOther)) {
            $responseType .= ' - ' . $responseTypeOther;
        }

        // Handle loc_type
        $locType = isset($_POST['loc_type']) && is_array($_POST['loc_type']) ? implode(', ', $_POST['loc_type']) : '';
        $locTypeOther = isset($_POST['loc_type_other']) ? $_POST['loc_type_other'] : '';
        if (!empty($locTypeOther)) {
            $locType .= ' - ' . $locTypeOther;
        }

        // Handle call_type
        $callType = isset($_POST['call_type']) ? implode(', ', $_POST['call_type']) : '';
        $callTypeOther = isset($_POST['call_type_other']) ? $_POST['call_type_other'] : '';
        if (!empty($callTypeOther)) {
            $callType .= !empty($callType) ? ', ' . $callTypeOther : $callTypeOther;
        }

        // Get other form data
        $srrServices = isset($_POST['srr_services']) ? $_POST['srr_services'] : '';
        $total = isset($_POST['total']) ? $_POST['total'] : 0;

        // Serialize arrays before storing
        $weather = isset($_POST['weather']) ? serialize($_POST['weather']) : '';
        $terrain = isset($_POST['terrain']) ? serialize($_POST['terrain']) : '';
        $interventions = isset($_POST['interventions']) ? serialize($_POST['interventions']) : '';


      
            if (isset($_FILES["image"])) {
                $uploadDir = "resources/gallery/";
                $uploadPath = $uploadDir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath);
        
                // Save the unique image path in the database
                $imagePath = $uploadPath;
                $pdo = new PDO("mysql:host=localhost;dbname=drrmo", "root", "");
                
                // Check if the image already exists in the database
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM usar WHERE images = ?");
                $stmt->bindParam(1, $imagePath);
                $stmt->execute();
        
                if ($stmt->fetchColumn() == 0) {
                    // Image doesn't exist, insert it into the database
                    $stmt = $pdo->prepare("INSERT INTO usar (images) VALUES (?)");
                    $stmt->bindParam(1, $imagePath);
                    $stmt->execute();
                }
            }
        

        // Prepare statement for usar table insertion
        $usarStmt = $pdo->prepare("INSERT INTO usar (unit, irf_no, date, incident_loc, incident_comm, agency, position, address, contact_no, incident, recommendation, narrative, map_loc, latitude, longitude, dist_ratio, defib, no_cas, amb_spec, time_start, time_end, cycle, cr, enr, atscn, descn, insvc, optm, end, begin, total, cpr, casualty, ambulance_req, response_type, loc_type, call_type, srr_services, weather, terrain, interventions, prep_by, endorsed_by, witness) 
        VALUES (:unit, :irf_no, :date, :incident_loc, :incident_comm, :agency, :position, :address, :contact_no, :incident, :recommendation, :narrative, :map_loc, :latitude, :longitude, :dist_ratio, :defib, :no_cas, :amb_spec, :time_start, :time_end, :cycle, :cr, :enr, :atscn, :descn, :insvc, :optm, :end, :begin, :total, :cpr, :casualty, :ambulance_req, :response_type, :loc_type, :call_type, :srr_services, :weather, :terrain, :interventions, :prep_by, :endorsed_by, :witness)");

        // Bind parameters for usar table
        $usarStmt->bindParam(':unit', $_POST['unit']);
        $usarStmt->bindParam(':irf_no', $_POST['irf_no']);
        $usarStmt->bindParam(':date', $_POST['date']);
        $usarStmt->bindParam(':incident_loc', $_POST['incident_loc']);
        $usarStmt->bindParam(':incident_comm', $_POST['incident_comm']);
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
        $usarStmt->bindParam(':cr', $_POST['cr']);
        $usarStmt->bindParam(':enr', $_POST['enr']);
        $usarStmt->bindParam(':atscn', $_POST['atscn']);
        $usarStmt->bindParam(':descn', $_POST['descn']);
        $usarStmt->bindParam(':insvc', $_POST['insvc']);
        $usarStmt->bindParam(':optm', $_POST['optm']);
        $usarStmt->bindParam(':end', $_POST['end']);
        $usarStmt->bindParam(':begin', $_POST['begin']);
        $usarStmt->bindParam(':total', $total);
        $usarStmt->bindParam(':cpr', $_POST['cpr']);
        $usarStmt->bindParam(':casualty', $_POST['casualty']);
        $usarStmt->bindParam(':ambulance_req', $_POST['ambulance_req']);
        $usarStmt->bindParam(':response_type', $responseType);
        $usarStmt->bindParam(':loc_type', $locType);
        $usarStmt->bindParam(':call_type', $callType);
        $usarStmt->bindParam(':srr_services', $srrServices);
        $usarStmt->bindParam(':weather', $weather);
        $usarStmt->bindParam(':terrain', $terrain);
        $usarStmt->bindParam(':interventions', $interventions);
        $usarStmt->bindParam(':prep_by', $_POST['prep_by']);
        $usarStmt->bindParam(':endorsed_by', $_POST['endorsed_by']);
        $usarStmt->bindParam(':witness', $_POST['witness']);

        // Execute the statement for usar table
        $usarStmt->execute();

        // Get the last inserted ID (assuming usar_id is the primary key of usar table)
        $usarId = $pdo->lastInsertId();

        // Prepare the SQL statement for inserting into equipments table
        $equipStmt = $pdo->prepare("INSERT INTO equipments (equip_id, id, equip_name, equip_status) VALUES (:equip_id, :usar_id, :equip_name, :status)");

        // Iterate over each equipment status and insert into equipments table
        foreach ($_POST['equip_status'] as $equip) {
            $equipName = $equip['equip_name'];
            $status = $equip['status'];

            // Bind parameters and execute the statement for equipments table
            $equipStmt->bindParam(':equip_id', $equip['equip_id']); // Assuming 'equip_id' is available in the $_POST array
            $equipStmt->bindParam(':usar_id', $usarId);
            $equipStmt->bindParam(':equip_name', $equipName);
            $equipStmt->bindParam(':status', $status);
            $equipStmt->execute();
        }

        $_SESSION['success'] = "Record inserted successfully";
        header("Location: ../../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


