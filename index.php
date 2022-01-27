<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
$server = "localhost";
$username = "root";
$password = "";

//create a database connection
$con = mysqli_connect($server,$username,$password);
//check for connection success
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
 echo "success connecting to the db";
//collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `form`.`form` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `Date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

//execute the query
if($con-> query($sql) == True){
    // echo"successfully inserted";
    //flag for successful insertion
    $insert = true;
}
else{
   echo "ERROR:$sql <br> $con->error"; 
}
//close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BMC</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class ="bg" src="bg.jpg" alt="BMC">
    <div class="container">
        <h2>welcome Bhaktapur Multiple Campus</h2>
        <p>Enter your detail and submit this form if you are intreseted to study in this college</p>
        <?php
        if($insert == true){
        echo "<p class='submitform'>Thanks for submitting your form.We are happy to joining our college</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text"name="name"id="name"placeholder="enter your name">
            <input type="text"name="age"id="age"placeholder="enter your age">
            <input type="text"name="gender"id="gender"placeholder="enter your gender">
            <input type="email"name="email" id="email"placeholder="enter your email">
            
            <input type="phone"name="phone"id="phone"placeholder="enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10"placeholder="enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>


        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>