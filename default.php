<?php
require('pdf/fpdf.php');

// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'drrmo');
//Check for connection error
if ($conn->connect_error) {
  die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}

$select = "SELECT * FROM `usar` ORDER BY id";
$result = $conn->query($select);

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
  $incident_comm = $row->incident_comm;
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
  $cr = $row->cr;
  $enr = $row->enr;
  $atscn = $row->atscn;
  $descn = $row->descn;
  $insvc = $row->insvc;
  $optm = $row->optm;
  $end = $row->end;
  $begin = $row->begin;
  $total = $row->total;
  $prep_by = $row->prep_by;
  $endorsed_by = $row->endorsed_by;
  $witness = $row->witness;
  $crew = $row->crew;
  $designation = $row->designation;
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
// Rectangle positions
$rect1_x = 35;
$rect2_x = 55;
$rect3_x = 80;
$rect_y = 61;
$rect_size = 3;

// Draw rectangles
$pdf->Rect($rect1_x, $rect_y, $rect_size, $rect_size); // Rectangle 1
$pdf->Rect($rect2_x, $rect_y, $rect_size, $rect_size); // Rectangle 2
$pdf->Rect($rect3_x, $rect_y, $rect_size, $rect_size); // Rectangle 3

// Labels for rectangles
$pdf->Cell(10); // Offset for alignment
$pdf->Cell(0, 5, 'Standby', 0, 0); // Label for Rectangle 1
$pdf->Cell($rect2_x - $rect1_x - $rect_size); // Empty space for layout
$pdf->Cell(0, 5, 'Response on ', 0, 0); // Label for Rectangle 2
$pdf->Cell($rect3_x - $rect2_x - $rect_size); // Empty space for layout
$pdf->Cell(0, 5, 'Rect 3', 0, 0); // Label for Rectangle 3

$pdf->Ln(); // Mo
$pdf->Cell(30, 5, 'At Scene ', 1);
$pdf->Cell(20, 5, $atscn, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Location Type: ' . $loc_type, 1);
$pdf->Cell(30, 5, 'Depart Scene', 1);
$pdf->Cell(20, 5, $descn, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'Type of Call: ' . $call_type, 1);
$pdf->Cell(30, 5, 'in Service', 1);
$pdf->Cell(20, 5, $insvc, 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 5, 'SRR Services: ' . $srr_services, 1);
$pdf->Cell(30, 5, 'Operation Team', 1);
$pdf->Cell(20, 5, $optm, 1);
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
$pdf->Cell(40, 5, 'Time Started: ' . $time_start, 1);
$pdf->Cell(35, 5, 'No. of cas: ' . $no_cas, 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Remote Area Lighting System RALS', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Time End: ' . $time_end, 1);
$pdf->Cell(35, 5, 'Ambulance req.: ' . $ambulance_req, 1);

$pdf->Cell(5);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, 'Ventilation Blower', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Cell(20, 5, '', 1);
$pdf->Ln();

$pdf->Cell(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, 'Cyle: ' . $cycle, 1);
$pdf->Cell(35, 5, 'specify: ' . $amb_spec, 1);

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


// Check the length of the text
$textLength = strlen($narrative);

// Set the font size based on the text length
if ($textLength <= 50) {
  $pdf->SetFont('Arial', '', 10);
} else {
  $pdf->SetFont('Arial', '', 8);
}

// Output the text
$pdf->Cell(1);
$pdf->SetFont('Arial', '', 10); // Set font to regular
$pdf->MultiCell(75, 5, $narrative, 0, 'L', 0); // Set height to 50 and align text to the top
$pdf->Rect(11, 190, 75, 130); // X,Y,W,H
$pdf->Ln();


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
$pdf->Cell(60, 5, $crew, 1, 0, 'C');
$pdf->Cell(60, 5, $designation, 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, $crew, 1, 0, 'C');
$pdf->Cell(60, 5, $designation, 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, $crew, 1, 0, 'C');
$pdf->Cell(60, 5, $designation, 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, $crew, 1, 0, 'C');
$pdf->Cell(60, 5, $designation, 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, $crew, 1, 0, 'C');
$pdf->Cell(60, 5, $designation, 1, 0, 'C');
$pdf->Ln();


$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Prepared by: ' . $prep_by, 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Endorsed to/by: ' . $endorsed_by, 1);
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 10, 'Witness/es: ' . $witness, 1);
$pdf->Ln();
$pdf->Cell(80);
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
$pdf->Image('resources/gallery/hope.png', 10, 50, 150, 150, 'PNG', 'C');
$pdf->Cell(200, 150, '', 1);
$pdf->Ln();

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

// Cell for the recommendation title
$pdf->Cell(200, 5, 'RECOMMENDATION', 1, 0, 'C');

$pdf->Ln();


// Check the length of the text
$textLength = strlen($recommendation);

// Set the font size based on the text length
if ($textLength <= 50) {
  $pdf->SetFont('Arial', '', 10);
} else {
  $pdf->SetFont('Arial', '', 8);
}

// Output the text
$pdf->Cell(1);
$pdf->SetFont('Arial', '', 10); // Set font to regular
$pdf->MultiCell(200, 5, $recommendation, 0, 'L', 0); // Set height to 50 and align text to the top
$pdf->Rect(11, 290, 200, 50); // X,Y,W,H
$pdf->Ln();


$pdf->Output();
