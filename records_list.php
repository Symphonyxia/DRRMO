<?php
include 'header.php';


?>

<style>
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }

    .table {

        justify-content: center;
        align-items: center;





    }
</style>

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


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($pdo) {

                                $limit = 10; // Number of results per page
                                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1
                                $offset = ($page - 1) * $limit; // Offset for the SQL query

                                $search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search term

                                // Initialize $totalRows to avoid undefined variable warning
                                $totalRows = 0;

                                $sql = "SELECT id, date, loc_type, incident_loc FROM usar"; // Include 'id' column in the SELECT statement
                                $stmt = $pdo->query($sql);


                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $row['date'] . "</td>";
                                        echo "<td class='text-center'>" . $row['loc_type'] . "</td>";
                                        echo "<td class='text-center'>" . $row['incident_loc'] . "</td>";


                                        echo "<td class='text-center'><a href='records.php?id=" . $row['id'] . "' class='btn btn-primary'>View </a></td>";


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