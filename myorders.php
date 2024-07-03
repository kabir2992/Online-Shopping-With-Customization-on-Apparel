<?php 
include 'db.php';
include 'header.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        /* CSS for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: center;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Table header styles */
table th {
    background-color: #3498db;
    color: white;
    padding: 10px;
    text-transform: uppercase;
}

/* Table row styles */
table tr {
    background-color: #f2f2f2;
}

/* Alternating row styles */
table tr:nth-child(even) {
    background-color: #e2e2e2;
}

/* Table cell styles */
table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Hover effect on table rows */
table tr:hover {
    background-color: #3498db;
    color: white;
}

/* Responsive table design for smaller screens */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }
}
/* CSS for My Orders header */
h2 {
    font-size: 24px;
    color: #333; /* Text color */
    background-color: #3498db; /* Background color */
    padding: 10px 20px; /* Padding around the text */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Center align text */
    margin-bottom: 20px; /* Spacing at the bottom */
}

        
    </style>
    <title>My Orders</title>
</head>
<body>
<?php
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    
    $sql = "SELECT
                oi.order_id,
                oi.f_name,
                oi.email,
                oi.O_Date,
                oi.order_status,
                SUM(op.qty) AS total_products,
                SUM(op.amt) AS total_amount
            FROM
                orders_info oi
            JOIN
                order_products op ON oi.order_id = op.order_id
            WHERE
                oi.user_id = $user_id
            GROUP BY
                oi.order_id
            ORDER BY
                oi.O_Date DESC";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($con);
    }
    else
    {
        if (mysqli_num_rows($result) > 0) {
                echo "<h2>My Orders</h2>";
                
                // Start a table to display order details
                echo "<table border='1'>
                        <tr>
                            <th>Order ID</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Order Date</th>
                            <th>Total Products</th>
                            <th>Total Amount</th>
                            <th>Order Status</th>
                        </tr>";

                // Loop through the orders and print each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['order_id'] . "</td>
                            <td>" . $row['f_name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['O_Date'] . "</td>
                            <td>" . $row['total_products'] . "</td>
                            <td>" . $row['total_amount'] . "</td>
                            <td>" . $row['order_status'] . "</td>
                          </tr>";
                }

                // Close the table
                echo "</table>";
            
    }else {
                echo "No orders found for this user.";
            }
        }
}
else
{
    echo 'No User ID fetched';
}
        
?>

</body>
</html>

<?php
include "footer.php";
?>