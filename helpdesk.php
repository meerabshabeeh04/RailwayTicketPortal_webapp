<?php
include("db_con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
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
                <a class="nav-link" href="#" style=" color:white; font-size:25px;">Help Desk</a>
            </li>
            <li class="nav-item" style=" margin:0 1% 0 1%;">
                <a class="nav-link" href="admin-login.php" style=" color:white; font-size:25px;">Admin</a>
            </li>
        </ul>
    </header>

    <?php
    if(isset($_POST["submit"])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pno = $_POST["pno"];
        $gender = $_POST["gender"];
        $issue = $_POST["issue"];
        $query2 = "INSERT INTO `user_`(`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PH_NO`, `GENDER`) VALUES ('$fname','$lname','$email','$pno','$gender')";
        $result2 = mysqli_query($con, $query2);
        $query3 = "SELECT LAST_INSERT_ID()";
        $result3 = mysqli_query($con, $query3);
        $row3 = mysqli_fetch_assoc($result3);
        $id = $row3["LAST_INSERT_ID()"];
        $query4 = "INSERT INTO `issues`(`USER_ID`, `ISSUE`) VALUES ('$id','$issue')";
        $result4 = mysqli_query($con, $query4);
        ?>
        <div class="text-center" style=" margin-top:2%;">
            <img src="images/tick.webp" class="rounded img-thumbnail" alt="image" style="width: 80px;height: 80px;">
        </div>

        <hr style="opacity:0;"/>

        <h3 style=" text-align:center; margin-bottom:0%; color:black;">Query Submitted</h3>
        <?php
    }
    ?>

    <h1 style=" text-align:center; font-size:60px; margin:20px; color:black;"><i>Submit Your Inquiries Here</i></h1>

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

        <label for="issue">Your Inquiries</label>
        <input type="text" name="issue" id="issue" required style=" width:100%; height:100px;"/>

        <hr style=" opacity: 0;"/>

        <div style="display:flex; justify-content:center;">
            <input type="submit" name="submit" style=" width:200px; height:50px; background-color:darkgreen; border-radius:10px; font-size:30px; color:white;"/>
        </div>   
    </form>

    <footer style=" background-color:darkgreen; height:50px;"></footer>
</body>
</html>