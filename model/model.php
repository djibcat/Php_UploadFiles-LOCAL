<?php
$setNewName; // contain : int time . string path of the curent file -> SET NEW NAME TO CURENT FILE
$basePath ; // contain : string repository folder . $setNewName -> SET THE FINAL PATH


try {
    if(isset ($_FILES['picture']) && $_FILES['picture']['error'] == 0 ){ // if file exist AND file contain no error

        if ($_FILES['picture']['size'] <= 3000000){ // set max file size
            $pictureInfo = pathinfo($_FILES['picture']['name']); // get pathInfo
            $pictureExtensionInfo = $pictureInfo['extension']; //get fileExtension
            $pictureExtensionArray= array('png','PNG','jpg','JPG','jpeg','JPEG','gif','GIF'); //set extension restictions

            if (in_array($pictureExtensionInfo , $pictureExtensionArray)){ //if file extension match with restrictions

                $setNewName = time().basename($_FILES['picture']['name']); // set new name file
                $saveFile = move_uploaded_file(                             // move file to repository
                    ($_FILES['picture']['tmp_name']),'uploadsRepository/' . $setNewName); // move file from temporary place to repository
                $basePath ='uploadsRepository/' . $setNewName; // set full path to file after getting in repository
                    
            }else {
                $basePath = 0;
                throw new Exception("Please, check your extension format, we only accept : png / jpg / jpeg and gif");
            }
        }else {
            $basePath = 0;
            throw new Exception("File too big");
        }
    } else {
        $basePath = 0;
        throw new Exception("Please give me some files");
    }
    
    $html = "Picture well uploaded";
}
   
catch (Exception $e){
    $error = $e->getMessage();
    $html = $error; // set $html that contain succes message to error message
}
?>