<?php
include 'header.php';
include 'delete.php';
?>

<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="title" style="margin-left: 50px;">
                        Records List
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-success alert-dismissible fade show" id="deleteWarning" style="display: none; position: absoulute; top: 0px; left: 50%; transform: translateX(-50%); border-radius: 10px;" role="alert">
        Data deleted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <section class="example">
        <div class="card card-body col-lg-12">
            <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered col-lg-8">
                        <thead>
                            <tr>
                                <th class="text-center"> Date</th>
                                <th class="text-center">Location Type</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">View Details</th>
                                <th class="text-center">Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($pdo) {
                                $sql = "SELECT id, date, loc_type, incident_loc FROM usar";
                                $stmt = $pdo->query($sql);

                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $row['date'] . "</td>";
                                        echo "<td class='text-center'>" . $row['loc_type'] . "</td>";
                                        echo "<td class='text-center'>" . $row['incident_loc'] . "</td>";
                                        echo "<td class='text-center'><a href='records.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a></td>";
                                        echo "<td class='text-center'><button class='btn btn-danger' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button></td>"; // Add delete button
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>Database connection failed.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </tbody>
                    </table>

                    <div class="alert alert-warning alert-dismissible fade show" id="deleteWarning" style="display: none;" role="alert">
                        Error deleting record. Please try again later.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>


<script>
    function deleteRecord(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            // Send AJAX request to delete record
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Display success message
                        document.getElementById('deleteWarning').innerHTML = 'Data deleted successfully.';
                        document.getElementById('deleteWarning').style.display = 'block';
                    
                     // Reload page after successful deletion
                     setTimeout(function() {
                            window.location.reload();
                        }, 500); 
                    } else {
                        // Display error message
                        var errorMessage = xhr.responseText.trim();
                        if (errorMessage) {
                            // Display error message received from PHP
                            alert(errorMessage);
                        } else {
                            // Default error message if no specific message received
                            alert('Error deleting record. Please try again later.');
                        }
                    }
                }
            };
            xhr.open('POST', 'delete.php'); // Replace 'delete.php' with the URL to your delete script
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id);
        }
    }
</script>
