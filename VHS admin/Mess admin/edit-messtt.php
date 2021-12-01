
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
	$Breakfast=$_POST['Breakfast'];
	$Lunch=$_POST['Lunch'];
	$Snacks=$_POST['Snacks'];
	$Dinner=$_POST['Dinner'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update Mess_tt set Breakfast='$Breakfast',Lunch='$Lunch',Snacks='$Snacks',Dinner='$Dinner',Last_Update=NOW() where id='$id'");
$_SESSION['msg']="Timetable Updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Admin| Update Mess Timetable</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Mess Timetable</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Mess_tt" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from Mess_tt where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>									



<div class="control-group">
											<label class="control-label" for="basicinput">Breakfast</label>
											<div class="controls">
												<textarea class="span8" name="Breakfast" rows="3"><?php echo  htmlentities($row['Breakfast']);?></textarea>
											</div>
										</div>


<div class="control-group">
											<label class="control-label" for="basicinput">Lunch</label>
											<div class="controls">
												<textarea class="span8" name="Lunch" rows="3"><?php echo  htmlentities($row['Lunch']);?></textarea>
											</div>
										</div>


<div class="control-group">
											<label class="control-label" for="basicinput">Snacks</label>
											<div class="controls">
												<textarea class="span8" name="Snacks" rows="3"><?php echo  htmlentities($row['Snacks']);?></textarea>
											</div>
										</div>


<div class="control-group">
											<label class="control-label" for="basicinput">Dinner</label>
											<div class="controls">
												<textarea class="span8" name="Dinner" rows="3"><?php echo  htmlentities($row['Dinner']);?></textarea>
											</div>
										</div>
									<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>