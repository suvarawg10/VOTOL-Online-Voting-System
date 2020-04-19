<?php
			ini_set ("display_errors", "1");
            error_reporting(E_ALL);
			ob_start();
			session_start();
			require('connection.php');
  
  if(empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
?>

<?php
    
    $positions= mysqli_query($conn,"SELECT * FROM tbpositions")or die("There are no records to display ... \n" . mysqli_error()); 
  ?>
  <?php
    
     if (isset($_POST['Submit']))
     {
       
       $position = addslashes( $_POST['position'] ); 
       $result = mysqli_query($conn,"SELECT * FROM tbcandidates WHERE candidate_position='$position'")
       or die(" There are no records at the moment ... \n"); 
     
     }
     else
     // do something
  
?>
<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="css/sty.css" rel="stylesheet" type="text/css" /> 
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
  //  alert("dfdfd");
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Choose another candidate ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body id="top" width="100%" height="100%">
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
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <!--<li class="active"><a href="index.php">Home</a></li>-->
		<li ><a href="voter.php">Voter</a> </li>
		<li ><a href="vote.php">Current Polls</a> </li>
		<li > <a href="logout.php">Logout</a></li>
      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="news" class="font-x3 uppercase btmspace-80 underlined"><marquee  hspace=0px vspace=15px height=30px behavior="right" ><b><h5>IMPORTANT : New polls are up and running. But they will not be up forever! Just Login and then go to Current Polls to vote for your favourate Candidate</h5></b></marquee></div>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80 underlined">VOT<a href="#">OL</a></h2>
    <ul class="nospace group">
	<li class="one_half" style="width:100%;">
	   <blockquote >
      <div id="page" style="text-align: center;">
					<div id="header">
					<h1 style="color:#00AAC9; text-align: center;">Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote. </h1>
					<p align="center">&nbsp;</p>
		</blockquote>
	</li>
      <li class="one_half" style="width:100%;">
        <blockquote>
				<div id="page" style="text-align: center;">
				<div id="header">
					<h1>CURRENT POLLS</h1>
				</div>
				<div class="refresh"></div>
				<div id="container">
				<div class="container-contact1" style="width:100%;" >
					<table width="100%"style="width:100%;"  align="center" style="border-radius:15px;font-size: 25px;">
					<form width="100%"  style="width:100%;" name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
					<tr width="100%"  style="width:100%; height:20px;">
					<td width="100%" style="width:100%;" ><SELECT width="100%" style="width:100%;height:40px;" NAME="position" id="position" onclick="getPosition(this.value)">
					<OPTION VALUE="select">Choose Position
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
				</SELECT></td></tr>
				<tr style="width:100%;"><input type="hidden" id="hidden" value="<?php echo $_SESSION['member_id']; ?>" /></tr>
				<tr style="width:100%;"><input type="hidden" id="str" value="<?php echo $_REQUEST['position']; ?>" /></tr>
				<tr style="width:100%;"><td><div class="container-contact1-form-btn">
					<input type="submit" name="Submit" value="See Candidates"  class="contact1-form-btn"  style="font-size:25px;">
					</div>
				</td>
				</tr>
					
				</form> 
				</table>
				</div>
				<br><br>
				<div id="header">
					<h1>Position : <?php echo $position;?><br><br>CANDIDATES</h1>
				</div>
				<br>
				<div class="container-contact1" style="width:100%;font-size: 25px;" >
					<table width="100%" height="100%" align="center" style="border-radius:15px;font-size: 25px;">
					<form>
					<tr>
					</tr>


<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
//}
  }
else
// do nothing
?>
				
					</form>
					</table>
				<center><span id="error"></span></center>
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
