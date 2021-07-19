<?php  
include('connection.php');

if(isset($_POST['btnsignup']))
        { 

           
            $name=$_POST['name'];
            $birthdate=$_POST['bday'];
            $gender=$_POST['gender'];
           
            $number=$_POST['number'];
             $username=$_POST['username'];
              $password=$_POST['password'];
              
            date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y h:i:s a', time());
            
            $add=mysqli_query($con,"INSERT into account (name , birthday, gender, mobilenumber,user ,pass, datecreated ,image) VALUES('$name','$birthdate','$gender', '$number',  '$username','$password' ,'$date','null.gif') ");
         
            $add2=mysqli_query($con,"INSERT into post (postDes , postDate, welcomeuser, postImg) VALUES('Welcome New User!','$date','$name', 'Welcome.png') ");
            if($add)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('index.php');alert('Successfully Register, Login Now?!')</script>";  
            
            }
        }

        if(isset($_POST['btndes']))
        { 

           
            $ids=$_POST['ids'];
            $dess=$_POST['postDes'];  
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());
            
           if(!empty($_FILES["image"]["tmp_name"])){
                $fileinfo=PATHINFO($_FILES["image"]["name"]);
                $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
                move_uploaded_file($_FILES["image"]["tmp_name"],"post/" . $newFilename);
                $location=$newFilename;
    
    
         $add3=mysqli_query($con,"INSERT into post(accountID, postDes, postDate, postImg) VALUES('$ids','$dess','$date','$location') ")or die(mysqli_error($con)); 
            }
            else
            {
                $add3=mysqli_query($con,"INSERT into post(accountID , postDes, postDate) VALUES('$ids','$dess','$date')")or die(mysqli_error($con));
            }
            

         echo"<script type='text/javascript'>window.location.replace('home.php');</script>";  
            
            
        }
         if(isset($_POST['btnupdateprofile']))
        { 

           
            $name=$_POST['name'];
            $address=$_POST['address'];
            $gender=$_POST['gender'];
            $username=$_POST['username'];
            $password=$_POST['pass'];
            $id=$_POST['id'];
              
            
           if(!empty($_FILES["image"]["tmp_name"])){
        $fileinfo=PATHINFO($_FILES["image"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["image"]["tmp_name"],"pic/" . $newFilename);
        $location=$newFilename;
            }
             $updateaccount=mysqli_query($con,"UPDATE account set name = '$name',address = '$address',gender = '$gender',user = '$username',pass = '$password',image = '$newFilename' where accountID = '$id'")or die(mysqli_error($con));
            
            if($updateaccount)
            {
               
                echo"<script type='text/javascript'>window.location.replace('profile.php');</script>";  
            
            }
        }
        if(isset($_POST['btnreact']))
        { 

           
            $postid=$_POST['postid'];
            $userid=$_POST['userid'];
            $accpostid=$_POST['accpostid'];
        
         
            $react=mysqli_query($con,"INSERT into react ( postID ,accountID,accPostID ) VALUES('$postid','$userid','$accpostid')")or die(mysqli_error($con));
            if($react)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('home.php');</script>";  
            
            }
        }
?>