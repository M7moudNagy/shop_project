
<?php include 'header.php' ;?>
<?php include 'navbar.php' ;?>
<?php $conn =  mysqli_connect("localhost","root","","shopdb"); ?>



<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">

        <?php
        $query ="select * from `products`";
        $runquery =mysqli_query($conn,$query);

        if(mysqli_num_rows($runquery)>0)
        {
            $resultProducts=mysqli_fetch_all($runquery,MYSQLI_ASSOC);
            foreach($resultProducts as $product):
                ?>
                <div class="pro">
                    <!-- <form> -->
                    <img src="admin/upload/<?php echo $product['image'] ;?>"/>
                    <div class="des">
                        <h2><?php echo $product['name']; ?></h2>
                        <h5><?php echo $product['description']; ?></h5>
                        <h4><?php echo $product['price']; ?></h4>
                        <form action="formshandle/order.php?id=<?php echo $product['id']?>" method="POST">
                            <input type="number" name="quantity">
                            <button type="submit" name="addOrder"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>
                        </form>

                    </div>
                </div>
            <?php endforeach;}else{
            header("location:404.php");
        } ?>
    </div>
    </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>


<?php include 'footer.php' ?>
                        
              
            </div>
           
        </div>
    </section>
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>