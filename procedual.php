<? php 
insert= false;
if(isset($_POST['name'])){
$servername = "localhost";
$username= "root";
$passport = "";

//creating the connection
$conn = mysqli_connect($servername,$username,$password);

//checking connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());  
}
echo "connect successfully";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `demo`.`demo` (`username`, `password`) VALUES ('$username', '$password')";

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
    <title>Login form</title>
</head>
<body>
    <h2>client side form validation</h2>
    <form name="loginform" method ="POST"action="procedual.php">
    
        <div>
            <label for="username">Please enter your username:</label>
            <input type="text"name="username"id="username">
        </div>
        <div>
            <label for="password">Please enter your password:</label>
            <input type="text"name="password"id="password">
        </div>
        <div>
            <input type="submit"name="login" value="login">
        </div>
    
    </form>
    
</body>
</html>