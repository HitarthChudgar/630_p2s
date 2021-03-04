<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        #map {
            height: 500px;
            width: 50%;
            margin: auto;
            background-color: grey;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #panel {
            height: 100%;
            width: null;
            background-color: white;
            z-index: 1;
            overflow-x: hidden;
            transition: all .2s ease-out;
        }

        .open {
            width: 250px;
        }

        .hero {
            width: 100%;
            height: auto;
            max-height: 166px;
            display: block;
        }

        .place,
        p {
            font-family: 'open sans', arial, sans-serif;
            padding-left: 18px;
            padding-right: 18px;
        }

        .details {
            color: darkslategrey;
        }

        a {
            text-decoration: none;
            color: cadetblue;
        }
    </style>
    <title>Sign In</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container my-3">
        <div class="dropdown mx-auto my-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <div id="panel"></div>

    <!-- Map appears here -->
    <div id="map"></div>
    </div>


    <script>
        /* Note: This example requires that you consent to location sharing when
         * prompted by your browser. If you see the error "Geolocation permission
         * denied.", it means you probably did not give permission for the browser * to locate you. */
        let pos;
        let map;
        let bounds;
        let infoWindow;
        let currentInfoWindow;
        let service;
        let infoPane;

        function initMap() {
            // Initialize variables
            bounds = new google.maps.LatLngBounds();
            infoWindow = new google.maps.InfoWindow;
            currentInfoWindow = infoWindow;
            /* TODO: Step 4A3: Add a generic sidebar */
            infoPane = document.getElementById('panel');

            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: pos,
                        zoom: 15
                    });
                    bounds.extend(pos);

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);

                    // Call Places Nearby Search on user's location
                    getNearbyPlaces(pos);
                }, () => {
                    // Browser supports geolocation, but user has denied permission
                    handleLocationError(true, infoWindow);
                });
            } else {
                // Browser doesn't support geolocation
                handleLocationError(false, infoWindow);
            }
        }

        // Handle a geolocation error
        function handleLocationError(browserHasGeolocation, infoWindow) {
            // Set default location to Sydney, Australia
            pos = {
                lat: -33.856,
                lng: 151.215
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: pos,
                zoom: 15
            });

            // Display an InfoWindow at the map center
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Geolocation permissions denied. Using default location.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
            currentInfoWindow = infoWindow;

            // Call Places Nearby Search on the default location
            getNearbyPlaces(pos);
        }

        // Perform a Places Nearby Search Request
        function getNearbyPlaces(position) {
            let request = {
                location: position,
                rankBy: google.maps.places.RankBy.DISTANCE,
                keyword: 'floral'
            };

            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, nearbyCallback);
        }

        // Handle the results (up to 20) of the Nearby Search
        function nearbyCallback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                createMarkers(results);
            }
        }

        // Set markers at the location of each place result
        function createMarkers(places) {
            places.forEach(place => {
                let marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    title: place.name
                });

                /* TODO: Step 4B: Add click listeners to the markers */
                // Add click listener to each marker
                google.maps.event.addListener(marker, 'click', () => {
                    let request = {
                        placeId: place.place_id,
                        fields: ['name', 'formatted_address', 'geometry', 'rating',
                            'website', 'photos'
                        ]
                    };

                    /* Only fetch the details of a place when the user clicks on a marker.
                     * If we fetch the details for all place results as soon as we get
                     * the search response, we will hit API rate limits. */
                    service.getDetails(request, (placeResult, status) => {
                        showDetails(placeResult, marker, status)
                    });
                });

                // Adjust the map bounds to include the location of this marker
                bounds.extend(place.geometry.location);
            });
            /* Once all the markers have been placed, adjust the bounds of the map to
             * show all the markers within the visible area. */
            map.fitBounds(bounds);
        }

        /* TODO: Step 4C: Show place details in an info window */
        // Builds an InfoWindow to display details above the marker
        function showDetails(placeResult, marker, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                let placeInfowindow = new google.maps.InfoWindow();
                let rating = "None";
                if (placeResult.rating) rating = placeResult.rating;
                placeInfowindow.setContent('<div><strong>' + placeResult.name +
                    '</strong><br>' + 'Rating: ' + rating + '</div>');
                placeInfowindow.open(marker.map, marker);
                currentInfoWindow.close();
                currentInfoWindow = placeInfowindow;
                showPanel(placeResult);
            } else {
                console.log('showDetails failed: ' + status);
            }
        }

        /* TODO: Step 4D: Load place details in a sidebar */
        // Displays place details in a sidebar
        function showPanel(placeResult) {
            // If infoPane is already open, close it
            if (infoPane.classList.contains("open")) {
                infoPane.classList.remove("open");
            }

            // Clear the previous details
            while (infoPane.lastChild) {
                infoPane.removeChild(infoPane.lastChild);
            }

            /* TODO: Step 4E: Display a Place Photo with the Place Details */
            // Add the primary photo, if there is one
            if (placeResult.photos) {
                let firstPhoto = placeResult.photos[0];
                let photo = document.createElement('img');
                photo.classList.add('hero');
                photo.src = firstPhoto.getUrl();
                infoPane.appendChild(photo);
            }

            // Add place details with text formatting
            let name = document.createElement('h1');
            name.classList.add('place');
            name.textContent = placeResult.name;
            infoPane.appendChild(name);
            if (placeResult.rating) {
                let rating = document.createElement('p');
                rating.classList.add('details');
                rating.textContent = `Rating: ${placeResult.rating} \u272e`;
                infoPane.appendChild(rating);
            }
            let address = document.createElement('p');
            address.classList.add('details');
            address.textContent = placeResult.formatted_address;
            infoPane.appendChild(address);
            if (placeResult.website) {
                let websitePara = document.createElement('p');
                let websiteLink = document.createElement('a');
                let websiteUrl = document.createTextNode(placeResult.website);
                websiteLink.appendChild(websiteUrl);
                websiteLink.title = placeResult.website;
                websiteLink.href = placeResult.website;
                websitePara.appendChild(websiteLink);
                infoPane.appendChild(websitePara);
            }

            // Open the infoPane
            infoPane.classList.add("open");
        }
    </script>

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