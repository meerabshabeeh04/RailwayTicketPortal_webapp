<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen; height:50px;"></header>

    <hr style=" opacity: 0;"/>

    <div class="position-relative">
        <div class="position-absolute top-0 end-0" style=" margin:0px 10px 0px 10px;">
            <a href="ticket_manager.php"><button style=" margin:0px 10px 0px 10px; background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Manage Tickets</button></a>
            <a href="customer_inquiries.php"><button style=" margin:0px 10px 0px 10px; background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Customer Inquiries</button></a>
        </div>
    </div>
    
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>

    <h1 style=" text-align:center; font-size:40px; margin:20px; color:black;"><i>Recent Bookings</i></h1>

    <hr style=" opacity: 0;"/>

    <table class="table table-striped" style=" margin:2px;">
        <thead>
            <tr>
            <th scope="col" style=" text-align:center">Customer Name</th>
            <th scope="col" style=" text-align:center">Email</th>
            <th scope="col" style=" text-align:center">Phone Number</th>
            <th scope="col" style=" text-align:center">Ticket Class</th>
            <th scope="col" style=" text-align:center">Price</th>
            <th scope="col" style=" text-align:center">Buying Date</th>
            <th scope="col" style=" text-align:center">Departure Date</th>
            <th scope="col" style=" text-align:center">Timing</th>
            <th scope="col" style=" text-align:center">Urgent</th>
            <th scope="col" style=" text-align:center">Quantity</th>
            <th scope="col" style=" text-align:center">Total Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query10 = "SELECT * FROM `ticket_buyer`";
            $result10 = mysqli_query($con, $query10);
            while ($row = mysqli_fetch_assoc($result10)) {
                $custid = $row["TICKET_BUYER_ID"];
                $tikid = $row["TICKET_ID"];
                $query11 = "SELECT * FROM `user_` WHERE `USER_ID`='$custid'";
                $result11 = mysqli_fetch_assoc(mysqli_query($con, $query11));
                $query12 = "SELECT * FROM `tickets` WHERE `TICKET_ID`='$tikid'";
                $result12 = mysqli_fetch_assoc(mysqli_query($con, $query12));
                ?>
                <tr>
                    <td style=" text-align:center"><?= $result11["FIRST_NAME"]." ".$result11["LAST_NAME"]?></td>
                    <td style=" text-align:center"><?= $result11["EMAIL"]?></td>
                    <td style=" text-align:center"><?= $result11["PH_NO"]?></td>
                    <td style=" text-align:center"><?= $result12["DESC_"]?></td>
                    <td style=" text-align:center"><?= $result12["PRICE"]?></td>
                    <td style=" text-align:center"><?= $row["BUYING_DATE"]?></td>
                    <td style=" text-align:center"><?= $row["DEPARTURE_DATE"]?></td>
                    <td style=" text-align:center"><?= $row["TIMING"]?></td>
                    <td style=" text-align:center"><?= $row["URGENT"]?></td>
                    <td style=" text-align:center"><?= $row["QUANTITY"]?></td>
                    <td style=" text-align:center"><?= $row["TOTAL_PRICE"]?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
    
    <footer style=" background-color:darkgreen; height:50px; margin-top:100px;"></footer>
</body>
</html>