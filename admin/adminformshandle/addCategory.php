<?php
$conn =  mysqli_connect("localhost","root","","shopdb");
if(isset($_POST['addCategory'])){
    trim(htmlspecialchars(extract($_POST)));
    //check valid
        $query="INSERT INTO categories (`name`)values('$name')";
        $runquery=mysqli_query($conn,$query);

        if($runquery){
            header("location:../view/layout.php");
        }else{
            header("location:../login.php");
        }

}else{
    header("location:../login.php");
}