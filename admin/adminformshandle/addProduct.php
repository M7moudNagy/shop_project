<?php
$conn =  mysqli_connect("localhost","root","","shopdb");
if(isset($_POST['addProduct'])){
    trim(htmlspecialchars(extract($_POST)));

    if (isset($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $newName = uniqid() . ".$ext";
        move_uploaded_file($image_tmp, "../upload/" . $newName);
    } else {
        $newName = null;
    }
    //check valid
    $query="INSERT INTO products (`name`,`description`,`category`,`price`,`quantity`,`image`)values('$name','$description','$category','$price','$quantity','$newName')";
    $runquery=mysqli_query($conn,$query);

    if($runquery){
        header("location:../view/layout.php");
    }else{
        header("location:../login.php");
    }

}else{
    header("location:../login.php");
}
