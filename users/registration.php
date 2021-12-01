<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$regno=$_POST['regno'];
	$contactno=$_POST['contactno'];
	$hostel=$_POST['hostel'];
	$mess=$_POST['mess'];
	$password=md5($_POST['password']);
	$status=1;
	$query=mysqli_query($con,"insert into users(fullName,userEmail,Registration_No,contactNo,Hostel_Block,Mess_Block,password,status) values('$fullname','$email','$regno','$contactno','$hostel','$mess','$password','$status')");
	$msg="Registration successfull. Now the Student can login !";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>VHS | Student Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
	<h3 align="center" style="color:#fff"><a style="color:#fff">VIT HOSTEL SERVICES (STUDENT REGISTRATION)</a></h3>
	<hr />
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">Student Registration</h2>
		        <p style="padding-left: 1%; color: green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?>


		        </p>
		        <div class="login-wrap">
		         <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
		            <br>
		            <input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
		            <br>
		            <input type="text" class="form-control" placeholder="Register-No" required="required" name="regno"><br>

		            <!--<input type="text" class="form-control" placeholder="Hostel Block" required="required" name="hostel"><br>-->

	<select name="hostel" class="form-control" required>
	<option value="">Select Hostel Block</option> 
	<?php $query=mysqli_query($con,"select * from state");
	while($row=mysqli_fetch_array($query))
	{?>

	<option value="<?php echo $row['stateName'];?>"><?php echo $row['stateName'];?></option>
	<?php } ?>
	</select> <br>


		            <!--<input type="text" class="form-control" placeholder="Mess Block" required="required" name="mess"><br>
		            -->

	<select name="mess" class="form-control" required>
	<option value="">Select Mess Block</option> 
	<?php $query=mysqli_query($con,"select * from state1");
	while($row=mysqli_fetch_array($query))
	{?>

	<option value="<?php echo $row['stateName'];?>"><?php echo $row['stateName'];?></option>
	<?php } ?>
	</select> <br>




		            
		             <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required="required" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
		            
		            <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit"><i class="fa fa-user"></i> Register</button>
		            <hr>
		            
		            
		
		        </div>
		
		      
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
