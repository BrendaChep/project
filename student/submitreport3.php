<?php
  include '../header.php';
    if (!($_SESSION['id']) ){
    header('location:../index.php');
    exit();

    }

?>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include 'stu-nav.php';     ?>
      <br />
    </div>    
    <!-- End Left Column -->
    
    
    <!-- Middle Column -->
    <div class="w3-col m9">
      <div id="main">
              
          <div class="w3-row-padding">
            <div class="w3-col m12">
              <div class="w3-card-2 w3-white">
                <div class="w3-container w3-padding">
                  <h5 class="w3-center">SUBMIT PROJECT REPORT</h5>
                </div>
              </div>
            </div>
          </div>
        <br />
      
       <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-white">  
            <div class="w3-container w3-padding"> 

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >
              <br />

              <div class="w3-row">
                <div class="w3-col m4">Attachment Title   </div>
                <div class="w3-col m8">
                  <input type="text" name="title" class="w3-input" placeholder="Title e.g Chapter 1 and 2" >
                </div>
              </div><br />

              <div class="w3-row">
                <div class="w3-col m4">Attachment Description   </div>
                <div class="w3-col m8">
                      <input type="text" name="exout" class="w3-input" placeholder="Description eg. The document covers the problem statement etc" >
                </div>
              </div><br />

             

              <div class="w3-row">
                <div class="w3-col m4">Attach file </div>
                <div class="w3-col m8">
                    <input type="file" name="concept" class="w3-input" >
                </div>
              </div><br />

              <div class="w3-center">
                <button type="submit" name="submit" class="w3-padding w3-btn w3-blue">Submit report</button>
              </div>            
            </form>

            <?php
              if (isset($_POST['submit'])) {
/*
                $propsupervisor = mysqli_real_escape_string($_POST['propsup']);
                $proptitle = mysqli_real_escape_string($_POST['title']);
                $expectedoutput = mysqli_real_escape_string($_POST['exout']);*/

                $propsupervisor = $_POST['propsup'];
                $proptitle = $_POST['title'];
                $expectedoutput = $_POST['exout'];

                  include 'upload.php';

                  $sql = "INSERT INTO proposalnote(studentid, proposedtitle, expectedoutput, proposalfile, supervisor, reccomended, approval, time) VALUES ('$regNo', '$proptitle', '$expectedoutput', '$target_file','$propsupervisor','no','waiting',now())";

                  $insert = mysqli_query($dbcon, $sql);

                if (($insert == true) && ($uploadOk == 1)) { ?>
                  <script>
                  alert('Proposed project Successfully Submitted.');
                 window.location = 'index.php';
                 
                  </script>
                <?php 
                } else {  ?>
                  
                  <script>
                  alert('Project report is not Submitted..');
                window.location = 'index.php';
                  </script>    
                <?php
               
                    }

              } //isset Submit

            ?>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
    <!-- End Middle Column -->
  </div> 
  <!-- End Grid -->
</div>  
  
<!-- End Page Container -->


<br>

<!-- Footer -->


<?php include '..\footer.php'; ?>

