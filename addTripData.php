<?php

$username = 'root';
$password = '';
$dbname = 'servicesdb';


$conn = new mysqli('localhost', $username,$password,$dbname);

echo "Database Successfully connected";

if (isset($_POST['slat']) && isset($_POST['slng']) && isset($_POST['dlat']) && isset($_POST['dlng']) && isset($_POST['distance']) && isset($_POST['car']) && isset($_POST['price'])) {
    $sourselat = $_POST['slat'];
    $sourcelng = $_POST['slng'];
    $destinationlat = $_POST['dlat'];
    $destinationlng = $_POST['dlng'];
    $distance = $_POST['distance'];
    $car = $_POST['car'];
    $price = $_POST['price'];

    $insertTrip = "INSERT INTO trip(slat, slng, dlat, dlng, distance,car,price) VALUES('".$sourselat."','".$sourcelng."','".$destinationlat."','".$destinationlng."','".$distance."','".$car."','".$price."')";
        
    if ($conn-> query($insertTrip) === TRUE){
        echo "Records added succesfully";
    }
    else{
        echo "Error: " . $insertTrip. "<br>" . $conn->error;
    }
}
?>