<?php
session_start();
include '../../util/connection.php';
?>


<?php


// check if user is logged in as admin
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../"); // redirect to admin login page if not logged in
  exit;
}

// check if user id is specified in URL parameter
if (!isset($_GET['user_id'])) {
  header("Location: ./collagemanagement.php"); // redirect to users page if user id is not specified
  exit;
}

// get user data from database or wherever user data is stored
$user_id = $_GET['user_id'];
$query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id WHERE tbl_clg.u_id = '".$user_id."' ;";

$user_data =mysqli_query($conn, $query);
// check if user data is valid
if (!$user_data) {
  header("Location: collagemanagement.php"); // redirect to users page if user data is not valid
  exit;
}
$data = mysqli_fetch_assoc($user_data);
// check if form is submitted

  if (isset($_POST['submit'])) {
   
  // get form data
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // validate form data
  $errors = [];
  
  if ($new_password != $confirm_password) {
    $errors['confirm_password'] = 'Confirm password does not match new password';
  
  }

  // if there are no errors, update password
  $logid=$data['log_id'];
  if (empty($errors)) {
    $new_password = mysqli_real_escape_string($conn, $new_password);

$user_id = mysqli_real_escape_string($conn, $user_id);
    //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $new_password = md5($new_password);
   $q="UPDATE tbl_clg_login SET password='$new_password' WHERE log_id = $logid";

   
 $updUser =mysqli_query($conn, $q);
 
 if (!$updUser) {
  die('Error executing query: ' . mysqli_error($conn));
}

 if ($updUser) {
  $_SESSION['success_message'] = 'Password changed successfully';
  header("Location: ./collagemanagement.php");
  exit;
}
    
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password - <?php echo $data['c_name'] ?></title>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537"
     crossorigin="anonymous"></script>
</head>
<body>

  <h1>Change Password - <?php echo$data['c_name'] ?></h1>

  <?php if (!empty($errors)): ?>
    <ul>
      <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="post" id="change-password-form">
  <div class="form-group">
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" class="form-control" required>
    <div class="password-strength-meter">
      <div class="password-strength-bar"></div>
      <div class="password-strength-text"></div>
    </div>
  </div>

  <div class="form-group">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" class="form-control" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary" >Change Password</button>
  <button type="button" class="go-back-button" onclick="history.back()">Go Back</button>
</form>



<style>
  /* Style for the form */
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  .form-group {
    margin-bottom: 15px;
  }
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  input[type="password"] {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
  }
  .go-back-button {
      background-color: #eee;
      border: none;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
    }
  button[type="submit"] {
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }
  button[type="submit"]:hover {
    background-color: #0069d9;
  }
  .password-strength-meter {
    margin-top: 5px;
    height: 10px;
    position: relative;
    background-color: #f9f9f9;
    border-radius: 5px;
    overflow: hidden;
  }
  .password-strength-bar {
    height: 100%;
    width: 0%;
    background-color: #d9534f;
    position: absolute;
    top: 0;
    left: 0;
    transition: width 0.3s ease-in-out;
  }
  .password-strength-text {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 12px;
    font-weight: bold;
    color: #d9534f;
    text-transform: uppercase;
    line-height: 10px;
    padding: 0 5px;
  }
  .password-strength-text.weak {
    color: #d9534f;
  }
  .password-strength-text.moderate {
    color: #f0ad4e;
  }
  .password-strength-text.strong {
    color: #5cb85c;
  }
</style>

<script>
  // Password strength meter
  var passwordInput = document.querySelector('input[name="new_password"]');
  var passwordStrengthBar = document.querySelector('.password-strength-bar');
  var passwordStrengthText = document.querySelector('.password-strength-text');

  passwordInput.addEventListener('input', function() {
    var password = passwordInput.value;
    var strength = 0;

    if (password.length >= 8) {
      strength += 1;
    }

    if (password.match(/[a-z]/)) {
      strength += 1;
    }

    if (password.match(/[A-Z]/)) {
      strength += 1;
    }

    if (password.match(/[0-9]/)) {
      strength += 1;
    }

    if (password.match(/[^a-zA-Z0-9]/)) {
      strength += 1;
    }

    

  // Password match validation
  var passwordMatchInput = document.querySelector('input[name="confirm_password"]');
  var submitButton = document.querySelector('button[type="submit"]');

  // passwordMatchInput.addEventListener('input', function() {
  //   if (passwordMatchInput.value === passwordInput.value) {
  //     submitButton.removeAttribute('disabled');
  //   } else {
  //     submitButton.setAttribute('disabled', 'disabled');
  //   }
  // })
  
  
  });
</script>

</body>
</html>
