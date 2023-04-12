<?php
include '../util/connection.php';

    $u_id = $_POST['u_id'];
    $c_name= $_POST['c_name'];
    $uni_name = $_POST['uni_name'];
    $email = $_POST['email'];
    $password = md5($_POST['psw']);

    $city= $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $district = $_POST['district'];
    $mobnum =$_POST['mobnum'];


$err="";


    //uid validation 

    if (strlen((string)$mobnum) < 10) {
       
        $err="Invalid Mobile Number";
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
      }else{
       
        $q= "select u_id,a_id from tbl_clg where u_id='$u_id'";
        $uidcheck = mysqli_query($conn,$q);
        
        if(mysqli_num_rows($uidcheck)>0){
            $row = mysqli_fetch_array($uidcheck);
            $q1="select u_id from tbl_clg_login cl where u_id='$u_id' and status=3";

            $uidcheck1 = mysqli_query($conn,$q1);

            if(mysqli_num_rows($uidcheck1)>0){
                
                mysqli_query($conn,"delete from tbl_clg_address where a_id='$row[a_id]'");
                
            }else{
              $err="AISCHE already exists";
                
            }
           
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
    
        }
    $target_dir = "../uploads/";
    $target_file = $target_dir . $u_id.".pdf";
    $uploadOk = 1;
    if($_FILES){
    
      if ($_FILES["clg_proof"]["size"] > 5000000) {
        $err="Sorry, your file is too large.";
        
             
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
        $uploadOk = 0;
      }
    
    
      
        //insertion to address table
        $sql = "INSERT INTO tbl_clg_address(city, pincode, district, state) VALUES ('$city', '$pincode', '$district','$state')";
        $result = mysqli_query($conn,$sql);
        if($result){
            //fetching address id
            $quary = "select max(a_id) as id from tbl_clg_address";
            $result1 = mysqli_query($conn,$quary);
            if($row = mysqli_fetch_array($result1)){
               $id= $row['id'];
    
               //insertion to college table
            $query = "INSERT INTO tbl_clg(u_id, c_name, uni_name, a_id, mobnum,email)  VALUES ('$u_id', '$c_name', '$uni_name' ,$id, '$mobnum','$email')";
            $result1 = mysqli_query($conn,$query); 
            if($result1){
                $query1 = "INSERT INTO tbl_clg_login(u_id,password,status)  VALUES ('$u_id', '$password', 0)";
                $result2 = mysqli_query($conn,$query1);
                if($result2){
                    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $err="Sorry, there was an error uploading your file";
      echo" <script>
      window.location.href='register.php?regerror='".$err."';
      </script>";
      } else {
        if (move_uploaded_file($_FILES["clg_proof"]["tmp_name"], $target_file)) {
        } else {
          $err="Sorry, there was an error uploading your file";
          echo" <script>
          window.location.href='register.php?regerror='".$err."';
          </script>";
        }
      }
                   
                    $_SESSION['u_id'] = $u_id;
                    
                    echo '<script>
                    window.location.href = " ../College/" ;
                    </script>
                    ';
                }
                else{
                  $err="Error occured";
                      
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
                }
            }
            else{
              $err="Error occured";
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
            }  
        }
        }else{
            $err="Data not inserted";
                
        echo '<script type="text/javascript">
        window.location.href = "./register.php?regerror='.$err.'" ;
        </script>';
        }
      
    
    
    
    }else{
      $err="file not uploaded";
      echo '<script type="text/javascript">
      window.location.href = "./register.php?regerror='.$err.'" ;
      </script>';
    }
  }    

   
  

  