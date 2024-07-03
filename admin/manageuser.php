
    <?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delete query*/
mysqli_query($con,"delete from users_info where user_id='$user_id'")or die("query is incorrect...");
}
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$vendor_id=$_GET['ID'];

/*this is delete query*/
mysqli_query($con,"delete from vendor where ID='$vendor_id'")or die("query is incorrect...");
}
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$ds_id=$_GET['id'];

/*this is delete query*/
mysqli_query($con,"delete from designers where id='$ds_id'")or die("query is incorrect...");
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage User </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>User Name</th>
                <th>User Password</th>
	<th><a href="adduser.php" class="btn btn-success">Add New</a></th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select user_id, email, password from user_info")or die ("query 2 incorrect.......");

                        while(list($user_id,$user_name,$user_password)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$user_name</td><td>$user_password</td>";

                        echo"<td>
                        <a href='edituser.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='manageuser.php?user_id=$user_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                        //mysqli_close($con);
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage User Designer</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>Designer Name</th>
                <th>Designer Password</th>
                <th>Designer Email</th>
	<th><a href="adddesigner.php" class="btn btn-success">Add New</a></th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select id, Name, Password, Email from designers")or die ("query 4 incorrect.......");

                        while(list($ds_id,$ds_name,$ds_email,$ds_password)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$ds_name</td><td>$ds_email</td><td>$ds_password</td>";

                        echo"<td>
                        
                        <a href='manageuser.php?user_id=$ds_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
include "footer.php";
?>