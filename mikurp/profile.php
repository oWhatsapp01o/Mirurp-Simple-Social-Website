<?php 
      include('connection.php');

?>

<?php
 if(!isset($_SESSION['account'])){
  echo"<script type='text/javascript'>window.location.replace('index.php')</script>";
} 
      $accountID = $_SESSION['account'];
      $account=mysqli_query($con,"SELECT account.* from account where accountID = '$accountID'")or die(mysqli_error($con));
      $row=mysqli_fetch_object($account);

?>
<!DOCTYPE html>
<html>
<title>Miku Site RP</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="modal.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;
background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
background-attachment: fixed;
  background-repeat: no-repeat;

    font-family: 'Vibur', cursive;
/*   the main font */
    font-family: 'Abel', sans-serif;
opacity: .95;}

.bodynav {
  background-image: url("cover.jpg");
  background-repeat: no-repeat, repeat;
  background-color: #cccccc;
  width: 100%;
  height: 100%;
}
</style>
<body >

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><img src="logo.png" class=" w3-margin-right" style="width:46px"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse  w3-animate-left" style="z-index:3;width:300px;  background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">

    
      <img src="<?php echo "pic/".$row->image;?>" class="w3-circle w3-margin-right" style="width:46px ; height: 50px; width: 50px">
   
 
   
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $row->name; ?></strong></span><br>
      <a href="home.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
      <a href="profile.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <button id="myBtn" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> </button>
      <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out "></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <p style="font-size: 15px; color:pink"> <b>Dashboard </b> </p>

  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
    <p >&nbsp;&nbsp;&nbsp;&nbsp;Birhday:&nbsp;&nbsp;<span style="font-size: 15px; font-weight:bold;"><?php echo $row->birthday; ?></span></p>
    <p >&nbsp;&nbsp;&nbsp;&nbsp;Gender:&nbsp;&nbsp;<span style="font-size: 15px;font-weight:bold;"><?php echo $row->gender; ?></span></p>
    <p >&nbsp;&nbsp;&nbsp;&nbsp;Mobile Number:&nbsp;&nbsp;<span style="font-size: 15px;font-weight:bold;"><?php echo $row->mobilenumber; ?></span></p>
    <hr>
    <p >&nbsp;&nbsp;&nbsp;&nbsp;Date Joined:&nbsp;&nbsp;<span style="font-size: 15px;font-weight:bold;"><?php echo $row->datecreated; ?></span></p>
  
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-profile"></i>Profile</b></h5>
  </header>

 <div class="w3-main" style="margin-right:50px;margin-left:50px;margin-top:43px;">
    
     <header  >

  <div class="container">

    <div class="profile">

      <div class="profile-image">

        

        
     <img src="<?php echo "pic/".$row->image;?>" style="width:46px ; height: 150px; width: 150px" alt="">
   
    

      </div>

      <div class="profile-user-settings">

        <h1 class="profile-user-name"><?php echo $row->name; ?></h1>

        

      </div>

      <div class="profile-stats">
<?php
include('countpost.php');
?>
        <ul>
          <li><span class="profile-stat-count"><?php echo $countpost; ?></span> posts</li>
          <li><span class="profile-stat-count"><?php echo $countpostimg; ?></span> photos</li>
         <li><span class="profile-stat-count"><?php echo $countreactall; ?></span> reacts</li>
        </ul>

      </div>

      <div class="profile-bio">

        <p><span class="profile-real-name"> </span> <hr>    gg</p>

      </div>

    </div>
    <!-- End of profile section -->

  </div>
  <!-- End of container -->

</header>

<main>

  <div class="container">

    <div class="gallery">

      

      <?php 
      // mysqli_query($con,"SELECT post.*,account.* from post,account where account.accountID = post.postID order BY forumdatetime DESC")or die(mysqli_error($con));
            $username=$row->name;
            $id=$row->accountID;
              $post=mysqli_query($con,"SELECT * from post where accountID = '$id' ")or die(mysqli_error($con));
              while($rowpost=mysqli_fetch_object($post))
              {
                if ($rowpost->postImg!=NULL) {
                 
                
              ?>
      

      <div class="gallery-item" tabindex="0">

        <img src="<?php echo "post/".$rowpost->postImg;?>" class="gallery-image" alt="">

        <div class="gallery-item-type">

          <span style="color: black; font-size: 10px;" ><?php echo $rowpost->postDes;?></span>

        </div>

        <div class="gallery-item-info">

          <ul>
           

          </ul>

        </div>

      </div>
<?php } }?>


<?php 
      // mysqli_query($con,"SELECT post.*,account.* from post,account where account.accountID = post.postID order BY forumdatetime DESC")or die(mysqli_error($con));
            $username=$row->name;
              $post2=mysqli_query($con,"SELECT * from post where welcomeuser = '$username' ")or die(mysqli_error($con));
              while($rowpost2=mysqli_fetch_object($post2))
              {
                if ($rowpost2->postImg!=NULL) {
                 
                
              ?>
      

      <div class="gallery-item" tabindex="0">

        <img src="<?php echo "post/".$rowpost2->postImg;?>" class="gallery-image" alt="">

        <div class="gallery-item-type">

          <span style="color: black; font-size: 10px;" ><?php echo $rowpost2->postDes;?></span>

        </div>

        <div class="gallery-item-info">

          <ul>
           

          </ul>

        </div>

      </div>
<?php } }?>




    </div>
    <!-- End of gallery -->

    <div class="loader"></div>

  </div>
  <!-- End of container -->

</main>
 

  <!-- End page content -->
</div>
<br><br><br><br><br><br><br><br><br><br>
<!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <p class=" w3-light-grey"><b>FOOTER</b></p>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>
 <!-- The Modal -->
<?php
include('modal.php');
?>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
