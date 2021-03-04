<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sign In</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container my-3">
        <div class="dropdown mx-auto my-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select your desired item
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item drop" href="#">Car</a>
                <a class="dropdown-item drop" href="#">Items</a>
            </div>
        </div>
        <div class="row car carH carV">
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Sedan</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">100$</p>
                        <a href="#" class="btn btn-primary">Take Sedan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Luxury</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">150$</p>
                        <a href="#" class="btn btn-primary">Take Sedan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Coupe</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">200$</p>
                        <a href="#" class="btn btn-primary">Take Coupe</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">AWD</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">300$</p>
                        <a href="#" class="btn btn-primary">Take AWD</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row item itemC itemV">
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Sedan</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">100$</p>
                        <a href="#" class="btn btn-primary">Take Sedan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Luxury</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">150$</p>
                        <a href="#" class="btn btn-primary">Take Sedan</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">Coupe</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">200$</p>
                        <a href="#" class="btn btn-primary">Take Coupe</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img class="card-img-top" src="https://via.placeholder.com/268x180" alt="Card image cap">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Car Model:</h5>
                        <p class="card-text">AWD</p>
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text text-success">300$</p>
                        <a href="#" class="btn btn-primary">Take AWD</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>
    <script>
        function initMap() {

            var location = {
                lat: 43.7272,
                lng: -79.4121
            };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });

            var infoWindow = new google.maps.InfoWindow({
                content: "<h5> source </h5>"
            });
            marker.addListener("click", function() {
                infoWindow.open(map, marker);
            });


        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjnMFEfacClzvqed6Am20ggXcbR8opUOY&callback=initMap">
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="services.js"></script>
</body>

</html>