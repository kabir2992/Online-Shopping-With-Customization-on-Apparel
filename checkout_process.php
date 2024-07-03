<?php
session_start();
include "db.php";
if (isset($_SESSION["uid"])) {

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip= $_POST['zip'];
        //$date= $_POST['O_Date'];
        $cardname= $_POST['cardname'];
        $cardnumber= $_POST['cardNumber'];
        $expdate= $_POST['expdate'];
        $cvv= $_POST['cvv'];
        $user_id=$_SESSION["uid"];
        $cardnumberstr=(string)$cardnumber;
        $total_count=$_POST['total_count'];
        $prod_total = $_POST['total_price'];
    
    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }

	$sql = "INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`)
	VALUES ($order_id, '$user_id','$f_name','$email', 
    '$address', '$city', '$state', '$zip','$cardname','$cardnumberstr','$expdate','$total_count','$prod_total','$cvv')";

                    

    if(mysqli_query($con,$sql)){
        $i=1;
        $prod_id_=0;
        $prod_price_=0;
        $prod_qty_=0;
        while($i<=$total_count){
            $str=(string)$i;
            $prod_id_+$str = $_POST['prod_id_'.$i];
            $prod_id=$prod_id_+$str;		
            $prod_price_+$str = $_POST['prod_price_'.$i];
            $prod_price=$prod_price_+$str;
            $prod_qty_+$str = $_POST['prod_qty_'.$i];
            $prod_qty=$prod_qty_+$str;
            $sub_total=(int)$prod_price*(int)$prod_qty;
            $sql1="INSERT INTO `order_products` 
            (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`) 
            VALUES (NULL, '$order_id','$prod_id','$prod_qty','$sub_total')";
             if(mysqli_query($con,$sql1)){
                $del_sql="DELETE from cart where user_id=$user_id";
                if(mysqli_query($con,$del_sql)){
                    echo "Order Has been sent to our respective authority and your product will be delivered to you Soon. Thank You for Shopping With Us.";
            }else{
                echo(mysqli_error($con));
            }
            $i++;


        }
    }
    }else{

        echo(mysqli_error($con));
        
    }
    
}else{
    echo"<script>window.location.href='index_1.php'</script>";
}
	




?>


<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
                /* CSS for Razorpay payment button */
        .checkout-btn {
            background-color: #ff6b6b; /* Button background color */
            color: #fff; /* Button text color */
            padding: 12px 24px; /* Button padding */
            border: none; /* Remove button border */
            border-radius: 4px; /* Rounded corners */
            font-size: 16px; /* Button font size */
            cursor: pointer; /* Add a pointer cursor on hover */
            transition: background-color 0.3s; /* Smooth background color transition */
            text-transform: uppercase; /* Convert text to uppercase */
        }

        .checkout-btn:hover {
            background-color: #ff4f4f; /* Button background color on hover */
        }

        /* You can further customize the styles as needed */

    </style>
</head>
<body>
    <form>
    <input type="button" id="razorpayButton" value="Pay Online" class="checkout-btn">

<?php
// You can fetch the total amount and customer details from your form submission
$totalAmount = $_POST['total_price']; // You can adjust this as needed
$firstName = $_POST['firstname'];
$email = $_POST['email'];

$razorpayApiKey = 'rzp_test_eZALc6p6A41qD2';
?>

<script>
    document.getElementById("razorpayButton").addEventListener("click", function () {
        var totalAmount = <?php echo $totalAmount; ?>;
        var firstName = "<?php echo $firstName; ?>";
        var email = "<?php echo $email; ?>";

        var razorpayApiKey = 'rzp_test_eZALc6p6A41qD2';

        var rzp = new Razorpay({
            key: razorpayApiKey,
            amount: totalAmount * 100,
            currency: "INR",
            name: "Online Shopping With Customization on Apparel",
            description: "Apparel Payment",
            prefill: {
                "name": firstName,
                "email": email
            },
            handler: function (response) {
                alert("Payment successful! Payment ID: " + response.razorpay_payment_id);

                window.location.href = "index_1.php";
            }
        });

        rzp.open();
    });
</script>
    </form>
</body>
</html>
