<?php 


ob_start();
session_start();
if(isset($_SESSION['admin'])!=""){
	header("Location: index.php");
}
include_once 'action/db_connect.php'; 
$error = false;
if (isset($_POST['btn-signup'])) {

	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$email = trim($_POST[ 'email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

	if(empty($name)) {
		$error= true;
		$nameError = "Please enter your full name.";
	}else if (strlen($name) < 3) {
		$error = true;
		$nameError = "Name must be at least 3 characters.";
	}else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true ;
  		$nameError = "Name can only contain alphabets and space.";
	}

	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
  		$emailError = "Please enter valid email address." ;
	}else {
		$query = "SELECT email FROM users WHERE email='$email'";
		$result = mysqli_query($connect, $query);
		$count = mysqli_num_rows($result);
		if($count!=0) {
			$error = true;
			$emailError = "Provided Email is already in use.";
		}
	}

	if (empty($pass)) {
		$error = true;
  		$passError = "Please enter password.";
	}else if (strlen($pass) < 6) {
		$error = true;
		$passError = "Password must have atleast 6 characters." ;
	}

	$password = hash('sha256' , $pass);


	if( !$error ) {
		$query = "INSERT INTO users(user_name,email,password) VALUES('$name','$email','$password')";
		$res = mysqli_query($connect, $query);

		if ($res) {
			$errTyp = "success";
   			$errMSG = "Successfully registered, you may login now";
   			unset($name);
   			unset($email);
   			unset($pass);
		}else {
			$errTyp = "danger";
   			$errMSG = "Something went wrong, try again later..." ;
		}

	}

}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
	
	<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		
			<h2>SIGN UP</h2>
			<hr>
			<?php 
				if(isset($errMSG)){
				echo "<div class='alert alert-".$errTyp."'>".$errMSG."</div>";
				}
			 ?>

			<input type ="text" name="name" class="form-control" placeholder="Enter Name"maxlength="50" value="<?php echo $name?>">

			<span class="text-danger"> <?php echo $nameError; ?> </span>

			<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>">

			<span class="text-danger"> <?php echo $emailError; ?> </span>

			<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15">

			<span class="text-danger"> <?php echo $passError; ?> </span>

			<hr>

			<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>

			<hr>

			<a href="signin.php">Sign in here</a>

	</form>
	</div>

</body>
</html>

<?php ob_end_flush(); ?>




