<?php

$username = 'root';
$password = '';
$dbname = 'servicesdb';


$conn = new mysqli('localhost', $username,$password,$dbname);

if (isset($_POST['sourcelat']) && isset($_POST['sourcelng']) && isset($_POST['destinationlat']) && isset($_POST['destinationlng']) && isset($_POST['distance']) && isset($_POST['car']) && isset($_POST['price'])) {
    $sourcelat = $_POST['sourcelat'];
    $sourcelng = $_POST['sourcelng'];
    $destinationlat = $_POST['destinationlat'];
    $destinationlng = $_POST['destinationlng'];
    $distance = $_POST['distance'];
    $car = $_POST['car'];
    $price = $_POST['price'];

    $insertTrip = "INSERT INTO trip(sourcelat, sourcelng, destinationlat, destinationlng, distance, car, price) VALUES('".$sourcelat."','".$sourcelng."','".$destinationlat."','".$destinationlng."','".$distance."','".$car."','".$price."')";
        
    if ($conn-> query($insertTrip) === TRUE){
        echo "Records added succesfully";
    }
    else{
        echo "Error: " . $insertTrip. "<br>" . $conn->error;
    }
}
?>