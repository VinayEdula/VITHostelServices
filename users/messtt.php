<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VHS | Mess Timetable</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">
  </head>

  <body>
  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Your Mess Timetable</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">Mess Block</th>
                                  <th style="text-align: center">Day</th>
                                  <th style="text-align: center">Breakfast</th>
                                  <th style="text-align: center">Lunch</th>
                                  <th style="text-align: center">Snacks</th>
                                  <th style="text-align: center">Dinner</th>
                                  <th style="text-align: center">Last Updated At</th>
                              </tr>
                              </thead>
                              <tbody>
  <?php $query=mysqli_query($con,"select * from mess_tt where Mess_Block IN (select Mess_Block from users where Registration_No='".$_SESSION['login']."')");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['Mess_Block']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Day']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Breakfast']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Lunch']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Snacks']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Dinner']);?></td>
                                  <td align="center"><?php echo htmlentities($row['Last_Update']);?></td>
                              </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
    

  </body>
</html>
<?php } ?>
