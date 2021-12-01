

<aside>
          <div id="sidebar"  class="nav-collapse" style="background: #ffffff;">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                              <?php $query=mysqli_query($con,"select fullName,userImage from users where Registration_No='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <p class="centered"><a href="profile.php">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png"  class="img-circle" width="70" height="70" >
<?php else:?>
  <img src="userimages/<?php echo htmlentities($userphoto);?>" class="img-circle" width="70" height="70">

<?php endif;?>
</a>
</p>
 
                  <h5 class="centered"><?php echo htmlentities($row['fullName']);?></h5>
                  <?php } ?>
                    
<!-- converts characters into html-->
                 <li class="sub-menu">
                      <a href="spotlight.php" style="color : #000000;">
                          <i class="fa fa-bullhorn"></i>
                          <span>Spotlight</span>
                      </a>
                    </li>
                    
                <li class="sub-menu">
                      <a href="messtt.php" style="color : #000000;">
                          <i class="fa fa-table"></i>
                          <span>Mess Timetable</span>
                      </a>
                    </li>   

                 <li class="sub-menu">
                      <a href="javascript:;" style="color : #000000;">
                          <i class="fa fa-dashboard"></i>
                          <span>Complaint Status</span>
                      </a>
                      <ul class="sub">
                          <li style="background: #ffffff;"><a  href="dashboard.php" style="color : #000000;">Hostel Complaint Status</a></li>
                          <li style="background: #ffffff;"><a  href="dashboard1.php" style="color : #000000;">Mess Complaint Status</a></li>
                        
                      </ul>
                  </li>

                 
                  <li class="sub-menu">
                      <a href="register-complaint.php" style="color : #000000;">
                          <i class="fa fa-book"></i>
                          <span>Lodge a Hostel Complaint</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="register-complaint1.php" style="color : #000000;">
                          <i class="fa fa-book"></i>
                          <span>Lodge a Mess Complaint</span>
                      </a>
                    </li>
                  </li>
                  <li class="sub-menu">
                      <a href="complaint-history.php" style="color : #000000;">
                          <i class="fa fa-tasks"></i>
                          <span>Hostel Complaint History</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="complaint-history1.php" style="color : #000000;">
                          <i class="fa fa-tasks"></i>
                          <span>Mess Complaint History</span>
                      </a>
                      
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" style="color : #000000;">
                          <i class="fa fa-cogs"></i>
                          <span>Account Settings</span>
                      </a>
                      <ul class="sub">
                          <li style="background: #ffffff;"><a  href="profile.php" style="color : #000000;">Profile</a></li>
                          <li style="background: #ffffff;"><a  href="change-password.php" style="color : #000000;">Change Password</a></li>
                        
                      </ul>
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>