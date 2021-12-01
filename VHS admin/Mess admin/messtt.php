
<?php
	session_start();
	include('include/config.php');
	if(strlen($_SESSION['alogin'])==0)
	{	
		header('location:index.php');
	}
	else
	{
		date_default_timezone_set('Asia/Kolkata');// change according timezone
		$currentTime = date( 'd-m-Y h:i:s A', time () );
    

	if(isset($_POST['submit']))
	{
		$category1=$_POST['category1'];
		$description=$_POST['description'];
		$sql=mysqli_query($con,"insert into category1(categoryName,categoryDescription) values('$category1','$description')");
		$_SESSION['msg']="Category Created !!";

	}

	if(isset($_GET['del']))
	{
		mysqli_query($con,"delete from category1 where id = '".$_GET['id']."'");
		$_SESSION['delmsg']="Category deleted !!";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Admin| Mess Timetable</title>
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
								<h3>Mess Timetable</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Mess Block</th>
											<th>Day</th>
											<th>Breakfast</th>
											<th>Lunch</th>
											<th>Snacks</th>
											<th>Dinner</th>
											<th>Last Updated At</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from mess_tt where Mess_Block = '".($_SESSION['alogin'])."' ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['Mess_Block']);?></td>
											<td><?php echo htmlentities($row['Day']);?></td>
											<td><?php echo htmlentities($row['Breakfast']);?></td>
											<td><?php echo htmlentities($row['Lunch']);?></td>
											<td><?php echo htmlentities($row['Snacks']);?></td>
											<td><?php echo htmlentities($row['Dinner']);?></td>
											<td><?php echo htmlentities($row['Last_Update']);?></td>
											<td>
											<a href="edit-messtt.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											</td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
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

