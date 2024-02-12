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

    .print-header,
    .print-footer,
    .print-button {
        display: none;
    }

    /* Maintain layout for printing */
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
</style>



<div class="container">

    <!-- ... Your existing code ... -->

    <br>
    <div class="text-center print-button">
        <button class="btn btn-primary" onclick="printContent()">Print</button>
    </div>

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
                                <th>Call Revd</th>
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
                                        <input type="text" class="form-check-input" name="responseType[]" value="">
                                        Others:___________
                                    </label>
                                </th>
                                <th>Enroute</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>


                            <tr>
                                <th colspan="14">Location Type:
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="airport"> Airport
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="Hospital"> Hospital
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="nursing"> Nursing Home
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="residence"> Home/Residence
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="bridge"> Bridge
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="bar"> Restuarant/Bar
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="farm"> Farm
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="school"> School
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="clinic"> Clinic/RHU
                                    </label>

                                </th>
                                <th>At scn</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th colspan="14">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="street"> Highway/Street
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="bldg"> Public Building
                                        <input type="text" class="form-check-input" name="responseType[]" value="">
                                        Others:___________
                                    </label>

                                </th>
                                <th>Descn</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        

                            <tr>
                                <th colspan="14">SRR Services:</th>
                                <th>In svc</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="14">Type of Call:

                                <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="fire"> Fire
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="vehicular"> Vehicular Accident
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="earthquake"> Earthquake
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="collapse"> Collapse
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="suicide"> Suicide
                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="drowning"> Drowning
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="storm"> Storm Surge
                                       
                                    </label>
                                </th>
                                <th>Op Tm</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="14">

                                <label class="form-check-label">

                                        <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="flooding"> Flooding
                                            <input type="checkbox" class="form-check-input" name="responseType[]"
                                            value="roving"> Roving/Inspection
                                        <input type="text" class="form-check-input" name="responseType[]" value="">
                                        Others:___________

                                    </label>
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
                                        <td></td>

                                        <th>Terrain</td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th colspan="6">CPR:</th>
                                        <th colspan="6">Terrain</td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">AED/Defib:</th>
                                        <th colspan="6">Ambulance req:</td>
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


                        <form action="" method="post">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="6">Intervensions:</th>
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
                        </form>

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
                            <td></td>
                            <td>Barriers</td>
                        </tr>
                        <tr>
                            <td>=</td>
                            <td>Lift</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Cut</td>
                        </tr>
                        <tr>
                            <td>
                                <
                            <td>Spread</td>
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
                            <th colspan="5" style="height: 100px;"></th>
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
