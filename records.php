<?php
include 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "drrmo";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $record_id = $conn->real_escape_string($_GET['id']);
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
        $call_received = $row['call_received'];
        $enroute = $row['enroute'];
        $at_scene = $row['at_scene'];
        $depart_scene = $row['depart_scene'];
        $in_service = $row['in_service'];
        $operation_team = $row['operation_team'];
        $prep_by = $row['prep_by'];
        $endorsed_by = $row['endorsed_by'];
        $witnesses = $row['witnesses'];
        $warning = $row['warning'];
    }
}
?>


<div class="container">


    <button onclick="printPage()" class='btn btn-primary'>Print</button>

    <script>
        function printPage() {
            var currentPageUrl = window.location.href;
            var pageId = currentPageUrl.split('?')[1];
            var urlWithId = 'default.php?' + pageId;
            window.open(urlWithId, '_blank');
        }
    </script>

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
                                    <?php echo $row['end_mileage']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>BEGIN</th>
                                <td>
                                    <?php echo $row['begin_mileage']; ?>
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
                                <td colspan="10">UNIT/VEHICLE NAME: <strong>
                                        <?php echo $row['cycle']; ?>
                                    </strong readonly></td>
                                <td colspan="2">IFR No.: <strong>
                                        <?php echo $row['irf_no']; ?>
                                    </strong readonly></td>
                                <td colspan="3">DATE: <strong>
                                        <?php echo $row['date']; ?>
                                    </strong readonly></td>
                            </tr>

                            <tr>
                                <td colspan="14">Incident Address/Location:
                                    <strong>
                                        <?php echo $row['incident_loc']; ?>
                                    </strong readonly>
                                </td>
                                <td>Call Recieved:
                                    <strong>
                                        <?php echo $row['call_received']; ?>
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="14">Response Type:
                                    <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby" <?php echo isset($row['response_type']) && in_array('Standby', explode(',', $row['response_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                    Standby
                                    <input type="checkbox" class="form-check-input" name="response_type[]" value="Response to Scene" <?php echo isset($row['response_type']) && in_array('Response to Scene', explode(',', $row['response_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                    Response to Scene
                                    <input type="checkbox" class="form-check-input" id="otherResponseTypeCheckbox" disabled> Others:
                                    <input type="text" name="response_type_other" id="response_type_other" value="<?php echo isset($row['response_type']) && !in_array('Standby', explode(',', $row['response_type'])) && !in_array('Response to Scene', explode(',', $row['response_type'])) ? $row['response_type'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" <?php echo isset($row['response_type']) && (in_array('Standby', explode(',', $row['response_type'])) || in_array('Response to Scene', explode(',', $row['response_type']))) ? 'disabled' : ''; ?> disabled>
                                </td>
                                <td>Enroute:
                                    <strong>
                                        <?php echo $row['enroute']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <script>
                                function updateOthersCheckbox() {
                                    var otherResponseTypeInput = document.getElementById('response_type_other');
                                    var otherResponseTypeCheckbox = document.getElementById('otherResponseTypeCheckbox');
                                    otherResponseTypeCheckbox.checked = otherResponseTypeInput.value.trim() !== '';
                                }

                                document.getElementById('response_type_other').addEventListener('input', updateOthersCheckbox);

                                updateOthersCheckbox();
                            </script>





                            <tr>


                                <td colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Airport" <?php echo isset($row['loc_type']) && in_array('Airport', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Airport
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Hospital" <?php echo isset($row['loc_type']) && in_array('Hospital', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Hospital
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Nursing Home" <?php echo isset($row['loc_type']) && in_array('Nursing Home', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Nursing Home
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Home/Residence" <?php echo isset($row['loc_type']) && in_array('Home/Residence', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>>Home/Residence
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge" <?php echo isset($row['loc_type']) && in_array('Bridge', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Bridge
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Restuarant/Bar" <?php echo isset($row['loc_type']) && in_array('Restuarant/Bar', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Restaurant/Bar
                                    </label>

                                    </th>

                                <td>At scene:
                                    <strong><?php echo $row['at_scene']; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Farm" <?php echo isset($row['loc_type']) && in_array('Farm', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Farm
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="School" <?php echo isset($row['loc_type']) && in_array('School', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> School
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Clinic/RHU" <?php echo isset($row['loc_type']) && in_array('Clinic/RHU', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Clinic/RHU
                                    </label>

                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Highway/Street" <?php echo isset($row['loc_type']) && in_array('Highway/Street', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Highway/Street
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="loc_type[]" value="Public Building" <?php echo isset($row['loc_type']) && in_array('Public Building', explode(',', $row['loc_type'])) ? 'checked disabled' : 'disabled'; ?>> Public Building
                                    </label>
                                    <input type="checkbox" class="form-check-input" id="otherLocTypeCheckbox" disabled> Others:
                                    <input type="text" name="loc_type_other" id="loc_type_other" value="<?php echo isset($row['loc_type']) && !in_array('Airport', explode(',', $row['loc_type'])) && !in_array('Hospital', explode(',', $row['loc_type'])) && !in_array('Hospital', explode(',', $row['loc_type'])) && !in_array('Hospital', explode(',', $row['loc_type'])) && !in_array('Hospital', explode(',', $row['loc_type'])) && !in_array('Nursing Home', explode(',', $row['loc_type'])) && !in_array('Home/Residence', explode(',', $row['loc_type'])) && !in_array('Bridge', explode(',', $row['loc_type'])) && !in_array('Restuarant/Bar', explode(',', $row['loc_type'])) && !in_array('Farm', explode(',', $row['loc_type'])) && !in_array('School', explode(',', $row['loc_type'])) && !in_array('Clinic/RHU', explode(',', $row['loc_type'])) && !in_array('Highway/Street', explode(',', $row['loc_type'])) && !in_array('Public Building', explode(',', $row['loc_type'])) ? $row['loc_type'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" <?php echo isset($row['loc_type']) && (in_array('', explode(',', $row['loc_type'])) || in_array('', explode(',', $row['loc_type']))) ? 'disabled' : ''; ?> disabled>
                                </td>
                                <td>Depart scene:
                                    <strong>
                                        <?php echo $row['depart_scene']; ?>
                                    </strong>
                                </td>
                            </tr>

                            <script>
                                function updateOthersCheckbox() {
                                    var otherLocTypeInput = document.getElementById('loc_type_other');
                                    var otherLocTypeCheckbox = document.getElementById('otherLocTypeCheckbox');
                                    otherLocTypeCheckbox.checked = otherLocTypeInput.value.trim() !== '';
                                }

                                document.getElementById('loc_type_other').addEventListener('input', updateOthersCheckbox);

                                updateOthersCheckbox();
                            </script>
                            </tr>

                            <tr>
                                <td colspan="14">Type of Call :
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Fire" <?php echo isset($row['call_type']) && in_array('Fire', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Fire
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Vehicular Accident" <?php echo isset($row['call_type']) && in_array('Vehicular Accident', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Vehicular Accident
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Earthquake" <?php echo isset($row['call_type']) && in_array('Earthquake', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Earthquake
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Collapse" <?php echo isset($row['call_type']) && in_array('Collapse', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Collapse
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Suicide" <?php echo isset($row['call_type']) && in_array('Suicide', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Suicide
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Drowning" <?php echo isset($row['call_type']) && in_array('Drowning', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Drowning
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Storm Surge" <?php echo isset($row['call_type']) && in_array('Storm Surge', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>> Storm Surge
                                    </label>
                                </td>


                                <td>In service:
                                    <strong>
                                        <?php echo $row['in_service']; ?>
                                    </strong>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Flooding" <?php echo isset($row['call_type']) && in_array('Flooding', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Flooding
                                    </label>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="call_type[]" value="Roving/Inspection" <?php echo isset($row['call_type']) && in_array('Roving/Inspection', explode(',', $row['call_type'])) ? 'checked disabled' : 'disabled'; ?>>
                                        Roving/Inspection
                                    </label>

                                    <input type="checkbox" class="form-check-input" id="otherCallTypeCheckbox" disabled> Others:
                                    <input type="text" name="call_type_other" id="call_type_other" value="<?php echo isset($row['call_type']) && !in_array('Fire', explode(',', $row['call_type'])) && !in_array('Vehicular Accident', explode(',', $row['call_type'])) && !in_array('Earthquake', explode(',', $row['call_type'])) && !in_array('Collapse', explode(',', $row['call_type'])) && !in_array('Suicide', explode(',', $row['call_type'])) && !in_array('Drowning', explode(',', $row['call_type'])) && !in_array('Storm Surge', explode(',', $row['call_type'])) && !in_array('Flooding', explode(',', $row['call_type'])) && !in_array('Roving/Inspection', explode(',', $row['call_type'])) ? $row['call_type'] : ''; ?>" style="border: none; background-color: transparent; border-bottom: 1px solid black;" <?php echo isset($row['call_type']) && (in_array('', explode(',', $row['call_type'])) || in_array('', explode(',', $row['call_type']))) ? 'disabled' : ''; ?> disabled>
                                </td>


                                <script>
                                    function updateOthersCheckbox() {
                                        var otherCallTypeInput = document.getElementById('call_type_other');
                                        var otherCallTypeCheckbox = document.getElementById('otherCallTypeCheckbox');
                                        otherCallTypeCheckbox.checked = otherCallTypeInput.value.trim() !== '';
                                    }

                                    document.getElementById('call_type_other').addEventListener('input', updateOthersCheckbox);

                                    updateOthersCheckbox();
                                </script>
                                <td>Operation Team:
                                    <strong>
                                        <?php echo $row['operation_team']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14">
                                    SRR Services:
                                    <strong>
                                        <?php echo $row['srr_services']; ?>
                                    </strong>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="20">Incident Commander:
                                    <strong>
                                        <?php echo $row['incident_commander']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="20">Agency/Office/Organization:
                                    <strong>
                                        <?php echo $row['agency']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="20">Position:
                                    <strong>
                                        <?php echo $row['position']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14">Address:
                                    <strong>
                                        <?php echo $row['address']; ?>
                                    </strong>
                                </td>
                                <td colspan="6">Contact No.:
                                    <strong>
                                        <?php echo $row['contact_no']; ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="20">Incident:
                                    <strong>
                                        <?php echo $row['incident']; ?>
                                    </strong>
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
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Normal" <?php echo isset($row['weather']) && in_array('Normal', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Normal
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Hot/Humid" <?php echo isset($row['weather']) && in_array('Hot/Humid', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Hot/Humid
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Cold" <?php echo isset($row['weather']) && in_array('Cold', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Cold
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Light Rain" <?php echo isset($row['weather']) && in_array('Light Rain', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Light Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Heavy Rain" <?php echo isset($row['weather']) && in_array('Heavy Rain', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Heavy Rain
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Hail" <?php echo isset($row['weather']) && in_array('Hail', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Hail
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Windy" <?php echo isset($row['weather']) && in_array('Windy', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Windy
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Thunderstorm" <?php echo isset($row['weather']) && in_array('Thunderstorm', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Thunderstorm
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="weather[]" value="Sun and Rain" <?php echo isset($row['weather']) && in_array('Sun and Rain', explode(',', $row['weather'])) ? 'checked disabled' : 'disabled'; ?>> Sun and Rain
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
                                        <td>
                                        <p style = "font-weight: bold;"> Terrain:</p>
                                            <label class="form-check-label">
                                                <ul style="list-style-type: none; padding-left: 0;">
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Concrete" <?php echo isset($row['terrain']) && in_array('Concrete', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Concrete
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Dirt" <?php echo isset($row['terrain']) && in_array('Dirt', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Dirt
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Mud" <?php echo isset($row['terrain']) && in_array('Mud', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Mud
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Sand" <?php echo isset($row['terrain']) && in_array('Sand', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Sand
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Gravel/Rock" <?php echo isset($row['terrain']) && in_array('Gravel/Rock', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Gravel
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Inclined" <?php echo isset($row['terrain']) && in_array('Inclined', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Inclined
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Swamp" <?php echo isset($row['terrain']) && in_array('Swamp', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Swamp
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="form-check-input" name="terrain[]" value="Unstable" <?php echo isset($row['terrain']) && in_array('Unstable', explode(',', $row['terrain'])) ? 'checked disabled' : 'disabled'; ?>> Unstable
                                                    </li>

                                                </ul>
                                            </label>
                                        </td>
                                    <tr>
                                        <td colspan="6">CPR:
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="Yes" <?php echo isset($row['cpr']) && $row['cpr'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cpr" value="No" <?php echo isset($row['cpr']) && $row['cpr'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                                            </label>
                                            <br>
                                            Time Started:
                                            <strong>
                                                <?php echo $row['time_start']; ?>
                                            </strong>
                                            <br>
                                            Time End:
                                            <strong>
                                                <?php echo $row['time_end']; ?>
                                            </strong>
                                            <br>
                                            Cycle:
                                            <strong>
                                                <?php echo $row['cycle']; ?>
                                            </strong>
                                        </td>

                                        <td colspan="6">Casualty:
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="casualty" value="Yes" <?php echo isset($row['casualty']) && $row['casualty'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                            </label>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="casualty" value="No" <?php echo isset($row['casualty']) && $row['casualty'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                                            </label>

                                            <br>
                                            <div>
                                                No. of Casualty:
                                                <strong>
                                                    <?php echo $row['no_cas']; ?>
                                                </strong disabled>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">AED/Defib:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="Yes" <?php echo isset($row['defib']) && $row['defib'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="defib" value="No" <?php echo isset($row['defib']) && $row['defib'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                                                </label>
                                            </label>
                                        </td>
                                        <td colspan="6">Ambulance req:
                                            <label class="form-check-label">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="Yes" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'Yes' ? 'checked disabled' : 'disabled'; ?>> Yes
                                                </label>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="ambulance_req" value="No" <?php echo isset($row['ambulance_req']) && $row['ambulance_req'] === 'No' ? 'checked disabled' : 'disabled'; ?>> No
                                                </label>
                                            </label>
                                            <br>
                                            Specify:
                                            <strong>
                                                <?php echo $row['amb_spec']; ?>
                                            </strong>
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

                                            $record_id = $conn->real_escape_string($_GET['id']);


                                            $sql = "SELECT e.equip_name, er.equip_status 
            FROM equipment_record er 
            JOIN equipments e ON er.equip_id = e.equip_id 
            WHERE er.id = :id";


                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute(['id' => $record_id]);

                                            $equipment_records = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                            foreach ($equipment_records as $record) {
                                                $equip_name = $record['equip_name'];
                                                $equip_status = $record['equip_status'];

                                                echo '<tr>';
                                                echo '<td name="equip_name">' . $equip_name . '</td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used" ' . ($equip_status === 'Used' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked" ' . ($equip_status === 'Checked' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '<td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing" ' . ($equip_status === 'Missing' ? 'checked disabled' : 'disabled') . '></td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>




                                    </tr>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th colspan="6">Interventions:</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="checkbox-group">
                                                    <?php




                                                    $checkedInterventions = [];

                                                    if (!empty($row['interventions'])) {

                                                        $checkedInterventions = explode(',', $row['interventions']);
                                                    }


                                                    $interventions = [
                                                        'colstruct' => 'Collapse Structure Rescue',
                                                        'boom' => 'Boom',
                                                        'barricade' => 'Barricade',
                                                        'confined' => 'Confined Space Rescue',
                                                        'outrigger' => 'Outrigger',
                                                        'structural' => 'Structural Extrication',
                                                        'water' => 'Water Rescue',
                                                        'tower' => 'Tower Light',
                                                        'vehicular' => 'Vehicular Extrication',
                                                        'patient' => 'Patient Retrieval',
                                                        'winch' => 'Winch',
                                                        'wildlife' => 'Wildlife Rescue',
                                                        'angle' => 'High Angle Rescue',
                                                        'hazmat' => 'HazMat',
                                                        'generator' => 'Generator'
                                                    ];


                                                    echo '<div style="display: flex; flex-wrap: wrap;">';

                                                    foreach ($interventions as $key => $value) {
                                                        echo '<div style="flex: 34%; padding-right: 10px;">';
                                                        echo '<input type="checkbox" class="form-check-input" id="' . $key . '" name="interventions[]" value="' . $key . '"disabled';

                                                        if (in_array($key, $checkedInterventions)) {
                                                            echo ' checked';
                                                        }
                                                        echo '>' . $value;

                                                        echo '</div>';
                                                    }
                                                    echo '</div>';
                                                    ?>





                                                </td>
                                            </tr>



                                            <?php

                                            if (isset($_GET['id'])) {

                                                $id = $_GET['id'];


                                                $sql = "SELECT crew, designation FROM usar WHERE id = :id";


                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute(['id' => $id]);


                                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                if ($rows) {
                                                    echo '<tr>';
                                                    echo '    <th colspan="4" class="text-center">Endorsement</th>';
                                                    echo '</tr>';
                                                    echo '<tr>';
                                                    echo '    <th colspan="2" >Crew</th>';
                                                    echo '    <th colspan="2" >Designation</th>';
                                                    echo '</tr>';


                                                    foreach ($rows as $row) {

                                                        $crew_members = explode(',', $row['crew']);
                                                        $designations = explode(',', $row['designation']);


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
                                                <td colspan="6">Prepared by:
                                                    <input type="text" name="prep_by" value="<?php echo $prep_by; ?>" style="font-weight: bold; border: none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">Endorsed to/by:
                                                    <input type="text" name="endorsed_by" value="<?php echo $endorsed_by; ?>" readonly style="font-weight: bold; border: none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">Witness/es:
                                                    <input type="text" name="witnesses" value="<?php echo $witnesses; ?>" readonly style="font-weight: bold; border: none;">
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
                $record_id = $conn->real_escape_string($_GET['id']);

                $sql = "SELECT * FROM usar WHERE id = $record_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();


                    $map_loc = $row['map_loc'];
                    $longitude = $row['longitude'];
                    $latitude = $row['latitude'];
                    $dist_ratio = $row['dist_ratio'];
                    $recommendation = $row['recommendation'];


                    $sql_images = "SELECT images FROM usar WHERE id = $record_id";
                    $result_images = $conn->query($sql_images);

                    if ($result_images->num_rows > 0) {

                        while ($row_images = $result_images->fetch_assoc()) {
                            $imagePath = "resources/gallery/" . $row_images['images'];
                            echo "<img src='{$imagePath}' alt='Uploaded Image' class='mx-auto d-block' style='max-width: 100%; height: auto;'>";
                        }
                    } else {

                        echo "No images found";
                    }
                }
            }
            ?>


            <br>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="7" class="text-center">Map of Responded Scene</th>
                    </tr>
                    <tr>
                        <td colspan="7">Location:
                            <strong>
                                <?php echo $row['map_loc']; ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>GPS</td>
                        <td>Longitude:
                            <strong>
                                <?php echo $row['longitude']; ?>
                            </strong>
                        </td>

                        <td>Latitude:
                            <strong>
                                <?php echo $row['latitude']; ?>
                            </strong>
                        </td>


                    </tr>
                    <tr>
                        <td colspan="7">DOT Distance Ratio:
                            <strong>
                                <?php echo $row['dist_ratio']; ?>
                            </strong>
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