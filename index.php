<?php
    $insert = false; 
    if (isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password);

    if (!$con){
        die("connection to this database failed due to " . mysqli_connect_error()); 
    }
    // echo "Success connecting to the DB";

    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];


    $sql = "INSERT INTO `trip`.`tripdetails` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;


    if($con->query($sql)== true){
        // echo "Successfully Inserted";
        $insert = true;
    }

    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100;1,300&display=swap" rel="stylesheet">

<body>
    <img class="bg" src="BGW.jpg" alt="NIT Rourkela">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <h1>Welcome to NIT Rourkela US trip form</h1>
        <p>Enter your details and submit this form  </p>

       
    
    <script src="index.js"></script>


    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your Name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="text" name="email" id="email" placeholder="Enter your Email">
        <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Info"></textarea>
        <button class="btn">Submit</button>
    </form>
    <br>
    <?php
    if($insert == true){
    echo "<p class='submitMsg'>Thanks for submiting the form, we are happy to see you joining with US trip</p>";
    }
    ?>
</div>

</body>
</html>