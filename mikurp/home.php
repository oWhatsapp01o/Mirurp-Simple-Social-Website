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
      
       $updateaccount=mysqli_query($con,"UPDATE post set accountID = '$accountID'where welcomeuser = '$row->name'")or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
<title>Miku Site RP</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="modal.css">
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
</style>
<body >

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
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
      
      
     
             
       <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out "></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <p style="font-size: 20px; color:pink"> <b>Dashboard </b> </p>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
  
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-home"></i>Home</b></h5>
  </header>

 <div class="w3-main" style="margin-right:50px;margin-left:50px;margin-top:43px;">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
             <br>
             <form action="query.php" method="post" enctype="multipart/form-data">

             <input class="form-input" type="text" name="ids" value="<?php echo $row->accountID?>" hidden >
              <input class="form-input" type="text" name="postDes" placeholder=" What's on your mind!" style="width: 100%; height: 100px;  background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);">
              <br><br>
             <input type="file" name="image" accept="image/*">
              <button type="submit" name="btndes" class="w3-button w3-theme w3-right"><i class="fa fa-pencil"></i> Post</button> 
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php 
      // mysqli_query($con,"SELECT post.*,account.* from post,account where account.accountID = post.postID order BY forumdatetime DESC")or die(mysqli_error($con));
            
              $post=mysqli_query($con,"SELECT account.*,post.* from post,account where account.accountID = post.accountID  or post.welcomeuser = account.name order by postID DESC")or die(mysqli_error($con));
              while($rowpost=mysqli_fetch_object($post))
              {
              ?>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="<?php echo "pic/".$rowpost->image;?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:60px;">
        <span class="w3-right w3-opacity"><?=$rowpost->postDate?></span>
        <p><b><a href="viewprofile.php?accountID=<?=$rowpost->accountID?>" data-remote="viewprofile.php?accountID=<?=$rowpost->accountID?>" title="View" data-size="modal-lg" class="btn  btn-sm btn-success  poop " data-catid=""  >  <?=$rowpost->name?> </a></b></p><br>
        <hr class="w3-clear">
        <p><?=$rowpost->postDes?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <?php if($rowpost->postImg != NULL){  ?>
          
              <img src="<?php  echo "post/".$rowpost->postImg; ?> " style="width:100%;" alt="post" class="w3-margin-bottom">
            
              <?php
               }
               ?> 
            </div>
            
        </div>
<?php 
      
            $countreact=0;
             $dis=0;
              $postreact=mysqli_query($con,"SELECT * from react ")or die(mysqli_error($con));
              while($rowpostreact=mysqli_fetch_object($postreact))
              {
                if($rowpostreact->postID == $rowpost->postID ){
                  $countreact++;
                  
                }
                if ($rowpostreact->postID == $rowpost->postID && $row->accountID==$rowpostreact->accountID ){

                      $dis++;

                  }
              }
              ?>

        <p ><img src="reactbutton.jpg" width="25px"><b style="color: red;">&nbsp;&nbsp;<?php echo $countreact;  ?></b><span style="color: blue;"> User likes this </span> </p>

       <form action="query.php" method="post">
          <input type="text" name="postid" value="<?=$rowpost->postID?>" hidden>
          <input type="text" name="userid" value="<?php echo $row->accountID?>" hidden>
           <input type="text" name="accpostid" value="<?=$rowpost->accountID?>" hidden>
         <button type="submit" name="btnreact" class="w3-button w3-theme-d1 w3-margin-bottom" style="background-color: skyblue; border: solid 2px red; border-radius: 50%;" <?php if ($dis>=1) {
           echo "disabled";
         } ?> ><img src="react.png" width="15px"  > </button> <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" > 2 <i class="fa fa-comment"></i><span style="color: blue;"></span></button>
          </form>

        
      </div>
      <?php 
                }   
            ?>
      

     

 
 

  <!-- End page content -->
</div>
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
