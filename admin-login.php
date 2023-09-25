<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header style=" background-color:darkgreen;">
        <ul class="nav justify-content-end">
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link active" aria-current="page" href="index.php" style=" color:white; font-size:25px;">Home</a>
            </li>
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link" href="helpdesk.php" style=" color:white; font-size:25px;">Help Desk</a>
            </li>
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link" href="#" style=" color:white; font-size:25px;">Admin</a>
            </li>
        </ul>
    </header>

    <h1 style=" text-align:center; font-size:60px; margin:50px 20px 80px 20px; color:black;"><i>Admin Login</i></h1>

    <?php
    if(isset($_POST["submit"])){
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        if($uname != "Meerab04" && $pass != "meerab04"){
            ?>
            <p style=" color:red; display:flex; justify-content:center;">Enter Correct username and password</p>
            <?php
        }else{
            header("Location: admin.php");
        }
    }
    ?>

    <div style=" display:flex; justify-content:center; border-color:black; border-radius:10px;">    
        <form method="post">
            <hr style=" opacity: 0;"/>

            <input type="text" name="uname" placeholder="Username" required/>

            <hr style=" opacity: 0;"/>

            <input type="password" name="pass" placeholder="Password"/>

            <hr style=" opacity: 0;"/>

            <div style="display:flex; justify-content:center; margin:20px 0px 135px 0px">
                <input type="submit" name="submit" value="Login" style=" width:200px; height:50px; background-color:darkgreen; border-radius:10px; font-size:30px; color:white;"/>
            </div> 
        </form>
    </div>

    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>