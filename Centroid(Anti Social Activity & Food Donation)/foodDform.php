<?php
session_start();
$conn = new mysqli("localhost","root", "PhPmYaDmIn@2509", "reporting");
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
	$RestaurantName = $_POST['RestaurantName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
	$address = $_POST['address'];
	$enquiry = $_POST['enquiry'];
	

    $query = "INSERT INTO food (RestaurantName, email, number, address, enquiry) VALUES('$RestaurantName', '$email', '$number', '$address', '$enquiry')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status'] = "Image Stored Successfully";
        header('Location: foodDsuccess.html');
    }
    else {
        $_SESSION['status'] = "Image Not Stored Successfully";
        echo "Reporting Unsuccessful";
    }
}   
?>