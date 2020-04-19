
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
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
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
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined">VOT<a href="#">OL</a></h2>
    <ul class="nospace group">
      <li class="one_half" style="width:95%;">
<blockquote>
<?php
	require('connection.php');
  	//Process
  	if (isset($_POST['submit']))
  	{

  		$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
  		$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
  		$myEmail = $_POST['email'];
  		$myPassword = $_POST['password'];
  		$myVoterid = $_POST['voter_id'];

  		$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

  		$sql = mysqli_query( $conn,"INSERT INTO tbmembers(first_name, last_name, email,voter_id,password)  VALUES ('$myFirstName','$myLastName', '$myEmail','$myVoterid', '$newpass')" )
  		        or die( mysqli_error() );


  	die( "You have registered for an account.<br><br>Go to <a href=\"login.php\">Login</a>" );
  	}

  	echo "<center><h3>Register an account by filling in the needed information below:</h3></center>";
  	
  ?>
<div class="contact1" style="justify-content: center;align-items: center;">
		<div class="container-contact1" >
		<span class="contact1-form-title">
					New Voter Registration
				</span>
			<form name="form1" method="post" action="registeracc.php" onSubmit="return registerValidate(this)">
				
				<div class="wrap-input1 validate-input" data-validate = "First Name is required">
					<input class="input1" name="firstname" type="text" placeholder="First Name">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Last Name is required">
					<input class="input1" name="lastname" type="text" placeholder="Last Name">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Email is required">
					<input class="input1" name="email" type="text" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Voter Id is required">
					<input class="input1" name="voter_id" type="text"  placeholder="Voter Id">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Password is required">
					<input class="input1" name="password" type="password" placeholder="Password">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Retype Password">
					<input class="input1" name="ConfirmPassword" type="password" placeholder="Confirm Password">
					<span class="shadow-input1"></span>
				</div>
				<br>
				<div class="container-contact1-form-btn">
					<input type="submit" name="submit" value="Register Account" class="contact1-form-btn">
				</div>
			</form>
			
		</div>
	</div>	 
	<center><br>Already have an account? <a href="login.php"><b>Login Here</b></a></center>
	</blockquote>
      
      </li>
    </ul>
  </section>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
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
  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">Miss. Suvarna Gaikwad</a></p>
  </div>
</div>

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

