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
        $row = $result->fetch_assoc();
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
        $warning = $row['warning'];
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
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby" <?php echo isset($row['response_type']) && in_array('Standby', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Standby
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="response_type[]" value="Response" <?php echo isset($row['response_type']) && in_array('Response', explode(',', $row['response_type'])) ? 'checked' : ''; ?>> Response to Scene
                                    </label>
                                    Others:
                                    <input type="text" name="response_type_other" value="<?php echo isset($row['response_type']) && !in_array('Standby', explode(',', $row['response_type'])) && !in_array('Response', explode(',', $row['response_type'])) ? $row['response_type'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" <?php echo isset($row['response_type']) && (in_array('Standby', explode(',', $row['response_type'])) || in_array('Response', explode(',', $row['response_type']))) ? 'disabled' : ''; ?>>
                                </td>
                            </tr>




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
                                                    <li>

                                                        <label>Signal:
                                                            <span style="font-weight: bold;">
                                                                <?php echo isset($row['warning']) ? $row['warning'] : 'No Warning'; ?>
                                                            </span>
                                                        </label>


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
                                        <?php
                                        if (isset($_GET['id'])) {
                                            // Sanitize the input to prevent SQL injection
                                            $record_id = $conn->real_escape_string($_GET['id']);

                                            // Fetch the data including images from usar table for the specified ID
                                            // Query to fetch equipment records based on id and join with equipments table to get equipment names
                                            $sql = "SELECT e.equip_name, er.equip_status 
            FROM equipment_record er 
            JOIN equipments e ON er.equip_id = e.equip_id 
            WHERE er.id = :id";

                                            // Prepare and execute the query
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute(['id' => $record_id]); // Change $id to $record_id

                                            // Fetch all equipment records as associative arrays
                                            $equipment_records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            // Loop through each equipment record and display the checkboxes
                                            foreach ($equipment_records as $record) {
                                                $equip_name = $record['equip_name'];
                                                $equip_status = $record['equip_status'];

                                                echo '<tr>';
                                                echo '<td name="equip_name">' . $equip_name . '</td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used" ' . ($equip_status === 'used' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked" ' . ($equip_status === 'checked' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing" ' . ($equip_status === 'missing' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>




                                    </tr>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php

                                            echo "Interventions string: " . $row['interventions'] . "<br>";

                                            // Assuming $row['interventions'] contains the comma-separated list of checked interventions
                                            $checkedInterventions = [];

                                            if (!empty($row['interventions'])) {
                                                // Explode the comma-separated string into an array
                                                $checkedInterventions = explode(',', $row['interventions']);
                                            }

                                            // Define the list of interventions with their keys and labels
                                            $interventions = [
                                                'colstruct' => 'Collapse Structure Rescue',
                                                'boom' => 'Boom',
                                                'barricade' => 'Barricade',
                                                'confined' => 'Confined Space Rescue',
                                                'outrigger' => 'Outrigger',
                                                'structural' => 'Structural Extrication',
                                                'water' => 'Water Rescue',
                                                'tower' => 'Tower Light',
                                                'vehi_extri' => 'Vehicular Extrication',
                                                'patient' => 'Patient Retrieval',
                                                'winch' => 'Winch',
                                                'wildlife' => 'Wildlife Rescue',
                                                'angel' => 'High Angle Rescue',
                                                'hazmat' => 'HazMat',
                                                'generator' => 'Generator'
                                            ];
                                            // echo "<pre>";
                                            // print_r($interventions);


                                            echo '<div style="display: flex; flex-wrap: wrap;">';
                                            $o = 1;
                                            foreach ($interventions as $key => $value) {
                                                echo '<div style="flex: 20%; padding-right: 10px;">';
                                                echo '<input type="checkbox" class="form-check-input" id="' . $o++ . '" name="interventions[]" value="' . $key . '"';
                                                // Check if the intervention key exists in the $checkedInterventions array
                                                if (in_array($key, $checkedInterventions)) {
                                                    echo ' checked';
                                                }
                                                echo '> ' . $value;
                                                echo '<br>Key: <label for="' . $o++ . '">' . $key . '</label><br>';
                                                echo 'Checked interventions: ';
                                                // print_r($checkedInterventions);
                                                echo '</div>';
                                            }
                                            echo '</div>';
                                            ?>




                                            </td>
                                            </tr>



                                            <?php
                                            // Check if the ID is provided in the URL
                                            if (isset($_GET['id'])) {
                                                // Sanitize the input to prevent SQL injection
                                                $id = $_GET['id'];

                                                // SQL query to fetch crew members and their designations from the usar table based on the current page ID
                                                $sql = "SELECT crew, designation FROM usar WHERE id = :id";

                                                // Prepare and execute the query
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute(['id' => $id]);

                                                // Fetch crew members and their designations as associative arrays
                                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                if ($rows) {
                                                    echo '<tr>';
                                                    echo '    <th colspan="4" class="text-center">Endorsement</th>';
                                                    echo '</tr>';
                                                    echo '<tr>';
                                                    echo '    <th colspan="2" >Crew</th>';
                                                    echo '    <th colspan="2" >Designation</th>';
                                                    echo '</tr>';

                                                    // Display crew members and their designations
                                                    foreach ($rows as $row) {
                                                        // Split the crew members and designations by comma
                                                        $crew_members = explode(',', $row['crew']);
                                                        $designations = explode(',', $row['designation']);

                                                        // Iterate over each pair
                                                        foreach (array_map(null, $crew_members, $designations) as [$crew, $designation]) {
                                                            echo '<tr>';
                                                            echo '    <td  colspan="2" >' . $crew . '</td>';
                                                            echo '    <td  colspan="2" >' . $designation . '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="2">No crew members found.</td></tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="2">No ID provided.</td></tr>';
                                            }
                                            ?>


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