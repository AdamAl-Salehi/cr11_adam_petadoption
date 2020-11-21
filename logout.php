
<?php
session_start();
if (!isset($_SESSION['user'])) {
 header( "Location: index.php");
} else if(isset($_SESSION[ 'user'])!="") {
 header("Location: signin.php");
}


 unset($_SESSION['user' ]);
 unset($_SESSION['admin' ]);
 session_unset();
 session_destroy();
 header("Location: index.php");
 exit;

?>