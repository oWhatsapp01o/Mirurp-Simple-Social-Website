<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
       
       <br>
       <hr>
      <?php 
      $accountedit=mysqli_query($con,"SELECT * from account where accountID = '$accountID'")or die(mysqli_error($con));
      $rowaccountedit=mysqli_fetch_object($accountedit);


       ?>
      
     <form action="query.php" method="post" enctype="multipart/form-data">
       
            <input type="text" value="<?php echo $rowaccountedit->image;?>" name="picturea" style="visibility: hidden;">
              <div id="facility"  style="background-image:url('pic/<?php echo $rowaccountedit->image;?>');width: 200px;height: 200px;background-size:cover;"></div>
             <input type="file" name="image" accept="image/*">
              <hr>
         
        <label>Name </label> <br>
        <input type="text" name="name" value="<?php echo $rowaccountedit->name;?>"><br><br>
         <label>Address </label> <br>
         <input type="text" name="address" value="<?php echo $rowaccountedit->address;?>"><br><br>
         <label>Gender </label> <br>
         <input type="text" name="gender" value="<?php echo $rowaccountedit->gender;?>">
         <hr>
         <label>Username </label> <br>
         <input type="text" name="username" value="<?php echo $rowaccountedit->user;?>"><br><br>
         <label>Password </label> <br>
         <input type="" name="pass" value="<?php echo $rowaccountedit->pass;?>"><br><br>
<input type="text" name="id" value="<?php echo $rowaccountedit->accountID;?>" hidden>

         <button type="submit" name="btnupdateprofile" value="btndes"class="w3-button w3-theme" style="background-color: skyblue; border: solid 2px black;"><i class="fa fa-pencil"></i>Update Profile </button> 

<a href="profile.php" class="w3-bar-item w3-button" style="background-color: skyblue; border: solid 2px black;"><i class="fa fa-close "></i></a>
       </form>  <br>
       

    </div>
    <div class="modal-body">
     
    </div>
    <div class="modal-footer">
      <h5>@Ivan Llasus </h5>
    </div>
  </div>

</div>