<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);

   if ($username != "" && $password != "") {
      $sql = " SELECT * FROM user_form WHERE username = '$username' && password = '$password'";
      $checkUserId = mysqli_query($conn, $sql);

      if (mysqli_num_rows($checkUserId) > 0) {
         $error[] = 'username already exists!';
      }

      elseif ($password != $cpassword){
         $error[] = 'Password does not match!';
      }

      else{
         $insert = "INSERT INTO user_form(username, password) VALUES('$username','$password')";
         mysqli_query($conn, $insert);
         header('location:login_form.php? signup=signedin');
      }  
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body>

    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">Sign Up</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>

      <input type="username" name="username" placeholder="enter your username" class="box" required>

      <input type="password" name="password" id = "password" placeholder="enter your password" class="box" pattern = "(?=.*\d)(?=.*[a-z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{8,}" title="Must contain at least one number, one symbol, one uppercase and lowercase letter, and at least 8 or more characters" required>
      <input type="checkbox" onclick="pass()">Show Password

      <input type="password" name="cpassword" id = "cpassword" placeholder="confirm your password" class="box" title="Password does not match" required>
      <input type="checkbox" onclick="cpass()">Show Password
   
      <input type="submit" value="Submit" class="form-btn" name="submit">
      <p>already have an account? <a href="login_form.php">login now!</a></p>
   </form>

</div>
<script>
function pass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function cpass() {
  var x = document.getElementById("cpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>