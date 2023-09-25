<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen;">
        <ul class="nav justify-content-end">
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link active" aria-current="page" href="#" style=" color:white; font-size:25px;">Home</a>
            </li>
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link" href="helpdesk.php" style=" color:white; font-size:25px;">Help Desk</a>
            </li>
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link" href="admin-login.php" style=" color:white; font-size:25px;">Admin</a>
            </li>
        </ul>
    </header>

    <hr style=" color:white;"/>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded" style=" margin:0 10% 0 10%;">
        <h1 style=" font-size:70px; color:black; text-align:center;"><i>Fast Railways</i></h1>
    </div>

    <hr style=" color:white;"/>

    <h2 style=" text-align:center; font-size:40px; color:black;">Book Your Tickets Here!</h2>

    <hr style=" color:white;"/>

    <div class="grid text-center" style=" margin:30px 230px 30px 230px">
        <?php
        $query = "SELECT COUNT(*) FROM `tickets`";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $count = $row["COUNT(*)"];
        for ($i = 1; $i < $count+1; $i+=3) {
            $x = $i+2;
            $query1 = "SELECT * FROM `tickets` WHERE `TICKET_ID` BETWEEN '$i' AND '$x'";
            $result1 = mysqli_query($con, $query1);
            ?>
            <div class="row">
                <?php
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <div class="col-4" style=" margin:30px 0px 30px 0px;">
                        <div class="card" style="width: 18rem;">
                            <img src="images/train.webp" class="card-img-top" alt="img">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row1["DESC_"]?></h5>
                                <p class="card-text">Price : <?= $row1["PRICE"]?></p>
                                <?php
                                $id = $row1["TICKET_ID"];
                                $url = "book_ticket.php?id=".$id;
                                ?>
                                <a href="<?= $url?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>  
    </div>

    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>