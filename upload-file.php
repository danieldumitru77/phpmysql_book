<?php

$message = '';

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_FILES['image']['error'] === 0){
        
        $message = '<b>File : </b>' .$_FILES['image']['name'] . '<br>';
   
        $message = '<b>Size : </b>' .$_FILES['image']['size'] . 'bytes';

    }else{

        $message = 'The file could not be uploaded';
     
    }
}


?> 

<?= $message ?>


<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="image"><b>Upload</b></label>
    <input type="file" name="image"  id="image"><br>
    <input type="submit" value="Upload">


</form>

