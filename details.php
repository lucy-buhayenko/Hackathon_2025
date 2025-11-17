<?php
if (!isset($_GET['room_id']) || !is_numeric($_GET['room_id'])) {
    die("Invalid Room Number");
}

$id = intval($_GET['room_id']);

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM brown_hall WHERE room_id = $id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("No record found.");
}

$row = $result->fetch_assoc();
?>

<!doctype html>
<html>
<head>
    <title>Extended Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>



    <div class="card shadow-sm">
        <div class="card-header bg-success text-light">
            <h4 class="mb-0">Details for Room: <?php echo htmlspecialchars($row['room_id']); ?></h4>
        </div>

        <div class="p-3 mb-2 bg-light-subtle text-info-emphasis">
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">
                           Time Stamp
                        </th>
                        <th scope="col">
                            Temperature
                        </th>
                        <th scope="col">
                            Occupancy Status
                        </th>
                        <th scope="col">
                            Capacity
                        </th>
                        <th scope="col">
                            Electricity Usage (kwh)
                        </th>
                        <th scope="col">
                            Sq. Footage per Person
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo htmlspecialchars($row['timestamp']); ?></td>
                        <td> <?php echo htmlspecialchars($row['live_temperature']); ?></td>
                        <td> <?php echo htmlspecialchars($row['occupancy_status']); ?></td>
                        <td> <?php echo htmlspecialchars($row['capacity']); ?></td>
                        <td> <?php echo htmlspecialchars($row['electricity_kwh']); ?></td>
                        <td> <?php echo htmlspecialchars($row['approx_sqft_per_person']); ?></td>
                    </tr>
                </tbody>
            </table>






<p><a href="BrownHall.html">Back to Brown Hall</a></p>

</body>
</html>

<?php
$conn->close();
?>
