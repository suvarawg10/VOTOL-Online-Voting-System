<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Checklogin</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

      <script language="JavaScript" src="js/admin.js">
	</script>

  
</head>
<body class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/access.jpg');
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

<?php
//session_start();
ini_set ("display_errors", "1");
error_reporting(E_ALL);
ob_start();
session_start();
require('../connection.php');
$tbl_name='tbadministrators'; // Table name
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
			//MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_escape_string($conn,$myusername);
$mypassword = mysqli_escape_string($conn,$mypassword);
			
$sql = "SELECT * FROM $tbl_name WHERE email='$myusername' and password='$encrypted_mypassword'";
$result= mysqli_query($conn, $sql);
$count= mysqli_num_rows($result);
$user = mysqli_fetch_assoc($result);
if($count==1){
     //$user = $result->fetch_assoc();
     //$user = mysqli_fetch_assoc($result);
	 //$_SESSION['admin_id'] = $user['admin_id'];
    
                if(isset($_POST['remember']))
                {
                    setcookie('$email',$_POST['myusername'], time()+30*24*60*60); // 30 days
                    setcookie('$pass', $_POST['mypassword'],time()+30*24*60*60); // 30 days
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;
					//$user = mysqli_fetch_assoc($result);
					$_SESSION['admin_id'] = $user['admin_id'];
					//echo $_SESSION['admin_id'];
                    header("Location:admin.php");
                    exit;
                }
                else
                {
                    $log1=11;
                    $_SESSION['log1'] = $log1;
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;
                    //$user = mysqli_fetch_assoc($result);
     				$_SESSION['admin_id'] = $user['admin_id'];
					//echo $_SESSION['admin_id'];
                    header("Location:admin.php");
                    exit;
                }
            

}
else {
    echo "<br> <br> <br> ";
    echo "";
}

ob_end_flush();

?> 

<div class="pen-title">
  <h1 style="color:white;"> Online Voting System Wrong Credientials </h1>
 
</div>

<div class="container" >
  <div class="card"></div>

  <div class="card">
    <h1 class="title">Wrong Credientials!</h1>
    <form name="form1" method="post" action="logout.php" onsubmit="return loginValidate(this)">

   
      <div id="container">
			<center> <h3>Wrong Username or Password<br><br>Return to <a href="..\index.php">login</a> </h3></center> 
	</div>
      

    </form>
  </div>
  
</div>


</body>
</html>