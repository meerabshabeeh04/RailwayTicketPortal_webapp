<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen; height:50px;"></header>

    <?php
    $id = $_GET["id"];
    $query5 = "SELECT * FROM `tickets` WHERE `TICKET_ID`='$id'";
    $result5 = mysqli_fetch_assoc(mysqli_query($con, $query5));
    if(isset($_POST["submit"])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pno = $_POST["pno"];
        $gender = $_POST["gender"];
        $query7 = "INSERT INTO `user_`(`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PH_NO`, `GENDER`) VALUES ('$fname','$lname','$email','$pno','$gender')";
        $result7 = mysqli_query($con, $query7);
        $query8 = "SELECT LAST_INSERT_ID()";
        $result8 = mysqli_query($con, $query8);
        $row8 = mysqli_fetch_assoc($result8);
        $userid = $row8["LAST_INSERT_ID()"];
        $ddate = $_POST["ddate"];
        $timing = $_POST["timing"];
        if(isset($_POST["urgent"])){
            $urgent = "yes";
        }else{
            $urgent = "no";
        }
        $quantity = $_POST["quan"];
        $price = $result5["PRICE"];
        if($urgent=="yes"){
            $price = $price * $quantity * 1.2;
        }else{
            $price = $price * $quantity;
        }
        $query9 = "INSERT INTO `ticket_buyer`(`TICKET_BUYER_ID`,`TICKET_ID`, `BUYING_DATE`, `DEPARTURE_DATE`, `TIMING`, `URGENT`, `QUANTITY`, `TOTAL_PRICE`) VALUES ('$userid','$id',SYSDATE(),'$ddate','$timing','$urgent','$quantity','$price')";
        $result9 = mysqli_query($con, $query9);
        ?>
        <div class="text-center" style=" margin-top:2%;">
            <img src="images/tick.webp" class="rounded img-thumbnail" alt="image" style="width: 80px;height: 80px;">
        </div>

        <hr style="opacity:0;"/>

        <h3 style=" text-align:center; margin-bottom:0%; color:black;">Ticket Booked</h3>
        <?php
    }
    ?>

    <h1 style=" text-align:center; font-size:60px; margin:20px; color:black;"><i>Book a Ticket for <?= $result5["DESC_"]?></i></h1>

    <form method="post" style=" margin:50px 150px 50px 150px;">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" required/>

        <hr style=" opacity: 0;"/>

        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" required/>

        <hr style=" opacity: 0;"/>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" required/>

        <hr style=" opacity: 0;"/>

        <label for="pno">Phone Number</label>
        <input type="number" name="pno" id="pno" required/>

        <hr style=" opacity: 0;"/>

        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>

        <hr style=" opacity: 0;"/>

        <label for="ddate">Departure Date</label>
        <input type="date" name="ddate" id="ddate" required/>

        <hr style=" opacity: 0;"/>

        <label for="timing">Timing</label>
        <select name="timing" id="timing" required>
            <option value="">Select Timing</option>
            <?php
            $query6 = "SELECT * FROM `timings` WHERE `TICKET_ID`='$id'";
            $result6 = mysqli_query($con, $query6);
            while ($row6 = mysqli_fetch_assoc($result6)) {
                ?>
                <option value="<?= $row6["TIMING"]?>"><?= $row6["TIMING"]?></option>
                <?php
            }
            ?>
        </select>

        <hr style=" opacity: 0;"/>

        <label for="urgent">Urgent</label>
        <input type="checkbox" name="urgent" id="urgent"/>

        <hr style=" opacity: 0;"/>

        <label for="quan">Quantity</label>
        <input type="number" name="quan" id="quan" required/>

        <hr style=" opacity: 0;"/>

        <p>Price : <?= $result5["PRICE"]?></p>
        <p><b>Note : </b>20% extra charges will be applied to urgent tickets</p>

        <hr style=" opacity: 0;"/>

        <div style="display:flex; justify-content:center;">
            <input type="submit" name="submit" value="Book" style=" width:200px; height:50px; background-color:darkgreen; border-radius:10px; font-size:30px; color:white;"/>
        </div>   
    </form>
    
    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>