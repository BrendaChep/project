<?php
$target_dir = "../proposal-notes/";
$target_file = $target_dir . basename($_FILES["proposal"]["name"]);
$uploadOk = 1;
$errMessage = "";
$proposalFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {

} else {
    exit();
}

// Check if concept file is a document
    if($proposalFileType != "doc" && $proposalFileType != "docx" && $proposalFileType != "pdf") {
        $errMessage += "Sorry, only Word Document and PDF files are allowed. <br /> ";
        $uploadOk = 0;
    }
    
// Check if file already exists
    if (file_exists($target_file)) {
        $errMessage += "Sorry, a file with a similar name already exists. <br />";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
    // if everything is ok, try to upload file
       if (move_uploaded_file($_FILES["proposal"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["proposal"]["name"]). " has been uploaded.";
        } else {
            $errMessage += "Sorry, there was an error uploading your file. <br />";
            echo $errMessage;
        }
        

    } 
    
?>