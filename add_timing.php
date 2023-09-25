<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Timing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen; height:50px;"></header>

    <?php
    $tikid = $_GET["id"];
    if(isset($_POST["submit"])){
        $timing = $_POST["timing"];
        $query15 = "INSERT INTO `timings`(`TICKET_ID`, `TIMING`) VALUES ('$tikid','$timing')";
        $result15 = mysqli_query($con, $query15);
        ?>
        <div class="text-center" style=" margin-top:2%;">
            <img src="images/tick.webp" class="rounded img-thumbnail" alt="image" style="width: 80px;height: 80px;">
        </div>

        <hr style="opacity:0;"/>

        <h3 style=" text-align:center; margin-bottom:0%; color:black;">Ticket Added</h3>
        <?php
    }
    ?>

    <h1 style=" text-align:center; font-size:60px; margin:20px; color:black;"><i>Add Ticket</i></h1>

    <form method="post" style=" margin:50px 150px 50px 150px;">
        <label for="timing">Timing</label>
        <input type="text" name="timing" id="title" required/>

        <hr style=" opacity: 0;"/>
        <hr style=" opacity: 0;"/>
        <hr style=" opacity: 0;"/>

        <div style="display:flex; justify-content:center;">
            <input type="submit" name="submit" value="Add" style=" width:200px; height:50px; background-color:darkgreen; border-radius:10px; font-size:30px; color:white;"/>
        </div>   
    </form>

    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    <hr style=" opacity: 0;"/>
    
    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>