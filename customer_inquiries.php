<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CustomerInquiries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen; height:50px;"></></header>

    <h1 style=" text-align:center; font-size:40px; margin:20px; color:black;"><i>Customer Inquiries</i></h1>

    <hr style=" opacity: 0;"/>

    <table class="table table-striped" style=" margin:2px;">
        <thead>
            <tr>
            <th scope="col" style=" text-align:center">Customer Name</th>
            <th scope="col" style=" text-align:center">Email</th>
            <th scope="col" style=" text-align:center">Phone Number</th>
            <th scope="col" style=" text-align:center">Issue</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query10 = "SELECT * FROM `issues`";
            $result10 = mysqli_query($con, $query10);
            while ($row = mysqli_fetch_assoc($result10)) {
                $custid = $row["USER_ID"];
                $query11 = "SELECT * FROM `user_` WHERE `USER_ID`='$custid'";
                $result11 = mysqli_fetch_assoc(mysqli_query($con, $query11));
                ?>
                <tr>
                    <td style=" text-align:center"><?= $result11["FIRST_NAME"]." ".$result11["LAST_NAME"]?></td>
                    <td style=" text-align:center"><?= $result11["EMAIL"]?></td>
                    <td style=" text-align:center"><?= $result11["PH_NO"]?></td>
                    <td style=" text-align:center"><?= $row["ISSUE"]?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>

    <hr style=" opacity: 0;"/>
    
    <footer style=" background-color:darkgreen; height:50px;"></></footer>
</body>
</html>