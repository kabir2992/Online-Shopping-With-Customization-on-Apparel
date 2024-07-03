<?php
include 'db.php';
include 'header.php';
?>

<?php
if (isset($_GET['offer_id'])) {
    $offer_id = $_GET['offer_id'];

    // You can now use $offer_id in your SQL query to fetch products associated with the specific offer.
    $sql = "SELECT * FROM products WHERE offer_id = $offer_id";
    $run_query = mysqli_query($con, $sql);

    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            // Your code to display the products goes here.
            
            $pro_id = $row['product_id'];
            $offer_id = $row['offer_id'];
            $pro_cat = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $offer_price = $row['discounted_price'];
            $pro_image = $row['product_image'];

            echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											
										</div>
									</div></a>
									<div class='product-body'>
										
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>₹ $offer_price</h4>
                                                                                    <h4 class='discounted-price'>₹ $pro_price</h4>
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
    } else {
        echo '<p>No Products For This Offer</p>';
    }
} else {
    echo '<p>No Offer Selected.</p>';
}
?>
<html>
    <head>
        <title><?php echo $offer_name; ?></title>
        <style>
            .discounted-price {
                color: black; /* Set the color for the discounted price */
                text-decoration: line-through; /* Add a strikethrough line */
                margin-right: 10px; /* Adjust the spacing between the prices */
            }

            .original-price {
                color: black; /* Set the color for the original price */
            }

        </style>
    </head>
<body>
</body>
</html>

<?php 
include 'footer.php';

?>