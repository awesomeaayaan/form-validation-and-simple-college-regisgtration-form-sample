<?php 
$username = $_POST['username'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}
else{
    $stmt =$conn->prepare("insert into registration(username,password)values(?,?)");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute(1);
    echo "registration successfully..";
    $stmt->close();
    $conn->close();
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
    <form name="loginform" onsubmit="return validateForm()"method ="POST"action="./submit.php">
    
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
    <script>
        function validateForm(){
            if(document.loginform.username.value==""){
                alert("please provide your username:");
                document.loginform.username.focus();
                return false;
            }
            else if(document.loginform.password.value==""){
                alert("please provide your password");
                document.loginform.password.focus();
                return false;
            }
            else if(document.loginform.password.value.length<8){
                alert("password must be at least 8 digit long");
                document.loginform.focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>