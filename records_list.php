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
                                    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                                }
                            } else {
                                echo "Database connection failed.";
                            }
                            ?>

                        </tbody>
                    </table>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</article>
<script>
    function deleteRecord(id) {
        console.log('Delete record with ID:', id); // Log the ID being deleted
        if (confirm('Are you sure you want to delete this record?')) {
            // Send AJAX request to delete record
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Reload page after successful deletion
                        window.location.reload();
                    } else {
                        console.error('Error deleting record');
                    }
                }
            };
            xhr.open('POST', 'delete.php'); // Replace 'delete.php' with the URL to your delete script
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id);
        }
    }
</script>