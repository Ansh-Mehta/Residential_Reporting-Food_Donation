<?php
session_start();
  $conn = mysqli_connect("localhost","root","PhPmYaDmIn@2509","antisocialactivity");
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    $evidence1 = $_FILES['evidence1']['name'];
    $evidence2 = $_FILES['evidence2']['name'];
    $evidence3 = $_FILES['evidence3']['name'];
    $address = $_POST['address'];
    $problemdefinition = $_POST['problemdefinition'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $query = "INSERT INTO reportdata (evidence1,evidence2,evidence3,address,problemdefinition,password,c_password) VALUES ('$evidence1','$evidence2','$evidence3','$address','$problemdefinition','$password','$c_password')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        move_uploaded_file($_FILES["evidence1"]["tmp_name"], "image/".$_FILES["evidence1"]["name"]);
        move_uploaded_file($_FILES["evidence2"]["tmp_name"], "image/".$_FILES["evidence2"]["name"]);
        move_uploaded_file($_FILES["evidence3"]["tmp_name"], "image/".$_FILES["evidence3"]["name"]);
        $_SESSION['status'] = "Image Stored Successfully";
        header('Location: Report_Success_Page.html');
    }
    else {
        $_SESSION['status'] = "Image Not Stored Successfully";
        echo "Reporting Unsuccessful";
    }
}   
?>