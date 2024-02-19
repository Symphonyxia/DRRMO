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

<div class="container">

    <br>
    <div id="print-content">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-4">
            <img src="resources/img/iloilo.png" alt="" height="65">
                    <img src="resources/img/disaster.jpg" alt="" height="82">
                    <img src="resources/img/USAR.jpg" alt="" height="63">
            </div>
            <div class="col-md-4 text-center">
                <h5>Republic of the Philippines</h5>
                <h5>City of Iloilo</h5>
            </div>
            <div class="col-md-4">
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center"><strong>MILEAGE READING</strong></td>
                        </tr>
                        <tr>
                            <th>END</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>BEGIN</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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

            <div class="form">
                <form action="">
                    <table class="table table-bordered print-table">

                        <tbody>
                            <tr>
                                <th colspan="6">UNIT/VEHICLE NAME:</th>
                                <th>IFR No.:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>DATE: </strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                            </tr>

                            <tr>
                                <th colspan="14">Incident Address/Location:</th>
                                <th>Call Received:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                            </tr>

                            <tr>
                                <th colspan="14">Response Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="Standby"> Standby
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="Response"> Response to Scene
                                        <input type="checkbox" class="form-check-input" name="responseType[]" value="">
                                        Others:
                                        <input type="text" name="othersLocation" value=""
                                            style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                    </label>
                                </th>
                                <th>Enroute:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>


                            <tr>
                                <th colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="airport"> Airport
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="Hospital"> Hospital
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="nursing"> Nursing Home
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="residence"> Home/Residence
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="bridge"> Bridge
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="bar"> Restuarant/Bar
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="farm"> Farm
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="school"> School
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="clinic"> Clinic/RHU
                                    </label>

                                </th>
                                <th>At scene:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="street"> Highway/Street
                                        <input type="checkbox" class="form-check-input" name="locationType[]"
                                            value="bldg"> Public Building
                                        <input type="checkbox" class="form-check-input" name="locationType[]" value="">
                                        Others:
                                        <input type="text" name="othersLocation" value=""
                                            style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                    </label>
                                </th>
                                <th>Depart scene:</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                        <th colspan="14">Type of Call:

                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="fire">
                                                Fire
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="vehicular"> Vehicular Accident
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="earthquake"> Earthquake
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="collapse"> Collapse
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="suicide"> Suicide
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="drowning"> Drowning
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="storm">
                                                Storm Surge

                                            </label>
                                        </th>
                                        <th>In service:</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="14">

                                            <label class="form-check-label">

                                                <input type="checkbox" class="form-check-input" name="callType[]" value="flooding"> Flooding
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="roving"> Roving/Inspection
                                                <input type="checkbox" class="form-check-input" name="callType[]" value="">
                                                Others:
                                                <input type="text" name="othersLocation" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                            </label>
                                        </th>
                                        <th>Operation team:</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th colspan="14">SRR Services:
                                            <select name="srrServiceDropdown">
                                            <!-- Fire Emergencies -->
                                                <option value="aerial">Aerial Footage</option>
                                                <option value="firefight">Support in FireFighting Operations</option>
                                                <option value="fire">Fire Rescue</option>
                                                <option value="illumination">Illumination</option>
                                                <option value="machinery">Machinery</option>
                                            <!-- Water Emergencies -->
                                                <option value="technical">Technical Search</option>
                                                <option value="physical">Physical Search</option>
                                                <option value="boat">Boat Operation</option>
                                                <option value="drowning">Active Drowning Response</option>
                                                <option value="illumination2">Illumination</option>
                                                <option value="machinery2">Machinery Response</option>
                                                <option value="marpol">Marpol</option>
                                                <option value="icp">ICP Activation</option>
                                            <!-- Urban Emergencies -->
                                                <option value="vehicle">Vehicle Extrication</option>
                                                <option value="recovery">Vehicle Recovery</option>
                                                <option value="illumination3">Illumination</option>
                                                <option value="emr">EMR Truck Response</option>
                                                <option value="down">Down Structure</option>
                                                <option value="marpol2">Marpol</option>
                                                <option value="natural">Natural Disaster Response</option>
                                                <option value="icp2">ICP Activation</option>     
                                                <option value="ems">Support To EMS Response</option>     
                                            <!-- Technical Emergencies -->
                                                <option value="hazmat">Hazmat Response</option>
                                                <option value="cssr">CSSR Response</option>
                                                <option value="space">Confined Space Response</option>
                                                <option value="rope">Rope Rescue Response</option>
                                                <option value="suicide">Active Suicide Response</option>
                                                <option value="terrorism">Acts of Terrorism</option>
                                                <option value="hostage">Hostage Taking</option>
                                                <option value="mountain">Mountain Search and Rescue</option>     
                                                <option value="ground">Ground Search and Rescue</option> 
                                                <option value="icp3">ICP Activation</option>     
                                            <!-- Operation and Trainings -->
                                                <option value="srr">SRR Training</option>
                                                <option value="mutual">Mutual Aid Response</option>
                                                <option value="survey">Aerial Survey and Search</option>
                                                <option value="clearing">Clearing Operation</option>
                                                <option value="public">Public Safety Response</option>
                                                <option value="ev">EV Standby</option>
                                                <option value="hazard">Hazard Assessmemt</option>
                                                <option value="drill">Earthquake Drill and Orientation</option>     
                                                <option value="elsaroc">ELSAROC and CBDRRM</option> 
                                                <option value="dissemination">Dissemination of Safety Information Via Rekurida</option>     
                                                <option value="others">Other Emergencies</option> 


                                                <!-- Add more options as needed -->
                                            </select>
                                        </th>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                            <tr>
                                <th colspan="20">Incident Commander:</th>
                            </tr>
                            <tr>
                                <th colspan="20">Agency/Office/Organization:</th>
                            </tr>
                            <tr>
                                <th colspan="20">Position:</th>
                            </tr>
                            <tr>
                                <th colspan="14">Address:</th>
                                <th colspan="6">Contact No.:</th>
                            </tr>
                            <tr>
                                <th colspan="20">Incident:</th>
                            </tr>

                        </tbody>
                    </table>
                </form>





                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <th colspan="5">Weather</th>
                                        <td>
                                            <label class="form-check-label">
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="normal"> Normal
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="hot"> Hot/Humid
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="cold"> Cold
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="light"> Light Rain
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="heavy"> Heavy Rain
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="hail"> Hail
                                                </li>
                                                <li> <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="windy"> Windy
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="thunder"> Thunderstorm
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="windy"> Windy
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="weather[]"
                                                        value="thunder"> Thunderstorm
                                                </li>

                                            </label>

                                        </td>

                                        <th>Terrain:
                                            <br>
                                            <label class="form-check-label">
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="concrete"> Concrete
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="dirt"> Dirt
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="mud"> Mud
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="sand"> Sand
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="rock"> Gravel/Rock
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="inclined"> Inclined
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="swamp"> Swamp
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="form-check-input" name="terrain[]"
                                                        value="unstable"> Unstable
                                                </li>

                                            </label>
                                            </td>

                                    </tr>
                                    <tr>
                                        <th colspan="6">CPR:
                                            <label class="form-check-label">

                                                <input type="checkbox" class="form-check-input" name="cpr[]"
                                                    value="yes"> Yes
                                                <input type="checkbox" class="form-check-input" name="cpr[]" value="no">
                                                No
                                                <br>
                                                Time Started:
                                                <input type="text" name="othersLocation" value=""
                                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                                <br>
                                                Time End:
                                                <input type="text" name="othersLocation" value=""
                                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                                <br>
                                                Cycle:
                                                <input type="text" name="othersLocation" value=""
                                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">



                                            </label>
                                        </th>
                                        <th colspan="6">Casualty:

                                            <label class="form-check-label">

                                                <input type="checkbox" class="form-check-input" name="casual[]"
                                                    value="yes"> Yes
                                                <input type="checkbox" class="form-check-input" name="casual[]"
                                                    value="no"> No
                                                <br>
                                                No. of Cas: <input type="text" name="othersLocation" value=""
                                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                            </label>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">AED/Defib:
                                            <label class="form-check-label">

                                                <input type="checkbox" class="form-check-input" name="defib[]"
                                                    value="yes"> Yes
                                                <input type="checkbox" class="form-check-input" name="defib[]"
                                                    value="no"> No


                                            </label>
                                        </th>
                                        <th colspan="6">Ambulance req:
                                            <label class="form-check-label">

                                                <input type="checkbox" class="form-check-input" name="ambulance[]"
                                                    value="yes"> Yes
                                                <input type="checkbox" class="form-check-input" name="ambulance[]"
                                                    value="no"> No
                                                <br>
                                                specify: <input type="text" name="othersLocation" value=""
                                                    style="border: none; background-color: transparent; border-bottom: 1px solid black;">


                                            </label>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="12" style="height: 200px;">Narrative:</th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form action="" method="post">
                            <table class="table table-bordered">

                                <tbody>
                                    <th>Equipment</th>
                                    <th>Used</th>
                                    <th>Checked</th>
                                    <th>Missing</th>
                                    <tr>
                                        <td>Self-Contained Breathing Apparatus</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Electric Spreader</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Electric Cutter</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Electric Ram</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hydraulic Hand Pump</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hydraulic Combi-tool</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hydraulic Ram</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Chainsaw</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Cutters Edge</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>High Pressure Lift Bag</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>High Lift Jack</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Remote Area Lighting System RALS</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Ventilation Blower</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tripod and Winch</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Rope Rescue Equipment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>


                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th colspan="6">Interventions:</th>
                                </tr>
                                <tr>
                                    <td colspan="6" class="checkbox-group">
                                        <label class="form-check-label">
                                            <div>
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="colstruct"> Collapse Structure Rescue
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="boom"> Boom
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="barricade"> Barricade
                                            </div>

                                            <div>
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="confined"> Confined Space Rescue
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="outrigger"> Outrigger
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="structural"> Structural Extrication
                                            </div>

                                            <div>
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="water"> Water Rescue
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="tower"> Tower Light
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="vehi_extri"> Vehicular Extrication
                                            </div>

                                            <div>

                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="patient"> Patient Retrieval
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="winch"> Winch
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="wildlife"> Wildlife Rescue
                                            </div>

                                            <div>
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="angel"> High Angel Rescue
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="hazmat"> HazMat
                                                <input type="checkbox" class="form-check-input" name="interventions[]"
                                                    value="generator"> Generator
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
                                    <th colspan="6">Prepared by:</th>
                                </tr>
                                <tr>
                                    <th colspan="6">Endorsed to/by:</th>
                                </tr>
                                <tr>
                                    <th colspan="6">Witness/es:</th>
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

        <form id="upload-form" enctype="multipart/form-data">
            <label for="image-input">Select Image:</label>
            <input type="file" id="image-input" name="image" accept="image/*" onchange="previewImage(this)">
            <br>
            <br>
            <div class="imageform"
                style="height: 300px; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                <img id="image-preview" src="#" alt="Image Preview">
            </div>
        </form>

        <script>
            function previewImage(input) {
                var preview = document.getElementById('image-preview');
                var file = input.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                } else {
                    preview.src = '#';
                }
            }
        </script>


        <form action="" method="post">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="7" class="text-center">Map of Responded Scene</th>
                    </tr>
                    <tr>
                        <th colspan="7">Location:</th>
                    </tr>
                    <tr>
                        <th>GPS</th>
                        <th>Longitude</th>
                        <td colspan="3"></td>
                        <th>Latitude</th>
                        <td colspan="3"> </td>
                    </tr>
                    <tr>
                        <th colspan="7">DOT Distance Ratio:</th>
                    </tr>
                </tbody>
            </table>
        </form>

        <div class="text-center">
            <h5>Legend</h5>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>&#9651;</td>
                            <td>Barriers</td>
                        </tr>
                        <tr>
                            <td>=</td>
                            <td>Lift</td>
                        </tr>
                        <tr>
                            <td>&#8800;</td>
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

            <form action="" method="post">
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <th colspan="5" class="text-center">Recommendations</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="height: 100px;">
                                <input type="text" style="height: 100px; width: 100%; border: none;"
                                    placeholder="Enter your recommedation here">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <br>
        <?php include 'footer.php'; ?>


        <script>
            function printContent() {
                window.print();
            }
        </script>