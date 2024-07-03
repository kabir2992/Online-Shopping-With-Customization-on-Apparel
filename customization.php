<?php
include 'db.php';
include 'header.php';
?>
<?php
if(isset($_GET["user_id"]))
{
    $user_id = $_GET["user_id"];
}
if (isset($_SESSION['product_id'], $_SESSION['product_image'], $_SESSION['product_price'])) {
    $product_id = $_SESSION['product_id'];
    $product_image = $_SESSION['product_image'];
    $product_price = $_SESSION['product_price'];
    }
 else {
    echo "Product information not available. Please go back to product page.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Customization Page</title>
        <style>
            .customization-container {
                text-align: center;
                max-width: 400px;
                margin: 0 auto;
            }

            .customization-container h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .product-image {
                max-width: 100%;
            }

            .form-group {
                margin: 15px 0;
            }

            label {
                display: block;
                font-weight: bold;
            }

            .custom-text-input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .customization-submit-button {
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 4px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
            }

            .customization-submit-button:hover {
                background-color: #0056b3;
            }

        </style>
    </head>
    <body>
<div class="customization-container">
    <h2>Customize Your Product</h2>
    <img src="product_images/<?php echo $product_image; ?>" alt="Product Image" class="product-image">
    
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="custom_text">Custom Text:</label>
            <input type="text" name="custom_text" id="custom_text" class="custom-text-input">
        </div>
        <div class="form-group">
            <label for="custom_image">Custom Image (jpg, jpeg, png, max 50MB):</label>
            <input type="file" name="custom_image" id="custom_image" class="btn btn-fill btn-success" accept=".jpg, .jpeg, .png">
        </div>
        <h3 class="product-price">&#8377; <?php echo $product_price; ?> </h3>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
        <button type="submit" name="btn_custom" class="customization-submit-button">Submit Customization</button>
        <button  class="add-to-cart-btn" pid="<?php echo $product_id; ?>" id="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>

        <hr>
    </form>
</div>
        
<?php

if(isset($_POST['btn_custom']))
{
    $custom_text = $_POST['custom_text'];
    //$custom_image = $_POST['custom_image'];
    $picture_name = $_FILES['custom_image']['name'];
    $picture_type = $_FILES['custom_image']['type'];
    $picture_tmp_name = $_FILES['custom_image']['tmp_name'];
    $picture_size = $_FILES['custom_image']['size'];

    if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
        if ($picture_size <= 50000000)
            $custom_name = time() . "_" . $picture_name;
            $destination_directory = "G:/xampp/htdocs/OnlyProject/customize_product/";
            $destination_path = $destination_directory . $custom_name;
            move_uploaded_file($picture_tmp_name, $destination_path);
        
        $custom_query = "INSERT INTO customizations (product_id, user_id, text, image, price) VALUES ('$product_id', '$user_id', '$custom_text', '$custom_name', '$product_price')";
        $run = mysqli_query($con, $custom_query);
        echo '<script>alert("Customization Order is Placed")</script>';
        }
    else
    {
        echo '<script>alert("Image format not proper or Image Size is greater than 50MB")</script>';
    }
}
else
{
    echo 'Query Error';
}
?>
    </body>
</html>

<?php 
include 'footer.php';
?>