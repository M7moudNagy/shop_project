<?php
$conn =  mysqli_connect("localhost","root","","shopdb");

if(isset($_POST['login'])){
    trim(htmlspecialchars(extract($_POST)));

    $query = "select * from users where email='$email'";
    $result =  mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1) {
        $user =    mysqli_fetch_assoc($result);
        if($password == $user['password']) {
           if($user['status'] == 'admin') {
            header("location:../shop.php");
           }
           if($user['status'] == 'user') {
            header("location:../admin/view/layout.php");
           }
        }else{
            header("location:../login.php?error=wrongPassword");
        }
    }else {
        header("location:404.php");
    }

}else {
    header("location:404.php");

}