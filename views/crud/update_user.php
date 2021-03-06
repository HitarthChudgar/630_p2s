<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $telno = $email = $citycode = "";
$username_err = $telno_err = $email_err = $citycode_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Please enter a username.";
    } elseif (!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $username_err = "Please enter a valid username.";
    } else {
        $username = $input_username;
    }

    // Validate telno
    $input_telno = trim($_POST["telno"]);
    if (empty($input_telno)) {
        $telno_err = "Please enter an telephone.";
    } else {
        $telno = $input_telno;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email.";
    } else {
        $email = $input_email;
    }

    // Validate citycode
    $input_citycode = trim($_POST["citycode"]);
    if (empty($input_citycode)) {
        $citycode_err = "Please enter an citycode.";
    } else {
        $citycode = $input_citycode;
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($telno_err) && empty($email_err) && empty($citycode_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET username=?, telno=?, email=?, citycode=? WHERE id=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi", $param_username, $param_telno, $param_email, $param_citycode, $param_id);

            // Set parameters
            $param_username = $username;
            $param_telno = $telno;
            $param_email = $email;
            $param_citycode = $citycode;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: crud_user.php");
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
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter

        $id =  trim($_GET["id"]);
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $username = $row["username"];
                    $telno = $row["telno"];
                    $email = $row["email"];
                    $citycode = $row["citycode"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error_user.php");
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
        header("location: error_user.php");
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
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telno_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <textarea name="telno" class="form-control"><?php echo $telno; ?></textarea>
                            <span class="help-block"><?php echo $telno_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($citycode_err)) ? 'has-error' : ''; ?>">
                            <label>City Code</label>
                            <input type="text" name="citycode" class="form-control" value="<?php echo $citycode; ?>">
                            <span class="help-block"><?php echo $citycode_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="crud_user.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>