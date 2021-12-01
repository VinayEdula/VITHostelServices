<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VHS | Mess Complaint Details</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
  <section id="container" >
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
      <section id="main-content" style="padding-left:5%; color:#000">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
            <hr />

 <?php $query=mysqli_query($con,"select tblcomplaints1.*,category1.categoryName as catname from tblcomplaints1 join category1 on category1.id=tblcomplaints1.category where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['complaintNumber']);?></p>
          		</div>
<label class="col-sm-2 col-sm-2 control-label"><b>Reg. Date :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['regDate']);?></p>
              </div>
          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['catname']);?></p>
              </div>

            </div>



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['complaintType']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b>State :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['state']);?></p>
              </div>
            </div>  



  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Nature of Complaint :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['noc']);?></p>
              </div>
<label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
              <div class="col-sm-4">
              <p><?php $cfile=$row['complaintFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo htmlentities("File NA");
}
else{ ?>
<a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target='_blank'> View File</a>
<?php } ?>

              </p>
              </div>
            </div> 
 <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details </label>
              <div class="col-sm-10">
              <p><?php echo htmlentities($row['complaintDetails']);?></p>
              </div>

            </div> 



<?php 
$ret=mysqli_query($con,"select complaintremark1.remark as remark,complaintremark1.status as sstatus,complaintremark1.remarkDate as rdate from complaintremark1 join tblcomplaints1 on tblcomplaints1.complaintNumber=complaintremark1.complaintNumber where complaintremark1.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>Remark:</b></label>
              <div class="col-sm-10">
   <?php echo  htmlentities($rw['remark']); ?>
              </div>
            </div> 

<div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>Remark Date:</b></label>
              <div class="col-sm-10">
  <?php echo  htmlentities($rw['rdate']); ?>
              </div>
            </div>
 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>Status:</b></label>
              <div class="col-sm-10">
 <?php echo  htmlentities($rw['sstatus']); ?>
              </div>
            </div>

<?php } ?>

 <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>Final Status :</b></label>
              <div class="col-sm-4">
              <p style="color:red"><?php 

if($row['status']=="NULL" || $row['status']=="" )
{
echo "Yet to Process";
} else{
              echo htmlentities($row['status']);
}
              ?></p>
              </div>
            </div> 
<?php } ?>
		</section><! --/wrapper -->
      </section>
<?php include('includes/footer.php');?>
  </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
