 

<div class="w3-container">
  <div class="w3-card-2">

    <?php

    	include '../dbcon.php';    
    	$groupsugId = $_GET['sugId'];


		$sqlgrp = mysqli_query($dbcon, "SELECT * FROM `approvedmembers` WHERE sugId='$groupsugId'") or die(mysqli_error($dbcon));
        $group_row = mysqli_fetch_array($sqlgrp);      
    	$approval = $group_row['approval'];

    	if ($approval =="waiting")
        {
    	
	      		$disapprovesql = mysqli_query($dbcon, "UPDATE approvedmembers SET approval='disapproved' WHERE sugId = '$groupsugId'") or die(mysqli_error($dbcon));
	      		 if($disapprovesql) { 
	            //echo "Group disapproved";
	            echo "<script type=\"text/javascript\">	alert(\"Student has been disapproved\"); </script>";
	            } else { 
	              //echo "Something went wrong the group was not disapproved";
	              echo "<script type=\"text/javascript\">	alert(\"Something went wrong the student was not disapproved\"); </script>";                  
	            } 
                    
	    }
        
    ?>
  </div>
</div>

<?php
             
    
?>