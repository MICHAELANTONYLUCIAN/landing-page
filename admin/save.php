<?php 
// Include the database configuration file 
include_once 'dbconfig.php'; 
     
if(isset($_POST['submit'])){ 
    // File upload configuration 
    $name = $_POST['name'];
    $MobileNo =$_POST["MobileNo"];
    $password =$_POST["password"];
    $eventName =$_POST["eventName"];
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$name."','".$MobileNo."','".$password."','".$eventName."','".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO files (name,MobileNo,password,eventName,image, uploaded_on) VALUES $insertValuesSQL"); 
            if($insert){ 
              echo  $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                
            }else{ 
               echo $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
           echo $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
       echo $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
?>