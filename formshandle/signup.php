<?php
//require_once '../dbConnection.php.php';
$conn =  mysqli_connect("localhost","root","","shopdb");

if(isset($_POST['signup'])){
    trim(htmlspecialchars(extract($_POST)));

    //check valid
        $query="INSERT INTO users (`username`,`email`,`password`,`phone`,`address`)values('$username','$email','$password','$phone','$address')";
        $runquery=mysqli_query($conn,$query);

        if($runquery){
            header("location:../login.php");
        }else{
            header("location:../404.php");
        }

}else {
    header("location:../404.php");
}

