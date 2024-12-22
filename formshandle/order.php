<?php
$conn =  mysqli_connect("localhost","root","","shopdb");
if (isset($_POST['addOrder']) && isset($_GET['id'])) {
    $quantity = intval($_POST['quantity']);
    $id = $_GET['id'];
    $query = "select * from products where id='$id'";
    $runquery = mysqli_query($conn, $query);
    if (mysqli_num_rows($runquery) == 1) {
        $product = mysqli_fetch_assoc($runquery);
            $product_id = $product['id'];
            $product_name = $product['name'];
            $product_description = $product['description'];
            $product_category = $product['category'];
            $product_image = $product['image'];
            $product_price = floatval($product['price']);
            $total = $quantity * $product_price;
        $query = "INSERT INTO orders (`product_id`,`product_name`,`product_description`,`product_image`,quantityOrdered,total)values('$product_id','$product_name','$product_description','$product_image','$quantity','$total')";
        $runquery = mysqli_query($conn, $query);
        if ($runquery) {
            header("location:../shop.php");
        } else {
            header("location:../404.php");
        }
    } else {
        header("location:../shop.php");
    }
}else{
    header("location:../login.php");
}
