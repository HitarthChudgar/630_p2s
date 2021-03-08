<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$distance = $car = $price = "";
$distance_err = $car_err = $price_err = "";

// Processing form data when form is submitted
if (isset($_POST["tripid"]) && !empty($_POST["tripid"])) {
    // Get hidden input value
    $tripid = $_POST["tripid"];

    // Validate distance
    $input_distance = trim($_POST["distance"]);
    if (empty($input_distance)) {
        $distance_err = "Please enter a distance.";
    } else {
        $distance = $input_distance;
    }

    // Validate car
    $input_car = trim($_POST["car"]);
    if (empty($input_car)) {
        $car_err = "Please enter an car.";
    } else {
        $car = $input_car;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price.";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Please enter a positive integer value.";
    } else {
        $price = $input_price;
    }

    // Check input errors before inserting in database
    if (empty($distance_err) && empty($car_err) && empty($price_err)) {
        // Prepare an update statement
        $sql = "UPDATE trip SET distance=?, car=?, price=? WHERE tripid=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_distance, $param_car, $param_price, $param_tripid);

            // Set parameters
            $param_distance = $distance;
            $param_car = $car;
            $param_price = $price;
            $param_tripid = $tripid;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: crud_car.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["tripid"]) && !empty(trim($_GET["tripid"]))) {
        // Get URL parameter
        $tripid =  trim($_GET["tripid"]);

        // Prepare a select statement
        $sql = "SELECT * FROM trip WHERE tripid = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_tripid);

            // Set parameters
            $param_tripid = $tripid;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $distance = $row["distance"];
                    $car = $row["car"];
                    $price = $row["price"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error_car.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error_car.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($distance_err)) ? 'has-error' : ''; ?>">
                            <label>Distance</label>
                            <input type="text" name="distance" class="form-control" value="<?php echo $distance; ?>">
                            <span class="help-block"><?php echo $distance_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($car_err)) ? 'has-error' : ''; ?>">
                            <label>Car</label>
                            <textarea name="car" class="form-control"><?php echo $car; ?></textarea>
                            <span class="help-block"><?php echo $car_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err; ?></span>
                        </div>
                        <input type="hidden" name="tripid" value="<?php echo $tripid; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="crud_car.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>