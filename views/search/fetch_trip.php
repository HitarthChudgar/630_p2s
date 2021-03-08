<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "servicesdb";
$con = new mysqli($localhost, $username, $password, $dbname);
if ($con->connect_error) {
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM trip";
if (isset($_GET['search'])) {
    $car = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM trip WHERE car ='$car'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Car</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include 'views\navbar.php'; ?>
    <div class="container">
        <label>Search Trips</label>
        <form action="" method="GET">
            <input type="text" placeholder="Type the distance here" name="search">&nbsp;
            <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
        </form>
        <table class="table table-striped table-responsive fixed-bottom">
            <tr>
                <th>Source Lat</th>
                <th>Source Lng</th>
                <th>Destination Lat</th>
                <th>Destination Lng</th>
                <th>Distance</th>
                <th>Car</th>
                <th>Price</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['sourcelat']; ?></td>
                    <td><?php echo $row['sourcelng']; ?></td>
                    <td><?php echo $row['destinationlat']; ?></td>
                    <td><?php echo $row['destinationlng']; ?></td>
                    <td><?php echo $row['distance']; ?></td>
                    <td><?php echo $row['car']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>