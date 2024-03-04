<?php
require('pdf/fpdf.php');


$conn = new mysqli('localhost', 'root', '', 'drrmo');

if ($conn->connect_error) {
  die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}


$pageId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$select = $conn->prepare("SELECT * FROM usar WHERE id = ?");
$select->bind_param("i", $pageId);
$select->execute();
$result = $select->get_result();

$pdf = new FPDF('P', 'mm', 'legal');
$pdf->AddPage();

while ($row = $result->fetch_object()) {
  $id = $row->id;
  $unit = $row->unit;
  $irf_no = $row->irf_no;
  $incident_loc = $row->incident_loc;
  $response_type = $row->response_type;
  $loc_type = $row->loc_type;
  $response_type = $row->response_type;
  $call_type = $row->call_type;
  $srr_services = $row->srr_services;
  $incident_comm = $row->incident_commander;
  $agency = $row->agency;
  $position = $row->position;
  $address = $row->address;
  $contact_no = $row->contact_no;
  $incident = $row->incident;
  $weather = $row->weather;
  $cpr = $row->cpr;
  $defib = $row->defib;
  $terrain = $row->terrain;
  $casualty = $row->casualty;
  $ambulance_req = $row->ambulance_req;
  $interventions = $row->interventions;
  $map_loc = $row->map_loc;
  $latitude = $row->latitude;
  $longitude = $row->longitude;
  $dist_ratio = $row->dist_ratio;
  $recommendation = $row->recommendation;
  $narrative = $row->narrative;
  $images = $row->images;
  $date = $row->date;
  $no_cas = $row->no_cas;
  $amb_spec = $row->amb_spec;
  $time_start = $row->time_start;
  $time_end = $row->time_end;
  $cycle = $row->cycle;
  $cr = $row->call_received;
  $enr = $row->enroute;
  $atscn = $row->at_scene;
  $descn = $row->depart_scene;
  $insvc = $row->in_service;
  $optm = $row->operation_team;
  $end = $row->end_mileage;
  $begin = $row->begin_mileage;
  $total = $row->total;
  $prep_by = $row->prep_by;
  $endorsed_by = $row->endorsed_by;
  $witness = $row->witnesses;
  $crew = $row->crew;
  $designation = $row->designation;
  $warning = $row->warning;
}





$pdf->Image('resources/img/iloilo.png', 9, 7, 20, 20, 'PNG');
$pdf->Image('resources/img/disaster.jpg', 29, 4, 25, 25, 'JPG');
$pdf->Image('resources/img/USAR.jpg', 55, 7, 19, 19, 'JPG');

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(65);
$pdf->Cell(70, 5, 'REPUBLIC OF THE PHILIPPINES', 0, 0, 'C');
$pdf->Cell(-70, 15, 'City of Iloilo', 0, 0, 'C');

$pdf->Cell(75);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 5, 'MILEAGE READING', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'END', 1);
$pdf->Cell(0, 5, $end, 1);
$pdf->Ln();

$pdf->Cell(140);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'BEGIN', 1);
$pdf->Cell(0, 5, $begin, 1);
$pdf->Ln();


$pdf->Cell(140);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, 'TOTAL', 1);
$pdf->Cell(0, 5, $total, 1);
$pdf->Ln();




$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1);
$pdf->Cell(0, 10, 'City Disaster Risk Reduction and Management Office', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 8);
$pdf->Cell(1);
$pdf->Cell(0, 10, 'URBAN SEARCH AND RESCUE', 0, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 8);
$pdf->Cell(1);
$pdf->Cell(0, -10, 'INCIDENT RESPONSE FORM', 0, 0, 'R');
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(50, 10, '', 0);
$pdf->Cell(0, 10, '', 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Unit/Vehicle Name: ' . $unit, 1);
$pdf->Cell(40, 5, 'IRF No.: ' . $irf_no, 1);
$pdf->Cell(30, 5, 'Date: ' . $date, 1);
$pdf->Cell(30, 5, 'Call Received', 1);
$pdf->Cell(20, 5, $cr, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Incident Address/Location: ' . $incident_loc, 1);
$pdf->Cell(30, 5, 'Enroute', 1);
$pdf->Cell(20, 5, $enr, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Response Type: ', 1);
$rect1_x = 35;
$rect2_x = 55;
$rect3_x = 90;
$rect_y = 61;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-123, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Standby', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-164, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Response to Scene ', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-144, 5, '', 0, 0);
$pdf->Cell(0, 5, ($response_type != 'Standby' && $response_type != 'Response') ? "Others: $response_type" : 'Others:_______', 0, 0);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Cell(30, 5, 'At Scene ', 1);
$pdf->Cell(20, 5, $atscn, 1);
$pdf->Ln();

$checkmark = '';
if ($response_type == 'Standby' || $response_type == 'Response' || $response_type == 'Others') {
  $checkmark = "\x34";
} else {

  $response_type = 'Others';
  $checkmark = "\x34";
}


$pdf->SetFont('ZapfDingbats', '', 8);

if ($response_type == 'Standby') {
  $pdf->Text($rect1_x + 0.3, $rect_y + 2.5, $checkmark);
} elseif ($response_type == 'Response') {
  $pdf->Text($rect2_x + 0.5, $rect_y + 2.5, $checkmark);
} else {

  $pdf->Text($rect3_x + 0.3, $rect_y + 2.5, $checkmark);
}



$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Location Type: ', 1);

$rect1_x = 35;
$rect2_x = 50;
$rect3_x = 68;
$rect4_x = 93;
$rect5_x = 120;
$rect6_x = 135;
$rect_y = 66;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect5_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect6_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-123, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Airport', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-164, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Hospital ', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-150, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Nursing Home', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-132, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Home/Residence', 0, 0);
$pdf->Cell($rect5_x - $rect4_x - $rect_size);
$pdf->Cell(-106, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Bridge', 0, 0);
$pdf->Cell(-80, 5, '', 0, 0);
$pdf->Cell($rect6_x - $rect5_x - $rect_size);
$pdf->Cell(0, 5, 'Restaurant/Bar', 0, 0);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Cell(30, 5, 'Depart Scene', 1);
$pdf->Cell(20, 5, $descn, 1);
$pdf->Ln();




$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, '', 1);

$rect1_x = 15;
$rect2_x = 30;
$rect3_x = 45;
$rect4_x = 65;
$rect5_x = 90;
$rect6_x = 110;
$rect_y = 71;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect5_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect6_x, $rect_y, $rect_size, $rect_size);

// Output labels for location types
$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Farm', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size); // Empty space for layout
$pdf->Cell(-185, 5, '', 0, 0);
$pdf->Cell(0, 5, 'School ', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Clinic/RHU', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-155, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Highway/Street', 0, 0);
$pdf->Cell($rect5_x - $rect4_x - $rect_size);
$pdf->Cell(-135, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Public Bldg.', 0, 0);
$pdf->Cell(-110, 5, '', 0, 0);
$pdf->Cell($rect6_x - $rect5_x - $rect_size);
$pdf->Cell(0, 5, ($loc_type != 'Airport' && $loc_type != 'Hospital' && $loc_type != 'Nursing Home' && $loc_type != 'Home/Residence' && $loc_type != 'Bridge' && $loc_type != 'Restuarant/Bar' && $loc_type  != 'Farm' && $loc_type != 'School' && $loc_type != 'Clinic/RHU' && $loc_type != 'Highway/Street' && $loc_type != 'Public Building') ? "Others: $loc_type" : 'Others:_______', 0, 0);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Cell(30, 5, 'In Service', 1);
$pdf->Cell(20, 5, $insvc, 1);
$pdf->Ln();


if ($loc_type == 'Airport' || $loc_type == 'Hospital' || $loc_type == 'Nursing Home' || $loc_type == 'Home/Residence' || $loc_type == 'Bridge' || $loc_type == 'Restuarant/Bar' || $loc_type == 'Farm' || $loc_type == 'School' || $loc_type == 'Clinic/RHU' || $loc_type == 'Highway/Street' || $loc_type == 'Public Building' || $loc_type == 'Others') {
  $checkmark = "\x34";
} else {

  $loc_type = 'others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($loc_type == 'Airport') {
  $pdf->Text($rect2_x + 5.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Hospital') {
  $pdf->Text($rect2_x + 20.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Nursing Home') {
  $pdf->Text($rect2_x + 38.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Home/Residence') {
  $pdf->Text($rect2_x +  63.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Bridge') {
  $pdf->Text($rect2_x +  90.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Restuarant/Bar') {
  $pdf->Text($rect2_x + 105.3, $rect1_x + 53.5, $checkmark);
} elseif ($loc_type == 'Farm') {
  $pdf->Text($rect2_x + 0.3, $rect1_x + 58.5, $checkmark);
} elseif ($loc_type == 'School') {
  $pdf->Text($rect2_x + 15.3, $rect1_x + 58.5, $checkmark);
} elseif ($loc_type == 'Clinic/RHU') {
  $pdf->Text($rect2_x + 35.3, $rect1_x + 58.5, $checkmark);
} elseif ($loc_type == 'Highway/Street') {
  $pdf->Text($rect2_x + 60.3, $rect1_x + 58.5, $checkmark);
} elseif ($loc_type == 'Public Building') {
  $pdf->Text($rect2_x + 60.3, $rect1_x + 58.5, $checkmark);
} else {
  $pdf->Text($rect2_x + 80.3, $rect1_x + 58.5, $checkmark);
}





$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Type of Call: ', 1);

$rect1_x = 30;
$rect2_x = 43;
$rect3_x = 73;
$rect4_x = 95;
$rect5_x = 115;
$rect6_x = 135;
$rect_y = 76;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect5_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect6_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-127, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Fire', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Vehicular Accident ', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-156, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Earthquake', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-127, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Collapse', 0, 0);
$pdf->Cell($rect5_x - $rect4_x - $rect_size);
$pdf->Cell(-105, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Suicide', 0, 0);
$pdf->Cell(-85, 5, '', 0, 0);
$pdf->Cell($rect6_x - $rect5_x - $rect_size);
$pdf->Cell(0, 5, 'Drowning', 0, 0);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Cell(30, 5, 'Operation Team', 1);
$pdf->Cell(20, 5, $optm, 1);
$pdf->Ln();



$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, '', 1);

$rect1_x = 15;
$rect2_x = 40;
$rect3_x = 65;
$rect4_x = 95;

$rect_y = 81;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect4_x, $rect_y, $rect_size, $rect_size);


$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Storm Surge', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-185, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Flooding ', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-160, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Roving/Inspection', 0, 0);
$pdf->Cell($rect4_x - $rect3_x - $rect_size);
$pdf->Cell(-135, 5, '', 0, 0);
$pdf->Cell(0, 5, ($call_type != 'Fire' && $call_type != 'Vehicular Accident' && $call_type != 'Earthquake' && $call_type != 'Collapse' && $call_type != 'Suicide' && $call_type != 'Drowning' && $call_type  != 'Storm Surge' && $call_type != 'Flooding' && $call_type != 'Roving/Inspection') ? "Others: $call_type" : 'Others:_______', 0, 0);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Cell(30, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

if ($call_type == 'Fire' || $call_type == 'Vehicular Accident' || $call_type == 'Earthquake' || $call_type == 'Collapse' || $call_type == 'Suicide' || $call_type == 'Drowning' ||  $call_type == 'Storm Surge' || $call_type == 'Flooding' || $call_type == 'Roving/Inspection' || $call_type == 'Others') {
  $checkmark = "\x34";
} else {

  $call_type = 'Others';
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);


if ($call_type == 'Fire') {
  $pdf->Text($rect2_x +  -9.7, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Vehicular Accident') {
  $pdf->Text($rect2_x + 3.3, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Earthquake') {
  $pdf->Text($rect2_x +  33.3, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Collapse') {
  $pdf->Text($rect2_x +  55.3, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Suicide') {
  $pdf->Text($rect2_x +  75.3, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Drowning') {
  $pdf->Text($rect2_x + 95.3, $rect1_x + 63.5, $checkmark);
} elseif ($call_type == 'Storm Surge') {
  $pdf->Text($rect2_x + -24.7, $rect1_x + 68.5, $checkmark);
} elseif ($call_type == 'Flooding') {
  $pdf->Text($rect2_x + 0.3, $rect1_x + 68.5, $checkmark);
} elseif ($call_type == 'Roving/Inspection') {
  $pdf->Text($rect2_x + 25.4, $rect1_x + 68.5, $checkmark);
} else {
  $pdf->Text($rect2_x + 55.3, $rect1_x + 68.5, $checkmark);
}




$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'SRR Services: ' . $srr_services, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Incident Commander: ' . $incident_comm, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Agency/Office/Organization: ' . $agency, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Position: ' . $position, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5, 'Addess: ' . $address, 1);
$pdf->Cell(100, 5, 'Contact no.: ' . $contact_no, 1);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(200, 5, 'Incident: ' . $incident, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, 'Weather:', 1);
$pdf->Cell(35, 55, '', 1);
$pdf->Rect(61, 120, 25, 55);
$pdf->Cell(25, 5, 'Terrain:', 0);

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
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 126;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Normal', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Concrete', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Self-Contained Breathing Apparatus', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 126;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 131;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Hot/Humid', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Dirt', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Spreader', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 131;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 136;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Cold', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Mud', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Cutter', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 136;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 141;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Light Rain', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Sand', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Electric Ram', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 141;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 146;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Heavy Rain', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Gravel/Rock', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Hand Pump', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 146;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 151;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Hail', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Inclined', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Combi-tool', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 151;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 156;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Windy', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Swamp', 0);


$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Hydraulic Ram', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 156;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect2_x = 65;
$rect_y = 161;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Thunderstorm', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(18, 5, 'Unstable', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Chainsaw', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 161;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect_y = 166;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-143, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Sun and rain', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell(50, 5, '', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Cutters Edge', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 166;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();


if ($weather == 'Normal' || $weather == 'Hot/Humid' || $weather == 'Cold' || $weather == 'Light Rain' || $weather == 'Heavy Rain' || $weather == 'Hail' || $weather == 'Windy' || $weather == 'Thunderstorm' || $weather == 'Sun and Rain') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);
if ($weather == 'Normal') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + -31.5, $checkmark);
} elseif ($weather == 'Hot/Humid') {
  $pdf->Text($rect2_x + -149.7, $rect1_x +  -26.5, $checkmark);
} elseif ($weather == 'Cold') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + -21.5, $checkmark);
} elseif ($weather == 'Light Rain') {
  $pdf->Text($rect2_x +  -149.7, $rect1_x + -16.5, $checkmark);
} elseif ($weather == 'Heavy Rain') {
  $pdf->Text($rect2_x +  -149.7, $rect1_x + -11.5, $checkmark);
} elseif ($weather == 'Hail') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + -6.5, $checkmark);
} elseif ($weather == 'Windy') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + -1.5, $checkmark);
} elseif ($weather == 'Thunderstorm') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + 3.5, $checkmark);
} elseif ($weather == 'Sun and Rain') {
  $pdf->Text($rect2_x + -149.7, $rect1_x + 8.5, $checkmark);
}


if ($terrain == 'Concrete' || $terrain == 'Dirt' || $terrain == 'Mud' || $terrain == 'Sand' || $terrain == 'Gravel/Rock' || $terrain == 'Inclined' || $terrain == 'Swamp' || $terrain == 'Unstable') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);
if ($terrain == 'Concrete') {
  $pdf->Text($rect2_x + -114.7, $rect1_x + -31.5, $checkmark);
} elseif ($terrain == 'Dirt') {
  $pdf->Text($rect2_x + -114.7, $rect1_x +  -26.5, $checkmark);
} elseif ($terrain == 'Mud') {
  $pdf->Text($rect2_x + -114.7, $rect1_x + -21.5, $checkmark);
} elseif ($terrain == 'Sand') {
  $pdf->Text($rect2_x +  -114.7, $rect1_x + -16.5, $checkmark);
} elseif ($terrain == 'Gravel/Rock') {
  $pdf->Text($rect2_x +  -114.7, $rect1_x + -11.5, $checkmark);
} elseif ($terrain == 'Inclined') {
  $pdf->Text($rect2_x + -114.7, $rect1_x + -6.5, $checkmark);
} elseif ($terrain == 'Swamp') {
  $pdf->Text($rect2_x + -114.7, $rect1_x + -1.5, $checkmark);
} elseif ($terrain == 'Unstable') {
  $pdf->Text($rect2_x + -114.7, $rect1_x + 3.5, $checkmark);
}



$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(15, 55, '', 0);
$pdf->Cell(150, 5, '', 0);

$rect1_x = 30;
$rect_y = 171;
$rect_size = 3;


$pdf->Cell(-150, 2, '', 0, 0);
$pdf->Cell(0, 5, 'Signal:', 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell(0, 5, $warning, 0, 0);
$pdf->Cell(-170, 5, '', 0, 0);
$pdf->Cell(50, 5, '', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'High Pressure Lift Bag', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 171;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();



$pdf->Rect(11, 175, 37, 25);
$pdf->Rect(48, 175, 38, 25);


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'CPR:', 0);

$rect1_x = 20;
$rect2_x = 35;
$rect_y = 176;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-28, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-178, 5, '', 0, 0);
$pdf->Cell(0, 5, 'No ', 0, 0);
$pdf->Cell(-155, 5, '', 0, 0);
$pdf->Cell(35, 5, 'Casualty:', 0);
$rect1_x = 65;
$rect2_x = 75;
$rect_y = 176;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-18, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-135, 5, '', 0, 0);
$pdf->Cell(0, 5, 'No ', 0, 0);
$pdf->Cell(-120, 5, '', 0, 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'High Lift Jack', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 176;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();


if ($cpr == 'Yes' || $cpr == 'No') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($cpr == 'Yes') {
  $pdf->Text($rect2_x + -159.7, $rect1_x +  18.6, $checkmark);
} elseif ($cpr == 'No') {
  $pdf->Text($rect2_x + -144.7, $rect1_x +  18.6, $checkmark);
}


if ($casualty == 'Yes' || $casualty == 'No') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($casualty == 'Yes') {
  $pdf->Text($rect2_x + -114.7, $rect1_x +  18.6, $checkmark);
} elseif ($casualty == 'No') {
  $pdf->Text($rect2_x + -104.7, $rect1_x +  18.6, $checkmark);
}








$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Time Started: ' . $time_start, 0);
$pdf->Cell(35, 5, 'No. of cas: ' . $no_cas, 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Remote Area Lighting System RALS', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 181;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Time End: ' . $time_end, 0);
$pdf->Cell(35, 5, 'Ambulance req.: ', 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Ventilation Blower', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 186;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Cyle: ' . $cycle, 0);
$pdf->Cell(35, 5, '', 0);

$rect1_x = 65;
$rect2_x = 75;
$rect_y = 191;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-18, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-135, 5, '', 0, 0);
$pdf->Cell(0, 5, 'No ', 0, 0);
$pdf->Cell(-120, 5, '', 0, 0);


$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Tripod and Winch', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 191;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'AED/Defib:', 0);
$rect1_x = 28;
$rect2_x = 38;
$rect_y = 196;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(-20, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Yes', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-172, 5, '', 0, 0);
$pdf->Cell(0, 5, 'No ', 0, 0);
$pdf->Cell(-155, 5, '', 0, 0);


$pdf->Cell(35, 5, 'specify: ' . $amb_spec, 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Rope Rescue Equipment', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 196;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();


if ($defib == 'Yes' || $defib == 'No') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($defib == 'Yes') {
  $pdf->Text($rect2_x + -151.7, $rect1_x +  38.6, $checkmark);
} elseif ($defib == 'No') {
  $pdf->Text($rect2_x + -141.7, $rect1_x +   38.6, $checkmark);
}



if ($ambulance_req == 'Yes' || $ambulance_req == 'No') {
  $checkmark = "\x34";
}

$pdf->SetFont('ZapfDingbats', '', 8);

if ($ambulance_req == 'Yes') {
  $pdf->Text($rect2_x + -114.7, $rect1_x +  33.6, $checkmark);
} elseif ($ambulance_req == 'No') {
  $pdf->Text($rect2_x + -104.7, $rect1_x +   33.6, $checkmark);
}





$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75, 10, 'NARRATIVE:', 0, 0);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Others', 1);
$rect1_x = 160;
$rect2_x = 180;
$rect3_x = 200;
$rect_y = 201;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(-1, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-17, 5, '', 0, 0);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(-45, 5, '', 0, 0);
$pdf->Ln();

$selectEquipment = $conn->prepare("SELECT id, equip_id, equip_status FROM equipment_record WHERE id = ?");
$selectEquipment->bind_param("i", $pageId);
$selectEquipment->execute();
$resultEquipment = $selectEquipment->get_result();


$equipments = [];
while ($rowEquipment = $resultEquipment->fetch_assoc()) {
  $equipments[] = $rowEquipment;
}

$pdf->SetFont('ZapfDingbats', '', 8);
$positions = [];


$yPosition = -31.5;


foreach ($equipments as $equipment) {
  $equipId = $equipment['equip_id'];
  $status = $equipment['equip_status'];


  switch ($status) {
    case 'Used':

      $positions[$equipId][$status] = ['x' => -19.7, 'y' =>  $yPosition];

      $yPosition += 5;
      break;
    case 'Checked':

      $positions[$equipId][$status] = ['x' => 0.3, 'y' => $yPosition];

      $yPosition += 5;
      break;
    case 'Missing':

      $positions[$equipId][$status] = ['x' => 20.3, 'y' => $yPosition];

      $yPosition += 5;
      break;
  }
}

foreach ($positions as $equipId => $statusPositions) {
  foreach ($statusPositions as $status => $position) {
    $pdf->Text($rect2_x + $position['x'], $rect1_x + $position['y'], $checkmark);
  }
}




$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75, 5, '', 0);
$pdf->Cell(5);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(20, 5, '', 0);
$pdf->Ln();



$pdf->Rect(11, 200, 75, 125);
$textLength = strlen($narrative);

if ($textLength <= 50) {
  $pdf->SetFont('Arial', '', 10);
} else {
  $pdf->SetFont('Arial', '', 8);
}

$yBeforeNarrative = $pdf->GetY();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 10);
$yBeforeNarrative = $pdf->GetY();
$pdf->MultiCell(75, 5, $narrative, 0, 'L', 0);

$heightNarrative = 125 - $yBeforeNarrative;

$pdf->Rect(11, $yBeforeNarrative, 75, $heightNarrative);
$pdf->SetXY(90, $yBeforeNarrative);



$pdf->Rect(91, 210, 120, 30);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, '  Interventions:', 0);
$pdf->Ln();

$pdf->SetX(90);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 92;
$rect2_x = 145;
$rect3_x = 170;
$rect_y = 216;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Collapse Structure Rescue', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-108, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Boom', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-53, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Barricade', 0, 0);
$pdf->Ln();


$pdf->SetX(90);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 92;
$rect2_x = 145;
$rect3_x = 170;
$rect_y = 221;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Confined Space Rescue', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-108, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Outrigger', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-53, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Structural Extrication', 0, 0);
$pdf->Ln();

$pdf->SetX(90);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 92;
$rect2_x = 145;
$rect3_x = 170;
$rect_y = 226;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Water Rescue', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-108, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Tower Light', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-53, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Vehicular Extrication', 0, 0);
$pdf->Ln();

$pdf->SetX(90);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 92;
$rect2_x = 145;
$rect3_x = 170;
$rect_y = 231;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Patient Retrieval', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-108, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Winch', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-53, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Wildlife Rescue', 0, 0);
$pdf->Ln();

$pdf->SetX(90);
$pdf->SetFont('Arial', '', 8);
$rect1_x = 92;
$rect2_x = 145;
$rect3_x = 170;
$rect_y = 236;
$rect_size = 3;

$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size);
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size);

$pdf->Cell(1);
$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(0, 5, 'High Angle Rescue', 0, 0);
$pdf->Cell($rect2_x - $rect1_x - $rect_size);
$pdf->Cell(-108, 5, '', 0, 0);
$pdf->Cell(0, 5, 'HazMat', 0, 0);
$pdf->Cell($rect3_x - $rect2_x - $rect_size);
$pdf->Cell(-53, 5, '', 0, 0);
$pdf->Cell(0, 5, 'Generator', 0, 0);
$pdf->Ln();



$interventionsData = explode(',', $interventions);


foreach ($interventionsData as $intervention) {
  if (
    $intervention == 'colstruct' || $intervention == 'boom' || $intervention == 'barricade' || $intervention == 'confined' || $intervention == 'outrigger'
    || $intervention == 'structural' || $intervention == 'water' || $intervention == 'tower' || $intervention == 'vehicular' || $intervention == 'patient' || $intervention == 'winch'
    || $intervention == 'wildlife' || $intervention == 'angle' || $intervention == 'hazmat' || $intervention == 'generator'
  ) {
    $checkmark = "\x34";
  }
  $pdf->SetFont('ZapfDingbats', '', 8);

  if ($intervention == 'colstruct') {
    $pdf->Text($rect2_x + -52.7, $rect1_x + 126.5, $checkmark);
  } elseif ($intervention == 'boom') {
    $pdf->Text($rect2_x + 0.3, $rect1_x + 126.5, $checkmark);
  } elseif ($intervention == 'barricade') {
    $pdf->Text($rect2_x + 25.4, $rect1_x +  126.5, $checkmark);
  } elseif ($intervention == 'confined') {
    $pdf->Text($rect2_x + -52.7, $rect1_x + 131.5, $checkmark);
  } elseif ($intervention == 'outrigger') {
    $pdf->Text($rect2_x + 0.3, $rect1_x + 131.5, $checkmark);
  } elseif ($intervention == 'structural') {
    $pdf->Text($rect2_x + 25.4, $rect1_x + 131.5, $checkmark);
  } elseif ($intervention == 'water') {
    $pdf->Text($rect2_x + -52.7, $rect1_x + 136.5, $checkmark);
  } elseif ($intervention == 'tower') {
    $pdf->Text($rect2_x + 0.3, $rect1_x + 136.5, $checkmark);
  } elseif ($intervention == 'vehicular') {
    $pdf->Text($rect2_x + 25.4, $rect1_x + 136.5, $checkmark);
  } elseif ($intervention == 'patient') {
    $pdf->Text($rect2_x + -52.7, $rect1_x + 141.5, $checkmark);
  } elseif ($intervention == 'winch') {
    $pdf->Text($rect2_x + 0.3, $rect1_x + 141.5, $checkmark);
  } elseif ($intervention == 'wildlife') {
    $pdf->Text($rect2_x + 25.4, $rect1_x + 141.5, $checkmark);
  } elseif ($intervention == 'angle') {
    $pdf->Text($rect2_x +  -52.7, $rect1_x + 146.5, $checkmark);
  } elseif ($intervention == 'hazmat') {
    $pdf->Text($rect2_x + 0.3, $rect1_x + 146.5, $checkmark);
  } elseif ($intervention == 'generator') {
    $pdf->Text($rect2_x + 25.4, $rect1_x + 146.5, $checkmark);
  }
}






$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, '', 0);
$pdf->Ln();

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, 'Endorsement', 1, 0, 'C');
$pdf->Ln();

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 5, '', 0);
$pdf->Ln();

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, 'Crew', 1, 0, 'C');
$pdf->Cell(60, 5, 'Designation', 1, 0, 'C');
$pdf->Ln();

$pageId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$select = $conn->prepare("SELECT * FROM usar WHERE id = ?");
$select->bind_param("i", $pageId);
$select->execute();
$result = $select->get_result();

$crew = [];
$designation = [];

// Fetch data from the database
while ($row = $result->fetch_object()) {
  // Extract crew and designation values from the fetched row
  $crew_data = explode(',', $row->crew);
  $designation_data = explode(',', $row->designation);

  // Merge fetched data with existing arrays
  $crew = array_merge($crew, $crew_data);
  $designation = array_merge($designation, $designation_data);
}

if (!empty($crew) && !empty($designation)) {
  $maxCount = max(count($crew), count($designation));

  for ($i = 0; $i < $maxCount; $i++) {
    $crew_member = isset($crew[$i]) ? $crew[$i] : '';
    $designation_member = isset($designation[$i]) ? $designation[$i] : '';

    $pdf->SetXY(90, $pdf->GetY());

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(60, 5, $crew_member, 1, 0, 'C');
    $pdf->Cell(60, 5, $designation_member, 1, 0, 'C');
    $pdf->Ln();
  }
} else {
  $pdf->SetXY(90, $pdf->GetY());
  $pdf->SetFont('Arial', 'B', 8);
  $pdf->Cell(120, 5, 'No crew data available.', 1, 0, 'C');
  $pdf->Ln();
}

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Prepared by: ' . $prep_by, 1);
$pdf->Ln();

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Endorsed to/by: ' . $endorsed_by, 1);
$pdf->Ln();

$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Witness/es: ' . $witness, 1);
$pdf->Ln();
$pdf->SetXY(90, $pdf->GetY());
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Complete Name and Signature', 1, 0, 'C');
$pdf->Ln();


$pdf->AddPage();

$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(65);
$pdf->Cell(70, 5, 'REPUBLIC OF THE PHILIPPINES', 0, 0, 'C');
$pdf->Cell(-70, 15, 'City of Iloilo', 0, 0, 'C');
$pdf->Cell(70, 30, 'CITY DISASTER RISK REDUCTION AND MANAGEMENT OFFICE', 0, 0, 'C');
$pdf->SetFont('Times', 'BU', 10);
$pdf->Cell(-70, 40, 'URBAN SEARCH AND RESCUE', 0, 0, 'C');
$pdf->Ln();


$pdf->Cell(1);
$imagePaths = array();

$sql_images = "SELECT images FROM usar WHERE id = $id";
$result_images = $conn->query($sql_images);

if ($result_images->num_rows > 0) {
  while ($row_images = $result_images->fetch_assoc()) {
    $imagePaths[] = "resources/gallery/" . $row_images['images'];
  }

  foreach ($imagePaths as $imagePath) {

    $imageWidth = 150;
    $imageHeight = 150;
    $imageX = ($pdf->GetPageWidth() - $imageWidth) / 2;
    $imageY = $pdf->GetY();

    $pdf->Image($imagePath, $imageX, $imageY, $imageWidth, $imageHeight);
    $pdf->Cell(200, 150, '', 1);
    $pdf->Ln();
  }
}

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(200, 10, 'Map of Responded Scene', 0, 0, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, 'Location', 1, 0, 'C');
$pdf->Cell(160, 5, $map_loc, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, 'GPS', 1, 0, 'C');
$pdf->Cell(40, 5, 'Longitude', 1, 0, 'C');
$pdf->Cell(40, 5, $longitude, 1);
$pdf->Cell(40, 5, 'Latitude', 1, 0, 'C');
$pdf->Cell(40, 5, $latitude, 1);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, 'DOT DISTANCE RATIO', 1, 0, 'C');
$pdf->Cell(160, 5, $dist_ratio, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(200, 10, 'LEGEND', 0, 0, 'C');
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$x = $pdf->GetX();
$y = $pdf->GetY();

$pdf->Cell(40, 5, '', 1, 0, 'C');

$imageWidth = 3;
$imageX = $x + (40 - $imageWidth) / 2;
$imageY = $y + 1;

$pdf->Image('resources/img/triangle.jpg', $imageX, $imageY, $imageWidth, 0);

$pdf->Cell(40, 5, 'BARRIERS', 1, 0, 'C');
$pdf->Cell(40, 5, '', 0, 0, 'C');
$pdf->Cell(40, 5, 'RT', 1, 0, 'C');
$pdf->Cell(40, 5, 'RESCUE TRUCK', 1, 1, 'C');
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, -5, '', 1, 0, 'C');
$pdf->Cell(40, -5, '', 1, 0, 'C');
$pdf->Cell(40, -5, '', 0, 0, 'C');
$pdf->Cell(40, -5, '', 1, 0, 'C');
$pdf->Cell(40, -5, '', 1, 0, 'C');
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

$x = $pdf->GetX();
$y = $pdf->GetY();

$pdf->Cell(40, 20, '', 1, 0, 'C');

$imageWidth = 3;
$imageX = $x + (40 - $imageWidth) / 2;
$imageY = $y + 2 - $imageWidth / 2;

$pdf->Image('resources/img/not_equal.png', $imageX, $imageY, $imageWidth, 0);
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
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(200, 5, '', 0);
$pdf->Ln();


$pdf->Cell(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(200, 5, 'RECOMMENDATION', 1, 0, 'C');
$pdf->Ln();


$textLength = strlen($recommendation);

if ($textLength <= 50) {
  $pdf->SetFont('Arial', '', 10);
} else {
  $pdf->SetFont('Arial', '', 8);
}

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(200, 5, $recommendation, 0, 'L', 0);
$pdf->Rect(11, 290, 200, 50);
$pdf->Ln();


$pdf->Output();
