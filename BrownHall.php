<?php 

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brown Hall Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#d0d4d9;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <div class="p-3 mb-2 bg-dark-subtle text-success">
        <br>

        <div class="position-relative">
            <div class="position-absolute top-0 start-50 translate-middle">
                <h1 class="display-5">
                    <b>Brown Hall</b>
                </h1>
            </div>
        </div>

        <div class="position-absolute top-0 start-0">
            <img src="LFC_logo_FullColor_WT.png" alt="Logo" width="100" height="110"
                class="d-inline-block align-text-top">
        </div>

        <br><br><br><br>

        



            <div class="card shadow-sm">
                <div class="card-header bg-success text-light">
                    <h4 class="mb-0">Current Records</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle">
                            <thead class="table-success">
                                <tr>
                                    <th><center>Room #</center></th>
                                    <th><center>Temperature</center></th>
                                    <th><center>Electricity Usage</center></th>
                                </tr>
                            </thead>

                            <tbody>
                                if ($result->num_rows > 0) {

                                    // Output each row
                                    while($row = $result->fetch_assoc()) {
                                
                                        echo "<tr>
                                                <td><a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover" href='details.html?room_num='>" . htmlspecialchars($row["room_id"]) . "</a></td>
                                                <td>" . htmlspecialchars($row["live_temperature"]) . "</td>
                                                <td>" . htmlspecialchars($row["electricity_kwh"]) . "</td>
                                              </tr>";
                                    }
                                
                                } else {
                                    echo "<tr><td colspan='4'>No results found</td></tr>";
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
   

</body>

</html>

<?php
$conn->close();
?>