
<?php
				
				ini_set ("display_errors", "1");
				error_reporting(E_ALL);
				ob_start();
				session_start();
				require('../connection.php');
				//If your session isn't valid, it returns you to the login screen for protection
		
				if(empty($_SESSION['admin_id'])){
					//echo $_SESSION['admin_id'];
				 	header("location:access-denied.php");
				}
				//Process
				if (isset($_POST['submit']))
				{

					$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
					$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
					$myEmail = $_POST['email'];
					$myPassword = $_POST['password'];
					$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash
					$sql = mysqli_query($conn, "INSERT INTO tbadministrators(first_name, last_name, email, password) VALUES('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
					        or die( mysqli_error() );

					die( "A new administrator account has been created." );
				}
				//Process
				if (isset($_GET['id']) && isset($_POST['update']))
				{
					$myId = addslashes( $_GET['id']);
					$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
					$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
					$myEmail = $_POST['email'];
					$myPassword = $_POST['password'];

					$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

					$sql = mysqli_query( $conn,"UPDATE tbadministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE admin_id = '$myId'" )
					        or die( mysqli_error() );
					//echo '<script>alert("An administrator account has been updated.")</script>'; 
					header("Location: manage-admins.php");
				}
			?>
<?php

//fetch data for update file
$result=mysqli_query($conn, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $adminId = $row['admin_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($conn, "UPDATE tbadministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
}
?>
<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 <link href="css/sty.css" rel="stylesheet" type="text/css" /> 
<script language="JavaScript" src="js/user.js">
</script>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="https://uk.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="https://www.rss.com/"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> +8801773254014</li>
        <li><i class="fa fa-envelope-o"></i> suvarnawg10@gmail.com </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="..\index.html">ONLINE VOTING</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="manage-admins.php">Manage Admin</a></li>
            <li><a href="positions.php">Manage Positions</a></li>
            <li><a href="candidates.php">Manage Candidates</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        <li><a href="../index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80 underlined">VOT<a href="#">OL</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
		<CAPTION><h3 align="center">ADMIN PROFILE</h3></CAPTION>
			<div class="container-contact1" style="width:100%;height:100%;padding:0px 0px 0px 0px;">
            <table border="0" width="700px" align="center" style="border-color:#FFFFFF; margin: 0px;">
            
            <form class="contact1-form validate-form">
            <br>
            <tr>
                <td style="color:#000000"; >Id:</td>
                <td style="color:#000000"; ><?php echo $adminId ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >First Name:</td>
                <td style="color:#000000"; ><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Last Name:</td>
              <td style="color:#000000"; ><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Email:</td>
                <td style="color:#000000"; ><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Password:</td>
                <td style="color:#000000"; >Encrypted</td>
            </tr>
			</form>
            </table>
			</div>
            

        </blockquote>
      
      </li>
      <li class="one_half">
        <blockquote>
			<CAPTION   ><h3 align="center">UPDATE PROFILE</h3></CAPTION>
			<div class="container-contact1" style="width:100%;height:100%;padding:0px 0px 0px 0px;">
            <table  border="0" width="800px" align="center" style="border:0px None white; margin: 15px;margin-bottom:15px;">
            <form class="contact1-form validate-form" action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onsubmit="return updateProfile(this)">
            <table align="center"  border="0" >
            <tr><td  align="center" style="border-color:white;background-color:#FFFFFF;color:#000000; border:0px None white;"   >First Name:</td><td style="background-color:#FFFFFF"  ><input  class="input1" style="color:#000000"; type="text" font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>

            <tr><td align="center"  style="background-color:#FFFFFF;color:#000000;border:0px None white;">Last Name:</td><td style="background-color:#FFFFFF"><input class="input1" style="color:#000000";  type="text" font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>

            <tr><td align="center" style="background-color:#FFFFFF;color:#000000;border:0px None white;" >Email Address:</td><td style="background-color:#FFFFFF"><input class="input1" style="color:#000000";  type="text" font-weight:bold;" name="email" maxlength="100" value=""></td></tr>

            <tr><td align="center" style="background-color:#FFFFFF;color:#000000;border:0px None white;" >New Password:</td><td style="background-color:#FFFFFF" ><input  class="input1" style="color:#000000";  type="password" font-weight:bold;" autocomplete name="password" maxlength="15" value=""></td></tr>

            <tr><td align="center" style="background-color:#FFFFFF;color:#000000;border:0px None white;" >Confirm New Password:</td><td style="background-color:#FFFFFF" ><input  class="input1" autocomplete  style="color:#000000";  type="password"  font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>

            <tr><td align="center" style="background-color:#FFFFFF;color:#000000;border:0px None white;" >&nbsp;</td><td><div class="container-contact1-form-btn"><input type="submit" name="update" value="Update Profile" class="contact1-form-btn"></div></td></tr>
            </table>
            </form>
            </table>
			</div>



        </blockquote>
      
      </li>

    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="title">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
         
          <p>
          Name        :Miss. Suvarna Gaikwad<br>
          University  : DMCE <br>
          Batch       : 2k20 <br>
          Dept        : CSE <br>
          </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
       
        <li><i class="fa fa-phone"></i> +8801773254014<br>
          +8801521479574</li>


      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">
        
        <li><i class="fa fa-envelope-o"></i> suvarnawg10@gmail.com </li>

      </ul>
    </div>


    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">Miss. Suvarna Gaikwad</a></p>
   
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>


