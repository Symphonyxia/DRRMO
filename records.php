<?php
include 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "drrmo";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $record_id = $conn->real_escape_string($_GET['id']);

    // Fetch data from usar table for the specified ID
    $sql = "SELECT * FROM usar WHERE id = $record_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();

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
}


?>


<div class="container">

    <ul class="navbar-nav ml-auto">
        <!-- Other navbar items -->
        <li class="nav-item">
            <a class="nav-link" id="print-button" style="color: blue; float: right;" href="#" onclick="window.print(); return false;">Print</a>
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
                                <td colspan="10">UNIT/VEHICLE NAME: <strong> <?php echo $row['cycle']; ?></strong readonly></td>
                                <td colspan="2">IFR No.: <strong> <?php echo $row['irf_no']; ?></strong readonly></td>
                                <td colspan="3">DATE: <strong> <?php echo $row['date']; ?></strong readonly></td>
                            </tr>

                            <tr>
                                <td colspan="14">Incident Address/Location:
                                    <strong> <?php echo $row['incident_loc']; ?></strong readonly>
                                </td>
                                <td>Call Recieved:
                                    <strong><?php echo $row['cr']; ?></strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="14">Response Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby" <?php echo isset($row['response_type']) && in_array('Standby', explode(',', $row['response_type'])) ? 'checked disabled' : 'disabled'; ?>> Standby
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Response" <?php echo isset($row['response_type']) && in_array('Response', explode(',', $row['response_type'])) ? 'checked disabled' : 'disabled'; ?>> Response to Scene
                                    </label>
                                    Others:
                                    <input type="text" name="response_type_other" value="<?php echo isset($row['response_type_other']) ? $row['response_type_other'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>

                                </td>


                                <td>Enroute:
                                    <strong><?php echo $row['enr']; ?></strong>
                                </td>
                            </tr>


                            <tr>

                                <td colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="airport" <?php echo isset($row['loc_type']) && in_array('airport', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Airport
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Hospital" <?php echo isset($row['loc_type']) && in_array('Hospital', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Hospital
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="nursing" <?php echo isset($row['loc_type']) && in_array('nursing', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Nursing Home
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="residence" <?php echo isset($row['loc_type']) && in_array('residence', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>>Home/Residence
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge" <?php echo isset($row['loc_type']) && in_array('bridge', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Bridge
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bar" <?php echo isset($row['loc_type']) && in_array('bar', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Restaurant/Bar
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="farm" <?php echo isset($row['loc_type']) && in_array('farm', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Farm
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="school" <?php echo isset($row['loc_type']) && in_array('school', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> School
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="clinic" <?php echo isset($row['loc_type']) && in_array('clinic', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Clinic/RHU
                                    </label>
                                    </th>

                                <td>At scene:
                                    <strong><?php echo $row['atscn']; ?></strong>
                                </td>

                            </tr>

                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="street" <?php echo isset($row['loc_type']) && in_array('street', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Highway/Street
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bldg" <?php echo isset($row['loc_type']) && in_array('bldg', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Public Building
                                    </label>
                                    Others:
                                    <input type="text" name="loc_type_other" value="<?php echo isset($row['loc_type_other']) ? $row['loc_type_other'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>
                                </td>
                                <td>Depart scene:
                                    <strong><?php echo $row['descn']; ?></strong>
                                </td>
                            </tr>



                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="fire" <?php echo isset($row['call_type']) && in_array('fire', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Fire
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="vehicular" <?php echo isset($row['call_type']) && in_array('vehicular', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Vehicular Accident
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="earthquake" <?php echo isset($row['call_type']) && in_array('earthquake', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Earthquake
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="collapse" <?php echo isset($row['call_type']) && in_array('collapse', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Collapse
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="suicide" <?php echo isset($row['call_type']) && in_array('suicide', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Suicide
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="drowning" <?php echo isset($row['call_type']) && in_array('drowning', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Drowning
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="storm" <?php echo isset($row['call_type']) && in_array('storm', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Storm Surge
                                    </label>
                                </td>
                                <td>In service:
                                    <strong><?php echo $row['insvc']; ?></strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="flooding" <?php echo isset($row['call_type']) && in_array('flooding', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Flooding
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="roving" <?php echo isset($row['call_type']) && in_array('roving', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Roving/Inspection
                                    </label>
                                    Others: <strong>
                                        <input type="text" name="call_type_other" value="<?php echo isset($row['call_type_other']) ? $row['call_type_other'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>
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
                    function isChecked($value, $checked_array)
                    {
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
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="normal" <?php echo isset($row['weather']) && in_array('normal', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Normal
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="hot" <?php echo isset($row['weather']) && in_array('hot', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Hot/Humid
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="cold" <?php echo isset($row['weather']) && in_array('cold', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Cold
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="light" <?php echo isset($row['weather']) && in_array('light', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Light Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="heavy" <?php echo isset($row['weather']) && in_array('heavy', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Heavy Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="hail" <?php echo isset($row['weather']) && in_array('hail', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Hail
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="windy" <?php echo isset($row['weather']) && in_array('windy', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Windy
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="thunder" <?php echo isset($row['weather']) && in_array('thunder', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Thunderstorm
                                                    </li>
                                                </ul>
                                            </label>
                                        </td>

                                        <td>Terrain:</td>
                                        <td>
                                            <br>
                                            <label class="form-check-label">
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="concrete" <?php echo isset($row['terrain']) && in_array('concrete', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Concrete
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="dirt" <?php echo isset($row['terrain']) && in_array('dirt', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Dirt
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="mud" <?php echo isset($row['terrain']) && in_array('mud', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Mud
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="sand" <?php echo isset($row['terrain']) && in_array('sand', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Sand
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="rock" <?php echo isset($row['terrain']) && in_array('rock', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Gravel
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="inclined" <?php echo isset($row['terrain']) && in_array('inclined', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Inclined
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="swamp" <?php echo isset($row['terrain']) && in_array('swamp', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Swamp
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="unstable" <?php echo isset($row['terrain']) && in_array('unstable', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Unstable
                                                    </li>
                                                </ul>
                                            </label>
                                        </td>

                                    <tr>
                                        <td colspan="6">CPR:
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="yes" <?php echo isset($row['cpr']) && $row['cpr'] === 'yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="no" <?php echo isset($row['cpr']) && $row['cpr'] === 'no' ? 'checked disabled' : 'disabled'; ?>> No
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
                                                <input type="checkbox" class="form-check-input" name="casualty" value="yes" <?php echo isset($row['casualty']) && $row['casualty'] === 'yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="casualty" value="no" <?php echo isset($row['casualty']) && $row['casualty'] === 'no' ? 'checked disabled' : 'disabled'; ?>> No
                                            </label>

                                            <br>
                                            <div>
                                                No. of Casualty:
                                                <strong><?php echo $row['no_cas']; ?></strong disabled>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">AED/Defib:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="yes" <?php echo isset($row['defib']) && $row['defib'] === 'yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="no" <?php echo isset($row['defib']) && $row['defib'] === 'no' ? 'checked disabled' : 'disabled'; ?>> No
                                                </label>
                                            </label>
                                        </td>


                                        <td colspan="6">Ambulance req:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="yes" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="no" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'no' ? 'checked disabled' : 'disabled'; ?>> No
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
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>

                                    <tr>
                                        <td name="equip_name">Electric Spreader</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Cutter</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Electric Ram</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Hand Pump</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Combi-tool</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Hydraulic Ram</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Chainsaw</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Cutters Edge</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Pressure Lift Bag</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">High Lift Jack</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Remote Area Lighting System RALS</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Ventilation Blower</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Tripod and Winch</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Rope Rescue Equipment</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td name="equip_name">Other</td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="used" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'used' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="checked" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'checked' ? 'checked disabled' : 'disabled'; ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="equip_status" value="missing" <?php echo isset($row['equip_status']) && $row['equip_status'] === 'missing' ? 'checked disabled' : 'disabled'; ?>>
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
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="colstruct" <?php echo isset($row['interventions']) && $row['interventions'] === 'colstruct' ? 'checked disabled' : 'disabled'; ?>> Collapse Structure Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="boom" <?php echo isset($row['interventions']) && $row['interventions'] === 'boom' ? 'checked disabled' : 'disabled'; ?>> Boom
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="barricade" <?php echo isset($row['interventions']) && $row['interventions'] === 'barricade' ? 'checked disabled' : 'disabled'; ?>> Barricade Rescue
                                                    </label>
                                                </div>
                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="confined" <?php echo isset($row['interventions']) && $row['interventions'] === 'confined' ? 'checked disabled' : 'disabled'; ?>> Confined Space Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="outrigger" <?php echo isset($row['interventions']) && $row['interventions'] === 'outrigger' ? 'checked disabled' : 'disabled'; ?>> Outrigger
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="structural" <?php echo isset($row['interventions']) && $row['interventions'] === 'structural' ? 'checked disabled' : 'disabled'; ?>> Structural Extrication
                                                    </label>
                                                </div>
                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="water" <?php echo isset($row['interventions']) && $row['interventions'] === 'water' ? 'checked disabled' : 'disabled'; ?>> Water Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="tower" <?php echo isset($row['interventions']) && $row['interventions'] === 'tower' ? 'checked disabled' : 'disabled'; ?>> Tower Light
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="vehi_extri" <?php echo isset($row['interventions']) && $row['interventions'] === 'vehi_extri' ? 'checked disabled' : 'disabled'; ?>> Vehicular Extrication
                                                    </label>
                                                </div>
                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="patient" <?php echo isset($row['interventions']) && $row['interventions'] === 'patient' ? 'checked disabled' : 'disabled'; ?>> Patient Retrieval
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="winch" <?php echo isset($row['interventions']) && $row['interventions'] === 'winch' ? 'checked disabled' : 'disabled'; ?>> Winch
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="wildlife" <?php echo isset($row['interventions']) && $row['interventions'] === 'wildlife' ? 'checked disabled' : 'disabled'; ?>> Wildlife Rescue
                                                    </label>
                                                </div>
                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="angel" <?php echo isset($row['interventions']) && $row['interventions'] === 'angel' ? 'checked disabled' : 'disabled'; ?>> High Angle Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="hazmat" <?php echo isset($row['interventions']) && $row['interventions'] === 'hazmat' ? 'checked disabled' : 'disabled'; ?>> HazMat
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="generator" <?php echo isset($row['interventions']) && $row['interventions'] === 'generator' ? 'checked disabled' : 'disabled'; ?>> Generator
                                                    </label>
                                                </div>
                                            </div>
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
            if (isset($_GET['id'])) {
                // Sanitize the input to prevent SQL injection
                $record_id = $conn->real_escape_string($_GET['id']);

                // Fetch the data including images from usar table for the specified ID
                $sql = "SELECT * FROM usar WHERE id = $record_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Fetch the record
                    $row = $result->fetch_assoc();

                    // Assign fetched values to variables
                    $map_loc = $row['map_loc'];
                    $longitude = $row['longitude'];
                    $latitude = $row['latitude'];
                    $dist_ratio = $row['dist_ratio'];
                    $recommendation = $row['recommendation'];

                    // Fetch the image filenames from usar table for the specified ID
                    $sql_images = "SELECT images FROM usar WHERE id = $record_id";
                    $result_images = $conn->query($sql_images);

                    if ($result_images->num_rows > 0) {
                        // Output the fetched images as <img> tags
                        while ($row_images = $result_images->fetch_assoc()) {
                            $imagePath = "resources/gallery/" . $row_images['images'];
                            echo "<img src='{$imagePath}' alt='Uploaded Image' class='mx-auto d-block' style='max-width: 100%; height: auto;'>";
                        }
                    } else {
                        // No images found for the specified ID
                        echo "No images found";
                    }
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
                            <strong><?php echo $row['longitude']; ?></strong>
                        </td>

                        <td>Latitude:
                            <strong><?php echo $row['latitude']; ?></strong>
                        </td>


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
    </form>
</div>






<?php include 'footer.php'; ?>