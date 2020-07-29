
<?php
function validate($user,$pass,$remember){
  include('../databaseconnection/dbconfig.php');
  $flag=0;
  $query = "SELECT * FROM `users` WHERE username='$user'";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);
  if (isset($row)){
            if ($pass==$row['password']) {
                $_SESSION['id'] = $row['user_id'];
                if ($remember=='1') {
                    setcookie("id",$row['user_id'], time() + 60*60*24*365);
                    setcookie("username",$row['username'], time() + 60*60*24*365);
                    setcookie("name", $row['name'], time() + 60 * 60 * 24 * 365);
                    setcookie("des", $row['designation'], time() + 60 * 60 * 24 * 365);
                  }
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                $_SESSION['name'] = $row['name'];
                $_SESSION['des'] = $row['designation'];
                header("Location:middle.php");
            }
            else{
              $flag=1;        
            }

  }
  else{$flag=1;}
return $flag;
}

?>
