<?php
require('pdf/fpdf.php');

$pdf = new FPDF('P','mm','legal');
$pdf->AddPage();

$pdf->Image('resources/img/iloilo.png',9,7,20,20,'PNG'); 
$pdf->Image('resources/img/disaster.jpg',29,4,25,25,'JPG'); 
$pdf->Image('resources/img/USAR.jpg',55,7,19,19,'JPG'); 

$pdf->SetFont('Times','B',10); 
$pdf->Cell(65); 
$pdf->Cell(70,5,'REPUBLIC OF THE PHILIPPINES',0,0,'C');
$pdf->Cell(-70,15,'City of Iloilo',0,0,'C');

$pdf->Cell(75); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 5, 'MILEAGE READING', 1,0, 'C'); 
$pdf->Ln();

$pdf->Cell(140); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'END', 1);
$pdf->Cell(0, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(140); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'BEGIN', 1);
$pdf->Cell(0, 5, '', 1); 
$pdf->Ln();


$pdf->Cell(140); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'TOTAL', 1);
$pdf->Cell(0, 5, '', 1); 
$pdf->Ln();


$pdf->SetFont('Arial','',8); 
$pdf->Cell(1); 
$pdf->Cell(0,10,'City Disaster Risk Reduction and Management Office',0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','BU',8); 
$pdf->Cell(1); 
$pdf->Cell(0,10,'URBAN SEARCH AND RESCUE',0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 8);
$pdf->Cell(1); 
$pdf->Cell(0,-10,'INCIDENT RESPONSE FORM',0,0,'R');
$pdf->Ln();

$pdf->Cell(1); 
$pdf->Cell(50, 10, '', 0);
$pdf->Cell(0, 10, '', 0); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Unit/Vehicle Name:', 1);
$pdf->Cell(40, 5, 'IRF No.:', 1); 
$pdf->Cell(30, 5, 'Date:', 1); 
$pdf->Cell(30, 5, 'Call Received', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Incident Address/Location', 1);
$pdf->Cell(30, 5, 'Enroute', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Response Type:', 1);
$pdf->Cell(30, 5, 'At Scene', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Location Type:', 1);
$pdf->Cell(30, 5, 'Depart Scene', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Type of Call:', 1);
$pdf->Cell(30, 5, 'in Service', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'SRR Services:', 1);
$pdf->Cell(30, 5, 'Operation Team', 1); 
$pdf->Cell(20, 5, '', 1); 
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Incident Commander:', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Agency/Office/Organization:', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Position:', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5, 'Addess:', 1);
$pdf->Cell(100, 5, 'Contact no.:', 1);
$pdf->Ln();


$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Incident:', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, 'Weather:', 1);
$pdf->Cell(30, 55, '', 1);
$pdf->Cell(30, 5, 'Terrain:', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, 'Equipment',  1, 0, 'C');
$pdf->Cell(20, 5, 'Used', 1, 0, 'C');
$pdf->Cell(20, 5, 'Checked',  1, 0, 'C');
$pdf->Cell(20, 5, 'Missing',  1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Normal', 0);
$pdf->Cell(30, 5, 'Conrete', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Self-Contained Breathing Apparatus', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Hot/Humid', 0);
$pdf->Cell(30, 5, 'Dirt', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Spreader', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Cold', 0);
$pdf->Cell(30, 5, 'Mud', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Cutter', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Light Rain', 0);
$pdf->Cell(30, 5, 'Sand', 1);

$pdf->Cell(5); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Ram', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 35, '', 0);
$pdf->Cell(30, 5, 'Heavy Rain', 0);
$pdf->Cell(30, 5, 'Gravel/Rock', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Hand Pump', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Hail', 0);
$pdf->Cell(30, 5, 'Inclined', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Combi-tool', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Windy', 0);
$pdf->Cell(30, 5, 'Swamp', 1);


$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Ram', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Thunderstorm', 0);
$pdf->Cell(30, 5, 'Unstable', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Chainsaw', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Sun and Rain', 0);
$pdf->Cell(30, 5, '', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Cutters Edge', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();


$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(30, 5, 'Signal # 1, 2, 3, 4, 5', 0);
$pdf->Cell(30, 5, '', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'High Pressure Lift Bag', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'CPR:', 1);
$pdf->Cell(35, 5, 'Casualty:', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'High Lift Jack', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Time Started:', 1);
$pdf->Cell(35, 5, 'No. of cas', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Remote Area Lighting System RALS', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Time End:', 1);
$pdf->Cell(35, 5, 'Ambulance req.:', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Ventilation Blower', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Cyle:', 1);
$pdf->Cell(35, 5, 'specify:', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Tripod and Winch', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();



$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'AED/Defib:', 1);
$pdf->Cell(35, 5, '', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Rope Rescue Equipment', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75, 5, 'NARRATIVE:', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Others', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75, 120, '', 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, 'Interventions:', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Collapse Structure Rescue', 1);
$pdf->Cell(40, 5, 'Boom', 1);
$pdf->Cell(40, 5, 'Barricade', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Confined Space Rescue', 1);
$pdf->Cell(40, 5, 'Outrigger', 1);
$pdf->Cell(40, 5, 'Structural Extrication', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Water Rescue', 1);
$pdf->Cell(40, 5, 'Tower Light', 1);
$pdf->Cell(40, 5, 'Vehicular Extrication', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Patient Retrieval', 1);
$pdf->Cell(40, 5, 'Winch', 1);
$pdf->Cell(40, 5, 'Wildlife Rescue', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'High Angle Rescue', 1);
$pdf->Cell(40, 5, 'HazMat', 1);
$pdf->Cell(40, 5, 'Generator', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, '', 0);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, 'Endorsement', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, '', 0);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, 'Crew', 1, 0, 'C');
$pdf->Cell(60, 5, 'Designation', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Cell(60, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Prepared by:', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Endorsed to/by:', 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Witness/es:', 1);
$pdf->Ln();
$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Complete Name and Signature', 1,0,'C');
$pdf->Ln();


$pdf->AddPage();

$pdf->SetFont('Times','B',10); 
$pdf->Cell(65); 
$pdf->Cell(70,5,'REPUBLIC OF THE PHILIPPINES',0,0,'C');
$pdf->Cell(-70,15,'City of Iloilo',0,0,'C');
$pdf->Cell(70,30,'CITY DISASTER RISK REDUCTION AND MANAGEMENT OFFICE',0,0,'C');
$pdf->SetFont('Times','BU',10); 
$pdf->Cell(-70,40,'URBAN SEARCH AND RESCUE',0,0,'C');
$pdf->Ln();


$pdf->Cell(1); 
$pdf->Cell(200, 150, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(200, 10, 'Map of Responded Scene', 0, 0, 'C');
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(40, 5, 'Location', 1,0,'C');
$pdf->Cell(160, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(40, 5, 'GPS', 1,0,'C');
$pdf->Cell(40, 5, 'Longitude', 1,0,'C');
$pdf->Cell(40, 5, '', 1);
$pdf->Cell(40, 5, 'Latitude', 1,0,'C');
$pdf->Cell(40, 5, '', 1);
$pdf->Ln();


$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(40, 5, 'DOT DISTANCE RATIO', 1,0,'C');
$pdf->Cell(160, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(200, 10, 'LEGEND', 0, 0, 'C');
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Cell(40, 5, 'BARRIERS', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'RT', 1, 0, 'C');
$pdf->Cell(40, 5, 'RESCUE TRUCK', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '=', 1, 0, 'C');
$pdf->Cell(40, 5, 'LIFT', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'RC', 1, 0, 'C');
$pdf->Cell(40, 5, 'RESCUE CREW', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Cell(40, 5, 'CUT', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'TL', 1, 0, 'C');
$pdf->Cell(40, 5, 'TEAM LEADER', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '<', 1, 0, 'C');
$pdf->Cell(40, 5, 'SPREAD', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'D', 1, 0, 'C');
$pdf->Cell(40, 5, 'DRIVER', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '+', 1, 0, 'C');
$pdf->Cell(40, 5, 'ACCESS POINT', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'AM', 1, 0, 'C');
$pdf->Cell(40, 5, 'AMBULANCE', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '*', 1, 0, 'C');
$pdf->Cell(40, 5, 'PATIENT', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'V', 1, 0, 'C');
$pdf->Cell(40, 5, 'VEHICLE', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '!', 1, 0, 'C');
$pdf->Cell(40, 5, 'HAZARD', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'SA', 1, 0, 'C');
$pdf->Cell(40, 5, 'STAGING AREA', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, '-', 1, 0, 'C');
$pdf->Cell(40, 5, 'NO ACCESS', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, 'V', 1, 0, 'C');
$pdf->Cell(40, 5, 'VOLUNTEER', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, 'e', 1, 0, 'C');
$pdf->Cell(40, 5, 'ELECTRICAL', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Cell(40, 5, '', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(200, 5, 'RECOMMENDATION', 1,0,'C');
$pdf->Ln();

$pdf->Cell(1); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(200, 50, '', 1,0,'C');
$pdf->Ln();

$pdf->Output();
?>
