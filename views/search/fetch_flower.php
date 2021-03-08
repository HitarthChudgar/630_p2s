<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "servicesdb";
$con = new mysqli($localhost, $username, $password, $dbname);
if ($con->connect_error) {
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM flowers";
if (isset($_GET['search'])) {
    $flowerid = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM flowers WHERE flowerid ='$flowerid'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Flowers</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container col-md-4 col-md-offset-4">
        <label class="font-weight-bold my-3">Search Flowers</label>
        <form action="" method="GET">
            <input type="text" placeholder="Type the id here" name="search">&nbsp;
            <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
        </form>
        <table class="table table-striped table-responsive fixed-bottom">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Storecode</th>
                <th>Price</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['flowerid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['storecode']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>