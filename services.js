//this will set the map and return the distance
//INIT MAP is stupid, just know it takes 2 locations and returns the distance between them.

function initMap(location, location2) {

    //This function will draw a line between two points on the map
    //https://cloud.google.com/blog/products/maps-platform/how-calculate-distances-map-maps-javascript-api
    function haversine_distance(mk1, mk2) {
        var R = 3958.8; // Radius of the Earth in miles
        var rlat1 = mk1.position.lat() * (Math.PI / 180); // Convert degrees to radians
        var rlat2 = mk2.position.lat() * (Math.PI / 180); // Convert degrees to radians
        var difflat = rlat2 - rlat1; // Radian difference (latitudes)
        var difflon = (mk2.position.lng() - mk1.position.lng()) * (Math.PI / 180); // Radian difference (longitudes)

        var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
        return d * 1.60934; //converted to km
    }

    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
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


    var marker2 = new google.maps.Marker({
        position: location2,
        map: map
    });
    var infoWindow2 = new google.maps.InfoWindow({
        content: "<h5> dest </h5>"
    });
    marker2.addListener("click", function() {
        infoWindow2.open(map, marker2);
    });

    // Draw a line showing the straight distance between the markers
    var line = new google.maps.Polyline({
        path: [location, location2],
        map: map
    });

    var distance = haversine_distance(marker, marker2);

    return distance;

}


//this will update the data in the html form according to the input in the form. FOR SERVICE PAGE A

function serviceAData(event) {
    var sourcelocation = {

        lat: Number(document.getElementById('slat').value),
        lng: Number(document.getElementById('slng').value),
    };

    var destinationlocation = {
        lat: Number(document.getElementById('dlat').value),
        lng: Number(document.getElementById('dlng').value),
    };


    var cars = {
        tesla:15,
        honda:7,
        bmw:12
    }
    var carID = document.getElementById("car").value; //getting car info from form
    var carPrice = cars[carID]; //defining car price
    var datetime = document.getElementById("datetime"); //getting datetime from form
    var distance = initMap(sourcelocation, destinationlocation); //map
    var totalPrice = Number(cars[carID] * distance);


    // Updating the values of the map and text
    document.getElementById('distanceText').innerHTML = distance.toFixed(2) + " km."; //distance
    document.getElementById("datetimeText").innerHTML = datetime.value.toString(); //date
    document.getElementById("carID").innerHTML = carID; //car
    document.getElementById("carPriceText").innerHTML = "$" + carPrice; //carprice

    //totalprice
    document.getElementById('totalPriceText').innerHTML = "$" + totalPrice.toFixed(2);

    //this dataObject is being used by setTrip() to get form data and send it to the trip table
    //can be used by other functions as well to get form data.
    var data = {
        slat: sourcelocation.lat,
        slng: sourcelocation.lng,
        dlat: destinationlocation.lat,
        dlng: destinationlocation.lng,
        distance: distance,
        car: carID,
        price: totalPrice
    };

    return data
};




//this will update the data in the html form according to the input in the form (SHOPS).

function getdata() { //getting source location (fixed for now)
    var sourcelocation = {
        lat: 40,
        lng: -80
    };
    var destination = document.getElementById('destination').value.split(","); //getting destination from form
    var destinationlocation = {
        lat: Number(destination[2]),
        lng: Number(destination[3]),
    };
    var carID = document.getElementById("car").value; //getting car info from form
    var carPrice = 10; //defining car price
    var datetime = document.getElementById("datetime"); //getting datetime from form
    var distance = initMap(sourcelocation, destinationlocation); //map
    var totalPrice = Number(carPrice * distance);


    // Updating the values of the map and text
    document.getElementById('distanceText').innerHTML = distance.toFixed(2) + " km."; //distance
    document.getElementById("datetimeText").innerHTML = datetime.value.toString(); //date
    document.getElementById("carID").innerHTML = carID; //car
    document.getElementById("carPriceText").innerHTML = "$" + carPrice; //carprice

    //totalprice
    document.getElementById('totalPriceText').innerHTML = "$" + totalPrice.toFixed(2);
};

//sending post request with javascript for servicepageA - add new row to trip table.

function setTrip() {
    var dataObject = serviceAData();
    //data
    var data = new FormData();
    data.append("slat", dataObject.slat);
    data.append("slng", dataObject.slng);
    data.append("dlat", dataObject.dlat);
    data.append("dlng", dataObject.dlng);
    data.append("distance", dataObject.distance);
    data.append("car", dataObject.car);
    data.append("price", dataObject.price);

    //AJAX - this code sends an HTTP request without the submit form using JavaScript.
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "addTripData.php");
    xhr.onload = function() {
        document.getElementById('response').innerHTML = this.response;
    };
    xhr.send(data);
}
