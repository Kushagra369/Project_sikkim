
<?php
session_start();
require 'validation.php';
if (array_key_exists("logout", $_GET)) {
    unset($_SESSION);
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE["id"] = "";
    setcookie("username", "", time() - 60 * 60);
    $_COOKIE["username"] = "";
    setcookie("name", "", time() - 60 * 60);
    $_COOKIE["name"] = "";
    setcookie("des", "", time() - 60 * 60);
    $_COOKIE["des"] = "";
    session_destroy();
    header("Location:./login.php");
} else if ((array_key_exists("id", $_SESSION) and $_SESSION['id']) or (array_key_exists("id", $_COOKIE) and $_COOKIE['id'])) {

    header("Location:../main.php");

}

if (array_key_exists('submit', $_POST)) {
    if (isset($_POST['remember'])) {
        $flag = validate($_POST['user'], $_POST['pass'], $_POST['remember']);
        if ($flag == 1) {
            echo " <script type='text/javascript'> alert('Please Check Your Username/Password'); </script>";
        }
    } else { $flag = validate($_POST['user'], $_POST['pass'], 0);
        if ($flag == 1) {
            echo " <script type='text/javascript'> alert('Please Check Your Username/Password'); </script>";
        }}
}
?>

<!DOCTYPE html>
<html>
<head>
 
<?php
  include ('../libraries/links.php');
  ?>
  <title>Govt. of Sikkim</title>
  

    <link rel="stylesheet" type="text/css" href="css/login.css">
    
</head>
<body>
  <div class="topbar" >
  <div class="container" >
        <img id="logo" src="img\logo.png" style="width:120px;height:100px" class="rounded float-left" alt="LOGO" >
        <h1 id="headingproposal" class="h1" >GOVERNMENT OF SIKKIM</h1>
  </div>
  </div>

<div class="container" id='form'>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header" align=center>
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form method='POST'>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name='user' type="text" class="form-control" placeholder="username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name='pass' type="password" class="form-control" placeholder="password" required>
					</div>
					<div class="row align-items-center remember">
						<input name='remember' type="checkbox" value=1>Remember Me
					</div>
					<div class="form-group">
						<input name='submit' type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>

</html>

<script>
document . documentElement . webkitRequestFullScreen();

</script>