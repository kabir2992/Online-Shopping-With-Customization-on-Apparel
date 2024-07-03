<?php 
session_start();
include '../db.php';
include 'sidenav.php';
include 'topheader.php';


$page= null;

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
?>

<div class="content">
        <div class="container-fluid">
         <div class="panel-body">
            <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Customization Orders List</h5>
              </div>
                    
                            <div class="card-body">
                                <div class="table-responsive ps">
                                    <table class="table tablesorter " id="page1">
                                        <thead class=" text-primary">
                                            <tr><th>ID</th><th>User ID</th><th>Product ID</th><th>Customize Image</th><th>Text</th><th>Product Image</th><th>Price<th>Order Date</th>
                                            </tr></thead>
                                        <tbody>
                    <?php
                    //counting paging

                    $list = mysqli_query($con, "SELECT o.customization_id, o.product_id, o.user_id, o.text, o.image, o.price, o.custom_date, p.product_image
                                        FROM customizations o
                                        INNER JOIN products p ON o.product_id = p.product_id
                                        ;
                        ");
                    while(list($custom_id,$product_id,$image,$user_id,$custom_text,$img,$product_price,$custom_date)=mysqli_fetch_array($list))
                        {
                        echo "<tr><td>
                        <td>$custom_id</td>
                        <td>$product_id</td>
                        <td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td>
                        <td>$user_id</td>
                        <td>$custom_text</td>
                        <td><img src='../customize_products/$img' style='width:50px; height:50px; border:groove #000'></td>
                        <td>$product_price</td>
                        <td>$custom_date</td>

                        
                        </td></tr>";
                        }?>
                                        </tbody>
                                    </table>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                            </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                <?php
                $paging = mysqli_query($con, "SELECT o.customization_id, o.product_id, o.user_id, o.text, o.image, o.price, p.product_image
                                        FROM customizations o
                                        INNER JOIN products p ON o.product_id = p.product_id
                                        ;
                        ");
                    $count = mysqli_num_rows($paging);

                    $a = $count / 10;
                    $a = ceil($a);

                    for ($b = 1; $b <= $a; $b++) {
                        ?>
                        <li class="page-item"><a class="page-link" href="offerlist.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a></li>
                        <?php
                    }
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        </ul>
                    </nav>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
         </div>
        </div>
</div>

<?php 
include 'footer.php';

?>