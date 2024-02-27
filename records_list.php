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
                    <h3 class="title">
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
                                <th class="text-center">Type of Call</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">View</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($pdo) {
                                $sql = "SELECT id, date, call_type, incident_loc FROM usar"; // Include 'id' column in the SELECT statement
                                $stmt = $pdo->query($sql);

                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $row['date'] . "</td>";
                                        echo "<td class='text-center'>" . $row['call_type'] . "</td>";
                                        echo "<td class='text-center'>" . $row['incident_loc'] . "</td>";

                                        // Create a link to another PHP file with the record ID as a query parameter
                                        echo "<td class='text-center'><a href='records.php?id=" . $row['id'] . "'>View Details</a></td>";

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