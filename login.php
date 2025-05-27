<?php
$success= 0;   
$invalid = 0;   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {      
include 'server.php';   
$name = $_POST['name'];   
$password = $_POST['psw'];   
$sql = "SELECT * FROM info WHERE email='$name' AND password='$password'";    
$result = mysqli_query($Con,$sql);   
if ($result) {   
$num = mysqli_num_rows($result);   
if ($num > 0) {              
$success = 1;    
} else {   
$invalid=1;
}
}
}
?>
<?php    
if ($success){   
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">    
  <strong>Congrats</strong> You are successfully loged in.  <button 
  type="button" class="btn-close" data-bs-dismiss="alert" aria 
  label="Close"></button>   
  </div>' ;}  

?>   
<?php   
if($invalid){    echo '<div class="alert alert-danger alert
  dismissible fade show" role="alert">    <strong>Error</strong> Invalid.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria 
  label="Close"></button>   
  </div>';   
  }   
?>
  

<!DOCTYPE html>
<html>
<head>
  <script>
    function formValidation(){
      let x=document.forms["form1"]["email"].value;
      if(x==""){
        alert("Name must be filled out");
        return false;
      }

    }</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>
  <h1 style="text-align: center;padding-left:  40px; padding-top: 20px; font-family: fantasy;" >MARIANA TRENCH</h1>
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="login.php">login</a></li>
    <li><a href="signup.php">signup</a></li>
    
  </ul>

<h2>Login Form</h2>

<form  action="login.php" method="post" id ="Form1" name="form1"  onsubmit="return formValidation()">
  

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="index.html" style="text-decoration: none; color: black;">Cancel</a></button>
    
  </div>
</form>

</body>
</html>
