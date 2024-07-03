<?php
include 'header.php';
include 'db.php';
 // Display search results
if(isset($_POST['search_btn']))
{
        $user_id = $_SESSION["uid"];
        $keyword = $_POST['search_btn'];

    $sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
    $run_query = mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query) > 0) {
        while($row=mysqli_fetch_array($run_query)){
                        $pro_id= $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
                        $cat_name = $row["cat_title"];
            
            echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price</h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										
									</div>
								</div>
                                </div>";
    }
    } 
    else 
    {
        echo '<p>No Products Matched your Search Statement</p>';
    }
}
    else
    {
     echo '<p>No Search Item Provided!</p>';   
    }
?>
<?php 
include 'footer.php';

?>
    
