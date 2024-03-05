<?php

try {

    $conn = new PDO('mysql:host=localhost;dbname=drrmo', 'root', '');


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $exportsPath = 'exports/';
    if (!file_exists($exportsPath) || !is_dir($exportsPath)) {
        mkdir($exportsPath, 0755, true);
    }

    $fileName = "CDRRMO_USAR_asof" . date('Y-m-d h-i-s') . ".csv";
    $fullFilePath = $exportsPath . $fileName;

    $file = fopen($fullFilePath, 'w');
    fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
    fputcsv($file, array("Id", "Unit", "Irf. Number", "Incident Location", "Response Tyoe", "Location Type", "Type Of Call", "SRR Services", "Incident Commander", "Agency", "Position", "Address", "Contact", "Incident", "Weather", "Warning", "CPR", "Defib", "Terrain", "Casualty", "Ambulance Request", "Interventions", "Map Location", "Latitude", "Longtitude", "Distance Ratio", "Recommendation", "Narrative", "Images", "Date", "Casualty no.", "Ambulance no.", "Time Started", "Time Ended", "Cycle", "Call Recieved", "Enroute", "At Scene", "Depart Scene", "In Service", "Operation Team", "End Mileage", "Beginning Mileage", "Total Mileage", "Prepared by", "Endorsed by", "Witnesses", "Crew", "Designation")); // column headers

    $select = $conn->prepare("SELECT * FROM usar");
    $select->execute();


    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($file, $row);
    }

    fclose($file);


    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=" . $fileName);
    header('Pragma: no-cache');
    header("Expires: 0");


    readfile($fullFilePath);


    unlink($fullFilePath);
} catch (PDOException $e) {

    die("Error in DB connection: " . $e->getMessage());
}
