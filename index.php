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
                                <td><input type="number" name="end_mileage" id="end_mileage_1" oninput="calculateTotal();"></td>
                            </tr>
                            <tr>
                                <th>BEGIN</th>
                                <td><input type="number" name="begin_mileage" id="begin_mileage_1" oninput="calculateTotal();">
                                </td>
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

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                <th>Call Recieved:<input type="text" name="call_received" value=""></th>
                            </tr>
                            <tr>
                                <td colspan="14">
                                    <strong>Response Type:</strong>
                                    <label>

                                        <input type="checkbox" class="form-check-input response-checkbox-group" name="response_type[]" value="Standby"> Standby
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input response-checkbox-group" name="response_type[]" value="Response to Scene"> Response to Scene
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input response-checkbox-group" id="otherResponseTypeCheckbox" name="response_type[]" value=""> Others:
                                    </label>

                                    <input type="text" name="response_type_other" id="responseTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>

                                </td>
                                <th>Enroute:
                                    <input type="text" name="enroute" value="">
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

                                $(document).ready(function() {
                                    $('.response-checkbox-group').click(function() {

                                        $('.response-checkbox-group').not(this).prop('checked', false);
                                    });
                                });
                            </script>



                            <tr>
                                <td colspan="14"> <strong> Location Type: </strong>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Airport"> Airport
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Hospital"> Hospital
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Nursing Home"> Nursing Home
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Home/Residence"> Home/Residence
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Bridge"> Bridge
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Restuarant/Bar"> Restaurant/Bar
                                    </label>

                                </td>
                                <th>At scene:
                                    <input type="text" name="at_scene" value="">
                                </th>
                            </tr>

                            <tr>
                                <td colspan="14">

                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Farm"> Farm
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="School"> School
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Clinic/RHU"> Clinic/RHU
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Highway/Street"> Highway/Street
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" name="loc_type[]" value="Public Building"> Public Building
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input single-checkbox-group" id="otherLocTypeCheckbox" name="loc_type[]" value=""> Others:
                                    </label>

                                    <input type="text" name="loc_type_other" id="locTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>

                                </td>
                                <script>
                                    document.getElementById('otherLocTypeCheckbox').addEventListener('change', function() {
                                        var locTypeOtherInput = document.getElementById('locTypeOther');
                                        locTypeOtherInput.disabled = !this.checked;
                                        if (!this.checked) {
                                            locTypeOtherInput.value = '';
                                        }
                                    });

                                    $(document).ready(function() {
                                        $('.single-checkbox-group').click(function() {

                                            $('.single-checkbox-group').not(this).prop('checked', false);
                                        });
                                    });
                                </script>

                                <th>Depart scene:
                                    <input type="text" name="depart_scene" value="">
                                </th>
                            </tr>
                            <tr>
                                <td colspan="14"> <strong> Type of Call:</strong>

                                    <label>

                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Fire">
                                        Fire
                                    </label>
                                    <label>

                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Vehicular Accident"> Vehicular Accident
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Earthquake"> Earthquake

                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Collapse">
                                        Collapse
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Suicide">
                                        Suicide
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Drowning">
                                        Drowning
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Storm Surge">
                                        Storm Surge
                                    </label>



                                </td>

                                <th>In Service:


                                    <input type="text" name="in_service" value="">


                                </th>

                            </tr>

                            <tr>
                                <td colspan="14">


                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Flooding">
                                        Flooding
                                    </label>
                                    <label>
                                        <input type="checkbox" class="form-check-input call-checkbox-group" name="call_type[]" value="Roving/Inspection">
                                        Roving/Inspection
                                    </label>
                                    <label>

                                        <input type="checkbox" class="form-check-input call-checkbox-group" id="otherCallTypeCheckbox" name="call_type[]" value=" "> Others:
                                    </label>

                                    <input type="text" name="call_type_other" id="callTypeOther" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;" disabled>


                                </td>

                                </td>
                                <th>Operation Team: <input type="text" name="operation_team" value=""></th>
                            </tr>

                            <script>
                                document.getElementById('otherCallTypeCheckbox').addEventListener('change', function() {
                                    var callTypeOtherInput = document.getElementById('callTypeOther');
                                    callTypeOtherInput.disabled = !this.checked;
                                    if (!this.checked) {
                                        callTypeOtherInput.value = '';
                                    }
                                });

                                $(document).ready(function() {
                                    $('.call-checkbox-group').click(function() {
                                        $('.call-checkbox-group').not(this).prop('checked', false);
                                    });
                                });
                            </script>



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
                                        Fire: [{
                                                label: "Fire Emergencies"
                                            },
                                            {
                                                value: "Aerial Footage",
                                                label: "Aerial Footage"
                                            },
                                            {
                                                value: "Support in FireFighting Operations",
                                                label: "Support in FireFighting Operations"
                                            },
                                            {
                                                value: "Fire Rescue",
                                                label: "Fire Rescue"
                                            },
                                            {
                                                value: "Illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "Machinery",
                                                label: "Machinery"
                                            }
                                        ],
                                        Drowning: [{
                                                label: "Water Emergencies"
                                            },
                                            {
                                                value: "Technical Search",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "Physical Search",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "Boat Operation",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "Active Drowning Response",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "Illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "Machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "Marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "ICP Activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        "Storm Surge": [{
                                                label: "Water Emergencies"
                                            },
                                            {
                                                value: "Technical Search",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "Physical Search",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "Boat Operation",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "Active Drowning Response",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "Illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "Machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "Marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "ICP Activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        Flooding: [{
                                                label: "Water Emergencies"
                                            },
                                            {
                                                value: "Technical Search",
                                                label: "Technical Search"
                                            },
                                            {
                                                value: "Physical Search",
                                                label: "Physical Search"
                                            },
                                            {
                                                value: "Boat Operation",
                                                label: "Boat Operation"
                                            },
                                            {
                                                value: "Active Drowning Response",
                                                label: "Active Drowning Response"
                                            },
                                            {
                                                value: "Illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "Machinery",
                                                label: "Machinery"
                                            },
                                            {
                                                value: "Marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "ICP Activation",
                                                label: "ICP Activation"
                                            }
                                        ],
                                        Earthquake: [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "SRR Training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "Mutual Aid Response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "Aerial Survey and Search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "Clearing Operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "Public Safety Response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "EV Standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "Hazard Assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "Earthquake Drill and Orientation",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "ELSAROC and CBDRRM",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "Dissemination of Safety Information Via Rekurida",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "Other Emergencies",
                                                label: "Other Emergencies"
                                            }

                                        ],
                                        Collapse: [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "SRR Training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "Mutual Aid Response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "Aerial Survey and Search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "Clearing Operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "Public Safety Response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "EV Standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "Hazard Assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "Earthquake Drill and Orientation",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "ELSAROC and CBDRRM",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "Dissemination of Safety Information Via Rekurida",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "Other Emergencies",
                                                label: "Other Emergencies"
                                            }
                                        ],
                                        Suicide: [{
                                                label: "Technical Emergencies"
                                            },
                                            {
                                                value: "Hazmat Respons",
                                                label: "Hazmat Response"
                                            },
                                            {
                                                value: "CSSR Response",
                                                label: "CSSR Response"
                                            },
                                            {
                                                value: "Confined Space Response",
                                                label: "Confined Space Response"
                                            },
                                            {
                                                value: "Rope Rescue Response",
                                                label: "Rope Rescue Response"
                                            },
                                            {
                                                value: "Active Suicide Response",
                                                label: "Active Suicide Response"
                                            },
                                            {
                                                value: "Acts of Terrorism",
                                                label: "Acts of Terrorism"
                                            },
                                            {
                                                value: "Hostage Taking",
                                                label: "Hostage Taking"
                                            },
                                            {
                                                value: "Mountain Search and Rescue",
                                                label: "Mountain Search and Rescue"
                                            },
                                            {
                                                value: "Ground Search and Rescue",
                                                label: "Ground Search and Rescue"
                                            },
                                            {
                                                value: "ICP Activation",
                                                label: "ICP Activation"
                                            }

                                        ],
                                        "Vehicular Accident": [{
                                                label: "Urban Emergencies"
                                            },
                                            {
                                                value: "Vehicle Extrication",
                                                label: "Vehicle Extrication"
                                            },
                                            {
                                                value: "Vehicle Recovery",
                                                label: "Vehicle Recovery"
                                            },
                                            {
                                                value: "Illumination",
                                                label: "Illumination"
                                            },
                                            {
                                                value: "EMR Truck Response",
                                                label: "EMR Truck Response"
                                            },
                                            {
                                                value: "Down Structure",
                                                label: "Down Structure"
                                            },
                                            {
                                                value: "Marpol",
                                                label: "Marpol"
                                            },
                                            {
                                                value: "Natural Disaster Response",
                                                label: "Natural Disaster Response"
                                            },
                                            {
                                                value: "ICP Activation",
                                                label: "ICP Activation"
                                            },
                                            {
                                                value: "Support To EMS Response",
                                                label: "Support To EMS Response"
                                            }
                                        ],
                                        "Roving/Inspection": [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "SRR Training",
                                                label: "SRR Training"
                                            },
                                            {
                                                value: "Mutual Aid Response",
                                                label: "Mutual Aid Response"
                                            },
                                            {
                                                value: "Aerial Survey and Search",
                                                label: "Aerial Survey and Search"
                                            },
                                            {
                                                value: "Clearing Operation",
                                                label: "Clearing Operation"
                                            },
                                            {
                                                value: "Public Safety Response",
                                                label: "Public Safety Response"
                                            },
                                            {
                                                value: "EV Standby",
                                                label: "EV Standby"
                                            },
                                            {
                                                value: "Hazard Assessment",
                                                label: "Hazard Assessment"
                                            },
                                            {
                                                value: "Earthquake Drill and Orientation",
                                                label: "Earthquake Drill and Orientation"
                                            },
                                            {
                                                value: "ELSAROC and CBDRRM",
                                                label: "ELSAROC and CBDRRM"
                                            },
                                            {
                                                value: "Dissemination of Safety Information Via Rekurida",
                                                label: "Dissemination of Safety Information Via Rekurida"
                                            },
                                            {
                                                value: "Other Emergencies",
                                                label: "Other Emergencies"
                                            }
                                        ],
                                        " ": [{
                                                label: "Operation and Trainings"
                                            },
                                            {
                                                value: "Other Emergencies",
                                                label: "Other Emergencies"
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
                                    <input type="text" name="incident_commander" value="">
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

                                                    <label>

                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Normal">
                                                        Normal
                                                    </label>

                                                </li>
                                                <li>

                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Hot/Humid"> Hot/Humid
                                                    </label>

                                                </li>
                                                <li>

                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Cold"> Cold
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Light Rain"> Light Rain
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Heavy Rain"> Heavy Rain
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Hail"> Hail

                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Windy"> Windy
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Thunderstorm"> Thunderstorm
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input weather-checkbox-group" name="weather[]" value="Sun and Rain"> Sun and Rain
                                                    </label>
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

                                            <script>
                                                $(document).ready(function() {
                                                    $('.weather-checkbox-group').click(function() {
                                                        $('.weather-checkbox-group').not(this).prop('checked', false);
                                                    });
                                                });
                                            </script>


                                        </td>


                                        <th>Terrain:</th>
                                        <td>


                                            <ul style="list-style-type: none; padding-left: 0;">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Concrete"> Concrete
                                                    </label>
                                                </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Dirt"> Dirt
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Mud"> Mud
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Sand"> Sand
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Gravel/Rock"> Gravel/Rock
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Inclined"> Inclined
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Swamp"> Swamp
                                                    </label> </li>
                                                <li> <label>
                                                        <input type="checkbox" class="form-check-input terrain-checkbox-group" name="terrain[]" value="Unstable"> Unstable
                                                    </label> </li>
                                            </ul>
                                        </td>

                                        <script>
                                            $(document).ready(function() {
                                                $('.terrain-checkbox-group').click(function() {
                                                    $('.terrain-checkbox-group').not(this).prop('checked', false);
                                                });
                                            });
                                        </script>

                                    <tr>
                                        <td colspan="6"> <strong> CPR: </strong>
                                            <label>

                                                <input type="checkbox" class="form-check-input cpr-checkbox-group" name="cpr" value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="checkbox" class="form-check-input cpr-checkbox-group" name="cpr" value="No">
                                                No
                                            </label>
                                            <br>
                                            <label>
                                                <strong> Time Started:</strong>
                                                <input type="time" name="time_start" value="">
                                            </label>
                                            <br>
                                            <label>
                                                <strong>Time End:</strong>
                                                <input type="time" name="time_end" value="">
                                            </label>
                                            <br>
                                            <label>
                                                <strong> Cycle:</strong>
                                                <input type="text" name="cycle" value="">
                                            </label>
                                            <script>
                                                $(document).ready(function() {
                                                    $('.cpr-checkbox-group').click(function() {
                                                        $('.cpr-checkbox-group').not(this).prop('checked', false);
                                                    });
                                                });
                                            </script>

                                        </td>
                                        <td colspan="6"> <strong> Casualty: </strong>


                                            <label>
                                                <input type="checkbox" class="form-check-input casualty-checkbox-group" name="casualty" value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="checkbox" class="form-check-input casualty-checkbox-group" name="casualty" value="No">
                                                No
                                            </label>

                                            <br>
                                            No. of Cas: <input type="number" name="no_cas" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">

                                            <script>
                                                $(document).ready(function() {
                                                    $('.casualty-checkbox-group').click(function() {
                                                        $('.casualty-checkbox-group').not(this).prop('checked', false);
                                                    });
                                                });
                                            </script>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"> <strong> AED/Defib: </strong>
                                            <label>

                                                <input type="checkbox" class="form-check-input defib-checkbox-group" name="defib" value="Yes">
                                                Yes
                                            </label>
                                            <label>
                                                <input type="checkbox" class="form-check-input defib-checkbox-group" name="defib" value="No">
                                                No
                                            </label>
                                        </td>

                                        <script>
                                            $(document).ready(function() {
                                                $('.defib-checkbox-group').click(function() {
                                                    $('.defib-checkbox-group').not(this).prop('checked', false);
                                                });
                                            });
                                        </script>
                                        <td colspan="6"> <strong> Ambulance req: </strong>

                                            <label>
                                                <input type="checkbox" class="form-check-input ambulance-checkbox-group" name="ambulance_req" value="Yes"> Yes
                                            </label>
                                            <label>
                                                <input type="checkbox" class="form-check-input ambulance-checkbox-group" name="ambulance_req" value="No"> No
                                            </label>
                                            <br>
                                            specify: <input type="text" name="amb_spec" value="" style="border: none; background-color: transparent; border-bottom: 1px solid black;">
                                        </td>
                                        <script>
                                            $(document).ready(function() {
                                                $('.ambulance-checkbox-group').click(function() {
                                                    $('.ambulance-checkbox-group').not(this).prop('checked', false);
                                                });
                                            });
                                        </script>

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
                                        <td>
                                            <input type="hidden" name="equip_name[]" value="Self-Contained Breathing Apparatus">Self-Contained Breathing
                                            Apparatus
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>

                                    </tr>

                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Spreader">Electric
                                            Spreader</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Cutter">Electric
                                            Cutter</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Electric Ram">Electric Ram
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Hand Pump">Hydraulic Hand Pump</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Combi-tool">Hydraulic Combi-tool</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Hydraulic Ram">Hydraulic Ram
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Chainsaw">Chainsaw</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Cutters Edge">Cutters Edge
                                        </td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="High Pressure Lift Bag">High
                                            Pressure Lift Bag</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="High Lift Jack">High Lift
                                            Jack</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Remote Area Lighting System RALS">Remote Area Lighting System
                                            RALS</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Ventilation Blower">Ventilation Blower</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Tripod and Winch">Tripod and
                                            Winch</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Rope Rescue Equipment">Rope
                                            Rescue Equipment</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="equip_name[]" value="Other">Other</td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Used"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Checked"></td>
                                        <td><input type="checkbox" class="form-check-input" name="equip_status[]" value="Missing"></td>
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
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="colstruct">
                                                        Collapse Structure
                                                        Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="boom"> Boom
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="barricade"> Barricade
                                                    </label>
                                                </div>

                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="confined"> Confined
                                                        Space Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="outrigger"> Outrigger
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="structural">
                                                        Structural
                                                        Extrication
                                                    </label>
                                                </div>
                                            </div>

                                            <div style="display: flex; flex-wrap: wrap;">


                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="water"> Water Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="tower"> Tower Light
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="vehicular"> Vehicular
                                                        Extrication
                                                    </label>
                                                </div>

                                            </div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="patient"> Patient
                                                        Retrieval
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="winch"> Winch
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="wildlife"> Wildlife Rescue
                                                    </label>
                                                </div>
                                            </div>

                                            <div style="display: flex; flex-wrap: wrap;">

                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value=" "> High Angle
                                                        Rescue
                                                    </label>
                                                </div>
                                                <div style="flex: 10%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="hazmat"> HazMat
                                                    </label>
                                                </div>
                                                <div style="flex: 20%; padding-right: 10px;">
                                                    <label>
                                                        <input type="checkbox" class="form-check-input" name="interventions[]" value="generator"> Generator
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
                                            <input type="text" name="witnesses" value="">
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