<?php
session_start();
include '../../util/connection.php';
$error = '';

if(isset($_POST['submit'])){
    $t_name = $_POST['name'];
    $family = $_POST['family'];
    $synonym = $_POST['synonym'];
    $com_name = $_POST['comname'];
    $f_period = $_POST['period'];
    $origin = $_POST['origin'];
    $habitat = $_POST['habitat'];
    $uses = $_POST['uses'];
    $key_char = $_POST['char'];
    $u_id = $_SESSION['u_id'];
    $t_id = $_POST['tid'];
    
    $query = "UPDATE tbl_tree set u_id= '$u_id' ,t_name= '$t_name' ,family= '$family' ,synonym= '$synonym',com_name= '$com_name',f_period= '$f_period',origin= '$origin',habitat= '$habitat',uses= '$uses',key_char= '$key_char' where t_id= '$t_id' " ;
    $result = mysqli_query($conn, $query);




  

if($result){

    if($_FILES["image"]['size'] > 0){
        
        $target_dir = "./tree_images/";
        $target_file = $target_dir . $t_id.".jpg";
        $target_file = $target_dir . $t_id.".jpg";
        $uploadOk = 1;
        if ($_FILES["image"]["size"] > 500000) {
           $err= "Sorry, your file is too large.";

           echo '<script type="text/javascript">
           window.location.href = "./edit-tree.php?regerror='.$err.'" ;

              </script>';

            $uploadOk = 0;
          }

          
        if ($uploadOk == 0) {
            
            $err= "Sorry, your file was not uploaded.";
            echo '<script type="text/javascript">
              window.location.href = "./edit-tree.php?regerror='.$err.'" ;
              </script>';
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //   echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            //   header("Location: ../index.php");

            //working

            echo '<script>
            window.location.href = " ../tree_list.php" ;
            </script>';
            } else {
              $err= "Sorry, there was an error uploading your file.";

              echo '<script type="text/javascript">
              window.location.href = "./edit-tree.php?regerror='.$err.'" ;
              </script>';
            }
          }
    }else{

        echo '<script type="text/javascript">
        window.location.href = "../tree_list.php" ;
        </script>';
       
    }

    

       

       
  
}else{
    $err =  "Tree Details Not Added";
    echo '<script type="text/javascript">
    window.location.href = "./edit-tree.php?regerror='.$err.'" ;
    </script>';
    
}
    




 



}


?>

