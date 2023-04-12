<?php

if (!isset($_GET['pid'])) {
    echo "<script>
    history.back();
    </script>";
}
$id = $_GET['pid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigifyGarden</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">

</head>

<body>
    <img style="padding-left:30%; width: 600px; height:600px" src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $id ?>&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive" />

    <button onclick="backFun()" style="background-color: #555555; color: white; border:solid; " class="hide">Go Back</button>


</body>

</html>


<script>
    function backFun() {
        history.back();
    }
</script>