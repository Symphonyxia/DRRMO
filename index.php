<?php
include 'header.php';
include 'sidebar.php';
?>

<br>

<div class="container">

    <br>
    <form action="">
        <div id="print-content">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-4">
                    <img src="resources/img/iloilo.png" alt="" height="60">
                    <img src="resources/img/disaster.jpg" alt="" height="90">
                    <img src="resources/img/USAR.jpg" alt="" height="60">
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
                                <td><input type="number" id="end_mileage_1" oninput="calculateTotal();"></td>
                            </tr>
                            <tr>
                                <th>BEGIN</th>
                                <td><input type="number" id="begin_mileage_1" oninput="calculateTotal();"></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td><span id="total_mileage">0</span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <script>
                    function calculateTotal() {
                        var endMileage = parseFloat(document.getElementById('end_mileage_1').value) || 0;
                        var beginMileage = parseFloat(document.getElementById('begin_mileage_1').value) || 0;
                        var totalMileage = endMileage - beginMileage;
                        document.getElementById('total_mileage').textContent = totalMileage;

                    }
                </script>



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

                        <table class="table table-bordered print-table">

                            <tbody>
                                <tr>
                                    <th colspan="10">UNIT/VEHICLE NAME:
                                        <input type="text" name="unit" value="">

                                    </th>
                                    <th>IFR No.:
                                        <input type="text" name="irf_no" value="">

                                    </th>

                                    <th>DATE: <input type="text" name="date" value="">

                                    </th>
                                    <th colspan="6"></th>



                                </tr>

                                <tr>
                                    <th colspan="14">Incident Address/Location:
                                        <input type="text" name="incident_loc" value="">

                                    </th>
                                    <th>Call Recieved:
                                        <input type="text" name="call_type" value="">
                                    </th>



                                </tr>

                                <tr>
                                    <th colspan="14">Response Type:
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby"> Standby
                                            <input type="checkbox" class="form-check-input" name="response_type[]" value="Response"> Response to Scene
                                            <input type="checkbox" class="form-check-input" name="response_type[]" value="">
                                            Others:
                                            <input type="text" name="response_type" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                        </label>
                                    </th>
                                    <th>Enroute:
                                        <input type="text" name="othersLocation" value="">
                                    </th>


                                </tr>


                                <tr>
                                    <th colspan="14">Location Type:
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="airport"> Airport
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="Hospital"> Hospital
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="nursing"> Nursing Home
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="residence"> Home/Residence
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge"> Bridge
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="bar"> Restuarant/Bar
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="farm"> Farm
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="school"> School
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="clinic"> Clinic/RHU
                                        </label>

                                    </th>
                                    <th>At scene:
                                        <input type="text" name="othersLocation" value="">
                                    </th>

                                </tr>

                                <tr>
                                    <th colspan="14">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="street"> Highway/Street
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="bldg"> Public Building
                                            <input type="checkbox" class="form-check-input" name="loc_type[]" value="">
                                            Others:
                                            <input type="text" name="loc_type" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                        </label>
                                    </th>
                                    <th>Depart scene:
                                        <input type="text" name="othersLocation" value="">
                                    </th>

                                </tr>



                                <tr>
                                    <th colspan="14">Type of Call:

                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="fire">
                                            Fire
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="vehicular"> Vehicular Accident
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="earthquake"> Earthquake
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="collapse"> Collapse
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="suicide"> Suicide
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="drowning"> Drowning
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="storm">
                                            Storm Surge

                                        </label>
                                    </th>
                                    <th>In service:
                                        <input type="text" name="othersLocation" value="">
                                    </th>

                                </tr>
                                <tr>
                                    <th colspan="14">

                                        <label class="form-check-label">

                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="flooding"> Flooding
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="roving"> Roving/Inspection
                                            <input type="checkbox" class="form-check-input" name="call_type[]" value="">
                                            Others:
                                            <input type="text" name="othersLocation" value="">

                                        </label>
                                    </th>
                                    <th>Operation Team: <input type="text" name="othersLocation" value=""></th>

                                </tr>

                                <tr>
                                    <th colspan="14">
                                        SRR Services:
                                        <select name="srr_services">
                                            <!-- Fire Emergencies -->
                                            <option disabled="disabled" style="font-weight:bold;">Fire Emergencies</option>
                                            <option value="aerial">Aerial Footage</option>
                                            <option value="firefight">Support in FireFighting Operations</option>
                                            <option value="fire">Fire Rescue</option>
                                            <option value="illumination">Illumination</option>
                                            <option value="machinery">Machinery</option>

                                            <!-- Water Emergencies -->
                                            <option disabled="disabled" style="font-weight:bold;">Water Emergencies</option>
                                            <option value="technical">Technical Search</option>
                                            <option value="physical">Physical Search</option>
                                            <option value="boat">Boat Operation</option>
                                            <option value="drowning">Active Drowning Response</option>
                                            <option value="illumination2">Illumination</option>
                                            <option value="machinery2">Machinery Response</option>
                                            <option value="marpol">Marpol</option>
                                            <option value="icp">ICP Activation</option>

                                            <!-- Urban Emergencies -->
                                            <option disabled="disabled" style="font-weight:bold;">Urban Emergencies</option>
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
                                            <option disabled="disabled" style="font-weight:bold;">Technical Emergencies</option>
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
                                            <option disabled="disabled" style="font-weight:bold;">Operation and Trainings</option>
                                            <option value="srr">SRR Training</option>
                                            <option value="mutual">Mutual Aid Response</option>
                                            <option value="survey">Aerial Survey and Search</option>
                                            <option value="clearing">Clearing Operation</option>
                                            <option value="public">Public Safety Response</option>
                                            <option value="ev">EV Standby</option>
                                            <option value="hazard">Hazard Assessment</option>
                                            <option value="drill">Earthquake Drill and Orientation</option>
                                            <option value="elsaroc">ELSAROC and CBDRRM</option>
                                            <option value="dissemination">Dissemination of Safety Information Via Rekurida</option>
                                            <option value="others">Other Emergencies</option>

                                            <!-- Add more options as needed -->
                                        </select>
                                    </th>



                                    </select>
                                    </th>
                                    <th></th>
                                </tr>



                                <tr>
                                    <th colspan="20">Incident Commander:
                                        <input type="text" name="incident_comm" value="">

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="20">Agency/Office/Organization:
                                        <input type="text" name="agency" value="">

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="20">Position:
                                        <input type="text" name="position" value="">

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="14">Address:
                                        <input type="text" name="address" value="">

                                    </th>
                                    <th colspan="6">Contact No.:
                                        <input type="text" name="contact_no" value="">

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="20">Incident:
                                        <input type="text" name="incident" value="">

                                    </th>
                                </tr>

                            </tbody>
                        </table>






                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <table class="table table-bordered">

                                        <tbody>
                                            <tr>
                                                <th colspan="5">Weather</th>
                                                <td>
                                                    <label class="form-check-label">
                                                        <ui style="list-style-type: none; padding-left: 0;">
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="normal"> Normal
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="hot"> Hot/Humid
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="cold"> Cold
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="light"> Light Rain
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="heavy"> Heavy Rain
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="hail"> Hail
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="windy"> Windy
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="thunder"> Thunderstorm
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="windy"> Windy
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="weather[]" value="thunder"> Thunderstorm
                                                            </li>
                                                        </ui>
                                                    </label>


                                                </td>

                                                <th>Terrain:</th>
                                                <td>
                                                    <br>
                                                    <label class="form-check-label">
                                                        <ui style="list-style-type: none; padding-left: 0;">
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="concrete"> Concrete
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="dirt"> Dirt
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="mud"> Mud
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="sand"> Sand
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="rock"> Gravel/Rock
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="inclined"> Inclined
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="swamp"> Swamp
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" class="form-check-input" name="terrain[]" value="unstable"> Unstable
                                                            </li>
                                                        </ui>
                                                    </label>
                                                </td>


                                            <tr>
                                                <th colspan="6">CPR:
                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="cpr[]" value="yes"> Yes
                                                        <input type="checkbox" class="form-check-input" name="cpr[]" value="no">
                                                        No
                                                        <br>
                                                        Time Started:
                                                        <input type="text" name="othersLocation" value="">
                                                        <br>
                                                        Time End:
                                                        <input type="text" name="othersLocation" value="">
                                                        <br>
                                                        Cycle:
                                                        <input type="text" name="othersLocation" value="">



                                                    </label>
                                                </th>
                                                <th colspan="6">Casualty:

                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="casualty[]" value="yes"> Yes
                                                        <input type="checkbox" class="form-check-input" name="casualty[]" value="no"> No
                                                        <br>
                                                        No. of Cas: <input type="text" name="" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                                    </label>

                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">AED/Defib:
                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> Yes
                                                        <input type="checkbox" class="form-check-input" name="defib[]" value="no"> No


                                                    </label>
                                                </th>
                                                <th colspan="6">Ambulance req:
                                                    <label class="form-check-label">

                                                        <input type="checkbox" class="form-check-input" name="ambulance_req[]" value="yes"> Yes
                                                        <input type="checkbox" class="form-check-input" name="ambulance_req[]" value="no"> No
                                                        <br>
                                                        specify: <input type="text" name="othersLocation" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">


                                                    </label>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th colspan="12">Narrative:</th>
                                            </tr>

                                            <tr>
                                                <th colspan="12" style="height: 670px;">
                                                    <textarea name="narrative" style="height: 670px; width: 100%; overflow-wrap: break-word; border: none; resize: none;" placeholder="Enter your text here"></textarea>
                                                </th>
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
                                                <td name="equip">Self-Contained Breathing Apparatus</td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Electric Spreader</td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Electric Cutter</td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Electric Ram</td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="status[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Hydraulic Hand Pump</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Hydraulic Combi-tool</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Hydraulic Ram</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Chainsaw</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Cutters Edge</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">High Pressure Lift Bag</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">High Lift Jack</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Remote Area Lighting System RALS</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Ventilation Blower</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Tripod and Winch</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Rope Rescue Equipment</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td name="equip">Other</td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                                <td> <input type="checkbox" class="form-check-input" name="defib[]" value="yes"> </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
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
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="colstruct"> Collapse Structure
                                                        Rescue
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="boom"> Boom
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="barricade"> Barricade
                                                    </div>

                                                    <div>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="confined"> Confined Space Rescue
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="outrigger"> Outrigger
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="structural"> Structural
                                                        Extrication
                                                    </div>

                                                    <div>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="water"> Water Rescue
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="tower"> Tower Light
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="vehi_extri"> Vehicular Extrication
                                                    </div>

                                                    <div>

                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="patient"> Patient Retrieval
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="winch"> Winch
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="wildlife"> Wildlife Rescue
                                                    </div>

                                                    <div>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="angel"> High Angel Rescue
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="hazmat"> HazMat
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="generator"> Generator
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
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                            <td><input type="text" name="othersLocation" value=""></td>
                                        </tr>
                                        <tr>
                                            <th colspan="6">Prepared by:
                                                <input type="text" name="othersLocation" value="">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="6">Endorsed to/by:
                                                <input type="text" name="othersLocation" value="">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="6">Witness/es:
                                                <input type="text" name="othersLocation" value="">
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

                <form id="upload-form" enctype="multipart/form-data">
                    <label for="image-input">Select Image:</label>
                    <input type="file" id="image-input" name="image" accept="image/*" onchange="previewImage(this)">
                    <br>
                    <br>
                    <div class="imageform" style="height: 300px; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                        <img id="image-preview" src="#" alt="Image Preview">
                    </div>
                </form>

                <script>
                    function previewImage(input) {
                        var preview = document.getElementById('image-preview');
                        var file = input.files[0];

                        if (file) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
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
                                <th colspan="5" style="height: 300px;">
                                    <input type="text" style="height: 300px; width: 100%; border: none;">
                                </th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>

    <br>
    <?php include 'footer.php'; ?>

    <a href="path/to/printContent.js" download="printContent.js">Download printContent.js</a>

    <script>
        function printContent() {
            window.print();
        }
    </script>