<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketManager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen; height:50px;"></header>

    <hr style=" opacity: 0;"/>

    <div class="position-relative">
        <div class="position-absolute top-0 end-0" style=" margin:0px 10px 0px 10px;">
            <a href="add_ticket.php"><button style=" margin:0px 10px 0px 10px; background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Add Ticket</button></a>
        </div>
    </div>

    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>

    <h1 style=" text-align:center; font-size:40px; margin:20px; color:black;"><i>Available Tickets</i></h1>

    <hr style=" opacity: 0;"/>

    <?php
    if(isset($_POST["deltim"])){
        $ticketid = $_POST["ticketid"];
        $timing = $_POST["timing"];
        $query20 = "DELETE FROM `timings` WHERE `TICKET_ID`='$ticketid' AND `TIMING`='$timing'";
        $result20 = mysqli_query($con, $query20);    
    }

    $query13 = "SELECT * FROM `tickets`";
    $result13 = mysqli_query($con, $query13);
    while ($row13 = mysqli_fetch_assoc($result13)) {
        ?>
            <hr style=" opacity: 0;"/>

            <div class="row" style=" margin:5% 10% 0 10%;">
                <div class="col-4"><b><?= $row13["DESC_"]?></b></div>

                <?php
                $editurl = "edit_ticket.php?id=".$row13["TICKET_ID"];
                ?>

                <div class="col-4"><a href=<?= $editurl?>><button style=" background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Edit</button></a></div>
            </div>

            <hr style=" opacity: 0;"/>
            
            <div class="row" style=" margin:0 10% 0 10%;">
                <div class="col-4">Price :<?=" ".$row13["PRICE"]?></div>
            </div>
            
            <hr style=" opacity: 0;"/>

                <?php
                $tikid = $row13["TICKET_ID"];
                $url1 = "edit_timing.php?id=".$tikid;
                $url2 = "add_timing.php?id=".$tikid;
                ?>

                <div class="row" style=" margin:0 10% 0 10%;">
                    <div class="col-4"><b>Timings</b></div>
                    <div class="col-4"><a href=<?= $url1?>><button style=" background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Edit Timings</button></a></div> 
                    <div class="col-4"><a href=<?= $url2?>><button style=" background-color:darkgreen; border:none; border-radius:10px; color:white; padding:5px 10px 5px 10px;">Add Timing</button></a></div>    
                </div>

                <?php
                $query14 = "SELECT * FROM `timings` WHERE `TICKET_ID`='$tikid'";
                $result14 = mysqli_query($con, $query14);
                while ($row14 = mysqli_fetch_assoc($result14)) {
                    ?>
                    <form method="post">
                        <div class="row" style=" margin:0 11% 0 11%;">
                        <input type="number" name="ticketid" value=<?= $tikid?> style=" display:none;"/>
                        <input type="text" name="timing" value=<?= $row14["TIMING"]?> style=" display:none;"/>
                        <?= $row14["TIMING"]?>
                        <input type="submit" name="deltim" value="Delete" style=" margin-left:10px; width:100px; height:20px; background-color:darkgreen; border-radius:10px; font-size:10px; color:white;"/>
                        </div>
                    </form>
                    <?php
                }
                ?>            

            <hr style=" opacity: 0;"/>
        <?php
    }
    ?>
    
    <footer style=" background-color:darkgreen; height:50px;"></></footer>
</body>
</html>