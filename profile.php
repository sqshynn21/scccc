<?php

include 'includes/session.php';

$id = $_GET['ID'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$user = $conn->query($sql) or die($conn->error);
$rows = $user->fetch_assoc();

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $location = $_POST['location'];
    $contactnum = $_POST['contactnum'];
    $user = $_POST['user'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user', pass = '$pass' WHERE id='$id'";

    $conn->query($sql) or die($conn->error);

    echo header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="center"> <button class="back" style="width:50px;height:30px;font-size:10px;border-radius:5px; background:#0033cc;border:none"><a href="home.php" style="color: white;text-decoration:none;">Back</a></button></div>
    <i class="fa-solid fa-bell"></i><a href="logout.php" style="color:black;"><i class="fa-solid fa-power-off"></i></a>    <br>
    <a href="profile.php"><img src="img/userlogo.png"> </a>
    
   <br>
    <h5>&nbsp;&nbsp;<?php echo $rows['fname']." ". $rows['lname'];?></h5>
    <br>
    <div class="center">
        Personal Information
    </div>
    <div class="content">
        <label>First Name</label>
        <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>">
    </div>
    <div class="content">
        <label>Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php echo $row['lname'];?>">
    </div>
    <div class="content">
        <label>Email/Username</label>
        <input type="text" name="user" id="user" value="<?php echo $row['user'];?>">
    </div>
    <div class="content">
        <label>Password</label>
        <input type="text" name="pass" id="pass" value="<?php echo $row['pass'];?>">
    </div>
    <div class="content">
        <label>Phone Number</label>
        <input type="text" name="contactnum" id="contactnum" value="<?php echo $row['contactnum'];?>">
    </div>
    <div class="content">
        <label>Location</label>
        <input type="text" name="location" id="location" value="<?php echo $row['location'];?>">
    </div>

    <div class="login">
            <form action="" method="post">  
        <div class="option">
            <button style="border: 1px solid #83859C; background: transparent;"><a href="profile.php" style="color: #83859C;">Discard Changes</a></button>
            <button><input type="submit" name="submit" value="Update"></button>
            </div>
            </form>
    </div>
</body>
</html>