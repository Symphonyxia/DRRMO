<?php
include 'header.php';
include 'delete.php';

$limit = 10; // Number of results per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1
$offset = ($page - 1) * $limit; // Offset for the SQL query

// Check if search term is provided
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Construct the SQL query with pagination and search
$sql = "SELECT id, date, loc_type, incident_loc FROM usar WHERE 1=1"; // 1=1 to ensure easy appending of conditions

// Add search condition if search term is provided
if (!empty($search)) {
    $sql .= " AND (date LIKE :search OR loc_type LIKE :search OR incident_loc LIKE :search)";
}

// Prepare statement
$stmt = $pdo->prepare($sql);

// Bind search parameter if applicable
if (!empty($search)) {
    $searchParam = "%$search%";
    $stmt->bindValue(':search', $searchParam, PDO::PARAM_STR);
}

// Execute the statement
$stmt->execute();

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Total rows count
$totalRows = count($results);

// Calculate the total number of pages
$totalPages = ceil($totalRows / $limit);
?>


<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row form-group">
                <div class="col-sm-6">
                    <h3 class="title" style="margin-left: 50px;">Records List <a href="csv.php" class="btn btn-primary">Export to CSV</a></h3>



                </div>
            </div>
        </div>
    </div>



    <section class="row">
        <div class="card col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" style="display: none; position: absolute; top: 0px; left: 50%; transform: translateX(-50%); border-radius: 10px;" role="alert">
                Data deleted successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-warning alert-dismissible fade show deleteWarning" style="display: none;" role="alert">
                Error deleting record. Please try again later.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <br>
                    <div class="card-title-body">
                        <br>
                        <form method="GET" action="">
                            <label for="search">Search:</label>
                            <input type="text" name="search" id="search" value="<?php echo $search; ?>">
                            <button type="submit" class="btn btn-primary btn-sm rounded-s">Search</button>
                            <?php
                            // Display cancel search button if a search term is provided
                            if (!empty($search)) {
                                echo '<a href="?page=1" class="btn btn-warning btn-sm rounded-s">Cancel Search</a>';
                            }
                            ?>
                        </form>
                        <br>
                    </div>
                    <section class="">
                        <table class="table table-bordered col-lg-8">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Location Type</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">View Details</th>
                                    <th class="text-center">Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $row) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $row['date'] . "</td>";
                                    echo "<td class='text-center'>" . $row['loc_type'] . "</td>";
                                    echo "<td class='text-center'>" . $row['incident_loc'] . "</td>";
                                    echo "<td class='text-center'><a href='records.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a></td>";
                                    echo "<td class='text-center'><button class='btn btn-danger' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button></td>"; // Add delete button
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </section>

                </div>
            </div>
        </div>
    </section>
    <nav class="text-xs-center">
        <ul class="pagination justify-content-center">
            <div class="pagination">
                <?php
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
                } else {
                    echo "<li class='page-item disabled'><span class='page-link'>&laquo; Previous</span></li>";
                }
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                }
                if ($page < $totalPages) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
                } else {
                    echo "<li class='page-item disabled'><span class='page-link'>Next &raquo;</span></li>";
                }
                ?>
            </div>
        </ul>
    </nav>
</article>

<script>
    function deleteRecord(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.querySelector('.deleteWarning').innerHTML = 'Data deleted successfully.';
                        document.querySelector('.deleteWarning').style.display = 'block';
                        setTimeout(function() {
                            window.location.reload();
                        }, 500);
                    } else {
                        var errorMessage = xhr.responseText.trim();
                        if (errorMessage) {
                            alert(errorMessage);
                        } else {
                            alert('Error deleting record. Please try again later.');
                        }
                    }
                }
            };
            xhr.open('POST', 'delete.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id);
        }
    }
</script>