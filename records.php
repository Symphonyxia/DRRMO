<?php
include 'header.php';
?>

<style media="print">
    body {
        background-color: #fff;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .print-table {
        box-sizing: border-box;
    }

    .print-table td,
    .print-table th {
        width: auto;
        word-break: break-word;
    }

    .print-no-footer {
        display: none;
    }

    /* Pagination styles */
    .pagination-container {
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination li {
        list-style-type: none;
        margin: 0 5px;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination li a {
        padding: 8px 12px;
        text-decoration: none;
        color: #007bff;
        border: 1px solid #007bff;
        border-radius: 5px;
    }

    .pagination li a:hover {
        background-color: #f2f2f2;
    }

    @media print {
        .pagination-container {
            display: none;
        }
    }

    @page {
        size: A4 portrait;
        margin: 5mm;
    }

    body * {
        font-size: 12px;
    }

    li {
        display: none;
    }

    .checkbox-group {
        margin-bottom: 20px;
    }

    h5 {
        font-family: "Lucida Console", "Courier New", monospace;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "drrmo";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$entriesPerPage = 1;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $entriesPerPage;

// Fetch data from usar table with pagination
$sql = "SELECT * FROM usar LIMIT $offset, $entriesPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch all records into an array
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Loop through each record
    foreach ($rows as $row) {
        // Assign fetched data to variables
        $end = $row['end'];
        $begin = $row['begin'];
        $total = $row['total'];
        $unit = $row['unit'];
        $irf_no = $row['irf_no'];
        $incident_loc = $row['incident_loc'];
        $response_type = $row['response_type'];
        $loc_type = $row['loc_type'];
        $call_type = $row['call_type'];
        $srr_services = $row['srr_services'];
        $incident_comm = $row['incident_comm'];
        $agency = $row['agency'];
        $position = $row['position'];
        $address = $row['address'];
        $contact_no = $row['contact_no'];
        $incident = $row['incident'];
        $weather = $row['weather'];
        $cpr = $row['cpr'];
        $defib = $row['defib'];
        $terrain = $row['terrain'];
        $casualty = $row['casualty'];
        $ambulance_req = $row['ambulance_req'];
        $interventions = $row['interventions'];
        $map_loc = $row['map_loc'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $dist_ratio = $row['dist_ratio'];
        $recommendation = $row['recommendation'];
        $narrative = $row['narrative'];
        $images = $row['images'];
        $date = $row['date'];
        $no_cas = $row['no_cas'];
        $amb_spec = $row['amb_spec'];
        $time_start = $row['time_start'];
        $time_end = $row['time_end'];
        $cycle = $row['cycle'];
        $cr = $row['cr'];
        $enr = $row['enr'];
        $atscn = $row['atscn'];
        $descn = $row['descn'];
        $insvc = $row['insvc'];
        $optm = $row['optm'];
        $prep_by = $row['prep_by'];
        $endorsed_by = $row['endorsed_by'];
        $witness = $row['witness'];
    }

?>



<div class="container">

    <ul class="navbar-nav ml-auto">
        <!-- Other navbar items -->
        <li class="nav-item">
            <a class="nav-link" id="print-button" style="color: blue; float: right;" href="#"
                onclick="window.print(); return false;">Print</a>
        </li>
    </ul>
    <br>
    <form action="resources/dir/save.php" method="POST">
        <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
        <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
        <div id="print-content">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-4">
                    <img src="resources/img/iloilo.png" alt="" height="65">
                    <img src="resources/img/disaster.jpg" alt="" height="80">
                    <img src="resources/img/USAR.jpg" alt="" height="63">
                </div>
                <div class="col-md-4 text-center">
                    <h4>Republic of the Philippines</h4>
                    <h4>City of Iloilo</h4>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center"><strong>MILEAGE READING</strong></td>
                            </tr>
                            <tr>
                                <th>END</th>
                                <td>
                                    <?php echo $row['end']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>BEGIN</th>
                                <td>
                                    <?php echo $row['begin']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td>
                                    <?php echo $row['total']; ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>



                <br>
                <p>City Disaster Risk Reduction and Management Office</p>

                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-4">
                        <p><strong>URBAN SEARCH AND RESCUE</strong></p>
                    </div>

                    <div class="col-md-4">
                        <p><strong>INCIDENT RESPONSE FORM</strong></p>
                    </div>

                    <table class="table table-bordered print-table">

                        <tbody>
                            <tr>
                                <td colspan="10">UNIT/VEHICLE NAME: <strong> <?php echo $row['cycle']; ?></strong></td>
                                <td colspan="2">IFR No.: <strong> <?php echo $row['irf_no']; ?></strong></td>
                                <td colspan="3">DATE: <strong> <?php echo $row['date']; ?></strong></td>
                            </tr>

                            <tr>
                                <td colspan="14">Incident Address/Location:
                                    <strong> <?php echo $row['incident_loc']; ?></strong>
                                </td>
                                <td>Call Recieved:
                                    <strong><?php echo $row['cr']; ?></strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="14">Response Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby" <?php echo isset($row['response_type']) && in_array('Standby', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Standby
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Response" <?php echo isset($row['response_type']) && in_array('Response', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Response to Scene
                                    </label>
                                    Others:
                                    <input type="text" name="response_type_other" value="<?php echo isset($row['response_type_other']) ? $row['response_type_other'] : ''; ?>"
                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                </td>

                                <td>Enroute:
                                    <strong><?php echo $row['enr']; ?></strong>
                                </td>
                            </tr>


                            <tr>

                                <td colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="airport" <?php echo isset($row['loc_type']) && in_array('airport', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Airport
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Hospital" <?php echo isset($row['loc_type']) && in_array('Hospital', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Hospital
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="nursing" <?php echo isset($row['loc_type']) && in_array('nursing', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Nursing Home
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="residence" <?php echo isset($row['loc_type']) && in_array('residence', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>>Home/Residence
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge" <?php echo isset($row['loc_type']) && in_array('bridge', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Bridge
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bar" <?php echo isset($row['loc_type']) && in_array('bar', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Restaurant/Bar
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="farm" <?php echo isset($row['loc_type']) && in_array('farm', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Farm
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="school" <?php echo isset($row['loc_type']) && in_array('school', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> School
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="clinic" <?php echo isset($row['loc_type']) && in_array('clinic', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Clinic/RHU
                                    </label>
                                    </th>

                                <td>At scene:
                                    <strong><?php echo $row['atscn']; ?></strong>
                                </td>

                            </tr>

                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="street" <?php echo isset($row['loc_type']) && in_array('street', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Highway/Street
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bldg" <?php echo isset($row['loc_type']) && in_array('bldg', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Public Building
                                    </label>
                                    Others:
                                    <input type="text" name="loc_type_other" value="<?php echo isset($row['loc_type_other']) ? $row['loc_type_other'] : ''; ?>"
                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                </td>
                                <td>Depart scene:
                                    <strong><?php echo $row['descn']; ?></strong>
                                </td>
                            </tr>



                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="fire"
                                            <?php echo isset($row['call_type']) && in_array('fire', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Fire
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="vehicular" <?php echo isset($row['call_type']) && in_array('vehicular', explode(',', $row['call_type'])) ? 'checked' : ''; ?>>
                                        Vehicular Accident
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="earthquake" <?php echo isset($row['call_type']) && in_array('earthquake', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Earthquake
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="collapse" <?php echo isset($row['call_type']) && in_array('collapse', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Collapse
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="suicide" <?php echo isset($row['call_type']) && in_array('suicide', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Suicide
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="drowning" <?php echo isset($row['call_type']) && in_array('drowning', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Drowning
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="storm" <?php echo isset($row['call_type']) && in_array('storm', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Storm Surge
                                    </label>
                                </td>
                                <td>In service:
                                    <strong><?php echo $row['insvc']; ?></strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="flooding" <?php echo isset($row['call_type']) && in_array('flooding', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Flooding
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="roving" <?php echo isset($row['call_type']) && in_array('roving', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Roving/Inspection
                                    </label>
                                    Others: <strong>
                                        <input type="text" name="call_type_other" value="<?php echo isset($row['call_type_other']) ? $row['call_type_other'] : ''; ?>"
                                        style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                    </strong>
                                </td>

                                <td>Operation Team:
                                    <strong><?php echo $row['optm']; ?></strong>
                                </td>

                            </tr>

                            <tr>
                                <td colspan="14">
                                    SRR Services:
                                    <strong><?php echo $row['srr_services']; ?></strong>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="20">Incident Commander:
                                    <strong><?php echo $row['incident_comm']; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="20">Agency/Office/Organization:
                                    <strong><?php echo $row['agency']; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="20">Position:
                                    <strong><?php echo $row['position']; ?></strong>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="14">Address:
                                    <strong><?php echo $row['address']; ?></strong>
                                </td>

                                <td colspan="6">Contact No.:
                                    <strong><?php echo $row['contact_no']; ?></strong>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="20">Incident:
                                    <strong><?php echo $row['incident']; ?></strong>
                                </td>
                            </tr>

                        </tbody>
                    </table>




<?php

$weather = isset($row['weather']) ? explode(',', $row['weather']) : [];
$terrain = isset($row['terrain']) ? explode(',', $row['terrain']) : [];
function isChecked($value, $checked_array) {
    return in_array($value, $checked_array) ? 'checked' : '';
}
?>


                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td colspan="5">Weather</td>
                                        <td>
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="normal" <?php echo isset($row['weather']) && in_array('normal', explode('normal', $row['weather'])) ? 'checked' : ''; ?>> Normal      
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="hot" <?php echo isset($row['weather']) && in_array('hot', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Hot/Humid
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="cold" <?php echo isset($row['weather']) && in_array('cold', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Cold
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="light" <?php echo isset($row['weather']) && in_array('light', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Light Rain
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="heavy" <?php echo isset($row['weather']) && in_array('heavy', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Heavy rain
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="hail" <?php echo isset($row['weather']) && in_array('hail', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Hail
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="windy" <?php echo isset($row['weather']) && in_array('windy', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Windy
                                            <input type="checkbox" class="form-check-input" name="weather[]" value="thunder" <?php echo isset($row['weather']) && in_array('thunder', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Thunderstorm     
                                            </label>
                                        </td>

                                        <td>Terrain:</td>
                                        <td>
                                            <br>
                                            <label class="form-check-label">
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="concrete" <?php echo isset($row['terrain']) && in_array('concrete', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Concrete
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="dirt" <?php echo isset($row['terrain']) && in_array('dirt', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Dirt
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="mud" <?php echo isset($row['terrain']) && in_array('mud', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Mud
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="sand" <?php echo isset($row['terrain']) && in_array('sand', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Sand
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="rock" <?php echo isset($row['terrain']) && in_array('rock', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Gravel/Rock
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="inclined" <?php echo isset($row['terrain']) && in_array('inclined', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Inclined
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="swamp" <?php echo isset($row['terrain']) && in_array('swamp', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Swamp
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="unstable" <?php echo isset($row['terrain']) && in_array('unstable', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Unstable
                                                    </li>
                                                </ul>
                                            </label>
                                        </td>

                                    <tr>
                                        <td colspan="6">CPR:
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="yes" <?php echo isset($row['cpr']) && $row['cpr'] === 'yes' ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="no" <?php echo isset($row['cpr']) && $row['cpr'] === 'no' ? 'checked' : ''; ?>> No
                                            </label>
                                            <br>
                                            Time Started:
                                            <strong><?php echo $row['time_start']; ?></strong> 
                                            <br>
                                            Time End:
                                            <strong><?php echo $row['time_end']; ?></strong> 
                                            <br>
                                            Cycle:
                                            <strong><?php echo $row['cycle']; ?></strong>
                                        </td>


                                        <td colspan="6">Casualty:
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="casualty" value="yes" <?php echo isset($row['casualty']) && $row['casualty'] === 'yes' ? 'checked' : ''; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="casualty" value="no" <?php echo isset($row['casualty']) && $row['casualty'] === 'no' ? 'checked' : ''; ?>> No
                                                </label>

                                            <br>
                                            <div>
                                                No. of Casualty:
                                                <strong><?php echo $row['no_cas']; ?></strong>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">AED/Defib:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="yes" <?php echo isset($row['defib']) && $row['defib'] === 'yes' ? 'checked' : ''; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="no" <?php echo isset($row['defib']) && $row['defib'] === 'no' ? 'checked' : ''; ?>> No
                                                </label>
                                            </label>
                                        </td>


                                        <td colspan="6">Ambulance req:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="yes" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'yes' ? 'checked' : ''; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="no" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'no' ? 'checked' : ''; ?>> No
                                                </label>
                                            </label>
                                            <br>
                                            Specify:
                                            <strong> <?php echo $row['amb_spec']; ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="12">Narrative:</td>
                                    </tr>

                                    <tr>
                                        <th colspan="12" style="height: 670px;">
                                            <?php echo $row['narrative']; ?>
                                        </th>
                                    </tr>




                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered">

                                <tbody>
                                    <th>Equipment</th>
                                    <th>Used</th>
                                    <th>Checked</th>
                                    <th>Missing</th>
                                    <tr>

                                        <td name="equip_name">Self-Contained Breathing Apparatus</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>

                                    <tr>
                                        <td name="equip_name">Electric Spreader</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Cutter</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Ram</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Hand Pump</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Combi-tool</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td> 
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Ram</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Chainsaw</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Cutters Edge</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Pressure Lift Bag</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Lift Jack</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Remote Area Lighting System RALS</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Ventilation Blower</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Tripod and Winch</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Rope Rescue Equipment</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Other</td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked' : ''; ?>>
                                        </td>
                                        <td> 
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked' : ''; ?>>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
  


                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="6">Interventions:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="checkbox-group">
                                            <label class="form-check-label">
                                                <div>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="colstruct" <?php echo isset($row['interventions']) && $row['interventions'] === 'colstruct' ? 'checked' : ''; ?>> Collapse Structure Rescue
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="boom" <?php echo isset($row['interventions']) && $row['interventions'] === 'boom' ? 'checked' : ''; ?>> Boom
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="barricade" <?php echo isset($row['interventions']) && $row['interventions'] === 'barricade' ? 'checked' : ''; ?>>Barricade Rescue
                                                </label>
                                                </div>

                                                <div>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="confined" <?php echo isset($row['interventions']) && $row['interventions'] === 'confined' ? 'checked' : ''; ?>> Confined Space Rescue
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="outrigger" <?php echo isset($row['interventions']) && $row['interventions'] === 'outrigger' ? 'checked' : ''; ?>> Outrigger
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="structural" <?php echo isset($row['interventions']) && $row['interventions'] === 'structural' ? 'checked' : ''; ?>> Structural Extrication
                                                </label>
                                                </div>



                                                <div>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="water" <?php echo isset($row['interventions']) && $row['interventions'] === 'water' ? 'checked' : ''; ?>> Water Rescue
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="tower" <?php echo isset($row['interventions']) && $row['interventions'] === 'tower' ? 'checked' : ''; ?>> Tower Light
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="vehi_extri" <?php echo isset($row['interventions']) && $row['interventions'] === 'vehi_extri' ? 'checked' : ''; ?>> Vehicular Extrication
                                                </label>
                                                </div>

                                                <div>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="patient" <?php echo isset($row['interventions']) && $row['interventions'] === 'patient' ? 'checked' : ''; ?>> Patient Retrieval
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]"  value="winch" <?php echo isset($row['interventions']) && $row['interventions'] === 'winch' ? 'checked' : ''; ?>> Winch
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="wildlife" <?php echo isset($row['interventions']) && $row['interventions'] === 'wildlife' ? 'checked' : ''; ?>>Wildlife Rescue
                                                </label>
                                                </div>

                                                <div>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="angel" <?php echo isset($row['interventions']) && $row['interventions'] === 'angel' ? 'checked' : ''; ?>>High Angel Rescue
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="hazmat" <?php echo isset($row['interventions']) && $row['interventions'] === 'hazmat' ? 'checked' : ''; ?>>Hazmat
                                                </label>

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="generator" <?php echo isset($row['interventions']) && $row['interventions'] === 'generator' ? 'checked' : ''; ?>>Generator
                                                </label>
                                                </div>
                                            </label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th colspan="6" class="text-center">Endorsement</th>
                                    </tr>
                                    <tr>
                                        <th>Crew</th>
                                        <th>Designation</th>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo $row['crew']; ?></td>
                                        <td><?php echo $row['designation']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Prepared by : 
                                            <strong><?php echo $row['prep_by']; ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Endorsed to/by: 
                                            <strong><?php echo $row['endorsed_by']; ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Witness/es: 
                                            <strong><?php echo $row['witness']; ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-center">Complete Name and Signature</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="text-center">
                    <h5>Republic of the Philippines</h5>
                    <h5>City of Iloilo</h5>
                    <br>
                    <h5>CITY DISASTER RISK REDUCTION MANAGEMENT OFFICE</h5>
                    <h5>URBAN SEARCH AND RESCUE</h5>
                </div>
            </div>

<?php
if ($result->num_rows > 0) {
    foreach ($rows as $row) {
        echo "<tr>";
        
        foreach ($row as $field => $value) {
            if ($field === 'images') {
                echo "<td>";
                $imagePath = "resources/gallery/" . $value;
                echo "<img src='{$imagePath}' alt='Uploaded Image'  class='mx-auto d-block' style='max-width: 100%; height: auto; ' >";
                echo "</td>";
            }
        }
        
        echo "</tr>";
    }
}
?>


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="7" class="text-center">Map of Responded Scene</th>
                    </tr>
                    <tr>
                        <td colspan="7">Location:
                            <strong><?php echo $row['map_loc']; ?> </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>GPS</td>
                        <td>Longitude: 
                            <strong><?php echo $row['longitude']; ?></strong></td>

                        <td>Latitude: 
                            <strong><?php echo $row['latitude']; ?></strong></td>


                    </tr>
                    <tr>
                        <td colspan="7">DOT Distance Ratio: 
                            <strong><?php echo $row['dist_ratio']; ?></strong>
                        </td>

                    </tr>
                </tbody>
            </table>

            <div class="text-center">
                <h5>Legend</h5>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>

                            <tr>
                                <td>&Delta;
                                </td>
                                <td>Barriers</td>
                            </tr>
                            <tr>
                                <td>=</td>
                                <td>Lift</td>
                            </tr>
                            <tr>
                                <td>&ne;
                                </td>
                                <td>Cut</td>
                            </tr>
                            <tr>
                                <td>
                                    < <td>Spread
                                </td>
                            </tr>
                            <tr>
                                <td>+</td>
                                <td>Access Point</td>
                            </tr>
                            <tr>
                                <td>*</td>
                                <td>Patient</td>
                            </tr>
                            <tr>
                                <td>!</td>
                                <td>Hazards</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>No Access</td>
                            </tr>
                            <tr>
                                <td>V</td>
                                <td>Volunteer</td>
                            </tr>
                            <tr>
                                <td>e</td>
                                <td>Electrical</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>

                            <tr>
                                <td>RT</td>
                                <td>Rescue Truck</td>
                            </tr>
                            <tr>
                                <td>RC</td>
                                <td>Rescue Crew</td>
                            </tr>
                            <tr>
                                <td>TL</td>
                                <td>Team Leader</td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td>Driver</td>
                            </tr>
                            <tr>
                                <td>AM</td>
                                <td>Ambulance</td>
                            </tr>
                            <tr>
                                <td>V</td>
                                <td>Vehicle</td>
                            </tr>
                            <tr>
                                <td>SA</td>
                                <td>Staging Area</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th colspan="5" class="text-center">Recommendations</th>
                        </tr>
                        <tr>
                            <th colspan="12" style="height: 300px;">
                                <?php echo $row['recommendation']; ?>
                            </th>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
</div>

</form>
<?php
} else {
    echo "<div style='font-weight: bold; text-align: center;'>No data found</div>";
}

$totalEntries = $conn->query("SELECT COUNT(*) FROM usar")->fetch_row()[0];

$totalPages = ceil($totalEntries / $entriesPerPage);

$conn->close();
?>

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="pagination">
                <?php
                if ($totalPages > 1) {
                    $active_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $search_param = isset($_POST['search']) ? '&search=' . urlencode($_POST['search']) : '';

                    if ($active_page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($active_page - 1) . $search_param . '">Previous</a></li>';
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        $active_class = ($active_page == $i) ? 'active' : '';
                        echo '<li class="page-item ' . $active_class . '"><a class="page-link" href="?page=' . $i . $search_param . '">' . $i . '</a></li>';
                    }

                    if ($active_page < $totalPages) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($active_page + 1) . $search_param . '">Next</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<br>
<?php include 'footer.php'; ?>
<script>
    function printContent() {
        window.print();
    }
</script>