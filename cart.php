<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php $conn =  mysqli_connect("localhost","root","","shopdb");
?>

    <section id="page-header" class="about-header">
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>


    <section id="cart" class="section-p1">
    <table width="100%">
    <thead>
    <tr>
        <td>Name</td>
        <td>Desc</td>
        <td>Quantity</td>
        <td>price</td>
        <td>Remove</td>
        <td>Edit</td>
    </tr>
    </thead>

    <tbody>
<?php

$query = "select * from orders";
$runQuery = mysqli_query($conn, $query);
if(mysqli_num_rows($runQuery) > 0){
    $products = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
}else{
    header("location:404.php");
}?>
<?php foreach($products as $product): ?>
        <tr>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo $product['product_description']; ?></td>
            <td><?php echo $product['quantityOrdered'];  ?></td>
            <td><?php echo $product['total']; ?></td>
            <!-- Remove any cart item  -->
            <td><button type="submit" name="" class="btn btn-danger">Remove</button></td>
            <td><button type="submit" name="" class="btn btn-secondary">edit</button></td>
        </tr>
    <?php endforeach;?>
        </tbody>
        <!-- confirm order  -->
        </table>
        <br><br>
        <div class="container d-flex justify-content-center"
        <td><button type="submit" name="" class="btn btn-success ">Confirm</button></td>
        </div>
        </section>

        <!-- <section id="cart-add" class="section-p1">
            <div id="coupon">
                <h3>Coupon</h3>
                <input type="text" placeholder="Enter coupon code">
                <button class="normal">Apply</button>
            </div>
            <div id="subTotal">
                <h3>Cart totals</h3>
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>$118.25</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>$118.25</strong></td>
                    </tr>
                </table>
                <button class="normal">proceed to checkout</button>
            </div>
        </section> -->
    <?php include "footer.php"; ?>