<?php
session_start();

session_destroy();

// header('location: ../');
echo '<script type="text/javascript">
window.location.href = "../" ;
</script>';
?>