<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "servicesdb";
$con = new mysqli($localhost, $username, $password, $dbname);
if ($con->connect_error) {
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM users";
if (isset($_GET['search'])) {
    $userid = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM users WHERE id ='$userid'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Users</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <label>Search Users</label>
        <form action="" method="GET">
            <input type="text" placeholder="Type the id here" name="search">&nbsp;
            <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
        </form>
        <h2>List of users</h2>
        <table class="table table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Created At</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>