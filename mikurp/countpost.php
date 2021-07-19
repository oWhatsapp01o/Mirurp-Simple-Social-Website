<?php 
$countpost=0;
$countpostimg=0;
$countreactall=0;
$countpostperperson=mysqli_query($con,"SELECT * from post where accountID = '$accountID ' ")or die(mysqli_error($con));
              while($countpostper=mysqli_fetch_object($countpostperperson))
              {
                if ($countpostper->postImg!=NULL) {
                	$countpostimg++;
               }
               $countpost++;
           }
           
             $countreact=mysqli_query($con,"SELECT * from react where accPostID = '$accountID ' ")or die(mysqli_error($con));
              while($countreactperperson=mysqli_fetch_object($countreact))
              {
               
               $countreactall++;
           }
                 
                
?>