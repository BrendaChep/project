<?php 


  $get_user = $_SESSION['id'];

  $result = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$get_user'") or die(mysqli_error());
  $user_row = mysqli_fetch_array($result);

  $regNo =  $user_row['regNo']; 
?>

<div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
        <h4 class="w3-center">Student's Dashboard</h4>
         <!--p class="w3-center"><img src="../images/avatar6.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p-->
         <hr>
         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Name:</strong> <?php echo $user_row['lName'].", ".$user_row['fName']." ".$user_row['mName'] ?> </p>
         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Reg:</strong> <?php echo $user_row['regNo'];  ?></p>

         <p><i class="fa fa-fw w3-margin-right w3-text-theme"></i><strong>Course:</strong>  <?php echo $user_row['course']; ?></p >
        </div>
      </div>
      <br />

      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>Propose a project</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>

            <?php 
            #$conceptsql = "SELECT * FROM conceptnote WHERE student = '$regNo'";
            $studentproposal = mysqli_query($dbcon, "SELECT * FROM proposalnote WHERE studentid = '$regNo'") or die(mysqli_error());

            $proposal_note = mysqli_fetch_array($studentproposal);
            $proposal_num_row = mysqli_num_rows($studentproposal);
            if($proposal_num_row > "0") {
              echo "You submitted a concept note. <br />";

                $approval = $proposal_note['approval'];

                if($approval == 'approved') {
                  echo "It has been APPROVED.";
                }
                else if ($approval == 'disapproved') {
                  echo "It has been REJECTED";
                ?>
                  <br />
                  <a href="proposalnote.php"><button class="w3-btn w3-btn-block w3-grey" >Propose another project</button></a>
                  <br 
              <?php
                 }
                else
                {
                  echo "It is waiting approval";
                }
                

            } else {  ?>
              <br />
              <a href="proposalnote.php"><button class="w3-btn w3-btn-block w3-grey" >Submit proposed project</button></a>
              <br />
            <?php } 
              
            ?> 

            </p>
          </div>
        </div>
      </div>
      <br />
    
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-blue w3-left-align"><i class="fa fa-file-text fa-fw w3-margin-right"></i>Submit Documentation Reports</button>
          <div id="Demo3" class="w3-hide w3-container">

             <!--  <p>
              <button class="w3-btn-block w3-grey w3-left-align" onclick="studentReports()"><i class="fa fa-save fa-fw w3-margin-right"></i> View Submitted Reports </button></p> -->

              

              <p>    <a href="finaldraft.php"><button class="w3-btn-block w3-grey w3-left-align"  ><i class="fa fa-upload fa-fw w3-margin-right"></i> Upload New Report </button></a></p>
          </div>
        </div>      
      </div>
      <br />
        <div class="w3-card-2 w3-round w3-white w3-center">
          <button class="w3-btn-block w3-blue w3-left-align" onclick="loadSupervisors()"><i class="fa fa-users fa-fw w3-margin-right"></i> Supervisors </button>
      </div>
      <br />
      
      <div class="w3-card-2 w3-round w3-white w3-center">
          <button class="w3-btn-block w3-blue w3-left-align" onclick="astorojects()"><i class="fa fa-file-text fa-fw w3-margin-right"></i>Past projects </button>
      </div>
      <br />
      <div class="w3-card-2 w3-round w3-white w3-center">
          <a href="../search-projects.php"><button class="w3-btn-block w3-blue w3-left-align" onclick=""><i class="fa fa-search fa-fw w3-margin-right"></i>Projects Archive</button></a>
      </div>
      <br />
         
<script type="text/javascript">
     
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("main").innerHTML = this.responseText;
      }
    };
  function loadSupervisors() {
  xhttp.open("GET", "../functions/supervisor.php", true);
    xhttp.send();
  }
  function studentReports() {
      xhttp.open("GET", "../functions/student-reports.php", true);
      xhttp.send();
  }
  function uploadReport() { 
      document.documentElement.innerHTML = '';
  xhttp.open("GET", "finaldraft.php", true);
    xhttp.send();
  }
  function submitConcept() {
  xhttp.open("GET", "proposalnote.php", true);
    xhttp.send();
  }
  function astorojects() {
  xhttp.open("GET", "pastprojects.php", true);
    xhttp.send();
  }
function suggestGroup() {
  xhttp.open("GET", "suggestgroup.php", true);
    xhttp.send();
  }
</script>