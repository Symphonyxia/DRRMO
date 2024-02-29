<?php
include 'header.php';
?>

<br>



<div class="container">

    <br>
    <form action="resources/dir/save.php" method="POST" enctype="multipart/form-data">
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
                                <td><input type="number" name="end" id="end_mileage_1" oninput="calculateTotal();"></td>
                            </tr>
                            <tr>
                                <th>BEGIN</th>
                                <td><input type="number" name="begin" id="begin_mileage_1" oninput="calculateTotal();"></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td> <span id="total_mileage">0</span><input type="hidden" name="total" id="total_mileage_input"></td>


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
                        document.getElementById('total_mileage_input').value = totalMileage; // Set the value of the hidden input
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

                    <table class="table table-bordered print-table">

                        <tbody>
                            <tr>
                                <th colspan="10">UNIT/VEHICLE NAME:<input type="text" name="unit" value=""></th>
                                <th>IFR No.:<input type="text" name="irf_no" value=""></th>
                                <th>DATE: <input type="date" name="date" value=""></th>
                                <th colspan="6"></th>
                            </tr>

                            <tr>
                                <th colspan="14">Incident Address/Location: <input type="text" name="incident_loc" value=""></th>
                                <th>Call Recieved:<input type="number" name="cr" value=""></th>
                            </tr>
                            <tr>
                                <td colspan="14">
                                    <strong>Response Type:</strong>

                                    <input type="checkbox" class="form-check-input" name="response_type[]" value="Standby"> Standby


                                    <input type="checkbox" class="form-check-input" name="response_type[]" value="Response"> Response to Scene


                                    <input type="checkbox" class="form-check-input" id="otherResponseTypeCheckbox"> Others:

                                    <input type="text" name="response_type_other" id="responseTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>
                                </td>


                                <th>Enroute:
                                    <input type="number" name="enr" value="">
                                </th>
                            </tr>
                            <script>
                                document.getElementById('otherResponseTypeCheckbox').addEventListener('change', function() {
                                    var responseTypeOtherInput = document.getElementById('responseTypeOther');
                                    responseTypeOtherInput.disabled = !this.checked;
                                    if (!this.checked) {
                                        responseTypeOtherInput.value = '';
                                    }
                                });
                            </script>



                            <tr>
                                <td colspan="14"> <strong> Location Type: </strong>
                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="airport"> Airport


                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="Hospital"> Hospital





                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="bridge"> Bridge

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="bar"> Restaurant/Bar

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="farm"> Farm

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="school"> School

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="clinic"> Clinic/RHU


                                </td>
                                <th>At scene:
                                    <input type="number" name="atscn" value="">
                                </th>


                            </tr>

                            <tr>
                                <td colspan="14">

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="street">
                                    Highway/Street

                                    <input type="checkbox" class="form-check-input" name="loc_type[]" value="bldg">
                                    Public Building





                                    <input type="checkbox" class="form-check-input" id="otherLocTypeCheckbox"> Others:

                                    <input type="text" name="loc_type_other" id="locTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>
                                </td>
                                <script>
                                    document.getElementById('otherLocTypeCheckbox').addEventListener('change', function() {
                                        var locTypeOtherInput = document.getElementById('locTypeOther');
                                        locTypeOtherInput.disabled = !this.checked;
                                        if (!this.checked) {
                                            locTypeOtherInput.value = ''; // Clear the input field if the checkbox is unchecked
                                        }
                                    });
                                </script>


                                <th>Depart scene:
                                    <input type="number" name="descn" value="">
                                </th>





                            </tr>


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                            <tr>
                                <td colspan="14"> <strong> Type of Call:</strong>

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="fire">
                                    Fire


                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="vehicular"> Vehicular Accident

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="earthquake"> Earthquake


                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="collapse"> Collapse

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="suicide"> Suicide

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="drowning"> Drowning

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="storm"> Storm Surge



                                </td>

                                <th>In Service:


                                    <input type="number" name="insvc" value="">


                                </th>

                            </tr>

                            <tr>
                                <td colspan="14">

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="flooding"> Flooding

                                    <input type="checkbox" class="form-check-input" name="call_type[]" value="roving"> Roving/Inspection


                                    <input type="checkbox" class="form-check-input" id="otherCallTypeCheckbox" name="call_type[]" value="others"> Others:

                                    <input type="text" name="call_type_other" id="callTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>
                                </td>



                                </td>
                                <th>Operation Team: <input type="text" name="optm" value=""></th>
                            </tr>
                            <tr>
                                <th colspan="15">
                                    SRR Services:
                                    <select name="srr_services" id="srrServicesSelect">
                                        <option value="default" selected disabled>Please select a type of call</option>
                                    </select>
                                </th>
                            </tr>

                            <script>
                                $(document).ready(function() {
                                    const srrOptions = {
                                        fire: [{
                                                value: "aerial",
                                                label: "Aerial Footage"
                                            },
                                            {
                                                value: "firefight",
                                                label: "Support in FireFighting Operations"
                                            },
                                            {
                                                value: "fire",
                                                label: "Fire Rescue"
                                            },
                                            {
                                                value: "illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "machinery",
                                                label: "Machinery"
                                            }
                                        ],
                                        drowning: [{
                                                value: "technical",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "physical",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "boat",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "drowning",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "icp_activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        storm: [{
                                                value: "technical",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "physical",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "boat",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "drowning",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "icp_activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        flooding: [{
                                                value: "technical",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "physical",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "boat",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "drowning",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "icp_activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        earthquake: [{
                                                value: "srr_training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "mutual_response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "aerial_search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "clearing_operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "public_response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "ev_standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "hazard_assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "earthquake_drill",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "elsaroc",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "safety_information",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "others",
                                                label: "Other Dissemination"
                                            }

                                        ],
                                        collapse: [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "srr_training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "mutual_response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "aerial_search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "clearing_operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "public_response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "ev_standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "hazard_assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "earthquake_drill",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "elsaroc",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "safety_information",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "others",
                                                label: "Other Dissemination"
                                            }
                                        ],
                                        suicide: [{
                                                value: "hazmat",
                                                label: "Hazmat Response"
                                            },
                                            {
                                                value: "cssr_response",
                                                label: "CSSR Response"
                                            },
                                            {
                                                value: "space_response",
                                                label: "Confined Space Response"
                                            },
                                            {
                                                value: "rescue_response",
                                                label: "Rope Rescue Response"
                                            },
                                            {
                                                value: "active_suicide",
                                                label: "Active Suicide Response"
                                            },
                                            {
                                                value: "terrorism",
                                                label: "Acts of Terrorism"
                                            },
                                            {
                                                value: "hostage_taking",
                                                label: "Hostage Taking"
                                            },
                                            {
                                                value: "mountain_rescue",
                                                label: "Mountain Search and Rescue"
                                            },
                                            {
                                                value: "ground_rescue",
                                                label: "Ground Search and Rescue"
                                            },
                                            {
                                                value: "icp_activation",
                                                label: "ICP Activation"
                                            }

                                        ],
                                        vehicular: [{
                                                value: "vehicle",
                                                label: "Vehicle Extrication"
                                            },
                                            {
                                                value: "recovery",
                                                label: "Vehicle Recovery"
                                            },
                                            {
                                                value: "illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "emr_truck_response",
                                                label: "EMR Truck Response"
                                            },
                                            {
                                                value: "down_structure",
                                                label: "Down Structure"
                                            },
                                            {
                                                value: "marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "natural_disaster_response",
                                                label: "Natural Disaster Response"
                                            },
                                            {
                                                value: "icp_activation",
                                                label: "ICP Activation"
                                            },
                                            {
                                                value: "ems_response",
                                                label: "Support To EMS Response"
                                            }
                                        ],
                                        roving: [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "srr_training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "mutual_response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "aerial_search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "clearing_operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "public_response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "ev_standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "hazard_assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "earthquake_drill",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "elsaroc",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "safety_information",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "others",
                                                label: "Other Dissemination"
                                            }
                                        ],
                                        others: [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "srr_training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "mutual_response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "aerial_search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "clearing_operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "public_response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "ev_standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "hazard_assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "earthquake_drill",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "elsaroc",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "safety_information",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "others",
                                                label: "Other Dissemination"
                                            }
                                        ],

                                    };


                                    function updateSrrServicesDropdown(selectedTypes) {
                                        const srrSelect = $("#srrServicesSelect");
                                        srrSelect.empty(); // Clear existing options

                                        if (selectedTypes.length === 0) {
                                            // If no type of call is selected, show default option
                                            srrSelect.append($('<option>', {
                                                value: "default",
                                                text: "Please select a type of call",
                                                disabled: true,
                                                selected: true
                                            }));
                                        } else {
                                            // If type of call(s) are selected, populate the dropdown with options based on selected type(s)
                                            let options = [];
                                            selectedTypes.forEach(function(type) {
                                                options = options.concat(srrOptions[type]);
                                            });
                                            options.forEach(function(option) {
                                                srrSelect.append($('<option>', {
                                                    value: option.value,
                                                    text: option.label
                                                }));
                                            });
                                        }
                                    }
                                    $("input[name='call_type[]']").change(function() {
                                        const selectedTypes = [];
                                        $("input[name='call_type[]']:checked").each(function() {
                                            selectedTypes.push($(this).val());
                                        });
                                        updateSrrServicesDropdown(selectedTypes);
                                    });
                                    $("#srrServicesSelect").change(function() {
                                        const selectedService = $(this).val();
                                        // Save the selected value to a variable named srr_services
                                        const srr_services = selectedService;
                                        console.log("Selected SRR service:", srr_services);
                                        // If you want to do something with the selected value, you can do it here
                                    });
                                });

                                document.getElementById('otherCallTypeCheckbox').addEventListener('change', function() {
                                    var callTypeOtherInput = document.getElementById('callTypeOther');
                                    callTypeOtherInput.disabled = !this.checked;
                                    if (!this.checked) {
                                        callTypeOtherInput.value = ''; // Clear the input field if the checkbox is unchecked
                                    }
                                });
                            </script>




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
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="5">Weather</th>
                                        <td>
                                            <ul style="list-style-type: none; padding-left: 0;">
                                                <li>

                                                    <input type="checkbox" class="form-check-input" name="weather[]" value="normal">
                                                    Normal
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
                                                    <label>Signal:
                                                        <select name="warning">
                                                            <option value="No Warning">No Warning</option>
                                                            <option value="Signal no. 1">Signal 1</option>
                                                            <option value="Signal no. 2">Signal 2</option>
                                                            <option value="Signal no. 3">Signal 3</option>
                                                            <option value="Signal no. 4">Signal 4</option>
                                                            <option value="Signal no. 5">Signal 5</option>
                                                        </select>
                                                    </label>
                                                </li>
                                            </ul>




                                        </td>


                                        <th>Terrain:</th>
                                        <td>


                                            <ul style="list-style-type: none; padding-left: 0;">
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
                                            </ul>

                                            <br>

                                        </td>


                                    <tr>
                                        <td colspan="6"> <strong> CPR: </strong>

                                            <input type="checkbox" class="form-check-input" name="cpr" value="yes">
                                            Yes
                                            <input type="checkbox" class="form-check-input" name="cpr" value="no">
                                            No
                                            <br>
                                            <strong> Time Started:</strong>
                                            <input type="time" name="time_start" value="">
                                            <br>
                                            <strong>Time End:</strong>
                                            <input type="time" name="time_end" value="">
                                            <br>
                                            <strong> Cycle:</strong>
                                            <input type="text" name="cycle" value="">


                                        </td>
                                        <td colspan="6"> <strong> Casualty: </strong>



                                            <input type="checkbox" class="form-check-input" name="casualty" value="yes"> Yes
                                            <input type="checkbox" class="form-check-input" name="casualty" value="no"> No
                                            <br>
                                            No. of Cas: <input type="number" name="no_cas" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">



                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"> <strong> AED/Defib: </strong>


                                            <input type="checkbox" class="form-check-input" name="defib" value="yes"> Yes
                                            <input type="checkbox" class="form-check-input" name="defib" value="no">
                                            No

                                        </td>
                                        <td colspan="6"> <strong> Ambulance req: </strong>


                                            <input type="checkbox" class="form-check-input" name="ambulance_req" value="yes"> Yes
                                            <input type="checkbox" class="form-check-input" name="ambulance_req" value="no"> No
                                            <br>
                                            specify: <input type="text" name="amb_spec" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">




                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="12">Narrative:</th>
                                    </tr>

                                    <tr>
                                        <th colspan="12" style="height: 670px;">
                                            <textarea name="narrative" style="height: 670px; width: 100%; overflow-wrap: break-word; border: none; resize: none;" placeholder="Enter your text here"></textarea>

                                            </textarea>
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
                                        <td><input type="hidden" name="equip_name[]" value="Self-Contained Breathing Apparatus">Self-Contained Breathing
                                            Apparatus</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>

                                    </tr>

                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Spreader">Electric
                                            Spreader</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Cutter">Electric
                                            Cutter</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Ram">Electric Ram
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Hand Pump">Hydraulic Hand Pump</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Combi-tool">Hydraulic Combi-tool</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Ram">Hydraulic Ram
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Chainsaw">Chainsaw</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Cutters Edge">Cutters Edge
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="High Pressure Lift Bag">High
                                            Pressure Lift Bag</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="High Lift Jack">High Lift
                                            Jack</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Remote Area Lighting System RALS">Remote Area Lighting System
                                            RALS</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Ventilation Blower">Ventilation Blower</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Tripod and Winch">Tripod and
                                            Winch</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Rope Rescue Equipment">Rope
                                            Rescue Equipment</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Other">Other</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="missing"></td>
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
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="colstruct"> Collapse Structure Rescue
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="boom"> Boom
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="barricade"> Barricade
                                                </div>

                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="confined"> Confined Space Rescue
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="outrigger"> Outrigger
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="structural"> Structural Extrication
                                                </div>
                                            </div>

                                            <div style="display: flex; flex-wrap: wrap;">

                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="water"> Water Rescue
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="tower"> Tower Light
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="vehi_extri"> Vehicular Extrication
                                                </div>

                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="patient"> Patient Retrieval
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="winch"> Winch
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="wildlife"> Wildlife Rescue
                                                </div>
                                            </div>

                                            <div style="display: flex; flex-wrap: wrap;">

                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="angel"> High Angle Rescue
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="hazmat"> HazMat
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <input type="checkbox" class="form-check-input" name="interventions[]" value="generator"> Generator
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
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="crew[]" value=""></td>
                                        <td><input type="text" name="designation[]" value=""></td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Prepared by:
                                            <input type="text" name="prep_by" value="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Endorsed to/by:
                                            <input type="text" name="endorsed_by" value="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Witness/es:
                                            <input type="text" name="witness" value="">
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
            <input type="file" name="images" accept="image/*" id="image-input" onchange="previewImage(this)">
            <br><br>

            <div class="imageform" style="height: 300px; width: 100%; display: flex; justify-content: center; border: 1px solid #ccc;">
                <img id="selected-image-preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 100%;">
            </div>

            <script>
                function previewImage(input) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('selected-image-preview').src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            </script>



            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th colspan="7" class="text-center">Map of Responded Scene</th>
                    </tr>
                    <tr>
                        <th colspan="7">Location:
                            <input type="text" name="map_loc" value="">

                        </th>
                    </tr>
                    <tr>
                        <th>GPS</th>
                        <th>Longitude</th>
                        <td colspan="3">
                            <input type="number" name="longitude" value="">
                        </td>
                        <th>Latitude</th>
                        <td colspan="3">
                            <input type="number" name="latitude" value="">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="7">DOT Distance Ratio:
                            <input type="number" name="dist_ratio" value=""></td>
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
                                <textarea name="recommendation" style="height: 670px; width: 100%; overflow-wrap: break-word; border: none; resize: none;" placeholder="Enter your text here"></textarea>
                            </th>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
</div>

<button type="submit" class="btn btn-success btn-sm" onclick="uploadImage()" style="float: right;" name="addform">Submit</button>

</form>



<br>
<?php include 'footer.php'; ?>