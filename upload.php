<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $uploadDir="uploads/";
        $filename=basename($_FILES["uploadFile"]["name"]);
        $targetfile=$uploadDir.$filename;

        if(!is_dir($uploadDir)){
            mkdir($uploadDir,0777,true);
        }

        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$targetfile)){
            echo "File uploaded successfully";
            echo "<a href='download.php?file=" . urlencode($filename) . "'>
                <button>Download File</button>
              </a>";
              echo "<a href='delete.php?file=" . urlencode($filename) . "'>
                <button>Delete File</button>
                </a>";
                

            
        }
        else{
            echo "Upload File Failed";
        }
    }
?>






