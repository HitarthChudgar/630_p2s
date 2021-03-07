<?php
    include 'includes/connect.php';
    include 'includes/car.php';
    include 'includes/flower.php';
    ?>
<!DOCTYPE html>
<html>

<head>
    <titile>
        </title>
        <link rel="stylesheet" href="serviceStyle.css">
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgYgP7YmAUSoL9oolBwY-Tp00J91my7J8&callback=initMap"></script>
        <script src="scripts.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>



    <nav class="navbar navbar-inverse"> 
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="Home.php" class="navbar-brand">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">System Logo</a></li>
                <li><a href="About.html">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Types of Services</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="Signup.php">Sign Up</a></li>
            </ul>
            
         
        </div>
    </nav>

    <div class="parallax">
    <div>
    
    <!-- Form -->
    <div id="form">
        <form onchange="getdataA()">
            <label for="car">Choose the Car</label><br>
            <select name="car" id="car" required>

                <option disabled selected value> -- select an option -- </option>

                <!--getting options from php class of cars-->
                <?php
                $cars = new Car();
                $cars->showCarOptions();
                ?>
            </select>
                
            <table id="picklocation">
                    <td>
                        <label for="dlat">Destination Latitude</label><br>
                        <input type="number" id="dlat" name="dlat"><br><br></td>
                    </td>

                    <td>
                        <label for="dlng">Destination Longitude</label><br>
                        <input type="number" id="dlng" name="dlng"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="slat">Source Latitude</label><br>
                        <input type="number" id="slat" name="slat"><br><br></td>
                    </td>

                    <td>
                        <label for="slng">Source Longitude</label><br>
                        <input type="number" id="slng" name="slng"><br><br>
                    </td>
                </tr>
            </table>

            <label for="datetime">Date and Time</label>
            <input type="datetime-local" id="datetime" name="datetime">
        </form>
    </div>

    <!-- End of Form Code-->

    <div id="order">
    <table>
        <tr>
            <th>Date</th>
            <th>Distance</th>
            <th>Car ID</th>
            <th>Car Price (per km)</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td id="datetimeText">
                <p></p>
            </td>
            <td id="distanceText">
                <p></p>
            </td>
            <td id="carID">
                <p></p>
            </td>
            <td id="carPriceText">
                <p></p>
            </td>
            <td id="totalPriceText">
                <p></p>
            </td>
        </tr>
    </table>
    </div>

    <div id="map"></div>

    <button id="post-btn" type="button" onclick="setTrip()">Place Order</button>

    <h2 id="response"></h2>
    <script>

        </script>
    </div>
    </div>
</body>

</html>