 <header class="header black-bg"  style="background : #2980B9;">
              <div class="sidebar-toggle-box">  <!-- Fontawesome fonts-->
                  <div class="fa fa-bars tooltips" style="color : #eee;" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="spotlight.php" class="logo"><b>VIT HOSTEL SERVICES</b></a>
                
            <div class="top-menu">
            	
              <ul class="nav pull-right top-menu">  <!--unordered list to place these two buttons-->

                    <li><a class="logout" style="background : #000000;" href="profile.php"><b><b><?php echo htmlentities($_SESSION['login']);?></b></b> <b>(Student)</b></a></li>  <!-- Showing username using session variable -->
                    <li><a class="logout" style="background : #000000;" href="logout.php"><b><b>Logout</b></b></a></li>
            	</ul>
            </div>
        </header>