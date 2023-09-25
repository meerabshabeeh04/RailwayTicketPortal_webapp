<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Timing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $id = $_GET["id"];
    ?>

    <header style=" background-color:darkgreen; height:50px;"></header>

    <?php
    if(isset($_POST["submit"])){
        $oldtime = $_POST["oldtime"];
        $newtime = $_POST["newtime"];
        $query15 = "UPDATE `timings` SET `TIMING`='$newtime' WHERE `TICKET_ID`='$id' AND `TIMING`='$oldtime'";
        $result15 = mysqli_query($con, $query15);
        ?>
        <div class="text-center" style=" margin-top:2%;">
            <img src="images/tick.webp" class="rounded img-thumbnail" alt="image" style="width: 80px;height: 80px;">
        </div>

        <hr style="opacity:0;"/>

        <h3 style=" text-align:center; margin-bottom:0%; color:black;">Ticket Edited</h3>
        <?php
    }
    ?>

    <h1 style=" text-align:center; font-size:60px; margin:20px; color:black;"><i>Edit Tickets</i></h1>

    <?php
    $query19 = "SELECT * FROM `timings` WHERE `TICKET_ID`='$id'";
    $result19 = mysqli_query($con, $query19);
    while($row = mysqli_fetch_assoc($result19)){
        ?>
        <form method="post" style=" margin:50px 150px 50px 150px;">

        <input type="text" name="oldtime" value=<?= $row["TIMING"]?> style=" display:none;"/>
        <input type="text" name="newtime" value="<?= $row["TIMING"]?>" required/>
        <div style="display:flex; justify-content:center;">
            <input type="submit" name="submit" value="Edit" style=" width:200px; height:50px; background-color:darkgreen; border-radius:10px; font-size:30px; color:white;"/>
        </div>   
        </form>
        <?php
    }
    ?>

    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>