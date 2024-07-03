
    <?php
session_start();
include("../db.php");

$vendor_id=$_REQUEST['ID'];

$result=mysqli_query($con,"select ID,Name,CompanyName,Password from vendor where ID='$vendor_id'")or die ("query 1 incorrect.......");

list($vendor_id,$vendor_name,$vendor_cn,$vendor_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$vendor_name=$_POST['Name'];
$vendor_cn=$_POST['CompanyName'];
$vendor_password=$_POST['Password'];


mysqli_query($con,"update vendor set Name='$vendor_name', CompanyName='$vendor_cn', Password='$vendor_password' where ID='$vendor_id'")or die("Query 2 is inncorrect..........");

header("location: manageuser.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit User Vendor</h5>
              </div>
              <form action="editvendor.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="ID" id="ID" value="<?php echo $vendor_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Vendor name</label>
                        <input type="text" id="Name" name="Name"  class="form-control" value="<?php echo $vendor_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" id="CompanyName" name="CompanyName" class="form-control" value="<?php echo $vendor_cn; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password"  id="Password" name="Password" class="form-control" value="<?php echo $vendor_password; ?>">
                      </div>
                    </div>
                    <!--<div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="<?php echo $user_password; ?>">
                      </div>
                    </div> -->
                  
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update Profile</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>