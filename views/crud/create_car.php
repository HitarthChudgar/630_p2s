<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$distance = $car = $price = "";
$distance_err = $car_err = $price_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (empty($distance_err) && empty($price_err) && empty($car_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO trip (distance, price, car) VALUES (?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_distance, $param_price, $param_car);

            // Set parameters
            $param_distance = $distance;
            $param_price = $price;
            $param_car = $car;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add car/trip record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="crud_car.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>