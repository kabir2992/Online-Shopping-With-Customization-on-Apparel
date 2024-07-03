  <?php
session_start();
include("../db.php");

//$discountedprice = 0;

if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$product_sub_category = $_POST['sub-category'];
//$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['sub-category'];
$tags=$_POST['tags'];
$discounted_price = $_POST['discounted_price'];
$selected_offer = $_POST['selected_offer'];


//$offer_query = mysqli_query($con, "SELECT discount_percentage FROM offers WHERE offer_id = $selectedOfferID");
//$offerData = mysqli_fetch_assoc($offer_query);
//$discountPercentage = $offerData['discount_percentage'];

//$discountedPrice = $price - ($price * $discountPercentage / 100);
//$discountedPrice = $_POST['discounted_price'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
$brand = $product_sub_category;
mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords,discounted_price,offer_id) values ('$product_type','$product_sub_category','$product_name','$price','$details','$pic_name','$tags','$discounted_price','$selected_offer')") or die ("query incorrect");

 header("location: index.php?messages=Offer Product Added Successfully");
}

mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Product Category</label>
                              <select id="product_typee" name="product_type" required class="form-control">
                                  <option style="color:black;">----Select Category----</option>
                                  <?php
                                  include("../db.php");

                                  $category_query = "SELECT cat_id, cat_title FROM categories";
                                  $result = mysqli_query($con, $category_query);

                                  if (mysqli_num_rows($result) > 0) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                          echo "<option style='color:black;' value='" . $row['cat_id'] . "'>" . $row['cat_title'] . "</option>";
                                      }
                                  } else {
                                      echo "<option value=''>No categories found</option>";
                                  }

                                  mysqli_close($con);
                                  ?>
                              </select>
                          </div>
                      </div>
                      <!--<div class="col-md-12">
                          <div class="form-group">
                              <label for="product_type">Selected Category ID</label>
                              <input type="text" id="product_type" name="product_type" class="form-control" value="" disabled>
                          </div>
                      </div>

                      <script>
                      document.getElementById("product_typee").addEventListener("change", function () {
                          var selectedOption = this.options[this.selectedIndex];
                          var selectedCategoryId = selectedOption.value;
                          document.getElementById("product_type").value = selectedCategoryId;
                      });
                      </script> -->

                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="sub-category">Product Sub-Category</label>
                              <select id="sub-category" name="sub-category" class="form-control" required>
                                  <option style="color: black;">----Select Sub-Category----</option>
                                  <?php
                                 include("../db.php");
                                  $sql = "SELECT brand_id, brand_title FROM sub_category";

                                  $result3 = $con->query($sql);

                                  if ($result3->num_rows > 0) {
                                      while ($row = $result3->fetch_assoc()) {
                                          echo "<option style='color: black;' value='" . $row['brand_id'] . "'>" . $row['brand_title'] . "</option>";
                                      }
                                  } else {
                                      echo "<option value=''>No sub-categories found</option>";
                                  }
                                  $con->close();
                                  ?>
                              </select>
                          </div>
                      </div>
                      <!--<div class="col-md-12">
                          <div class="form-group">
                              <label for="product_brand">Selected Sub-Category ID</label>
                              <input type="text" id="product_brand" name="product_brand" class="form-control" value="" disabled>
                          </div>
                      </div>

                      <script>
                      document.getElementById("sub-category").addEventListener("change", function () {
                          var selectedOption = this.options[this.selectedIndex];
                          var selectedBrandId = selectedOption.value;
                          document.getElementById("product_brand").value = selectedBrandId;
                      });
                      </script> -->
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Offer</label>
                          <select id="selected_offer" name="selected_offer" class="form-control">
                              <option value="" style="color: black;">----Select Offer----</option>
                              <?php
                          include '../db.php';
                            $offer_query = mysqli_query($con, "SELECT offer_id, offer_name, discount_percentage FROM offers");
                             while ($row = mysqli_fetch_assoc($offer_query)) {
                      echo "<option style='color: black;' value='" . $row['offer_id'] . "' data-discount='" . $row['discount_percentage'] . "'>" . $row['offer_name'] . "</option>";
                  }
                  ?>
                          </select>
                      </div>
                  </div>
                  <!--<div class="col-md-12">
                          <div class="form-group">
                              <label for="selected_id">Selected Offer ID</label>
                              <input type="text" id="selected_id" name="selected_id" class="form-control" value="" disabled>
                          </div>
                      </div>
                      <script>
                      document.getElementById("selected_offer").addEventListener("change", function () {
                          var selectedOption = this.options[this.selectedIndex];
                          var selectedBrandId = selectedOption.value;
                          document.getElementById("selected_id").value = selectedBrandId;
                      });
                      </script> -->
                      <div class="col-md-12">
                      <div class="form-group">
                          <label>Discounted Price</label><br>
                          <input type="text" style="background-color: white; color: black; font-weight: bold;" id="discounted_price" name="discounted_price" class="form-control" readonly>
                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                          <script>
                          $(document).ready(function() {
                              $('#selected_offer').change(function() {
                                  var selectedDiscount = $(this).find('option:selected').data('discount');
                                  var price = parseFloat($('#price').val());
                                  var discountedPrice = price - (price * selectedDiscount / 100);
                                  $('#discounted_price').val(discountedPrice.toFixed(2));
                              });
                          });
                          </script>
                      </div>
                  </div>
                    </div>
                  </div>  
            </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>