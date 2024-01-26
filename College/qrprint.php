<?php
session_start();

if (!isset($_SESSION['u_id'])) {

    echo '<script type="text/javascript">
  window.location.href = "../" ;
  </script>';
}
include '../util/connection.php';
if (!isset($_GET['pid'])) {
    echo "<script>
    history.back();
    </script>";
}
$tree_id = $_GET["pid"];
$query = "select * from tbl_tree where t_id = '$tree_id'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-adsense-account" content="ca-pub-8430383438150416">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Digify Garden</title>
    <style>
        .float {
            position: fixed;
            width: 80px;
            height: 80px;
            bottom: 5%;
            right: 15%;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
            font-size: 42px;
        }



        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *::before,
        *::after {
            box-sizing: inherit;
        }

        body {
            color: rgba(0, 0, 0, .87);
            font-size: 1rem;
            line-height: 1.5;
            font-family: Roboto, sans-serif;
            background: #0C9453;
            padding: 1.5rem;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .base {
            position: relative;
            overflow: hidden;
            display: flex;

            width: 500px;
            height: 705px;

            /* Styling */
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        }

        .card {
            width: 90%;
            height: 85%;
            border-radius: 15px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.17);
            backdrop-filter: blur(1px);
        }

        /* Cards titles styling
------------------------------------------ */
        .card__title {
            /* Just for styling */
            align-self: flex-end;
            padding: 0.5rem;
            color: rgba(255, 255, 255, .90);
            font-size: 2rem;
            line-height: 1;
            font-weight: 600;
        }

        /* Styles for:
** - Using IMG tag inside a container
------------------------------------------ */
        /* The image container */
        .card__thumbnail {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            /* horizontal center */
            align-items: center;
            /* vertical center */

            width: 100%;
            /* Thumbnail dimensions. */
            height: 100%;
            /*** Change the height to make the image smaller ***/
            /* background-color: rgba(0,0,0,.2);  /* for debugging */

        }

        /* Sets the image dimensions */
        .card__thumbnail>img {
            /* Tip: use 1:1 ratio images */
            height: 100%;
            /* or width when img.width > img.height */
        }

        /* Styles the title inside the img container */
        .card__thumbnail>.card__title {
            /* Just for styling */
            position: absolute;
            left: 0;
            bottom: 0;
        }

        .clogo {
            padding-left: 10%;
            padding-right: 10%;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .heading {
            padding-left: 20%;
            padding-right: 20%;
            position: relative;
        }

        .clogo img {
            height: 100px;

        }

        .heading img {
            width: 100%;
            height: 100%;
        }

        .qrmain {
            background: #0C9;
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 3%;
            display: flex;
            flex-direction: column;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 5%;
        }

        .qrmain img {
            width: 100%;
            height: auto;
            border-radius: 5%;
        }

        .qrmain span {
            color: #FFF;
            text-align: center;
            font-weight: 800;
            font-size: 32px;
            width: 100%;
            padding: 2%;
            height: auto;
        }

        .button-86 {
            all: unset;
            width: 100px;
            height: 30px;
            font-size: 16px;
            background: transparent;
            border: none;
            position: relative;
            color: #0C9;
            cursor: pointer;
            z-index: 1;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-86::after,
        .button-86::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: -99999;
            transition: all .4s;
        }

        .button-86::before {
            transform: translate(0%, 0%);
            width: 100%;
            height: 100%;
            background: #FFF;
            border-radius: 10px;
        }

        .button-86::after {
            transform: translate(10px, 10px);
            width: 35px;
            height: 35px;
            background: #ffffff15;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 50px;
        }

        .button-86:hover::before {
            transform: translate(5%, 20%);
            width: 110%;
            height: 110%;
        }

        .button-86:hover::after {
            border-radius: 10px;
            transform: translate(0, 0);
            width: 100%;
            height: 100%;
        }

        .button-86:active::after {
            transition: 0s;
            transform: translate(0, 5%);
        }

        .note {
            width: 100%;
            text-align: center;
            color: #fff;
        }

        .treename {
            color: #0006;
            position: absolute;
            right: -9%;
            bottom: 9%;
            font-size: 12px;
            transform: rotate(-90deg);
        }
    </style>
</head>

<body>
    <p class="note">NOTE: please download through computer for printing quality and size</p>
    <?php $row = mysqli_fetch_array($result) ?>
    <div class="container">

        <div class="base">
            <!-- The background image -->
            <figure class="card__thumbnail">
                <img src="assets/img/portfolio/image.jpg">
            </figure>
            <div class="card">
                <div class="clogo">
                    <img src="../logos/<?php echo $row["u_id"] ?>.png" alt="college Name" />
                </div>
                <div class="heading">
                    <img src="assets/img/portfolio/DigifyGardenlogo.svg" alt="digifygarden" />
                </div>
                <div class="qrmain">
                    <img id="qrimg"
                        src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://digifygarden.com/College/tree-details.php?id=<?php echo $row["t_id"]; ?>&choe=UTF-8"
                        title="Link to Google.com" />
                    <span>SCAN ME</span>
                </div>
                <p class="treename">
                    <?php echo $row["t_name"] ?>
                </p>
            </div>

        </div>

    </div>
    </div>
    <div class="float">
        <button class="button-86" role="button" onclick="printqr('<?php echo $row['t_id']; ?>')">Download PDF</button>
        <button class="button-86" role="button" onclick="downloadBase64File('<?php echo $row['t_id']; ?>')">Download
            JPEG</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script>
        var docu = new jsPDF({
            orientation: "p",
            unit: "mm",
            format: "a6"
        });
        var width = docu.internal.pageSize.width;
        var height = docu.internal.pageSize.height;
        var imgData = ""
        let page = document.querySelector(".base");
        html2canvas(page, {
            useCORS: true
        }).then(canvas => {
            // console.log(canvas.toDataURL("image/png"));
            imgData = canvas.toDataURL("image/jpeg");
            docu.addImage(imgData, 'jpeg', 0, 0, width, height);
        });

        function downloadBase64File(fileName) {
            //const linkSource = `data:${contentType};base64,${base64Data}`;
            const downloadLink = document.createElement("a");
            downloadLink.href = imgData;
            downloadLink.download = fileName;
            downloadLink.click();
        }

        function printqr(name) {
            docu.save(name + ".pdf");
        }
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8430383438150416"
     crossorigin="anonymous"></script>
</body>

</html>