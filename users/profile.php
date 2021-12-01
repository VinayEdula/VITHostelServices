<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$DOB=$_POST['DOB'];
$Branch=$_POST['Branch'];
$Specialization=$_POST['Specialization'];
$School=$_POST['School'];
$Hostel_Block=$_POST['Hostel_Block'];
$Hostel_Room_No=$_POST['Hostel_Room_No'];
$Mess_Block=$_POST['Mess_Block'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$state=$_POST['state'];
$country=$_POST['country'];
$query=mysqli_query($con,"update users set fullName='$fname',DOB='$DOB',Branch='$Branch',Specialization='$Specialization',School='$School',Hostel_Block='$Hostel_Block',Hostel_Room_No='$Hostel_Room_No',Mess_Block='$Mess_Block',address='$address',pincode='$pincode',state='$state',country='$country',updationDate=NOW() where Registration_No='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VMS | Student Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($con,"select * from users where Registration_No='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?>'s Profile</h4>
    <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">Full Name</label>
  <div class="col-sm-4">
   <input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']);?>" class="form-control" readonly>
  </div>

   <label class="col-sm-2 col-sm-2 control-label">Registration.No</label>
   <div class="col-sm-4">
    <input type="text" name="Registration_No" required="required" value="<?php echo htmlentities($row['Registration_No']);?>" class="form-control" readonly>
   </div>

  <br> </br> <br> </br>

  <label class="col-sm-2 col-sm-2 control-label">Mail-ID</label>
   <div class="col-sm-4">
    <input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>
   </div>

   <label class="col-sm-2 col-sm-2 control-label">DOB </label>
   <div class="col-sm-4">
    <input type="date" name="DOB" required="required" value="<?php echo htmlentities($row['DOB']);?>" class="form-control">
   </div>
</div>

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">Branch</label>
  <div class="col-sm-4">
   <input type="text" name="Branch" required="required" value="<?php echo htmlentities($row['Branch']);?>" class="form-control" >
  </div>

   <label class="col-sm-2 col-sm-2 control-label">Specialization</label>
   <div class="col-sm-4">
    <input type="text" name="Specialization" required="required" value="<?php echo htmlentities($row['Specialization']);?>" class="form-control" >
   </div>

  <br> </br> <br> </br>

  <label class="col-sm-2 col-sm-2 control-label">School</label>
   <div class="col-sm-4">
    <input type="text" name="School" required="required" value="<?php echo htmlentities($row['School']);?>" class="form-control" >
   </div>
</div>

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">Hostel Block</label>
  <div class="col-sm-4">
    <select name="Hostel_Block" required="required" class="form-control">
    <option value="<?php echo htmlentities($row['Hostel_Block']);?>"><?php echo htmlentities($st=$row['Hostel_Block']);?></option>
    <?php $sql=mysqli_query($con,"select stateName from state ");
    while ($rw=mysqli_fetch_array($sql)) 
    {
     if($rw['stateName']==$st)
     {
      continue;
     }
     else
     {
      ?>
      <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
      <?php
     }
   }
      ?>
    </select>
  </div>
 <label class="col-sm-2 col-sm-2 control-label">Hostel Room.No</label>
  <div class="col-sm-4">
   <input type="text" name="Hostel_Room_No" required="required" value="<?php echo htmlentities($row['Hostel_Room_No']);?>" class="form-control">
  </div>

  <br> </br> <br> </br>

  <label class="col-sm-2 col-sm-2 control-label">Mess Block</label>
  <div class="col-sm-4">
    <select name="Mess_Block" required="required" class="form-control">
    <option value="<?php echo htmlentities($row['Mess_Block']);?>"><?php echo htmlentities($st=$row['Mess_Block']);?></option>
    <?php $sql=mysqli_query($con,"select stateName from state1 ");
    while ($rw=mysqli_fetch_array($sql)) 
    {
     if($rw['stateName']==$st)
     {
      continue;
     }
     else
     {
      ?>
      <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
      <?php
     }
   }
      ?>
    </select>
  </div>
 
</div>

<div class="form-group">
 <label class="col-sm-2 col-sm-2 control-label">Address</label>
  <div class="col-sm-4">
   <input type="text" name="address" required="required" value="<?php echo htmlentities($row['address']);?>" class="form-control">
  </div>

   <label class="col-sm-2 col-sm-2 control-label">Pincode</label>
   <div class="col-sm-4">
    <input type="pincode" name="pincode" required="required" value="<?php echo htmlentities($row['pincode']);?>" class="form-control">
   </div>

  <br> </br> <br> </br>

  <label class="col-sm-2 col-sm-2 control-label">State</label>
   <div class="col-sm-4">
    <input type="text" name="state" required="required" value="<?php echo htmlentities($row['State']);?>" class="form-control">
   </div>

   <label class="col-sm-2 col-sm-2 control-label">Country</label>
   <div class="col-sm-4">
    <input type="text" name="country" required="required" value="<?php echo htmlentities($row['country']);?>" class="form-control">
   </div>
</div>





<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Student Photo</label>
<div class="col-sm-4">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png" width="256" height="256" >
<a href="update-image.php">Change Photo</a>
<?php else:?>
	<img src="userimages/<?php echo htmlentities($userphoto);?>" width="256" height="256">
	<a href="update-image.php">Update Photo</a>
<?php endif;?>
</div>

</div>









<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Update</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
