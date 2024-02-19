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
        /* Adjust this value as needed for the desired spacing */
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

// Fetch all data from the usar table
$sql = "SELECT * FROM usar";
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
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();
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
                                <th colspan="10">UNIT/VEHICLE NAME:</th>
                                <td>
                                    <?php echo $row['end']; ?>
                                </td>

                                <th>IFR No.:</th>
                                <td>
                                    <?php echo $row['irf_no']; ?>
                                </td>

                                <th>DATE:</th>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>




                            </tr>

                            <tr>
                                <th colspan="14">Incident Address/Location:
                                    <?php echo $row['incident_loc']; ?>
                                </th>

                                <th>Call Recieved:
                                    <?php echo $row['cr']; ?>
                                </th>



                            </tr>

                            <tr>
                                <!-- Assuming $row is the associative array containing fetched data from the database -->
                                <th colspan="14">Response Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]"
                                            value="Standby" <?php echo isset($row['response_type']) && in_array('Standby', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Standby
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]"
                                            value="Response" <?php echo isset($row['response_type']) && in_array('Response', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Response to Scene
                                    </label>
                                    Others:
                                    <input type="text" name="response_type_other"
                                        value="<?php echo isset($row['response_type_other']) ? $row['response_type_other'] : ''; ?>"
                                        style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                </th>

                                <th>Enroute:
                                    <?php echo $row['enr']; ?>
                                </th>
                            </tr>


                            <tr>

                                <th colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]"
                                            value="airport" <?php echo isset($row['loc_type']) && in_array('airport', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Airport
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]"
                                            value="Hospital" <?php echo isset($row['loc_type']) && in_array('Hospital', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Hospital
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]"
                                            value="nursing" <?php echo isset($row['loc_type']) && in_array('nursing', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Nursing Home
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]"
                                            value="residence" <?php echo isset($row['loc_type']) && in_array('residence', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>>
                                        Home/Residence
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge"
                                            <?php echo isset($row['loc_type']) && in_array('bridge', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Bridge
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bar"
                                            <?php echo isset($row['loc_type']) && in_array('bar', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Restaurant/Bar
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="farm"
                                            <?php echo isset($row['loc_type']) && in_array('farm', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Farm
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="school"
                                            <?php echo isset($row['loc_type']) && in_array('school', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> School
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="clinic"
                                            <?php echo isset($row['loc_type']) && in_array('clinic', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Clinic/RHU
                                    </label>
                                </th>

                                <th>At scene:
                                    <?php echo $row['atscn']; ?>
                                </th>

                            </tr>

                            <tr>
                                <th colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="street"
                                            <?php echo isset($row['loc_type']) && in_array('street', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Highway/Street
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bldg"
                                            <?php echo isset($row['loc_type']) && in_array('bldg', explode(',', $row['loc_type'])) ? 'checked' : ''; ?>> Public Building

                                    </label>
                                    Others:
                                    <input type="text" name="loc_type_other"
                                        value="<?php echo isset($row['loc_type_other']) ? $row['loc_type_other'] : ''; ?>"
                                        style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                </th>
                                <th>Depart scene:
                                    <?php echo $row['descn']; ?>
                                </th>

                            </tr>



                            <tr>
                                <th colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="fire"
                                            <?php echo isset($row['call_type']) && in_array('fire', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Fire
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="vehicular" <?php echo isset($row['call_type']) && in_array('vehicular', explode(',', $row['call_type'])) ? 'checked' : ''; ?>>
                                        Vehicular Accident
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="earthquake" <?php echo isset($row['call_type']) && in_array('earthquake', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Earthquake
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="collapse" <?php echo isset($row['call_type']) && in_array('collapse', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Collapse
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="suicide" <?php echo isset($row['call_type']) && in_array('suicide', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Suicide
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="drowning" <?php echo isset($row['call_type']) && in_array('drowning', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Drowning
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="storm"
                                            <?php echo isset($row['call_type']) && in_array('storm', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Storm Surge
                                    </label>
                                </th>
                                <th>In service:
                                    <?php echo $row['insvc']; ?>
                                </th>

                            </tr>
                            <tr>
                                <th colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="flooding" <?php echo isset($row['call_type']) && in_array('flooding', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Flooding
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]"
                                            value="roving" <?php echo isset($row['call_type']) && in_array('roving', explode(',', $row['call_type'])) ? 'checked' : ''; ?>> Roving/Inspection
                                    </label>
                                    Others:
                                    <input type="text" name="call_type_other"
                                        value="<?php echo isset($row['call_type_other']) ? $row['call_type_other'] : ''; ?>"
                                        style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                </th>

                                <th>Operation Team:
                                    <?php echo $row['optm']; ?>
                                </th>

                            </tr>

                            <tr>
                                <th colspan="14">
                                    SRR Services:
                                    <?php echo $row['srr_services']; ?>
                                </th>



                                </select>
                                </th>
                                <th></th>
                            </tr>



                            <tr>
                                <th colspan="20">Incident Commander:
                                    <?php echo $row['incident_comm']; ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="20">Agency/Office/Organization:
                                    <?php echo $row['agency']; ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="20">Position:
                                    <?php echo $row['position']; ?>
                                </th>

                            </tr>
                            <tr>
                                <th colspan="14">Address:
                                    <?php echo $row['address']; ?>
                                </th>

                                <th colspan="6">Contact No.:
                                    <?php echo $row['contact_no']; ?>
                                </th>

                            </tr>
                            <tr>
                                <th colspan="20">Incident:
                                    <?php echo $row['incident']; ?>
                                </th>

                            </tr>

                        </tbody>
                    </table>






                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <th colspan="5">Weather</th>
                                        <td>
                                            <label class="form-check-label">
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="normal" <?php echo isset($row['weather']) && in_array('normal', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Normal
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="hot" <?php echo isset($row['weather']) && in_array('hot', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Hot/Humid
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="cold" <?php echo isset($row['weather']) && in_array('cold', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Cold
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="light" <?php echo isset($row['weather']) && in_array('light', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Light Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="heavy" <?php echo isset($row['weather']) && in_array('heavy', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Heavy Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="hail" <?php echo isset($row['weather']) && in_array('hail', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Hail
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="windy" <?php echo isset($row['weather']) && in_array('windy', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Windy
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]"
                                                            value="thunder" <?php echo isset($row['weather']) && in_array('thunder', explode(',', $row['weather'])) ? 'checked' : ''; ?>> Thunderstorm
                                                    </li>
                                                </ul>
                                            </label>
                                        </td>

                                        <th>Terrain:</th>
                                        <td>
                                            <br>
                                            <label class="form-check-label">
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="concrete" <?php echo isset($row['terrain']) && in_array('concrete', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Concrete
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="dirt" <?php echo isset($row['terrain']) && in_array('dirt', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Dirt
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="mud" <?php echo isset($row['terrain']) && in_array('mud', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Mud
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="sand" <?php echo isset($row['terrain']) && in_array('sand', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Sand
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="rock" <?php echo isset($row['terrain']) && in_array('rock', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Gravel/Rock
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="inclined" <?php echo isset($row['terrain']) && in_array('inclined', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Inclined
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="swamp" <?php echo isset($row['terrain']) && in_array('swamp', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Swamp
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]"
                                                            value="unstable" <?php echo isset($row['terrain']) && in_array('unstable', explode(',', $row['terrain'])) ? 'checked' : ''; ?>> Unstable
                                                    </li>
                                                </ul>
                                            </label>
                                        </td>

                                    <tr>
                                        <th colspan="6">CPR:
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="yes"
                                                    <?php echo isset($row['cpr']) && $row['cpr'] === 'yes' ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="no"
                                                    <?php echo isset($row['cpr']) && $row['cpr'] === 'no' ? 'checked' : ''; ?>> No
                                            </label>
                                            <br>
                                            Time Started:
                                            <?php echo $row['time_start']; ?> <br>
                                            Time End:
                                            <?php echo $row['time_end']; ?> <br>
                                            Cycle:
                                            <?php echo $row['cycle']; ?>
                                        </th>


                                        </th>
                                        <th colspan="6">Casualty:

                                            <label class="form-check-label">

                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="casualty"
                                                        value="yes" <?php echo isset($row['casualty']) && $row['casualty'] === 'yes' ? 'checked' : ''; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="casualty"
                                                        value="no" <?php echo isset($row['casualty']) && $row['casualty'] === 'no' ? 'checked' : ''; ?>> No
                                                </label>
                                                No. of Cas:
                                                <?php echo $row['no_cas']; ?>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">AED/Defib:
                                            <label class="form-check-label">

                                            <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="defib" value="yes" <?php echo isset($row['defib']) && $row['defib'] === 'yes' ? 'checked' : ''; ?>> Yes
    </label>
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="defib" value="no" <?php echo isset($row['defib']) && $row['defib'] === 'no' ? 'checked' : ''; ?>> No
    </label>


                                            </label>
                                        </th>
                                        <th colspan="6">Ambulance req:
                                            <label class="form-check-label">
                                            <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="ambulance_req" value="yes" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'yes' ? 'checked' : ''; ?>> Yes
    </label>
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="ambulance_req" value="no" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'no' ? 'checked' : ''; ?>> No
    </label>
                                                <br>
                                                specify:
                                                <?php echo $row['amb_spec']; ?>

                                            </label>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="12">Narrative:</th>
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
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Spreader</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Cutter</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Ram</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Hand Pump</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Combi-tool</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Ram</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Chainsaw</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Cutters Edge</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Pressure Lift Bag</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Lift Jack</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Remote Area Lighting System RALS</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Ventilation Blower</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Tripod and Winch</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Rope Rescue Equipment</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Other</td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                        <td> <input type="checkbox" class="form-check-input" name="status" value="yes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
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
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="colstruct"> Collapse Structure
                                                    Rescue
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="boom"> Boom
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="barricade"> Barricade
                                                </div>

                                                <div>
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="confined"> Confined Space Rescue
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="outrigger"> Outrigger
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="structural"> Structural
                                                    Extrication
                                                </div>

                                                <div>
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="water"> Water Rescue
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="tower"> Tower Light
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="vehi_extri"> Vehicular Extrication
                                                </div>

                                                <div>
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="patient"> Patient Retrieval
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="winch"> Winch
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="wildlife"> Wildlife Rescue
                                                </div>

                                                <div>
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="angel"> High Angle Rescue
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="hazmat"> HazMat
                                                    <input type="checkbox" class="form-check-input"
                                                        name="interventions[]" value="generator"> Generator
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Prepared by :
                                            <?php echo $row['prep_by']; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Endorsed to/by:
                                            <?php echo $row['endorsed_by']; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Witness/es:
                                            <?php echo $row['witness']; ?>
                                        </th>
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

            <label for="image-input">Select Image:</label>
<br>
<br>
<label for="image-input">Image:</label>
<br>
<br>
<div class="imageform" style="height: 300px; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
    <img id="image-preview" src="<?php echo isset($row['images']) ? $row['images'] : 'path/to/placeholder-image.jpg'; ?>" alt="Image Preview">
</div>


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="7" class="text-center">Map of Responded Scene</th>
                    </tr>
                    <tr>
                        <th colspan="7">Location:
                            <?php echo $row['map_loc']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>GPS</th>
                        <th>Longitude</th>
                        <td colspan="3">
                            <?php echo $row['longitude']; ?>
                        </td>
                        <th>Latitude</th>
                        <td colspan="3">
                            <?php echo $row['latitude']; ?>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="7">DOT Distance Ratio:
                            <?php echo $row['dist_ratio']; ?>
                        </th>

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

<button type="submit" class="btn btn-success btn-sm" style="float: right;" name="addform">Submit</button>

</form>



<br>
<?php include 'footer.php'; ?>
<script>
    function printContent() {
        window.print();
    }
</script>