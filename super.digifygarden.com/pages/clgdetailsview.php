
<?php
session_start();
unset($_SESSION["u_id"]);
if (!isset($_SESSION['admin_id'])) {
  // header('location: ../');
  echo '<script type="text/javascript">
  window.location.href = "../" ;
  </script>';
}
if(!isset($_GET["id"])){

    echo '<script type="text/javascript">
    window.location.href = "./collagemanagement.php" ;
    </script>';
}
$cid =$_GET["id"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigifyGarden</title>
    <link rel="stylesheet" type="text/css" href="clgstyle.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 800px;
            height: 400px;
        }
        .card-header {
            background-color: #007bff;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card-header h4 {
            margin: 0;
            font-size: 24px;
        }
        .card-body {
            padding: 20px;
        }
        .card-body p {
            font-size: 18px;
            margin: 0 0 10px 0;
        }
        .card-body strong {
            font-weight: 600;
        }
        button {
        background-color: #4CAF50; /* Green background */
        border: none; /* Remove border */
        color: white; /* White text */
        padding: 15px 32px; /* Padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make it inline */
        font-size: 16px; /* Font size */
        margin: 4px 2px; /* Margin */
        cursor: pointer; /* Add cursor pointer */
        border-radius: 8px; /* Add border radius */
    }

    button:hover {
        background-color: #3e8e41; /* Darker green background on hover */
    }
    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537"
     crossorigin="anonymous"></script>
</head>
<body>

<?php

include '../../util/connection.php';
$query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id where tbl_clg.u_id = '" . $cid . "';";

$clg = mysqli_query($conn, $query);


?>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4 class="m-0 text-white">Details</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <p class="mb-1"><strong>College:</strong></p>
           
            <p class="mb-1"><strong>Phone:</strong></p>
            
            <p class="mb-1"><strong>Place:</strong></p>
            <p class="mb-1"><strong>Pincode:</strong></p>
            <p class="mb-1"><strong>District:</strong></p>
            <p class="mb-1"><strong>State:</strong></p>
          </div>
          <div class="col-md-9">
<?php
 if (mysqli_num_rows($clg) > 0) {

    while ($rowData = mysqli_fetch_array($clg)) {
      
      $i = $rowData['u_id'];
      $date_string = $rowData['clg_reg_date'];
      $formatted_date = date("F j, Y", strtotime($date_string));
    
echo ' 
<p class="mb-1">'.$rowData['c_name'].'</p>

<p class="mb-1">'.$rowData['mobnum'].'</p>
<p class="mb-1">'.$rowData['city'].'</p>
<p class="mb-1">'.$rowData['pincode'].'</p>
<p class="mb-1">'.$rowData['district'].'</p>
<p class="mb-1">'.$rowData['state'].'</p>';
    }
    }
?>
         
           
          </div>
         
        </div>
        <button onclick="goBack()">Go Back</button>
      </div>
      
     
    </div>
  </div>

  <script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
