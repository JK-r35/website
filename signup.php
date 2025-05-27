
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}


.container {
  padding: 16px;
}


.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
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
<script>
  function formValidation(){
    let x=document.forms["form1"]["username"].value;
    if(x==""){

      alert ("Name must be filled out");
      return false;
    }
  }
  </script>
<body>
  <h1 style="text-align: center;padding-left:  40px; padding-top: 20px; font-family: fantasy;" >MARIANA TRENCH</h1>
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="login.php">login</a></li>
    <li><a href="signup.php">signup</a></li>
    
  </ul>

<form action="signup.php" method="post" id ="Form1" name="form1" style="border:1px solid #ccc" onsubmit="return formValidation() ">
  <div class="container" style="max-width:500px;margin-left: 33%;">
    <h1 style="text-align: center">Sign Up</h1>
    <p style="text-align: center">Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" >
    
    

    <div class="clearfix">
      
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>

 
<?php
$registered = 0;
$userexist = 0;
if ($_SERVER['REQUEST_METHOD']=='POST'){
  include 'server.php';
  $email = $_POST['email'];
  $password = $_POST['psw'];
  $sql = "SELECT * FROM info WHERE email='$email'";
  $result = mysqli_query($Con,$sql);
  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num>0) {
      $userexist = 1;
    }else {
      $sql = "INSERT INTO info(email, password) VALUES
      ('$email', '$password')";
      $result =mysqli_query($Con,$sql);
      if ($result) {
        $registered = 1;
      }else { +
        die(mysqli_error($Con));
      }
    }
  }
}
?>

<?php
if ($userexist) {
  echo "<script>alert('User already exists. Please try logging in.');</script>";
}
?>

<?php
if ($registered) {
  echo '<div class="alert alert-success alert-dissimble fade show" role="alert">
  <strong>Congrats</strong> You are successfully Signed In.   <button
  type="button" class="btn-close" data-bs-dismiss="alert" aria
  label="Close"></button>
  </div>';
}
?>