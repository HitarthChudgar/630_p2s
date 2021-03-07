<!DOCTYPE html>
<html lang="en">
<?php 
include 'car.php';
require('config2.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>TakeTaxi Services</title>
</head>

<body>
    <?php include 'views/navbar.php'; ?>
    
 

    <!-- Map appears here -->
    <div id="map"></div>
    <div id="form">
        <form onchange="getDataA()"> 
            <label for="car">Choose the Car</label><br>
            <select name="car" id="car" required>
                <option value="honda"> Honda</option>
                <option value="tesla"> Tesla</option>
                <option value="bmw"> BMW</option>
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



    <button id="post-btn" type="button" onclick="setTrip()">Place Order</button>

    <h2 id="response"></h2>
    </div>
    </div>

      
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjnMFEfacClzvqed6Am20ggXcbR8opUOY&libraries=places&callback=initMap">
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="services.js"></script>
</body>

</html>